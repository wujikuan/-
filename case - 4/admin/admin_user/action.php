<?php 
    //此页面会进行 增 删 改
    require '../init.php';

    p($_GET);
    p($_POST);
    p($_SESSION);
    

    $a = $_GET['a'];
    
        switch ($a) {
            case 'edit':
                $id = $_POST['id'];
                echo '正在编辑ID为'.$id.'的家伙..<br>';
                $set = '';
                foreach ($_POST as $key => $val) {
                    $set .= "`$key`='$val',";
                }
                $set = rtrim($set,',');
                $sql = "UPDATE ".PRE."admin_user SET $set WHERE `id`='$id'";
                $result = mysqli_query($link,$sql);
                if ($result && mysqli_affected_rows($link)>0) {
                    echo '编辑成功';
                    echo '<br>3秒后跳转到首页 或点击此处: <a href="./index.php">回首页</a>';
                    echo '<meta http-equiv="refresh" content="3;./index.php">';
                }else{
                    echo '编辑失败,请重试';
                    //失败,应该回到之前页面(来之前的页面)
                    // echo '<meta http-equiv="refresh" content="3;'.$_SERVER['HTTP_REFERER'].'">';
                }
                break;

            case 'add':
                echo '正在添加用户....<br>';
                //表单不为空,如果有空值,回之
                foreach ($_POST as $key => $val) {
                    if ($val == '') {
                        admin_redirect('请完善表单信息!');
                        exit;
                    }
                }

                //得到用户输入的信息
                //各种信息验证!!!
                
                $_POST['pwd'] = md5($_POST['pwd']);

                $keys = '';
                $values = '';
                //遍历得到的post 生成SQL语句的条件
                foreach ($_POST as $key => $val) {
                    $keys .= "`$key`,";
                    $values .= "'$val',";
                }
                //抹去右边的逗号
                $keys = rtrim($keys,',');
                $values = rtrim($values,',');

                //5
                $sql = "INSERT INTO ".PRE."admin_user ($keys) VALUES($values)";
                $id = execute($link,$sql);
                if ($id) {
                    admin_redirect('添加成功 ID:'.$id, './index.php',1);
                    exit;
                }else{
                    admin_redirect('添加失败');
                    exit;
                }
                break;

            case 'del':

                //删除动作
                $id = $_GET['id'];
                echo '我要删除ID为'.$id.'的家伙<br>';
                //5
                $sql = "DELETE FROM ".PRE."admin_user WHERE `id`='$id'";
                //6
                $result = mysqli_query($link,$sql);
                //7
                if ($result && mysqli_affected_rows($link)>0) {
                    echo '删除成功! 3秒后跳转到首页 或点击此处立即跳转<a href="./index.php">回首页</a>';
                    echo '<meta http-equiv="refresh" content="3;index.php">';
                }else{
                    echo '删除失败!';
                    echo '<meta http-equiv="refresh" content="3;index.php">';
                }
                break;
            }
     
        

    //8.关闭连接
    mysqli_close($link);



