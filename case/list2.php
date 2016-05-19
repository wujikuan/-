<?php 
    require './init.php';
    $cate_id=$_GET['cate_id'];
    // p($cate_id);
	// require './init.php';
	$sql = "
        SELECT i.iname, g.gname, g.id, g.price, g.zan,g.cate_id
        FROM ".PRE."goods g, ".PRE."image i
        WHERE i.goods_id = g.id AND i.cover=1 AND g.state=1 AND g.cate_id=$cate_id";
    $list = query($link, $sql);
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
    <title>一期二级菜单</title>

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



 
<!-- =====================分类================================= --> 
        <div class="clearfix"></div> 
            <div class="col-md-12  border mt20">
                  <ul class="list-inline">
                     <li><a href="./main2.php" ><span class="span">全部商品</span></a></li>
                    <?php if (!empty($c_list)): ?>
                    <?php foreach ($c_list as $val): ?>
                    <li><a href="./list2.php?cate_id=<?php echo $val['id'] ?>"><span class="span"><?php echo $val['cname'] ?></span></a></li>
                    <?php endforeach ?>
                    <?php endif ?>
                  </ul>
            </div>
        <div class="center">
            <div class="row mt20 img">
                <?php if (empty($list)): ?>
                <img src="./imgs/2016-05-14_170414.png">
                <?php else: ?>
                <?php foreach ($list as $key => $val): ?>
                <div class="col-md-2 mt20">
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
                        <a href="./com/zan.php?a=zan&id=<?php echo $val['id'] ?>" class="pull-right"><span class="glyphicon glyphicon-heart"></span> <?php echo $val['zan'] ?></a>
                      </p>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div><!-- END row -->
        </div><!-- END container -->


    <div class="container-fluid">
    <?php require PATH.'com/footer.php'; ?>
    </div>


    
    <!-- 此处引入jQuery -->
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>