<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link href="../public/admin.css" rel="stylesheet">
</head>
<body>
    <h2>添加用户</h2>
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

            <div class="row mt20">
                <div class="col-md-3 "><h4>邮箱:</h4></div>
                <div class="col-md-9 ">
                   <input type="text" name="email" placeholder="请输入邮箱" class="form-control">
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
    <!-- <form action="./action.php?a=add" method="post">
        用户名:
        <input type="text" name="name" placeholder="请输入用户名"><br><br>
        密码:
        <input type="password" name="pwd" placeholder="请输入密码"><br><br>
        手机号:
        <input type="text" name="tel" placeholder="请输入tel"><br><br>
        性别:
        <input type="radio" name="sex" value="0">女
        <input type="radio" name="sex" value="1" checked>男
        <input type="radio" name="sex" value="2">保密<br><br>
        邮箱:
        <input type="text" name="email" placeholder="请输入邮箱"><br><br>

        <input type="submit" value="确认添加"> -->
    </form>
</body>
</html>