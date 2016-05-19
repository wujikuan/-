<!-- 购物车页面 -->
<?php
    require './init.php'; 
  
    if(empty($_SESSION['home'])){
       redirect("你还未登陆,请您先登陆",'./login.php',3);
       exit;
    }
    $user_id=$_SESSION['home']['id'];
    $sql="SELECT id,oname,phone,address,pro,num FROM ".PRE."address where user_id=$user_id AND dea=1";
    $result = mysqli_query($link,$sql);
    // p($result);

        //判断执行结果
        if ($result && mysqli_num_rows($result)>0) {
            $list = array();
            $list = mysqli_fetch_all($result,MYSQLI_ASSOC);
            // p($list);
            // exit;

            mysqli_free_result($result);
            //返回查询结果数组
            // return $list;
            // p($list);
            $list=$list['0'];
        }else{
            redirect('你还没有没有默认收货地址,3秒后跳转到添加页面','./new_address.php',3);
            exit;
        }
        // if(empty());
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
    <div class="row">
        <h3>收货地址</h3>
        <div class="col-md-12 bor1">
            <div class="col-md-2"><a href="./address2.php"><span>管理收货地址</span></a></div>
            <div class="col-md-2"><a href="./new_address.php"><span>新加收货地址</span></a></div>
        </div>
        <div class="col-md-12 bor1 mt20">
            <div class="col-md-2">收货人</div>
            <div class="col-md-3">手机号</div>
            <div class="col-md-5">收货地址</div>
            <div class="col-md-2">邮编</div>
        </div>
        <div class="col-md-12 ">
            <div class="col-md-2"><?php echo $list['oname'] ?></div>
            <div class="col-md-3"><?php echo $list['phone'] ?></div>
            <div class="col-md-5"><?php echo $list['pro'].$list['address'] ?></div>
            <div class="col-md-2"><?php echo $list['num'] ?></div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row mt20">
        <h1>购物车</h1>
    </div>

    <div class="row ">
        <?php if (empty($_SESSION['cart'])): ?>
            <h3>购物车空空如也....</h3>
            <p><a href="./index.php">[继续购物]</a></p>
        <?php else: ?>
            <table class="table">
                <tr>
                    <th>图片</th>
                    <th>商品名</th>
                    <th>价格</th>
                    <th>数量</th>
                    <th>小计</th>
                </tr>
                
                <?php $total = 0; //总价的初始值?>
                <?php foreach ($_SESSION['cart'] as $key => $val): ?>
                    
                <?php $stock=$val['stock'] ?>

                <tr>
                    <td>
                        <a href="./contentinfo.php?id=<?php echo $key ?>&gname=<?php echo $val['gname'] ?>">
                            <img src="<?php echo getpath(URL.'uploads/',$val['iname'],'b') ?>">
                        </a>
                    </td>
                    <td>
                        <a href="./contentinfo.php?id=<?php echo $key ?>&gname=<?php echo $val['gname'] ?>">
                            <?php echo $val['gname'] ?>
                        </a>
                    </td>
                    <td><?php echo $val['price'] ?></td>
                    <td>
                        <?php

                        if( $val['qty']>$stock ){
                            echo $val['qty']=$stock;
                        }else{
                            echo $val['qty'];
                        }?>

                    </td>
                    <td><?php echo $val['price'] * $val['qty'] ?></td>
                    
                </tr>
                <?php $total += $val['price'] * $val['qty'];//总价 ?>
                <?php endforeach ?>
                <tr>
                    <td colspan="6" class="text-right">
                        <a href="./index.php" class="btn btn-default">总计: <?php echo $total ?></a>
                        <a href="./admin_listdo.php?a=updata" class="btn btn-primary">确认支付</a>
                    </td>
                </tr>
            </table>
        <?php endif ?>
    </div>
</div>


<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>