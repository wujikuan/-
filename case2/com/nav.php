<!-- 导航条 -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php">
          <img src="<?php echo URL ?>imgs/bitcoin-god.png" id="logo">  
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">首页</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" >分类 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">占位1</a></li>
            <li><a href="#">占位2</a></li>
          </ul>
        </li>
      </ul>

      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>

      <?php if (empty($_SESSION['home'])): ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo URL ?>login.php">登录</a></li>
              <li><a href="<?php echo URL ?>reg.php">免费注册</a></li>
              <li><a href="./admin/login.php">后台入口</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">邀请</a></li>
            </ul>
          </li>
        </ul>
      <?php else: ?>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['home']['name'] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">个人中心</a></li>
              <li><a href="#">邀请</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="./com/logout.php">退出</a></li>
            </ul>
          </li>
        </ul>
      <?php endif ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>