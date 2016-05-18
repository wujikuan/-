<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加后台管理员</title>

  
</head>
<body >
    <h1>管理员信息表</h1>
         
    <form action="./action.php?a=add" method="post" >
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

        权限:
        <input type="text" name="type" ><br><br>

        <input type="submit" value="确认添加">
    </form>
   
</body>
</html>