<?php 
    require '../init.php';

    // p($_SESSION);
    // p($_POST);
    // var_dump($_SESSION);
    $id=$_SESSION['home']['0']['id'];


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

   

     // 密码: 长度4-32位
    $regex2 = '/^[\S]{4,32}$/';
    $pwd=$_POST['pwd'];
    if (!preg_match($regex2,$pwd)) {
        echo '密码不合法!<br>';
        exit;
    }else{
       echo '密码验证通过!<br>';
    }
    $pwd = md5($_POST['pwd']);
    $repwd=md5($_POST['repwd']);
    if($pwd != $repwd ){
    redirect('两次输入的密码不一致!');
    }else{
        echo '修改成功';
    }
    

    //接收用户信息
    $pwd = md5($_POST['pwd']);
    // $id=$_SEESION['home']['0']['id'];
    $sql = "UPDATE ".PRE."user SET `pwd`='$pwd' where `id`='$id' ";
  

        unset($_SEESION['home']['0']);
    if (execute($link,$sql)) {
        redirect('注册成功!',URL.'login.php');
        

        exit;
    }else{
        // redirect('注册失败,请重试!');
        exit;
    }

    mysqli_close($link);







