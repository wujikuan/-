<?php 
	require '../init.php';
	// p($_POST);
	$name=$_SESSION['home']['name'];
	// p($name);
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	$aname=$_POST['aname'];


	// $sql="UPDATE ".PRE."user SET tel=$tel, email=$email, aname=$aname where name=$name";
	// $list=execute($link,$sql);
	
    $sql = "UPDATE ".PRE."user SET `tel`='$tel',`email`='$email',`aname`='$aname' where `name`='$name' ";
    // unset($_SEESION['home']);
    if (execute($link,$sql)) {
    	
        redirect('修改成功!',URL.'person.php');
        exit;
    }else{
        redirect('注册失败,请重试!');
        exit;
    }

 ?>