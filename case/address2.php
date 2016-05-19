<?php
    require './init.php'; 
    $user_id=$_SESSION['home']['id'];
    $sql="SELECT id,oname,phone,address,pro,num FROM ".PRE."address where user_id=$user_id";
    
    $result = mysqli_query($link,$sql);

        //判断执行结果
        if ($result && mysqli_num_rows($result)>0) {
            $list = array();
            $list = mysqli_fetch_all($result,MYSQLI_ASSOC);
            mysqli_free_result($result);

            //返回查询结果数组
            // return $list;
        // p($list);
    
        }
                
?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/bitcoin-blank.png" type="image/png" sizes="16x16">
    <title>蘑菇商城</title>
    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/home.css">
    <link rel="stylesheet" href="./public/my.css">
</head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>
<div class="center">
  <div class="row mt20" >
    <div class="col-md-2 ">
      <div class="panel panel-success">
        <div class="panel-heading">
          <a data-toggle="collapse" data-parent="#accordion" href=".person.php">
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
<!-- <div class="center"> -->
        <h3></h3>
      
        <div class="col-md-10 bor">
            <div class="col-md-2"><a href="./address2.php"><span>管理收货地址</span></a></div>
            <div class="col-md-2"><a href="./new_address.php"><span>新加收货地址</span></a></div>
            <div class="col-md-2"><a href="./getorderinfo.php"><span>去支付页面</span></a></div>
        </div>
         
        <?php foreach ($list as $val): ?>
         <div class="col-md-10 bor mt20">
            <div class="col-md-12 ">
              <ul>
                 <li ><div class="col-md-1"><?php echo $val['id'] ?></div></li> 
                 <li ><div class="col-md-2"><?php echo $val['oname'] ?></div></li> 
                 <li ><div class="col-md-2"><?php echo $val['phone'] ?></div></li> 
                 <li ><div class="col-md-4"><?php echo $val['address'] ?></div></li> 
                 <li ><div class="col-md-1"><a href="./addressdo2.php?a=del&id=<?php echo $val['id'] ?>">删除</a></div></li> 
                 <li ><div class="col-md-2"><a href="./addressdo2.php?a=dea&id=<?php echo $val['id'] ?>">设为默认</a></div></li>
              </ul>
            </div>
           
        </div>
        <?php endforeach ?>
        
  </div> <!-- row -->
</div> <!-- endcenter -->
 
             

<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>