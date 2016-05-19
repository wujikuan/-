<?php 
	require './init.php';
	// p($_SESSION);
	if(isset($_SESSION['cart'])){
	$user_id=$_SESSION['home']['id'];
	// exit;
	$sql="SELECT oname,phone,address,pro FROM ".PRE."address where user_id=$user_id AND dea=1";
	$list=query($link,$sql);
	if(!empty($list)){
	$list=$list['0'];
	$oname=$list['oname'];
	$phone=$list['phone'];
	$address=$list['pro'].$list['address'];
	}else{
		redirect('你还没有收货地址','./new_address.php',3);
		exit;
	}
	// p($address);
	// p($list);
	// exit;
	// p($_SESSION['cart']);
	foreach ($_SESSION['cart'] as  $val) {
		// p($val);
		@$total += $val['price'] * $val['qty'];
		// $price=
		// p($total);
	}

	$orderone=date('Ymd'.'His').mt_rand(0,99999).uniqid();
	$_SESSION['order']=$orderone;
	$ordernum=$_SESSION['order'];
	unset($orderone);
	$sql="INSERT INTO ".PRE."order (`ordernum`,`user_id`,`oname`,`phone`,`address`,`allprice`) VALUES ('$ordernum','$user_id','$oname','$phone','$address','$total')";
	// p($sql);
	// exit;
    $result=mysqli_query($link,$sql);
    if ($result && mysqli_insert_id($link)>0){
        //添加时返回自增ID
        $order_id= mysqli_insert_id($link);
        // p($order_id);

    }else{
         //操作失败
         echo 'false';
         exit;
     }
	// v($_SESSION['order']);
	// exit;
	$v='';
	foreach ($_SESSION['cart'] as $val) {
		$v.='('.'NULL'.','.$val['id'].','.$val['price'].','.$val['qty'].','.$order_id.')'.',';
	}
	$v=rtrim($v,',');
	// p($v);

	$sql="INSERT INTO ".PRE."ordergoods VALUES $v";
	$result=mysqli_query($link,$sql);
    if ($result && mysqli_insert_id($link)>0){
        //添加时返回自增ID
        $order_id= mysqli_insert_id($link);
        // p($order_id);

    }else{
         //操作失败
         echo 'false';
         exit;
     }
	// p($sql);
	// exit;
	unset($_SESSION['cart']);
	unset($_SESSION['order']);
}	
	$id=$_SESSION['home']['id'];
	// p($_SESSION);
	$sql= "SELECT id,ordernum,id,status FROM ".PRE."order where user_id=$id order by id DESC";
	$ul=query($link,$sql);

	// p($ul);
	// exit;
	$user_id=$_SESSION['home']['id'];
	// $sql="
	// 	SELECT o.id,o.ordernum,o.oname,o.phone,o.status,o.address,o.allprice,og.goods_id,og.price,og.qty,g.gname
	// 	FROM ".PRE."order o,".PRE."ordergoods og,".PRE."goods g
	// 	WHERE o.user_id=$user_id AND o.id=og.order_id AND og.goods_id=g.id order by o.id DESC";
	// $list=query($link,$sql);
	// p($list);
	// exit;
	

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
			          <a href="#" class="list-group-item">全部订单</a>
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

			<div class="col-md-8">
				<h4>全部订单</h4>
				<?php if (!empty($ul)){ ?>
				<div class="col-md-12 ">
					<div class="col-md-3">商品名</div>
					<div class="col-md-1">数量</div>
					<div class="col-md-2">收货人</div>
					<div class="col-md-1">价格</div>
					<div class="col-md-3">地址</div>
					<div class="col-md-1">状态</div>
					<div class="col-md-1">操作</div>
				</div>
				
		 	<div class="clearfix"></div>
			<?php foreach ($ul as  $value) {	
				$ordernum=$value['ordernum'];
				$oid=$value['id']; ?>
				<div class="clearfix"></div>
				<div calss="col-md-12 cr" id="back"><span>订单号：<?php echo $ordernum ?></span></div>		
			

			<?php $sql="SELECT og.id,og.goods_id,og.order_id,og.price,og.qty,g.gname,o.address,o.oname,o.status,g.stock
						FROM ".PRE."ordergoods og,".PRE."order o,".PRE."goods g
						WHERE order_id=$oid AND og.goods_id=g.id AND og.order_id=o.id AND o.user_id=$id ";
				$list=query($link,$sql);
				// p($list);
				?>

					<?php  foreach ($list as $li){ ?>
					
					<?php $order_id=$li['order_id'] ?>
					

					<div class="col-md-12 bd cc">
						<div class="col-md-3"><?php echo $li['gname'] ?></div>
						<div class="col-md-1"><?php echo $li['qty'] ?></div>
						<div class="col-md-2"><?php echo $li['oname'] ?></div>
						<div class="col-md-1"><?php echo $li['price'] ?></div>
						<div class="col-md-3"><?php echo $li['address'] ?></div>
						<?php  ?>

						<div class="col-md-1 ">
							<?php 
								switch ($value['status']) {
									case '0':
										echo '未处理';
										break;
									case '1':
										echo '<a href="./com/paylistdo.php?a=1&order_id='.$order_id.'">确认收货</a>';
										break;
									case '2':
										echo '已完成';
										break;
									case '3':
										echo '已撤销';
										break;
							}
							?>
						</div>
						<div calss="col-md-1"></div>
						<div class="col-md-1">
						<?php if ($li['status']==2){
							echo '<a href="./comment.php?a=add&order_id=<?php echo $order_id ?>">评价</a>';
							if
						}else{
						 	echo '评价';
						 	}
						?>
							
						</div>
					</div>
				<?php } } }else{
					echo '<h2><span>你还没用订单信息</span></h2>';
					// redirect('你还没有订单信息');
					// echo '点击'.'<a href="'.'.'.'/'.index.'.'.php.'">首页</a>'.'去购物';
					} ?>
			</div>
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