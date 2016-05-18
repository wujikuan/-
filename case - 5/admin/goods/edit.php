<?php
    require '../init.php';
    $c_id= $_GET['id'];
    $sql = "SELECT g.id, g.gname, g.price, g.stock, g.sale, g.is_new, g.is_hot, g.state, g.zan, g.msg, c.cname,c.id cid,i.iname
    FROM ".PRE."goods g,".PRE."category c,".PRE."image i
    WHERE g.cate_id = c.id AND g.id = '$c_id'
     ";
    $list = query($link,$sql);
    $list = $list['0'];
    $id=$list['id'];
    $cname=$list['cname'];
    
    $sql = "SELECT `id`,`cname`,`path`,CONCAT(`path`,`id`,',') AS bpath FROM ".PRE."category order by bpath";
    $cate = query($link, $sql);
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
            
        商品名:
        <input type="text" name="gname" placeholder="请输入商品名" value=" <?php echo $list['gname'] ?>"><br><br>
        商品分类:
        <select name="c_id">
            <?php if (!empty($cate)): ?>
            <?php foreach ($cate as $val): ?>
            <option value="<?php echo $val['id']?>"<?php echo $list['cname']==$val['cname']?'selected':''; ?>
                > 
                <?php echo str_repeat('&nbsp;&nbsp;',substr_count($val['path'],',')).'|--'.$val['cname'] ?>
            </option>
            <?php endforeach ?>
            <?php else: ?>
                
            <?php endif ?>
        </select><br><br>
        价格:
        <input type="text" name="price" placeholder="价格" value=" <?php echo $list['price'] ?>"><br><br>
        库存:
        <input type="text" name="stock" placeholder="库存" value=" <?php echo $list['stock'] ?>"><br><br>
        商品描述: <br>
        <textarea name="msg" cols="30" rows="5"  ><?php echo $list['msg'] ?> </textarea><br><br>

        <input type="submit" value="保存编辑">
        
    </form>
</body>
</html>