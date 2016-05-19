<?php 
	require './init.php';
	// p($_POST);
	

	// exit;
	$a=$_GET['a'];
	// p($a);
	// exit;
	switch ($a) {
		case 'dea':
			$id=$_GET['id'];
			$user_id=$_SESSION['home']['id'];
			// p($user_id);
			execute($link, "UPDATE ".PRE."address SET dea='0' WHERE user_id='$user_id'");
            //把传过来的图片ID设为封面
            execute($link, "UPDATE ".PRE."address SET dea='1' WHERE id='$id'");
            header("location:".$_SERVER['HTTP_REFERER']);
			break;
		case 'del';
			$id=$_GET['id'];
			p($id);
			$sql="SELECT dea FROM ".PRE."address where id=$id";
			$list=query($link,$sql);
			// p($list);
			$dea=$list['0']['dea'];
		
			if($dea!=1){
				$sql="DELETE FROM ".PRE."address WHERE id='$id'";
				execute($link,$sql);
	            header("location:".$_SERVER['HTTP_REFERER']);
        	}else{
        		redirect('此地址为默认地址,不能删除','./address2.php',3);
        	}
			break;
	}

 ?>