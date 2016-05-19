<?php 
	require './init.php';
	p($_GET);
	$order_id=$_GET['order_id'];


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>评论</title>
	<link href="./public/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="./public/home.css">
    <link rel="stylesheet" href="./public/main2.css">
</head>
<body>
	<div class="container-fluid">
		<?php require PATH.'com/nav.php'; ?>
	</div>
	<form action="./com/commentdo.php?a=add&order_id=<?php echo $order_id?>" method="post" >
		<div class="container ">
			<div class="row" id="back">
				<h3>亲爱的客户你好,欢迎各位对我们的产品的批评和建议......</h3>
			</div>
			<div class="row">
				<h4>评论：</h4>
				<div class="col-md-12">
					<textarea name="comment"  cols="150" rows="5" maxlength="200" placeholder="请输入200字以内的评价......"></textarea>
				</div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-success">提交评论</button>
				</div>
			</div>
		</div>
		
	</form>
	<div class="container-fluid">
		<?php require PATH.'com/footer.php'; ?>
	</div>
</body>
</html>

