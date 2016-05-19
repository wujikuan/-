<?php
    require '../init.php';
    // p($_GET);
    $id=$_GET['id'];
    $sql= "select `id`,`cname`,`pid`,`path`,`display`from ".PRE."category where id=$id";
    
    $row=query($link,$sql);
    $row=$row['0'];
    // exit;
    

 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>分类编辑</h2>
    <form action="./action.php?a=edit" method="post">
        <!-- 隐藏域用于传递用户的ID 以便action页面知道是编辑谁 -->
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        
        分类名:
        <input type="text" name="cname" value="<?php echo $row['cname'] ?>" placeholder="请输入用户名"><br><br>

  

        pid:
        <input type="int" name="pid" value="<?php echo $row['pid'] ?>"><br><br>

        path:
        <input type="text" name="path" value="<?php echo $row['path'] ?>"><br><br>
        

        display:
        <input type="text" name="display" value="<?php echo $row['display'] ?>"><br><br>
       

        <input type="submit" value="保存编辑">
    </form>
</body>
</html>