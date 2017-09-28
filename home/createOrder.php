<?php
include_once"../config.php";
connect();
$oid=$_GET['oid'];
$orderInfo=selectOne("select * from home_order_shop o,home_orderstatus_shop s where o.orderStatus=s.id and o.id={$oid}");
$goodsInfo=selectMul("select buyNum,goodsName,pic,price,gid,(buyNum*price) as totalPrice from home_orderGoods_shop as og,goods_shop as g where og.gid=g.id and oid={$oid}");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>订单详情</title>
    <meta name="keywords" content="标题">
    <meta name="description" content="内容">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/public.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/index.css">
    <link type="text/css" rel="stylesheet" rev="stylesheet" href="<?=SKIN?>/css/membercenter.css" />
    <script type="text/javascript" src="<?=SKIN?>/js/jquery-1.8.1.min.js"></script>
    <style type="text/css">
        .ordersta01,.ordersta02,.ordersta03{ padding-left:80px!important;}
        .ordersta01{ font-size:16px; font-weight:700; background:url(<?=SKIN?>/images/orderstate.png) no-repeat 35px 5px;}
        .ordersta02{ color:#CCC}
        .ordersta02 span{ color:#333; padding:0 5px;}
        .ordersta02 span i{ color:#F7980A}
        .ordersta03{ margin:10px 0 15px;}
        .orderstaa01{ padding:5px 12px; background-color:#D80C18; color:#FFFFFF;}
        .orderstaa02{ margin-left:20px; color:#88C6E2}
        .orderproduct{}
        .orderpro01{ height:40px; line-height:40px; background-color:#F7F7F7; border-bottom:1px solid #D9D9D9}
        .orderpro01 span{height:40px; line-height:40px; padding:0 20px;}
        .orderpro01 .orderprospan03{ border-right:0}
        .orderpro01 span i{ color:#969696}
        .orderprocon{ padding:0 20px 20px;}
        .orderproinfo{ border-bottom:2px solid #E8E8E8!important}
        .orderproinfo span{ font-size:14px; font-weight:700; display:inline-table; width:60px; text-align:center; height:35px; line-height:35px; border-bottom:2px solid #88C6E2; margin-bottom:-2px; color:#000!important;}
        .orderprodiv{ padding:12px 0 22px;width:40%; padding-right:5%; float:left;}
        .orderprodiv p{ height:35px; line-height:35px;}
        .orderprodiv p span{ color:#969696; display:inline-table; width:60px; text-align:right; padding-right:20px;}
        .orderinfomation{ width:100%; text-align:center}
        .orderinfomation thead tr{ height:35px; line-height:35px; color:#969696; font-weight:700;}
        .orderinfomation tbody td{ border:1px solid #E8E8E8;}
        .orderdetitle{ width:30%; padding:10px 0;}
        .orderdestate{ width:20%;}
        .orderdejiage{ width:10%;}
        .orderdesum{ width:10%;}
        .orderdepinjia{ width:20%;}
        .orderdezjia{ width:10%; }
        .orderdezjia02{font-weight:700; font-size:14px;}
        .orderdetitle img{ float:left;}
        .orderdetitle p{ float:left; width:415px; padding:10px;}
        .orderdetitle p a,.orderdestatguo{ color:#0088ff}
        .orderdetitle p a:hover{ color:#D80C18}
        .orderdestameiguo{ color:#F7980A}
        .ordersumer{ background-color:#F7F7F7; border:1px solid #e8e8e8; text-align:right;padding-top:20px; padding-right:10px; height:50px; line-height:50px;}
        .orderred{ color:#f00;}
        .selmore{ padding-left:10px; color:#209FE0}
        .wuliucon{position: absolute;left:0;;*top:20px;color:#666;color:#555;z-index:99999;text-align: left;top:180px;width:399px;background-color:#f8f8f8;color: #474747;padding-bottom: 10px;border: 1px solid #88C6E2;padding:15px 8px;display:none}
        .wuliuconn{padding:4px;}
        .wlconleft{float: left;}
        .wlconright{float: left; padding-left:10px; width:160px;text-align: left;}
        .wuliudiv{ border: 1px solid #f7980a;padding: 8px;}
        .wuliuimg{margin-bottom: -1px;padding-left:95px;vertical-align: bottom;}
        .wuliupp i{font-weight: 700;}
    </style>
</head>

<body>
<!--  头部开始 -->
<?php
include_once"public/top.php";
?>
<!-- 头部结束 -->

<div class="buyerbox box">
    <p class="orderpro01"><span><i>订单详情</span></p>
    <div class="orderprocon">
        <div class="clearfix" style="width:100%;">
            <div class="orderprodiv clearfix">
                <p class="orderproinfo"><span>订单信息</span></p>
                <p><span>订单状态：</span><em class="orderred"><?=$orderInfo['statusName']?></em></p>
                <p><span>订单号：</span><?=$orderInfo['ordersyn']?></p>
                <p><span>下单时间：</span><?=date('Y-m-d H:i:s',$orderInfo['addTime'])?></p>
            </div>

            <div class="orderprodiv clearfix" style="position:relative">
                <p class="orderproinfo orderproinfo001"><span>收货信息</span></p>
                <p><span>收货地址：</span>河南省郑州市高新区电子商务中心</p>
                <p><span>收货人：</span>张三</p>
                <p><span>联系方式：</span>15237150303</p>
            </div>
        </div>
        <p class="orderproinfo"><span>支付方式</span></p>
        <div style="padding:30px 0;">
            <form action="">
                <input type="radio" checked name="paytype" id="hdfk" style="width:18px;vertical-align:middle"/>货到付款
                <input type="radio"  name="paytype" id="alipay" style="width:18px;vertical-align:middle"/>支付宝支付
                <input type="radio"  name="paytype" id="wxpay" style="width:18px;vertical-align:middle"/>微信支付
            </form>
        </div>
        <p class="orderproinfo"><span>商品信息</span></p>
        <table class="orderinfomation" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th class="orderdetitle">商品名称</th>
                <th class="orderdejiage">单价（元）</th>
                <th class="orderdesum">总量（件）</th>
                <th class="orderdezjia">商品总价</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($goodsInfo as $v){
            ?>
            <tr>
                <td class="orderdetitle" style="text-align:left;">
                    <img style="width:60px;vertical-align:middle" src="<?=UPLOAD.'/100/thumbImg_100_'.$v['pic']?>" />
                    <p><a href="goodsDetail.php?id=<?=$v['gid']?>"><?=$v['goodsName']?></a></p>
                </td>
                <td class="orderdejiage"><?=$v['price']?></td>
                <td class="orderdesum"><?=$v['buyNum']?></td>
                <td class="orderdezjia"><?=$v['totalPrice']?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <div class="ordersumer" id="buy">
            商品总价:￥20 + 运费:￥10 = 实付款<span style="color:red;font-size:20px;"><?=$orderInfo['orderPrice']?></span>
            <a href="cartAction.php?act=submitOrdersyn&oid=<?=$oid?>" class="tobuy">提交定单</a><!--submitSuccess.php-->
        </div>

    </div>
</div>
<div style="clear:both;"></div>
<!-- 尾部开始 -->
<?php
include_once"public/footer.php";
?>
<!-
<!-- 尾部结束 -->
<!--返回顶部开始-->
<a href="#" class="goTop">返回顶部</a>
<!--返回顶部结束-->
</body>

</html>

