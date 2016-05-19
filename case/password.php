<?php 
	require './init.php';
	
	$name=$_SESSION['home']['name'];
	// p($name);
	$sql = "SELECT pwd FROM ".PRE."user WHERE `name`='$name'";
	$list=query($link,$sql);
	
	// p($_SESSION);

 ?>

<!DOCTYPE html>
<html lang="cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上面3个meta标签*必须*放在最前面 -->
    <title>个人中心</title>

    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="./public/js/html5shiv.min.js"></script>
      <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/home.css">
    <link rel="stylesheet" href="./public/main2.css">
  </head>
  <body>
    <a name="1"></a>
<!--导航  -->
    <?php require PATH.'com/nav.php'; ?>
	<div class="center">
	<div class="row mt20" >
		<div class="col-md-2 ">
			<div class="panel panel-success">
		    <div class="panel-heading">
		      <a data-toggle="collapse" data-parent="#accordion" href="./person.php">
		        <h4 class="panel-title">
		          <a href="./person.php"> 个人资料</a>
		        </h4>
		      </a>
		    </div>
		  </div>
		  <div class="panel panel-success">
		    <div class="panel-heading">
		      <a data-toggle="collapse" data-parent="#accordion" href="#menu4">
		        <h4 class="panel-title">
		          安全设置
		        </h4>
		      </a>
		    </div>
		    <div id="menu4" class="panel-collapse collapse">
		      <div class="list-group">
		          <a href="./password.php" class="list-group-item">修改密码</a>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-success">
		    <div class="panel-heading">
		      <a data-toggle="collapse" data-parent="#accordion" href="#menu2">
		        <h4 class="panel-title">
		          我的订单
		        </h4>
		      </a>
		    </div>
		    <div id="menu2" class="panel-collapse collapse">
		      <div class="list-group">
		          <a href="./paylist.php" class="list-group-item">全部订单</a>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-success">
		    <div class="panel-heading">
		      <a data-toggle="collapse" data-parent="#accordion" href="#menu3">
		        <h4 class="panel-title">
		          地址管理
		        </h4>
		      </a>
		    </div>
		    <div id="menu3" class="panel-collapse collapse">
		      <div class="list-group">
		          <a href="./address2.php" class="list-group-item">地址修改</a>
		      </div>
		      <div class="list-group">
		          <a href="./new_address.php" class="list-group-item">添加地址</a>
		      </div>
		    </div>
		  </div>
		</div>

			<form action="./com/passworddo.php" method="post">
				<div class="col-md-8 ">
					<h1>修改密码</h1>
				<div class="row">
						<div class="col-md-2"><span><h4>新的密码:</h4></span></div>
						<div class="col-md-6 ">
							<input type="password" name="pwd" class="form-control" placeholder="请输入你的新密码">
						</div>
					<div class="col-md-4"></div>
				</div>
				<div class="row">
						<div class="col-md-2"><span><h4>确认密码:</h4></span></div>
						<div class="col-md-6 ">
							<input type="password" name="repwd" class="form-control" placeholder="请重新输入你的密码">
						</div>
					<div class="col-md-4"></div>
				</div>
					
					
					<div class="row ">
						<div class="col-md-8">
							<input type="submit" class="btn btn btn-danger form-control" value="提交修改">
						</div>
					</div>
				</div>
				
			</form>
		
	</div>
	</div>

    <div class="container-fluid">
    <?php require PATH.'com/footer.php'; ?>
    </div>


    
    <!-- 此处引入jQuery -->
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>