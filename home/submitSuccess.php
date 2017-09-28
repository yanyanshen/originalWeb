<?php
include_once"../config.php";
connect();
$oid=$_GET['oid'];
//print_r($oid);
$orderList=selectOne("select ordersyn from home_order_shop where id=$oid");

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
include_once"public/top.php";
?>

<div style="margin-bottom:20px;padding:45px;height: 300px">
    <div class="box">
        <h1 style="color:#71B247;height:150px;line-height:150px;padding-left:100px;margin:10px 0;background:url('<?=SKIN?>/images/ok.jpg') no-repeat left 30px;">
            <?=$orderList['ordersyn']?>订单支付成功！<a href="/index.php" style="margin:0px 10px;" target="_self">返回首页继续购物</a>
        </h1>
        <dl style="margin-left: 50px;font-size:14px;">
            <dt>温馨提示：</dt>
            <dd> &nbsp;</dd>
            <dd>1. 请保持手机畅通，以便快递公司和您联系，确保收件顺利</dd>
            <dd> &nbsp;</dd>
            <dd>2. 如有疑问，请拨打客服电话：400-6666-8888</dd>
        </dl>

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
include_once"public/footer.php";
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