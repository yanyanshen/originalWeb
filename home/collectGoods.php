<?php
include_once"../config.php";
connect();
//判断用户是否登陆  如果登陆从数据库里那购物出信息
if(isset($_SESSION['mid'])&&($mid=$_SESSION['mid'])>0){
    $goodsInfo=selectMul("select goodsName,pic,price,buyNum,gid from goods_shop as g,home_cart_shop as c where g.id=c.gid and mid=$mid ORDER by c.addTime desc");
    // print_r($goodsInfo);
}else{
    //未登陆的时候 信息从 session里拿   session 里是个数组  遍历这个数组
    //session 里有物品的gid 通过物品的gid 从goods表里 拿物品的信息
    foreach(array_reverse($_SESSION['cart']) as $k=> $v){
        //print_r($v);
        $goodsInfo[$k]=selectOne("select goodsName,pic,price,id as gid from goods_shop where id={$v['gid']}");
        $goodsInfo[$k]['buyNum']=$v['buyNum'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品成功加入购物车</title>
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/public.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/index.css">
    <link type="text/css" rel="stylesheet" rev="stylesheet" href="<?=SKIN?>/css/membercenter.css" />
    <style type="text/css">
        #pageBody input{
            width:15px;
            height: 15px;
        }
    </style>
    <script type="text/javascript" src="<?=SKIN?>/js/jQuery.1.8.2.min.js"></script>
</head>
<body>
<!--  头部开始 -->
<?php
include_once"public/top.php";
?>
<!-- 头部结束 -->
<div class="buyer_day box">
    <p class="select_title"><span>我的购物车</span></p>
    <form action="cartAction.php?act=createOrder" method="post" enctype="multipart/form-data" id="form1">
        <?php
        if(isset($goodsInfo)&&$goodsInfo) {

            ?>
            <input type="hidden" name="orderprice" id="orderprice"/>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="day_list">
                <thead>
                <tr>
                    <th class="xuhao"></th>
                    <th width="15%">商品图片</th>
                    <th width="30%">商品名称</th>
                    <th width="10%">商品单价(元)</th>
                    <th width="20%">商品数量</th>
                    <th width="10%">小计(元)</th>
                    <th width="5%">操作</th>
                </tr>
                </thead>
                <tbody id="pageBody">
                <?php
                foreach ($goodsInfo as $k => $v) {
                    // print_r($v);
                    ?>
                    <tr>
                        <td class="xuhao" style="color: #ff0000"><input checked="checked" onchange="gettotalprice();"
                                                                        type="checkbox" name="chk[]"
                                                                        value="<?= $v['gid'] ?>"/></td>
                        <td>
                            <a href="goodsDetail.php?id=<?= $v['gid'] ?>">
                                <img src="<?= UPLOAD . '/100/thumbImg_100_' . $v['pic'] ?>" alt="<?= $v['goodsName'] ?>"
                                     style="width:80px;margin:10px;"/>
                            </a>
                        </td>
                        <td><a href="goodsDetail.php?id=<?= $v['gid'] ?>"><?= $v['goodsName'] ?></a></td>
                        <td><a href="goodsDetail.php?id=<?= $v['gid'] ?>" class="price"><?= $v['price'] ?></a></td>
                        <td>
                            <a href="javascript:jian(<?= $k ?>);" class="decrement">-</a>&nbsp;
                            <input type="text" name="buyNum<?= $v['gid'] ?>" value="<?= $v['buyNum'] ?>" class="num"
                                   id="buynum<?= $k ?>" onkeyup="chgnum(this)"/>&nbsp;
                            <a href="javascript:jia(<?= $k ?>);" class="increment">+</a>
                        <td class="prices"></td>
                        <td><a href="cartAction.php?act=delCartByGid&id=<?= $v['gid'] ?>">删除</a></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="5" id="buy">
                        <span>总价:<b id="totalprice">￥</b></span>
                        <a href="javascript:document.getElementById('form1').submit();" class="tobuy">去结算</a>
                    </td>
                </tr>
                </tbody>
            </table>
        <?php
        }else{
            echo"<h1 style='font-size: 25px;text-align: center;margin-bottom: 40px;'>宝宝的购物车空了哦！快给宝宝填点东西吧</h1>";
        }
        ?>
    </form>
    <div style="clear:both;"></div>
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
    function chk(){
        var chkAll=document.getElementById('chkAll');
        var chks=document.getElementsByName('chk[]');
        for(var i=0;i<chks.length;i++){
            chks[i].checked=chkAll.checked;
        }
    }
    // document.getElementById('chkAll').onclick=chk;
    // $('.cateList').hide();
    function jian(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum>1){
            document.getElementById('buynum'+n).value=parseInt(buynum)-1;
        }
        getprices();
        gettotalprice();
    }
    function jia(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum<199){
            document.getElementById('buynum'+n).value=parseInt(buynum)+1;
        }
        getprices();
        gettotalprice();
    }

    function chgnum(v){
        if(v.value<1){
            v.value=1;
        }
        if(v.value>199){
            v.value=199;
        }
        if(isNaN(v.value)){
            v.value=1;
        }

        gettotalprice();
    }

    function getprices(){
        var nums=document.getElementsByClassName('num');
        var price=document.getElementsByClassName('price');
        var prices=document.getElementsByClassName('prices');
        for(var i=0;i<price.length;i++){

            prices[i].innerHTML=parseInt(price[i].innerHTML)*parseInt(nums[i].value);

        };
    }

    function gettotalprice(){
        getprices();
        var inputs=document.getElementsByName('chk[]');
        var prices=document.getElementsByClassName('prices');
        var totalprice=0;
        for(var i=0;i<inputs.length;i++){
            if(inputs[i].checked){
                totalprice+=parseInt(prices[i].innerHTML);
            };
        };
        document.getElementById('totalprice').innerHTML='￥'+totalprice;
        document.getElementById('orderprice').value=totalprice;
    }

    gettotalprice();
</script>
</html>