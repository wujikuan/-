<?php 
	require './init.php';
	// p($_SESSION);
	// p($_GET);
	$a=$_GET['a'];
	switch ($a) {
		case 'updata':
			foreach ($_SESSION['cart'] as  $val) {
				// p($val);
				$qty=$val['qty'];
				$stock=$val['stock']-$val['qty'];
				$id=$val['id'];
				// p($qty);
				$sql="UPDATE ".PRE."goods SET stock=$stock WHERE id=$id";
				$list=execute($link,$sql);
			// p($list);
			
			if($list>0){
				redirect('提交成功','./paylist.php',1);
				}
		 	}
			break;
		
		
	}
	
?>

