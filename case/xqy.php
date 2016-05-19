<?php 
    require './init.php';
    $goods_id = $_GET['id'];
    $gname = $_GET['gname'];

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
    <!-- <link rel="stylesheet" href="./public/my.css"> -->
    <link rel="stylesheet" href="./public/xq.css">
  </head>
  <body>
    <a name="1"></a>
    <div class="clearfix"></div>
    <?php require PATH.'com/nav.php'; ?>
<!--导航  -->

     <div class="clearfix"></div>
 <!-- =====================分类================================= -->  
  <div class="nnn center">
    <ul>
      <li><a href="#"><span>首页</span></a></li>
      <li><a href="#"><span>全部商品</span></a></li>
      <li><a href="#"><span>实拍早春新款</span></a></li>
      <li><a href="#"><span>韩范连衣裙</span></a></li>
      <li><a href="#"><span>韩范毛衣</span></a></li>
      <li><a href="#"><span>时尚套装</span></a></li>
      <li><a href="#"><span>清仓专区</span></a></li>
    </ul>
  </div>
  <div class="clearfix"> </div>
<!-- =====================选项===================-->  <div class="main  center">
      <div class="main1 fl ">
          <div class="main3 fl"><!-- 左开始 -->
              <div class="main5 ">
                <a href="#"><img src="./imgs/gyzdambqgqyde_640x960.jpg"></a>
              </div>
              <div class="main6">
                <a href="#"><img src="./imgs/eyde_640x960.jpg"></a>
                <a href="#"><img src="./imgs/degyzdambqgiyde_640x960.jpg"></a>
                <a href="#"><img src="./imgs/ambqmeyde_640x960_002.jpg"></a>
                <a href="#"><img src="./imgs/qmeyde_640x960.jpg"></a>
                <a href="#"><img src="./imgs/qgqyde_640x960_002.jpg"></a>
              </div>
          </div><!-- 左 结束
 -->
          <div class="main4 fr ">
              <div class="main7 fl ">
                  <h3>韩版新款气质系带V领收腰显瘦针织打底连衣裙</h3>
              </div>
              <div class="main8">
                <div class="col-md-12 text-style">
                  <p>原价:<span id="wz">￥128</span></p>
                  <p>现价:<b>￥98</b></p>
                </div>
              </div>
              
              <div class="main8 wz1 ">
                <div class="col-md-6">
                  <p>店铺优惠:<span>全店满98减10元</span> </p>
                </div>
                <div class="col-md-6">
                  <p>评价:<span>666</span>&nbsp;&nbsp;&nbsp;
                   累计销量:<span>741</span></p>
                </div>
              </div>

              <div class="main8 ">
                <div class="col-md-12">
                  <p>客服: 
                    <span class="btn btn-primary-lg glyphicon glyphicon-user"><a href="#">联系客服</a>
                    </span>
                  </p>
                </div>
              </div>

              <div class="main8 ">
                <div class="col-md-12">
                  <p>款式: 
                      <a href="#">
                        <img src="./imgs/2016-05-10_203543.png">
                      </a>
                  </p>
                </div>
              </div>


              <div class="main8 ">
                <div class="col-md-12">
                  <p>尺码: 
                      <a href="#">
                        <img src="./imgs/2016-05-10_203606.png">
                      </a>
                  </p>
                </div>
              </div>

               <div class="main8">
                <div class="col-md-4 col-md-offset-2 cr">
                  <p> 
                      <a href="#"><span id="wz2">加入购物车</span></a>
                  </p>
                </div>

                 <div class="col-md-4 col-md-offset-1 bor">
                  <p> 
                      <a href="#"><span id="wz2">立即购买</span></a>
                  </p>
                </div>
              </div>
          </div>
        </div>
             <div class="main2 fr ">
                <div class="col-md-12">
                  <P>--热卖推荐--</P> 
                </div>
                <div class="col-md-12">
                      <a href="#">
                         <img src="./imgs/iyde_1000x1500.jpg_220x330.jpg">
                      </a>
                      <P>￥49</P> 
                </div>

                <div class="col-md-12">
                      <a href="#">
                         <img src="./imgs/500.jpg_468x468.jpg">
                      </a>
                      <P>￥49</P> 
                </div>

                <div class="col-md-12">
                      <a href="#">
                         <img src="./imgs/1ieg2b_iezgizjrgi2.jpg">
                      </a>
                      <P>￥49</P> 
                </div>
             </div>
         </div>

               

    <div class="clearfix"></div>
  
    <!-- 蘑菇服务 -->
    <div class="container-fluid  mgfw1">
      <?php require PATH.'com/footer.php'; ?>
    <!--页脚尾部 -->

    </div>


    
    <!-- 此处引入jQuery -->
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>