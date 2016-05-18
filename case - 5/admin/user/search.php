<?php
	header("content-type:text/html;charset=utf-8");
    require '../init.php';

    // p($_GET);
    // p($_POST);
  	$name = $_POST['name'];

  	if(empty($name)){
  		echo '请输入你要查询的用户名';
  	}

  	$sql="select * from ".PRE."user where `name`='$name'";
  	// var_dump($sql);
  	// exit;
  	$result=mysqli_query($link,$sql);
  	  $result = mysqli_query($link,$sql);
        //判断执行结果
        if ($result) {
            $list = array();
            $list = mysqli_fetch_all($result,MYSQLI_ASSOC);
            // var_dump($list);
            mysqli_free_result($result);

            //返回查询结果数组
            // return $list;
        }else{
            echo '查询失败,返回false';
           
        }
  		

  		
  	mysqli_close($link);


 ?>
<!DOCTYPE html>
<html lang="cn">
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>搜索前台用户</title>

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
               <ul class="nav navbar-nav">
                 <li><a href="./index.php">用户列表</a></li>
                 <li><a href="./add.php">添加前台用户</a></li>
               </ul>
               <form class="navbar-form navbar-left" action="./search.php" method="post" >
                 <div class="form-group">
                   <input type="text"  name='name' class="form-control" placeholder="Search">
                 </div>
                 <button type="submit" class="btn btn-default">查询</button>
               </form>
             </div><!-- /.navbar-collapse -->
           </div><!-- /.container-fluid -->
         </nav>
	<table border="1" width="800" cellspacing="0" >
		<tr>
			<th>ID</th>
			<th>名字</th>
			<th>性别</th>
			<th>手机号</th>
			<th>邮箱</th>
      <th>登录次数</th>
			<th>登录权限</th>
			<th>操作</th>
		</tr>

		<?php 
		foreach ($list as $key => $val): ?>
				<tr>
					<td><?php echo $val['id'] ?></td>
					<td><?php echo $val['name'] ?></td>
					<td><?php echo $val['sex'] ?></td>
					<td><?php echo $val['tel'] ?></td>
					<td><?php echo $val['email'] ?></td>
          <td><?php echo $val['logincount'] ?></td>
					<td><?php echo $val['type'] ?></td>
					<td>
					<a href="./edit.php?id=<?php echo $val['id'] ?>">编辑</a>
					<a href="./action.php?a=del&id= <?php echo $val['id'] ?>">删除</a>
					</td>
				</tr>
			<?php endforeach ?>	
		
	</table>
</body>
</html>