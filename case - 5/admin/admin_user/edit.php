<?php

  
    header("content-type:text/html;charset=utf-8");
    require '../init.php';
    $id = $_GET['id'];
    // var_dump($_GET);
  

    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接又失败了!!');
    mysqli_set_charset($link,'utf8');

    $sql = "SELECT *  FROM ".PRE."admin_user WHERE `id`='$id'";
    $result = mysqli_query($link,$sql);
    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
    
    }
   // p($row);

    mysqli_close($link);
    
 ?>
 
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user-list</title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="../public/admin.css">
    <title>Document</title>
</head >
<body class="bg">
    <div class="container">
        <h2>编辑用户</h2>
        <form action="./action.php?a=edit" method="post">
            <!-- 隐藏域用于传递用户的ID 以便action页面知道是编辑谁 -->
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            
            姓名:
            <input type="text" name="name" value="<?php echo $row['name'] ?>" placeholder="请输入用户名"><br><br>

            手机号:
            <input type="text" name="tel" value="<?php echo $row['tel'] ?>"><br><br>

            权限：
             <input type="text" name="type" value="<?php echo $row['type'] ?>"><br><br>           

            <input type="submit" value="保存编辑">
        </form>
    </div>
</body>
</html>