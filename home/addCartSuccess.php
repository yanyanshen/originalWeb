<?php
include_once "../config.php";
connect();
$gid=$_GET['gid'];
$goodsInfo=selectOne("select goodsName,price,pic from goods_shop where id=$gid");
//判断用户是否登录，登录时从数据库中查找购买数量，未登录时从session中查找购买数量
if(isset($_SESSION['mid']) && $_SESSION['mid']>0){
    $cartInfo=selectOne("select buyNum from home_cart_shop where mid={$_SESSION['mid']} and gid=$gid");
    $cartNum=$cartInfo['buyNum'];

}else{
    $cartNum=$_SESSION['cart'][$gid]['buyNum'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品成功加入购物车</title>
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/public.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/search.css">
    <style type="text/css">
        #cart td{
            border: 0;
            text-align: left;
            color: #666;
            font-size: 16px;
        }
    </style>
    <script type="text/javascript" src="<?=SKIN?>/js/jQuery.1.8.2.min.js"></script>
</head>
<body>
<!--  头部开始 -->
<?php
include_once "public/top.php";
?>
<!-- 头部结束 -->
<div style="margin-bottom:20px;padding:45px;background:#F5F5F5;">
    <div class="box">
        <h1 style="color:#71B247;margin:10px 0">商品已成功加入购物车</h1>
            <table width="100%" border="0" style="border:0" id="cart">
                <tr>
                    <td>
                        <a href="goodsDetail.php?id=<?=$gid?>">
                            <img src="<?=UPLOAD.'/100/thumbImg_100_'.$goodsInfo['pic']?>" alt="" style="width:80px;margin:10px;vertical-align:middle" />
                            <?=$goodsInfo['goodsName']?> &nbsp;&nbsp;购买数量：<?=$cartNum?> &nbsp;&nbsp;单价：￥<?=$goodsInfo['price']?>
                        </a>
                    </td>
                    <td class="pxtitle">
                        <a href="../index.php" style="padding:10px 20px;font-size:14px;">继续购物</a>
                        <a href="cartList.php" style="padding:10px 20px;font-size:14px;background:#B1191A">去购物车结算</a>
                    </td>
                </tr>
            </table>
    </div>
</div>

<div class="pxlistcon box">
    <div class="pxlist" >
        <h3>购买该商品的用户还购买了</h3>
        <ul>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
            <li>
                <a href="#" title="">
                    <img src="<?=SKIN?>/images/iphone.jpg" alt="" />
                    <span>iPhone 6s 16 GB</span>
                </a>
                <p>￥4666</p>
            </li>
        </ul>
    </div>

</div>
<div style="clear:both;"></div>
<!-- 尾部开始 -->
<?php
include_once "public/footer.php";
?>
<!-- 尾部结束 -->
<!--返回顶部开始-->
<a href="#" class="goTop">返回顶部</a>
<!--返回顶部结束-->
</body>
<script type="text/javascript">
    $(function() {
        $('.cateList').hide();
    });

    function sort(v) {
        $(v).addClass('active').siblings().removeClass('active');
    }
</script>
</html>