<?php 
	require '../init.php';
	p($_GET);
	p($_POST);
	if(!empty($_POST)){
		$order_id=$_GET['order_id'];
		$comment=$_POST['comment'];
		$user_id=$_SESSION['home']['id'];
		$sql = "INSERT INTO ".PRE."comment (`comment`,`order_id`,`user_id`) VALUES ('$comment','$order_id','$user_id')";
		$list=mysqli_query($link,$sql);
		if($list>0){
			redirect('评论成功,','../paylist.php',300);
		}else{
			redirect('评论失败,请重新输入评价','../paylist.php',3);
		}
		p($list);
	}else{
		redirect('评论失败,请重新输入评价','../paylist.php',3);
	}



 ?>