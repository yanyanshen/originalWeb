<?php
include_once"../config.php";
//print_r($_GET['keywords']);
connect();
//print_r($_GET['keywords']);
if(isset($_GET['keywords'])&&$_GET['keywords']){
    $search='like "%'.$_GET['keywords'].'%"';
    $keywords='&keywords='.$_GET['keywords'];
}else{
    $search='';
    $keywords='';
}
//$keywords=isset($_GET['keywords'])?$_GET['keywords']:'';
//获取当前页
$curPage=isset($_GET['page'])?$_GET['page']:1;
//每页显示多少条
$pageId=5;
//一共有几页
$totalId=selectOne("select count(id)  from goods_shop where goodsName $search");

$pageNum=ceil(($totalId['count(id)']/$pageId));
//每页从第几个开始
$offset=($curPage-1)*$pageId;
//时间  	addTime	ordersyn mid=$_SESSION['mid']	$_SESSION['userName']	订单状态 tatusName 	orderPrice  useropt	操作


if(isset($_GET['act'])&&$_GET['act']){
    if($_GET['act']=='addtime'){
        $goodsInfo = selectMul("select * from goods_shop where goodsName $search order by addtime desc limit $offset,$pageId");
    }if($_GET['act']=='price'){
        $goodsInfo = selectMul("select * from goods_shop where goodsName $search order by price desc limit $offset,$pageId");
    }if($_GET['act']=='salenum'){
        $goodsInfo = selectMul("select * from goods_shop where goodsName $search order by salenum desc limit $offset,$pageId");
    }
}else{
    $goodsInfo = selectMul("select * from goods_shop where goodsName $search limit $offset,$pageId");
}


//下一页
$prePage=($curPage==1)?1:$curPage-1;
//print_r($prePage);
//上一页
$nextPage=($curPage==$pageNum)?$pageNum:$curPage+1;
//print_r($nextPage);



//显示的页数
$showPage=3;
if($pageNum<=$showPage){
    $firstPage=1;
    $lastPage=$pageNum;
}else{
    if($curPage<=ceil($showPage/2)){
        $firstPage=1;
        $lastPage=$showPage;
    }else{
        $firstPage=$curPage-floor($showPage/2);
        if($showPage%2){
            $lastPage=$curPage+floor($showPage/2);
        }else{
            $lastPage=$curPage+floor($showPage/2)-1;
        }
    }
    if($lastPage>$pageNum){
        $firstPage=$pageNum-$showPage+1;
        $lastPage=$pageNum;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索页</title>
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/public.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/search.css">
    <script type="text/javascript" src="<?=SKIN?>/js/jQuery.1.8.2.min.js"></script>
</head>
<body>
<?php
include_once"public/top.php"
?>
<!-- 头部结束 -->
<div class="box main">
    <div class="rqphtitle">当前搜索条件：<a href="#"><?=isset($_GET['keywords'])?$_GET['keywords']:''?></a></div>
    <div class="pxtitle">
        <div style=" float:left;">
            <a href="searchGoods.php?act=addtime<?=$keywords?>" class="active">发布时间降序排列</a>
            <a href="searchGoods.php?act=price<?=$keywords?>" style=" margin-left:30px;">商品价格降序排序</a>
            <a href="searchGoods.php?act=salenum<?=$keywords?>" onclick="sort(this)" style=" margin-left:30px;">销售数量降序排序</a>
        </div>
        <span>共搜索到<i style="color:#FF0000; margin:3px; font-size:14px; font-weight:700;"><?=isset($totalId['count(id)'])?$totalId['count(id)']:''?></i>件商品</span>
    </div>
    <?php
    if(isset($goodsInfo)){
    ?>
    <div class="pxlistcon">
        <div class="pxlist" >
            <ul>
                <?php
                foreach($goodsInfo as $v){
                ?>
                <li>
                    <a href="goodsDetail.php?id=<?=$v['id']?>" title="<?=$v['goodsName']?>">
                        <img src="<?=UPLOAD.'/350/thumbImg_350_'.$v['pic']?>" alt="<?=$v['goodsName']?>" />
                        <span><?=mb_substr($v['goodsName'],0,18,'utf8').'...'?></span>
                    </a>
                    <p>￥<?=$v['price']?></p>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div style="clear:both;"></div>
    <div class="listpage">
        <?php if ($curPage > 1) {
            ?>
            <a href="searchGoods.php?page=1<?=$keywords?>">首页</a>
            <a href="<?=$curPage==1? 'javascript:;':'searchGoods.php?page='.$prePage.$keywords ?>"><span
                    class="pagepre"><<</span></a>
        <?php
        }
        for ($i = $firstPage; $i <= $lastPage; $i++) {
            ?>
            <a class="paginItem <?=($i==$curPage) ? 'current' : '' ?>"
               href="searchGoods.php?page=<?=$i.$keywords?>"><?=$i ?></a>
        <?php
        }
        if ($curPage < $pageNum) {
            ?>
            <a href="<?=($curPage==$pageNum) ? 'javascript:;':'searchGoods.php?page='.$nextPage.$keywords ?>"><span
                    class="pagenxt">>></span></a>
            <a href="searchGoods.php?page=<?=$pageNum.$keywords ?>">尾页</a>
        <?php
        }
        ?>
    </div>
    <?php
    }else{
        echo"<h1 style='font-size: 30px;text-align: center;margin-bottom: 40px;'>没有符合条件的产品</h1>";
    }
    ?>
</div>
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