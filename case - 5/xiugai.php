<!-- 注册页面 -->
<?php require './init.php' ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/bitcoin-blank.png" type="image/png" sizes="16x16">
    <title>重置密码</title>
    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/home.css">
    <link rel="stylesheet" href="./public/login.css">
    <link rel="stylesheet" href="./public/my.css">
</head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>

<div class="conatiner mt50">
    <div class="clearfix mt50"></div>
    <h1 class="text-center mt50">重置密码,修改信息</h1>
    <hr>

    <form action="./com/xiugaido.php" method="post" class="form-horizontal col-md-7 h4">

        <div class="form-group">
            <label for="user" class="col-md-3 control-label">密码</label>
            <div class="col-md-9">
                 <input type="password" name="pwd" class="form-control" id="pwd" placeholder="请输入新的密码...">
                <span>*请输入新的密码</span>
            </div>
        </div>
        <div class="form-group">
            <label for="user" class="col-md-3 control-label">确认密码</label>
            <div class="col-md-9">
                 <input type="password" name="repwd" class="form-control" id="repwd" placeholder="请输入新的密码...">
                <span>*请输入新的密码</span>
            </div>
        </div>


        


        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <div class="pull-left">
                    <input type="text" name="vcode" class="form-control" placeholder="验证码">
                </div>
                <div class="pull-right">
                    <img src="./com/yzm.php" title="点 我 刷 新" style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()" class="pull-right">
                </div>
            </div>
        </div>
        

        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn btn-primary">提交数据</button>
              <button type="reset" class="btn btn-danger pull-right">清空重填</button>
            </div>
        </div>

    </form>
    <div class="col-md-5">
        <img src="holder.js/300x500" class="center-block">
    </div>
</div><!-- END container -->


<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>

<script src="./public/js/holder.min.js"></script>
<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>