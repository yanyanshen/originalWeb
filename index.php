<?php
include_once"config.php";
connect();
//购物车
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



//通过cid得到商品分类  goods的id = category的cid
function getGoodsCateById($cid){
    $pathArr=selectOne("select path from category_shop where id=$cid");
    $path=$pathArr['path'];
    //得到 以$path 开头的所有子分类id
    $idArr=selectMul("select id from category_shop where path like'{$path}%'");

    //遍历 $idArr 数组 得到里面的 id值
    $idStr='';
    foreach($idArr as $v){
        //得到的id是个数组 得到里面的字符串值
        $idStr.=$v['id'].',';//这样最后会得到一个 最后又一个逗号的字符串
    }
    $idStr=substr($idStr,0,-1);
    //print_r($idStr);
    // 根据所有字分类的id 查出所有商品
    return selectMul("select * from goods_shop where cid in($idStr) ORDER  by addtime");
}
$oneFloorGoods=getGoodsCateById(32);
$twoFloorGoods=getGoodsCateById(9);
$threeFloorGoods=getGoodsCateById(25);
$fourFloorGoods=getGoodsCateById(6);
//prinGoods);
//print_r($oneFloorGoods);
$cateInfo=selectMul("select * from category_shop where pid=0 ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>易购网-首页</title>
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/public.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/index.css">
    <base target="_blank" />
    <style>
         .total{color:#a9a9a9;margin-left: 20px;display: none;
            text-align: center;margin-top: 10px;display: inline-block}
    </style>
    <script src="<?=SKIN?>/js/jQuery.1.8.2.min.js"></script>
    <script>
        $(function(){
            $(".myShopCar").mouseenter(function(){
                $(".myShopCar .cart").slideDown('500');
                $(this).addClass('myShopCarHover');
                $(".span").show();
                $(".span").addClass("total");
                $.post('home/cartAction.php?act=getCart',function(res){
                    $(".shopCarNum").text(res.length);
                   var str='';
                    var total=0;
                    for(var i in res){
                        str+='<dd>'
                        str+='<a href="./home/goodsDetail.php?&id='+res[i].gid+'"><span><img style="width: 50px;height:60px;" src="../public/upload/100/thumbImg_100_'+res[i].pic+'"/></span></a>'
                        str+='<a href="javascript:;"><span>'+res[i].goodsName.substr(0,5)+'..'+'</span></a>'
                        str+='<a href="javascript:;"><span>'+'单价：￥'+res[i].price+'</span></a>'
                        str+='<a href="javascript:;"><span>'+res[i].buyNum+'</span>'
                        str+='<a href="javascript:;"><span>'+'￥'+res[i].totalprice+'</span></a>'
                        str+='<a class="del" href="javascript:;" id='+res[i].gid+'>'+'删除'+'</a>'
                        str+='</dd>'
                        total+=parseInt(res[i].totalprice);
                    }
                    str+="<a class='cul' href='./home/cartList.php'>去结算</a>";
                    $(".myShopCar .cart dl").eq(0).html(str);
                    $(".span").html("总价："+total+"元");
                },'json')

            });

            $(".myShopCar").mouseleave(function(){
                $(" .myShopCar .cart").hide();
                $(this).removeClass('myShopCarHover');
                $(".span").removeClass("total")
            });
            $(".myShopCar a.del").live('click',function(){
                var gid=$(this).attr("id");
                $(".shopCarNum").text($(".shopCarNum").text()-1);
                $.post('home/cartAction.php?act=delCart&id='+gid,function(responce){
                    alert(responce);
                })
            })
        });

//首页面包屑导航
        $(function(){
            $("#nav dl").mouseenter(function(){
                i=$(this).attr("class");
                var y=$(this).index();
                //alert(i);
                //讲顶级商品的的id 即 path 用jaxa传到另一个页面 做处理
                $.get('indexAction.php?act=cateName&path='+i,function(res){
                    var str='';
                    for(x in res) {
                        str+='<div class="clist"> ' + '<div class="listTitle">'+res[x].catename+ ' &gt;</div>'
                        for(z in res[x].cate){
                            str+='<a href="#">'+res[x].cate[z].catename+'</a>&nbsp;&nbsp;&nbsp;'
                            }
                        str+=' <div class="listContent"></div></div>';
                        }
                    $(".cateLeft").eq(y).html(str);
                },"json")
            });
        });



//首页面包屑导航

    </script>
</head>
<body>
<!--  头部开始 -->
<div class="header">
    <div class="topBar">
        <div class="box">
            <ul class="topLeft lf">
                <li><span><?=isset($_SESSION['userName'])?$_SESSION['userName'].' '."<a href='home/Login/loginAction.php?act=loginOut'>退出</a>":'欢迎您'?>，来到易购网</span> </li>
                <li><a href="./home/login/login.php"><?=isset($_SESSION['userName'])?'':'请登录'?></a></li>
                <li><a href="./home/register/register.php"><?=isset($_SESSION['userName'])?'':'免费注册'?></a></li>
            </ul>
            <ul class="topRight rf">
                <li><a href="#">关注易购网</a></li>
                <li><a href="#">帮助中心</a></li>
                <li><a href="./home/collectGoods.php">我的收藏</a></li>
                <li class="myShopCar">
                    <a href="../home/cartList.php">我的购物车(
                        <span class="shopCarNum"><?=(isset($_SESSION['mid'])&&$_SESSION['mid']>0)?(0+$cartInfo['cartnum']):(0+$cartnum)?></span>
                        )
                        <div class="cart">
                            <dl></dl>
                            <span class="span"></span>
                        </div>
                    </a>
                </li>
                <li><a href="<?=isset($_SESSION['mid'])?'home/membercenter/index.php':'home/Login/Login.php'?>">用户中心</a></li>
            </ul>
        </div>
    </div>
    <div class="box logoBar">
        <div class="logo lf">
            <a href="index.php"><img src="<?=SKIN?>/images/logo.png"></a>
        </div>
        <div class="search lf">
            <form action="/home/searchGoods.php"  id="form">
                <input type="text" name="keywords" class="lf"  value="<?=isset($_GET['keywords'])?$_GET['keywords']:''?>" />
                <a href="javascript:document.getElementById('form').submit();" class="searchBtn lf">搜索</a>
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
                <li class="cateList">
                    <a href="#" class="category">全部商品分类</a>
                    <div id="nav">
                        <?php
                        foreach($cateInfo as $k=>$v){

                        ?>
                        <dl class="<?=$v['id']?>" onmouseover="show(this);" onmouseout="hid(this);">
                            <dt><?=$v['catename']?></dt>
                            <?php
                            $cate=selectMul("select * from category_shop where pid={$v['id']} limit 0,3");
                            foreach($cate as $v){
                            ?>
                                <dd><a href="#"><?=$v['catename']?></a></dd>
                            <?php
                            }
                            ?>
                            <div  class="nextList">
                                <div class="cateLeft">
                                   <!-- <div class="clist">
                                        <div class="listTitle">
                                            手机精品
                                            手机精品
                                        </div>
                                        <div class="listContent">
                                            <a href="#">绝对精品</a>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="cateRight">
                                    <img src="<?=SKIN?>/images/cateAd1.jpg" />
                                    <img src="<?=SKIN?>/images/cateAd1.jpg" />
                                    <img src="<?=SKIN?>/images/cateAd1.jpg" />
                                </div>
                            </div></dl>
                        <?php
                        }
                        ?>
                    </div>
                </li>
                <li class="current"><a href="#">首页</a></li>
                <li><a href="#">热卖专区</a></li>
                <li><a href="#">团购商城</a></li>
                <li><a href="#">积分兑换</a></li>
                <li><a href="#">品牌专卖</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- 头部结束 -->
<!-- 广告区域开始 -->

<style type="text/css">


</style>
<div class="box adArea">
    <div id="myFocus">
        <div class="pic" style="height:390px"><!--图片列表-->
            <ul>
                <li><a href="#1"><img src="<?=SKIN?>/images/banner1.jpg" width="1200pz" width="390pz" thumb="" alt="图片1" text="图片1更详细的描述文字" /></a></li>
                <li><a href="#2"><img src="<?=SKIN?>/images/banner2.jpg" thumb="" alt="图片2" text="图片2更详细的描述文字" /></a></li>
                <li><a href="#3"><img src="<?=SKIN?>/images/banner3.jpg" thumb="" alt="图片3" text="图片3更详细的描述文字" /></a></li>
            </ul>
        </div>
    </div>

</div>
<!-- 广告区域结束 -->
<!-- 商品展示开始 -->
<div class="box main">
    <!-- 一楼开始 -->
    <div class="floor">
        <div class="floorTitle floorOne">
            <span>1F 热卖专区</span>
        </div>
        <div class="floorContent">
            <div class="goodList lf">
                <ul>
                    <?php
                    foreach($oneFloorGoods as $oneGoods){
                        ?>
                        <li>
                            <a href="/home/goodsDetail.php?id=<?=$oneGoods['id']?>" title="<?=$oneGoods['goodsName']?>">
                                <img src="<?=UPLOAD.'/350/thumbImg_350_'.$oneGoods['pic']?>" alt="<?=$oneGoods['pic']?>" />
                                <span><?=mb_substr($oneGoods['goodsName'],0,18,'utf8').'...'?></span>
                            </a>
                            <p>￥<?=$oneGoods['price']?></p>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="goodAd rf">
                <img src="<?=SKIN?>/images/goods2.jpg" alt="">
                <span>这是我的第一个商城首页</span>
            </div>
        </div>
    </div>
    <!-- 一楼结束 -->
    <!-- 二楼开始 -->
    <div class="floor">
        <div class="floorTitle floorTwo">
            <span>2F 团购商城</span>
        </div>
        <div class="floorContent">
            <div class="goodList lf">
                <ul>
                    <?php
                    foreach($twoFloorGoods as $twoGoods){
                        ?>
                        <li>
                            <a href="/home/goodsDetail.php?id=<?=$twoGoods['id']?>" title="<?=$twoGoods['goodsName']?>">
                                <img src="<?=UPLOAD.'/350/thumbImg_350_'.$twoGoods['pic']?>" alt="<?=$twoGoods['pic']?>" />
                                <span><?=mb_substr($twoGoods['goodsName'],0,15,'utf8').'...'?></span>
                            </a>
                            <p>￥<?=$twoGoods['price']?></p>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="goodAd rf">
                <img src="<?=SKIN?>/images/goods2.jpg" alt="">
                <span>这是我的第一个商城首页</span>
            </div>
        </div>
    </div>
    <!-- 二楼结束 -->

    <!-- 三楼开始 -->
    <div class="floor">
        <div class="floorTitle floorThree">
            <span>3F 品牌专卖</span>
        </div>
        <div class="floorContent">
            <div class="goodList lf">
                <ul>
                    <?php
                    foreach($threeFloorGoods as $threeGoods){
                        ?>
                        <li>
                            <a href="/home/goodsDetail.php?id=<?=$threeGoods['id']?>" title="<?=$threeGoods['goodsName']?>">
                                <img src="<?=UPLOAD.'/350/thumbImg_350_'.$threeGoods['pic']?>" alt="<?=$threeGoods['pic']?>" />
                                <span><?=mb_substr($threeGoods['goodsName'],0,15,'utf8').'...'?></span>
                            </a>
                            <p>￥<?=$threeGoods['price']?></p>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="goodAd rf">
                <img src="<?=SKIN?>/images/goods2.jpg" alt="">
                <span>这是我的第一个商城首页</span>
            </div>
        </div>
    </div>
    <!-- 三楼结束 -->
    <!-- 四楼开始 -->
    <div class="floor">
        <div class="floorTitle floorThree">
            <span>4F 品牌专卖</span>
        </div>
        <div class="floorContent">
            <div class="goodList lf">
                <ul>
                    <?php
                    foreach($fourFloorGoods as $fourGoods){
                        ?>
                        <li>
                            <a href="/home/goodsDetail.php?id=<?=$fourGoods['id']?>" title="<?=$fourGoods['goodsName']?>">
                                <img src="<?=UPLOAD.'/350/thumbImg_350_'.$fourGoods['pic']?>" alt="<?=$fourGoods['pic']?>" />
                                <span><?=mb_substr($fourGoods['goodsName'],0,15,'utf-8').'...'?></span>
                            </a>
                            <p>￥<?=$fourGoods['price']?></p>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="goodAd rf">
                <img src="<?=SKIN?>/images/goods2.jpg" alt="">
                <span>这是我的第一个商城首页</span>
            </div>
        </div>
    </div>
</div>
<!-- 商品展示结束 -->

<!-- 尾部开始 -->
<div class="footer">

    <p>手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖</p>
    <p>版权所有：河南云和数据信息技术有限公司</p>
    <p>© CopyRight2016 All rights reserved.</p>
    <p>豫ICP备14003305号</p>
</div>
<!-- 尾部结束 -->
<!--返回顶部开始-->
<a href="#" class="goTop" id="goTop">返回顶部</a>
<!--返回顶部结束-->

<script type="text/javascript" src="<?=SKIN?>/js/myfocus-2.0.4.min.js"></script>
<script type="text/javascript">
    myFocus.set({
        id:'myFocus',//焦点图盒子ID
        pattern:'mF_taobaomall',//风格应用的名称
        time:3,//切换时间间隔(秒)
        trigger:'click',//触发切换模式:'click'(点击)/'mouseover'(悬停)
        width:1200,//设置图片区域宽度(像素)
        height:390,//设置图片区域高度(像素)
        txtHeight:0//文字层高度设置(像素),'default'为默认高度，0为隐藏
    });
</script>
<script type="text/javascript" src="<?=SKIN?>/js/public.js"></script>
</body>
</html>