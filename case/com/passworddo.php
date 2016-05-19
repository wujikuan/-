<?php 
	require '../init.php';

	p($_POST);
	$id=$_SESSION['home']['id'];
	$pwd=$_POST['pwd'];
	$repwd=$_POST['repwd'];

	if(empty($pwd)){
		redirect('输入的密码为空,请输入新的密码',URL.'password.php');
		exit;
	}
	
    $pwd = md5($_POST['pwd']);
    $repwd=md5($_POST['repwd']);
    if($pwd != $repwd ){
    redirect('两次输入的密码不一致!','../password.php',2);
    }else{
        echo '修改成功';
    }
    
    //接收用户信息
    $pwd = md5($_POST['pwd']);
    $sql = "UPDATE ".PRE."user SET `pwd`='$pwd' where `id`='$id' ";
    unset($_SESSION['home']);
    if (execute($link,$sql)) {
    	
       	redirect('修改成功!',URL.'login.php');
        exit;
    }else{
        redirect('修改失败,请重试!');
        exit;
    }

 ?>