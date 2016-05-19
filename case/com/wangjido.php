<?php 
    require '../init.php';

    // p($_SESSION);
    // p($_POST);
    // var_dump($_POST);
    // exit;
        //表单不为空,如果有空值,回之
    // foreach ($_POST as $key => $val) {
    //     if ($val == '') {
    //         redirect('请完善表单信息!');
    //         exit;
    //     }
    // }    
    //检测验证码
    $vcode = strtolower($_SESSION['vcode']);
    $uservcode = strtolower($_POST['vcode']);
    if ($vcode != $uservcode) {
        redirect('验证码错误!');
        exit;
    }

    $name = $_POST['name'];
    $tel = $_POST['tel'];


    if($_POST==''){
        // redirect('请填写数据,请重试!');
        exit;
    }
    // $email=$_POST['email'];
  

    $sql= "SELECT `id`,`name`,`tel` FROM ".PRE."user where`name`='$name'";
    // $result=mysqli_query($link,$sql);

    // p($sql);
    
    if ($result=query($link,$sql)) {
        $arr=mysqli_fetch_all($result,MYSQLI_ASSOC);
        $_SESSION['home']=$arr;

        p($arr);
        redirect('提交成功!',URL.'xiugai.php');
        exit;
    }else{
        // redirect('提交失败,请重试!');
        exit;
    }



   

    //用户名验证
    //密码验证
    //两次密码一致性的验证
    //手机号
    //邮箱
    
    //接收用户信息
    

    mysqli_close($link);







