<!-- 导航条 -->

<div class="fluid fr ">
      <div class="center">
      <div class="col-md-6 col1 wh"></div>
      <?php if (empty($_SESSION['home'])): ?>
         <div class="col-md-3 col2 wh fr ">
            <a href="<?php echo URL ?>login.php"><span class="tx2 fl">登录</span></a>
            <a href="<?php echo URL ?>reg.php"><span class="tx2 fl">注册</span></a>
      
      </div>

      <?php else: ?>

      <div class="col-md-2 col2 wh fr ">
        <ul class="nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['home']['name']?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">个人中心</a></li>
                    <li><a href="#">邀请</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="./com/logout.php">退出</a></li>
                  </ul>
              </li>
          </ul>
        </div>
      <?php endif ?>

      <div class="col-md-1 col1 wh">
        <a href="#"><span class=" nav1"> 我的订单 </span></a>
     </div>
      <div class="col-md-1 col wh">
          <a href="#"><span class="glyphicon glyphicon-shopping-cart nav1">购物车 </span></a>
      </div>
      <div class="col-md-1 col1 wh">
         <a href="./admin/login.php"><span class=" nav1">后台服务</span></a>
      </div>
    
      </div>
    </div>

    <div class="clearfix"></div>
    <!-- 导航尾部 -->

    <div class="container-fluid">
    <!-- 购物车 -->
  <!--   <div class="gwc">
    <div class="gwc1">
      <div class="div_gwc1"></div>
      <div class="div_gwc2 ab">
        <a href="#"><span class="glyphicon glyphicon-shopping-cart tx "> 购物车 </span></a> 
      </div>
      <div class="div_gwc2 ab">
        <a href="#"><span class="glyphicon glyphicon-tags tx"> 优惠券</span></a> 
      </div>
      <div class="div_gwc2 ab"><a href="#"><span class="glyphicon glyphicon-yen tx"> 钱包</span></a> </div>
      <div class="div_gwc2 ab"><a href="#"><span class="glyphicon glyphicon-eye-open tx"> 足迹</span></a> </div>
  
      <div class="div_gwc3 ab ">
        <a href="#1"><span class="glyphicon glyphicon-plane tx1"> top</span></a>
      </div>
    </div>
    </div> -->
   
    <!-- 购物车尾部 -->
     <div class="clearfix"></div>
    <!-- 蘑菇街搜索框 -->
     <div class="ss11 ">
    <div class="center ss">

    <div class="ss1 fl">
      <a href="../case/index.php"><img class="imgs1" src="./imgs/2016-04-30_224913.png"></a>
    </div>
    <div class="ss2 fr">
      <div class="ss3 fl">
        <!-- 搜索框 -->
        <div class="ss4 fl">
          <form class="navbar-form navbar-left ss5" role="search">
                <select class="form-control">
                  <option>搜商品</option>
                  <option>商品</option>
                  <option>店铺</option>
                </select>
                <input type="text" size="50px" class="form-control" placeholder="请输入要搜索的商品">
                <button type="submit" class="btn btn-default glyphicon glyphicon-search "></button>
            </form>
        </div><!-- 搜索框end -->
        
        <div class="ss6 fl">
          <ul class=" ss7">
              <a href="#"><li><span>防晒衣</span></li></a>
              <a href="#"><li><span>凉鞋</span></li></a>
              <a href="#"><li><span>连衣裙</span></li></a>
              <a href="#"><li><span>小白鞋</span></li></a>
              <a href="#"><li><span>衬衫</span></li></a>
              <a href="#"><li><span>T恤</span></li></a>
              <a href="#"><li><span>牛仔短裤</span></li></a>
              <a href="#"><li><span>墨镜</span></li></a>
              <a href="#"><li><span>夏季套装</span></li></a>
            </ul>
        </div>
        
      </div>



      <div class="ss1 fl s">
      <div class="ss1 fl">
      <a href="#"><img class="imgs2" src="./imgs/123456789.gif"></a>
      </div>
         
    
    </div>
    </div>
    </div>
    </div>
    <div class="clearfix"></div>
