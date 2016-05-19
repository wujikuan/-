<?php
	require './init.php';
	// p($_POST);
	$name=$_POST['name'];
	$sql = "SELECT i.iname, g.gname, g.id, g.price, g.zan
	        FROM ".PRE."goods g, ".PRE."image i
	        WHERE i.goods_id = g.id AND i.cover=1 AND g.state=1 AND g.is_new=1 AND g.gname LIKE '%$name%' ";
	$row=query($link,$sql);
	// v($row);
   
?>
<!-- 新品模块 -->
<!DOCTYPE html>
<html lang="cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上面3个meta标签*必须*放在最前面 -->
    <title>一期首页</title>

    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="./public/js/html5shiv.min.js"></script>
      <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/home.css">
    <link rel="stylesheet" href="./public/my.css">
  </head>
  <body>
    <a name="1"></a>
    
<!--导航  -->
  <?php require PATH.'com/nav.php'; ?>
	<div class="container">
    	<div class="row">

        <?php if (empty($row)): ?>
        <h2>暂无搜索数据</h2>
        <?php else: ?>
        <?php foreach ($row as $key => $val): ?>
        <div class="col-md-2">
          <div class="thumbnail s1">
	            <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
	                <img src="<?php echo getpath(URL.'uploads/',$val['iname'],'c') ?>">
	            </a>
            <div class="caption">
                <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
                    <h4><?php echo $val['gname'] ?></h4>
                </a>
              <p>
                <span class="glyphicon glyphicon-xbt"></span>
                <?php echo $val['price'] ?>
                <a href="" class="pull-right disabld"><span class="glyphicon glyphicon-heart"></span> <?php echo $val['zan'] ?></a>
              </p>
            </div>
          </div>
        </div>
        <?php endforeach ?>
        <?php endif ?>

    </div><!-- END row -->
	</div><!-- END container -->


	<?php require PATH.'com/footer.php'; ?>


    
    <!-- 此处引入jQuery -->
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>