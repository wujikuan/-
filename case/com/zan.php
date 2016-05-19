<?php 
	require '../init.php';
	p($_SESSION);
	p($_GET);
	$id=$_GET['id'];
	$sql="SELECT `zan`,`gname` FROM ".PRE."goods WHERE `id`='$id'";
	$list=query($link,$sql);
	p($list);
	exit

 ?>