<?php 
	require './init.php';
	// p($_SESSION);
	
	$id=$_SESSION['admin']['id'];
	// p($_SESSION);
	$user_id=$_SESSION['admin']['id'];

	$where = '';
    $urlname = '';
    $name = '';
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name.= $_GET['name'];
        $where.= "WHERE `name` LIKE '%$name%'";//SQL查询条件
        $urlname = "&name=$name";//url的参数
    }

    //分页开始
    //总记录数
    $sql = "SELECT count(*) total FROM ".PRE."order $where";
    $row = query($link, $sql);
    $total = $row[0]['total'];

    //每页显示数
    $num = 5;
    //总页数
    $allpage = ceil($total / $num);

    //获取页码
    $page = isset($_GET['page'])?(int)$_GET['page']:1;
    //限制页码范围
    //页码:不能小于1 不能大于$allpage
    $page = max(1,$page);//[0,1]
    $page = min($page,$allpage);//[接收的页数,总页数]

    //获取偏移量
    $offset = ($page-1) * $num;
    //获取上一夜/下一夜
    $prev = $page - 1;
    $next = $page + 1;

    //控制数组页码的显示
    $start = max($page - 2, 1);
    $end = min($page + 2, $allpage);

    $pageurl = 'admin_list.php';
    //产生数字链接
    $num_link = '';
    for ($i = $start; $i <= $end; $i++) {
        if ($page == $i) {
            $num_link .= '<li class="active"><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
            continue;
        }
        $num_link .= '<li><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
    }
    //5.SQL语句
    // $sql = "SELECT `id`,`name`,`tel`,`sex`,`email`,`logincount`,`type` 
    // FROM ".PRE."goods $where LIMIT $offset,$num";

    $sql = "
    SELECT g.id, g.gname, g.price, g.stock, g.sale, g.is_new, g.is_hot, g.state, g.zan, g.msg, c.cname, i.iname
    FROM ".PRE."goods g,".PRE."category c,".PRE."image i
    WHERE g.cate_id = c.id AND g.id = i.goods_id AND cover=1  ";
    $list = query($link ,$sql);

	$sql= "SELECT ordernum,id,status FROM ".PRE."order order by id DESC LIMIT $offset,$num";
	$ul=query($link,$sql);

    // p($list);exit;
    //处理结果集
    // $sql = "SELECT * FROM ".PRE."goods $where LIMIT $offset,$num";
    $user_list = query($link,$sql);
    //显示当前页查询到的记录数量
    $rows = mysqli_affected_rows($link);


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
    <link rel="stylesheet" href="./public/admin.css">
    <link rel="stylesheet" href="./public/main2.css">
  </head>
  <body class="bg">
    <a name="1"></a>
<!--导航  -->
		
	<div class="row mt20" >
	<div class="col-md-12">
		<h4>全部订单</h4>
		<nav class="navbar">
            <form action="./search.php" method="post" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="按订单号搜索">
            	</div>
            	<button type="submit" class="btn btn-default">
            		<span class="glyphicon glyphicon-search"></span>
              	</button>
            </form>
        </nav>

	<div class="center">
				<?php if (!empty($ul)){ ?>
				<div class="col-md-12">
					<div class="col-md-3  cc">商品名</div>
					<div class="col-md-1  cc">数量</div>
					<div class="col-md-2  cc">收货人</div>
					<div class="col-md-1  cc">价格</div>
					<div class="col-md-3  cc">地址</div>
					<div class="col-md-1  cc">状态</div>
					<div class="col-md-1  cc">操作</div>
				</div>
				
		 	<div class="clearfix"></div>
			<?php foreach ($ul as  $value) {	
				$ordernum=$value['ordernum'];
				$oid=$value['id']; ?>
				<div class="clearfix"></div>
				<div calss="col-md-12 " id="back"><span>订单号：<?php echo $ordernum ?></span></div>		
			<?php $sql="SELECT og.id,og.goods_id,og.order_id,og.price,og.qty,g.gname,o.address,o.oname,o.status
						FROM ".PRE."ordergoods og,".PRE."order o,".PRE."goods g
						WHERE order_id=$oid AND og.goods_id=g.id AND og.order_id=o.id ";
				$list=query($link,$sql);
				// p($list);
				
				?>
						
				<?php  foreach ($list as $li){ ?>
				<?php $order_id=$li['order_id'] ?>
					<div class="col-md-12 cc">
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
										echo '<a href="./admin_listdo.php?a=0&order_id='.$order_id.'">未发货</a>';
										break;
									case '1':
										echo '<a href="./admin_listdo.php?a=1&order_id='.$order_id.'">强制收货</a>';
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
							<?php if ($li['status']!=2){
								echo '<a href="./admin_listdo.php?a=3&order_id='.$order_id.'">撤销</a>';
								}else{
									echo '<a href="./admin_listdo.php?a=4&order_id='.$order_id.'">评论</a>';
									} ?>
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
		<?php require './page.php'; ?>
    </div>

    <!-- 此处引入jQuery -->
    <script src="./public/js/jquery.min.js"></script> 
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
</body>