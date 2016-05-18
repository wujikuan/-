<?php

    echo '此页是编辑页面 自己写';
    exit;
    

 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>编辑用户</h2>
    <form action="./action.php?a=edit" method="post">
        <!-- 隐藏域用于传递用户的ID 以便action页面知道是编辑谁 -->
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        
        name:
        <input type="text" name="name" value="<?php echo $row['name'] ?>" placeholder="请输入用户名"><br><br>

        sex:
        <input type="radio" name="sex" value="0" <?php echo $row['sex']==0?'checked':''; ?>>女
        <input type="radio" name="sex" value="1" <?php echo $row['sex']==1?'checked':''; ?>>男
        <input type="radio" name="sex" value="2" <?php echo $row['sex']==2?'checked':''; ?>>保密<br><br>

        age:
        <input type="text" name="age" value="<?php echo $row['age'] ?>"><br><br>

        province:
        <select name="province">
            <option value="江苏" <?php echo $row['pro']=='江苏'?'selected':''; ?>>江苏</option>
            <option value="上海" <?php echo $row['pro']=='上海'?'selected':''; ?>>上海</option>
            <option value="新疆" <?php echo $row['pro']=='新疆'?'selected':''; ?>>新疆</option>
            <option value="浙江" <?php echo $row['pro']=='浙江'?'selected':''; ?>>浙江</option>
            <option value="北京" <?php echo $row['pro']=='北京'?'selected':''; ?>>北京</option>
            <option value="深圳" <?php echo $row['pro']=='深圳'?'selected':''; ?>>深圳</option>
            <option value="纽约" <?php echo $row['pro']=='纽约'?'selected':''; ?>>纽约</option>
        </select><br><br>

        <input type="submit" value="保存编辑">
    </form>
</body>
</html>