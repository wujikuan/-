<?php 
    $sql = "
        SELECT i.iname, g.gname, g.id, g.price, g.zan
        FROM ".PRE."goods g, ".PRE."image i
        WHERE i.goods_id = g.id AND i.cover=1 AND g.state=1 AND g.is_new=1 limit 12";
    $list = query($link, $sql);
    // p($list);exit;

 ?>

<!-- 新品模块 -->
<div class="container">
   
    <div class="row">

        <?php if (empty($list)): ?>
        <h2>暂无数据</h2>
        <?php else: ?>
        <?php foreach ($list as $key => $val): ?>
        <div class="col-md-2">
          <div class="thumbnail s1">
            <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
                <img src="<?php echo getpath(URL.'uploads/',$val['iname'],'c') ?>">
            </a>
            <div class="caption">
                <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
                    <h4><?php echo $val['gname'] ?></h4>
                </a>
              <p>
                <span class="glyphicon glyphicon-xbt"></span>
                <?php echo $val['price'] ?>
                <a href="./com/zan.php?a=zan&id=<?php echo $val['id'] ?>" class="pull-right"><span class="glyphicon glyphicon-heart"></span> <?php echo $val['zan'] ?></a>
              </p>
            </div>
          </div>
        </div>
        <?php endforeach ?>
        <?php endif ?>

    </div><!-- END row -->
</div><!-- END container -->