<?php require '../init.php' ?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加后台管理员</title>
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link href="../public/admin.css" rel="stylesheet">
</head>
<body >
    <h1>管理员信息表</h1>
    <hr>
    <div class="clearfix"></div>
    <!-- <div class="col-md-8 ">1234</div> -->
    <div class="container">
    <form action="./action.php?a=add" method="post" >

            <div class="clearfix"></div>
            <div class="row mt20">
                <div class="col-md-3 "><h4>用户名:</h4></div>
                <div class="col-md-9 pull-right">
                    <input type="text" name="name" placeholder="请输入用户名" class="form-control">
                </div>
            </div>
            <div class="row mt20">
                <div class="col-md-3 "><h4>密码:</h4></div>
                <div class="col-md-9 ">
                   <input type="password" name="pwd" placeholder="请输入密码" class="form-control">
                </div>
            </div>
            <!-- <input type="password" name="pwd" placeholder="请输入密码"><br><br> -->
            <!-- 手机号: -->
            <!-- <input type="text" name="tel" placeholder="请输入tel"><br><br> -->
            <div class="row mt20">
                <div class="col-md-3 "><h4>手机号:</h4></div>
                <div class="col-md-9 ">
                   <input type="text" name="tel" placeholder="请输入tel" class="form-control">
                </div>
            </div>
           <!--  性别:
            <input type="radio" name="sex" value="0">女
            <input type="radio" name="sex" value="1" checked>男
            <input type="radio" name="sex" value="2">保密<br><br> -->
            <div class="clearfix"></div>
                
            <div class="row mt20">
                <div class="col-md-3 "><h4>权限:</h4></div>
                <div class="col-md-9 ">
                    <?php if ($_SESSION['admin']['type']==0){
                        echo '<input type="text" name="type" class="form-control">';
                        }else{
                        echo '<input type="text" name="type" class="form-control" value="没有权限设置" disabled>';  
                            } ?>
                   
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row mt20">
                <div class="col-md-3 "><h4>性别:</h4></div>
                <div class="col-md-9">
                    <input type="radio" name="sex" value="0" >女
                    <input type="radio" name="sex" value="1" checked >男
                    <input type="radio" name="sex" value="2" >保密
                </div>
            </div>

            <!-- 权限: -->
            <!-- <input type="text" name="type" ><br><br> -->
           
            <!-- <input type="submit" value="确认添加"> -->
            <div class="col-md-12 mt20 ">
                <!-- <div class="col-md-3 "><h4>手机号:</h4></div> -->
                   <input type="submit" value="确认添加" class="btn btn-success form-control">
            </div>
    </form>
    </div>
</body>
</html>