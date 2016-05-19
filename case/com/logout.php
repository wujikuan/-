<?php 
    require '../init.php';

    unset($_SESSION['home']);
    unset($_SESSION['cart']);
    redirect('退出成功',URL.'index.php',1);
