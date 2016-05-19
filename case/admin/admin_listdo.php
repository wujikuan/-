<?php 
	require '../init.php';
	p($_GET);
	$a=$_GET['a'];
	p($_SESSION);
	switch ($a) {
		case '0':
			$order_id=$_GET['order_id'];
			$id=$_SESSION['home']['id'];
			$sql="UPDATE ".PRE."order SET status=1 WHERE id=$order_id";
			$list=execute($link,$sql);
			// p($list);
			header("location:".$_SERVER['HTTP_REFERER']);
			break;
		case '1':
			$order_id=$_GET['order_id'];
			$id=$_SESSION['home']['id'];
			$sql="UPDATE ".PRE."order SET status=2 WHERE id=$order_id";
			$list=execute($link,$sql);
			// p($list);
			header("location:".$_SERVER['HTTP_REFERER']);
			break;
		case '3':
			$order_id=$_GET['order_id'];
			$id=$_SESSION['home']['id'];
			$sql="UPDATE ".PRE."order SET status=3 WHERE id=$order_id";
			$list=execute($link,$sql);
			// p($list);
			header("location:".$_SERVER['HTTP_REFERER']);
			break;
	}
	
 ?>