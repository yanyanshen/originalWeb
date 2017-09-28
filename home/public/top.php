<?php
include_once".././config.php";
connect();
if(isset($_SESSION['mid'])&&$_SESSION['mid']>0){
    $cartInfo=selectOne("select count(gid) as cartnum from home_cart_shop where mid={$_SESSION['mid']}");
}else{

    if(isset($_SESSION['cart'])&&$_SESSION['cart']){
        //print_r($v);
        $cartnum=count($_SESSION['cart']);
    }else{
        $cartnum=0;
        $_SESSION['cart']=array();
    }
}



//print_r($goodsInfo[$k]);
?>
<style>
    .total{color:#a9a9a9;margin-left: 20px;display: none;
        text-align: center;margin-top: 10px;display: inline-block}
</style>
<script>
    $(function(){
        $(".myShopCar").mouseenter(function(){
            $(".myShopCar .cart").slideDown('500');
            $(this).addClass("myShopCarHover");
            $(".span").show();
            $.post('../home/cartAction.php?act=getCart',function(res){
                $(".shopCarNum").text(res.length);
                //得到了返回过来的一个商品的数组
                /*var id='';*/
                str='';
                total=0;
                for(var i in res){
                    str+='<dd>'
                    str+='<a href="../home/goodsDetail.php?&id='+res[i].gid+'">' +
                            '<span><img style="width: 50px;height:60px;" src="../../public/upload/100/thumbImg_100_'+res[i].pic+'"/>' +
                            '</span></a>'
                    str+='<a href="javascript:;"><span>'+res[i].goodsName.substr(0,8)+'...'+'</span></a>'
                    str+='<a href="javascript:;"><span>'+'￥'+res[i].price+'</span></a>'
                    str+='<a href="javascript:;"><span>'+res[i].buyNum+'</span></a>'
                    str+='<a href="javascript:;"><span>'+'￥'+res[i].totalprice+'</span></a>'
                    str+='<a class="del" href="javascript:;" id='+res[i].gid+'><span>'+'删除'+'</span></a>'
                    str+='</dd>'
                    total+=parseInt(res[i].totalprice)
                }
                str+="<a class='cul' href='../home/cartList.php'>去结算</a>";
                $(".myShopCar .cart dl").eq(0).html(str);
                $(".span").html("总价：￥"+total+"元");
            },'json')
        });

        $(".myShopCar").mouseleave(function(){
            $(".myShopCar .cart").hide();
            $(this).removeClass("myShopCarHover");
            $(".span").removeClass("total");
        });
        //异步删除
        $(".myShopCar a.del").live('click',function(){
            var gid=$(this).attr("id");
            $(".shopCarNum").text($(".shopCarNum").text-1);
            $.post('../home/cartAction.php?act=delCart&id='+gid,function(res){
               /* alert(res);*/
            })
        })
    })
</script>
<div class="header">
    <div class="topBar">
        <div class="box">
            <ul class="topLeft lf">
                <li><span><?=isset($_SESSION['userName'])?$_SESSION['userName'].' '.'<a href="./Login/loginAction.php?act=loginOut">退出</a>':'欢迎您'?>,来到易购网</span> </li>
                <li><a href="login/login.php"><?=isset($_SESSION['userName'])?'':'请登录'?></a></li>
                <li><a href="register/register.php"><?=isset($_SESSION['userName'])?'':'免费注册'?></a></li>
            </ul>
            <ul class="topRight rf">
                <li><a href="#">关注易购网</a></li>
                <li><a href="#">帮助中心</a></li>
                <li><a href="#">我的收藏</a></li>
                <li class="myShopCar">
                    <a href="../../home/cartList.php">我的购物车(
                        <span class="shopCarNum"><?=(isset($_SESSION['mid'])&&$_SESSION['mid']>0)?(0+$cartInfo['cartnum']):(0+$cartnum)?></span>
                        )
                        <div class="cart">
                            <dl></dl>
                            <span class="span"></span>
                        </div>
                    </a>
                </li>
                <li><a href="<?=isset($_SESSION['mid'])?'membercenter/index.php':'Login/Login.php'?>">用户中心</a></li>
            </ul>
        </div>
    </div>
    <div class="box logoBar">
        <div class="logo lf">
            <a href="#"><img src="<?=SKIN?>/images/logo.png"></a>
        </div>
        <div class="search lf">
            <form action="../home/searchGoods.php" method="get" id="form3" >
                <input class="lf" type="text" name="keywords" value="<?=isset($_GET['keywords'])?$_GET['keywords']:''?>" />
                <a href="javascript:document.getElementById('form3').submit();" class="searchBtn lf">搜索</a>
            </form>
            <ul style="">
                <li><a href="#">平板电脑</a></li>
                <li><a href="#">iphone 6s plus</a></li>
                <li><a href="#">华为p9</a></li>
                <li><a href="#">固态硬盘</a></li>
                <li><a href="#">华为p9</a></li>
                <li><a href="#">小米电视</a></li>
            </ul>
        </div>
        <div class="shopCar rf">
            <img src="<?=SKIN?>/images/wx.png">
        </div>
    </div>
    <div class="menuBar">
        <div class="box menu">
            <ul>
                <li class="current"><a href="../../index.php">首页</a></li>
                <li><a href="#">热卖专区</a></li>
                <li><a href="#">团购商城</a></li>
                <li><a href="#">积分兑换</a></li>
                <li><a href="#">品牌专卖</a></li>
            </ul>
        </div>
    </div>
</div>