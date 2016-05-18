<?php 
    require '../init.php';

    p($_SESSION);
    p($_POST);


    //表单不为空,如果有空值,回之
    foreach ($_POST as $key => $val) {
        if ($val == '') {
            redirect('请完善表单信息!');
            exit;
        }
    }

    //检测验证码
    $vcode = strtolower($_SESSION['vcode']);
    $uservcode = strtolower($_POST['vcode']);
    if ($vcode != $uservcode) {
        redirect('验证码错误!');
        exit;
    }

    //用户名验证
    //密码验证
    //两次密码一致性的验证
    //手机号
    //邮箱
    
    //接收用户信息
    $name = $_POST['name'];
    $pwd = md5($_POST['pwd']);
    $tel = $_POST['tel'];

    $sql = "INSERT INTO ".PRE."user (`name`,`pwd`,`tel`) VALUES('$name','$pwd','$tel')";


    if (execute($link,$sql)) {
        redirect('注册成功!',URL.'login.php');
        exit;
    }else{
        redirect('注册失败,请重试!');
        exit;
    }

    mysqli_close($link);







