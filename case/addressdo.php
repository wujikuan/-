<?php 
	require './init.php';
	// p($_POST);
	foreach ($_POST as $key => $val) {
        if ($val == '') {
            redirect('请完善表单信息!');
            exit;
        }
    }
    $num=$_POST['num'];
    $regex1 = '/^\d{6}$/';
    if (!preg_match($regex1,$num)) {
        redirect('邮政编码验证出错!',URL.'new_address.php');
        
        exit;
    }else{

       echo '邮政编码验证通过!<br>';
    }

	// p($_GET);
	// 手机: 长度11位,合法的手机号 
    $regex3 = '/^1[^0129]\d{9}$/';
    $phone=$_POST['phone'];
    if (!preg_match($regex3,$phone)) {
        redirect('手机号不合法!',URL.'new_address.php');
        
        exit;
    }else{

       echo '手机号验证通过!<br>';
    }

    // 接收上传信息
	$user_id=$_POST['user_id'];
	$oname=$_POST['oname'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$pro=$_POST['pro'];
	$num=$_POST['num'];

	$sql="INSERT INTO ".PRE."address (user_id,oname,phone,address,pro,num) VALUE ('$user_id','$oname','$phone','$address','$pro','$num');";
	p($sql);
	$result=mysqli_query($link, $sql);
	if ($result && mysqli_insert_id($link)>0) {
		redirect('添加成功','./address2.php');
		exit;
	}else{
       redirect('添加失败');
       exit;
            }


 ?>
