<?php
	header("content-type:text/html;charset=utf-8");
    require '../init.php';

    // p($_GET);
    // p($_POST);
  	$name = $_POST['name'];

  	if(empty($name)){
  		echo '请输入你要查询的用户名';
  	}

  	// $sql="select * from ".PRE."goods where `gname` LIKE '%$name%'";
  	// var_dump($sql);
  	// exit;
  	// $result=mysqli_query($link,$sql);
        //判断执行结果
        // if ($result) {
            // $val = array();
            // $val = mysqli_fetch_all($result,MYSQLI_ASSOC);
            // var_dump($list);
            // mysqli_free_result($result);

            //返回查询结果数组
            // return $list;
        // }else{
        //     echo '查询失败,返回false';
           
        // }
        // p($val);
  	// mysqli_close($link);
    $sql = "
    SELECT g.id, g.gname, g.price, g.stock, g.sale, g.is_new, g.is_hot, g.state, g.zan, g.msg, c.cname, i.iname
    FROM ".PRE."goods g,".PRE."category c,".PRE."image i
    WHERE g.cate_id = c.id AND g.id = i.goods_id AND cover=1 AND gname LIKE '%$name%'";
    $list = query($link ,$sql); 
    // exit;
  // exit;
 ?>
<!DOCTYPE html>
<html lang="cn">
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>搜索商品</title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../public/js/html5shiv.min.js"></script>
    <script src="../public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../public/admin.css">
</head>
<body class="bg"> 
		  <h1>用户信息表</h1>
         <nav class="navbar">
           <div class="container-fluid">
             <div class="collapse navbar-collapse">
              
               <form class="navbar-form navbar-left" action="./search.php" method="post" >
                 <div class="form-group">
                   <input type="text"  name='name' class="form-control" placeholder="Search">
                 </div>
                 <button type="submit" class="btn btn-default">查询</button>
               </form>
             </div><!-- /.navbar-collapse -->
           </div><!-- /.container-fluid -->
         </nav>
	     <?php if (empty($list)): ?>
            <h2 class="text-center">暂无数据</h2>
        <?php else: ?>
        <?php foreach ($list as $val): ?>
            <table class="table table-bordered table-hover h4">
                <tr>
                    <th class="col-md-1">ID:<?php echo $val['id'] ?></th>
                    <th class="col-md-1">商品名</th>
                    <th class="col-md-3">所属分类</th>
                    <th class="col-md-1">价格</th>
                    <th class="col-md-1">库存</th>
                    <th class="col-md-1">销量</th>
                    <th class="col-md-1">赞量</th>
                    <th class="col-md-1">上架</th>
                    <th class="col-md-1">热销</th>
                    <th class="col-md-1">新品</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $val['gname'] ?></td>
                    <td><?php echo $val['cname'] ?></td>
                    <td><?php echo $val['price'] ?></td>
                    <td><?php echo $val['stock'] ?></td>
                    <td><?php echo $val['sale'] ?></td>
                    <td><?php echo $val['zan'] ?></td>
                    <td>
                        <a href="./action.php?a=state&state=<?php echo $val['state']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['state']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                    <td>
                        <a href="./action.php?a=is_hot&is_hot=<?php echo $val['is_hot']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['is_hot']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                    <td>
                        <a href="./action.php?a=is_new&is_new=<?php echo $val['is_new']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['is_new']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="goods">
                    <img src="<?php echo getpath(ADMIN_URL.'../uploads/', $val['iname'], 'b') ?>">
                    </td>
                    <td colspan="5"><?php echo $val['msg'] ?></td>
                    <td colspan="5">
                        <div class="col-md-12 mt30">
                            <a href="./edit.php?id=<?php echo $val['id'] ?>" class="btn btn-primary btn-block">商品信息编辑</a>
                        </div>
                        <div class="col-md-12 mt30">
                            <a href="./img.php?goods_id=<?php echo $val['id'] ?>" class="btn btn-success btn-block">商品图片编辑</a>
                        </div>
                    </td>
                </tr>
            </table>
        <?php endforeach ?>
        <?php endif ?>
</body>
</html>