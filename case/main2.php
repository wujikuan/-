<?php 
    require './init.php';
    $sql = "SELECT `id`,`cname`,`path` FROM ".PRE."category WHERE `display`='1' order by path";
    $c_list = query($link, $sql);
    // p($c_list);exit;

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
  <div class="col-md-12  bor1 mt20">
          <ul class="list-inline mt10">
             <li><a href="./main2.php" >全部商品 </a></li>
            <?php if (!empty($c_list)): ?>
            <?php foreach ($c_list as $val): ?>
            <li><a href="./list2.php?cate_id=<?php echo $val['id'] ?>"><?php echo $val['cname'] ?></a></li>
            <?php endforeach ?>
            <?php endif ?>
          </ul>
  </div>



   <div class="clearfix"></div>
    <?php require PATH.'com/list.php'; ?>
  
    


    <div class="container-fluid">
    <?php require PATH.'com/footer.php'; ?>
    </div>


    
    <!-- 此处引入jQuery -->
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>