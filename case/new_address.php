<?php 
    require './init.php';
   

 ?>
<!DOCTYPE html>
<html lang="cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上面3个meta标签*必须*放在最前面 -->
    <title>[<?php echo $gname ?>]</title>

    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="./public/js/html5shiv.min.js"></script>
      <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/xq.css">
    <link rel="stylesheet" href="./public/my.css">
  </head>
  <body>
    <a name="1"></a>
    <div class="clearfix"></div>
    <?php require PATH.'com/nav.php'; ?>
    <!--导航  -->
    <div class="center">
    <div class="row">
        <h3>收货地址</h3>
            <div class="col-md-12 bor">
                <div class="col-md-2"><a href="./address2.php"><span>管理收货地址</span></a></div>
                <div class="col-md-2"><a href="./getorderinfo.php"><span>返回支付页</span></a></div>
            </div>
            <form action="./addressdo.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['home']['id'] ?>">
                <div class="col-md-8 col-md-offset-1">
                   <h4>省份:</h4>
                   <div class="col-md-12">
                        <input type="text" name="pro" placeholder="请输入收货人的省、市、县" class="form-control" >
                   </div>
                </div>
                 <div class="col-md-8 col-md-offset-1">
                   <h4>邮政编码:</h4>
                   <div class="col-md-12">
                        <input type="text" name="num" placeholder="邮政编码" class="form-control" >
                   </div>
                </div>
                <div class="col-md-8 col-md-offset-1">
                   <h4>街道:</h4>
                   <div class="col-md-12">
                        <input type="text" name="address" placeholder="详细地址" class="form-control">
                   </div>
                </div>
                <div class="col-md-8 col-md-offset-1">
                   <h4>手机号:</h4>
                   <div class="col-md-12">
                        <input type="text" name="phone" placeholder="请输入你的手机号" class="form-control">
                   </div>
                </div>
                <div class="col-md-8 col-md-offset-1">
                   <h4>收货人姓名:</h4>
                   <div class="col-md-12">
                        <input type="text" name="oname" placeholder="收货人的名字" class="form-control" >
                   </div>
                </div>
                <div class="col-md-3 col-md-offset-1 mt20">
                    <input type="submit" class="btn btn-danger" value="提交地址">
                </div>
            </form>
        </div>
    </div>
 
  
    <!-- 蘑菇服务 -->
    <div class="container-fluid  mgfw1">
      <?php require PATH.'com/footer.php'; ?>
    <!--页脚尾部 -->

    </div>


    <script src="./public/home.js"></script>
    <!-- 此处引入jQuery -->
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>