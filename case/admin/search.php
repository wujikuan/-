<?php
	header("content-type:text/html;charset=utf-8");
    require '../init.php';

    // p($_POST);
  	$name = $_POST['name'];
    // p($name);
    
  	if(empty($name)){
  		redirect('请输入你要搜索的订单','./admin_list.php',3);
      exit;
  	}
    $sql= "SELECT ordernum,id,status FROM ".PRE."order where ordernum LIKE '%$name%' order by id DESC";
    // p($sql);
    $ul=query($link,$sql);
    // p($ul);
    // p($ul);
    // exit;
 ?>
<!DOCTYPE html>
<html lang="cn">
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>搜索订单</title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../public/js/html5shiv.min.js"></script>
    <script src="../public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/admin.css">
</head>
<body class="bg"> 
    <div class="col-md-12">
        <h4>查询到的全部订单</h4>
        <nav class="navbar">
            <form action="./search.php" method="post" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="按订单号搜索">
              </div>
              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </nav>
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
        $oid=$value['id'];
        // p($oid);
        ?>
        <div class="clearfix"></div>
        <div calss="col-md-12 " id="back"><span>订单号：<?php echo $ordernum ?></span></div>    
      

      <?php $sql="SELECT og.id,og.goods_id,og.order_id,og.price,og.qty,g.gname,o.address,o.oname,o.status
            FROM ".PRE."ordergoods og,".PRE."order o,".PRE."goods g
            WHERE order_id=$oid AND og.goods_id=g.id AND og.order_id=o.id ";
        // p($sql);
        $list=query($link,$sql);
        // p($list);
        // exit;
        ?>
        <?php  foreach ($list as $li){ ?>
          <?php $order_id=$li['order_id'] ?>
          
          <div class="col-md-12  cc">
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
            <?php if ($li['status']==2): ?>
              <a href="./error.php">评价</a>
            <?php else: ?>
              评价
            <?php endif ?>
              
            </div>
          </div>
        <?php }  }  ?>
      </div>
</body>
</html>