<?php 
    require './init.php';

    //表单不为空,如果有空值,回之
    foreach ($_POST as $key => $val) {
        if ($val == '') {
            admin_redirect('请完善表单信息!');
            exit;
        }
    }

    //验证码的检测
    $vcode = strtolower($_SESSION['vcode']);
    $uservcode = strtolower($_POST['vcode']);
    if ($vcode != $uservcode) {
        admin_redirect('请输入正确的验证码!');
        exit;
    }
    
    //接收用户数据
    $name = $_POST['name'];
    $pwd = md5($_POST['pwd']);

    //sql
    $sql = "SELECT `id`,`name`,`pwd`,`type` FROM ".PRE."admin_user WHERE `name`='$name'";

    $row = query($link, $sql);

    if ($row) {
        //如果有数据,说明用户存在
        $row = $row[0];
        
        if ($row['pwd'] == $pwd) {
           
            unset($row['pwd']);
            unset($_SESSION['vcode']);

            //将用户的ID,name放在session
            $_SESSION['admin'] = $row;
            // p($_SESSION);
            // exit;
            admin_redirect('登录成功!',ADMIN_URL.'index.php',1);
            exit;
        }else{
            //密码不一致
            admin_redirect('密码错误!!');
        }
    }else{
        //用户名不存在
        admin_redirect('然而用户名并不存在!');
        exit;
    }

