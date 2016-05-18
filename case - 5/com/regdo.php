<?php 
    require '../init.php';

    // p($_SESSION);
    // p($_POST);

   
    //用户名验证 
    $name=$_POST['name'];
    $regex1 = '/^[a-zA-Z][\w]{3,15}/i';
    if (!preg_match($regex1,$name)) {
        redirect('用户名不合法!',URL.'reg.php');
        exit;
    }else{
       echo '用户名验证通过!<br>';
    }
     // 密码: 长度4-32位
    $regex2 = '/^[\S]{4,32}$/';
     $pwd=$_POST['pwd'];
    if (!preg_match($regex2,$pwd)) {
        redirect('密码不合法!!',URL.'reg.php');
        exit;
    }else{
       echo '密码验证通过!<br>';
    }
    // 手机: 长度11位,合法的手机号 
    $regex3 = '/^1[^0129]\d{9}$/';
     $tel=$_POST['tel'];
    if (!preg_match($regex3,$tel)) {
        redirect('手机号不合法!',URL.'reg.php');
        
        exit;
    }else{

       echo '手机号验证通过!<br>';
    }
    // email: 输入合法的email 
    $regex4 = '/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/';
     $email=$_POST['email'];
    if (!preg_match($regex4,$email)) {
        redirect('注册邮箱失败!',URL.'reg.php');
        exit;
    }else{
       echo '邮箱验证通过!<br>';
       
    }

     
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
    
    //接收用户信息
    $name = $_POST['name'];
    $pwd = md5($_POST['pwd']);
    $repwd=md5($_POST['repwd']);
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    //表单不为空,如果有空值,回之
   

    if($pwd != $repwd){
    redirect('两次输入的密码不一致!!',URL.'reg.php'); 
    exit; 
    }


    $sql = "INSERT INTO ".PRE."user (`name`,`pwd`,`tel`,`email`) VALUES('$name','$pwd','$tel','$email')";

    var_dump($sql);


    $result = mysqli_query($link,$sql);
        //处理结果集
        if ($result && (mysqli_insert_id($link)>0)) {
            //添加时会返回自增ID
            redirect('注册成功!',URL.'login.php',1);
            exit;
            }else{
            //操作失败
            return false;
        }

        
    // if (execute($link,$sql)) {
    //    
    // }else{
    //     // redirect('注册失败,请重试!');
    //     exit;
    // }

    mysqli_close($link);







