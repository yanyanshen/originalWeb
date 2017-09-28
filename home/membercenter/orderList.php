<?php
include_once"../../config.php";
connect();
//print_r($_GET['ordersyn']);
//$orderStatus=$_GET['orderStatus'];

//print_r($_GET['orderStatus']);
$orderStatus=isset($_GET['orderStatus'])?$_GET['orderStatus']:"";
//print_r($orderStatus);
if(isset($_GET['orderStatus'])) {
    switch ($_GET['orderStatus']) {
        case 1:
            $where = ' and orderStatus=1';
            $orderStatus="&orderStatus=1";
            break;
        case 2:
            $where = ' and orderStatus=2';
            $orderStatus="&orderStatus=2";
            break;
        case 3:
            $where = ' and orderStatus=3';
            $orderStatus="&orderStatus=3";
            break;
        case 4:
            $where = ' and orderStatus=4';
            $orderStatus="&orderStatus=4";
            break;
        default :
            $where = '';
            $orderStatus='';
    }
}else{
    $where='';
    $orderStatus='';
}
//;


//分页搜索
//print_r($_GET['ordersyn']);
if(isset($_GET['ordersyn'])){
    $searchkeys=' and ordersyn like "%'.$_GET['ordersyn'].'%"';
    $keywords='&ordersyn='.$_GET['ordersyn'];
}else{
    $searchkeys='';
    $keywords='';
}

//print_r($cateList);
//获取当前页
$curPage=isset($_GET['page'])?$_GET['page']:1;
//每页显示多少条
$pageId=3;
//一共有几页
$totalId=selectOne("select count(id) from home_order_shop where mid={$_SESSION['mid']}");
$pageNum=ceil(($totalId['count(id)']/$pageId));
//每页从第几个开始
$offset=($curPage-1)*$pageId;
//时间  	addTime	ordersyn mid=$_SESSION['mid']	$_SESSION['userName']	订单状态 tatusName 	orderPrice  useropt	操作
$sql="select  addTime,ordersyn,statusName,orderPrice,o.id,useropt,orderStatus from home_order_shop o,home_orderstatus_shop s
where o.orderStatus=s.id and mid={$_SESSION['mid']} $where $searchkeys order by addTime  limit $offset,$pageId";
$orderList=selectMul($sql);
//下一页
$prePage=($curPage==1)?1:$curPage-1;
//print_r($prePage);
//上一页
$nextPage=($curPage==$pageNum)?$pageNum:$curPage+1;
//print_r($nextPage);



//显示的页数
$showPage=4;
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户中心-我的订单</title>
<meta name="keywords" content="标题">
<meta name="description" content="内容">
<link type="text/css" rel="stylesheet" rev="stylesheet" href="<?=SKIN?>/css/membercenter.css" />
<script type="text/javascript" src="<?=SKIN?>/js/jQuery.1.8.2.min.js"></script>
<style type="text/css">
a:hover{ text-decoration:none; color:#00A3EC!important;}
.infoul{text-align:center; padding:20px;}
.infoul li{ float:left;width:40%; margin:0 3% 0; margin-bottom:40px; height:110px; border:1px solid #ddd; padding:20px 0; background:#F6F6F6}
.infoul li p.infotime{font-size:16px;}
.infoul li .infodetail{ text-align:right; padding-right:20px;}
.infoul li .infodetail a{ font-size:14px; color:#0093DD}
.infotime{ height:40px; line-height:40px;}
.infomoney{ font-size:26px; font-weight:700;}
.news{ margin:10px; border:1px solid #0093DD; padding-bottom:10px;}
.news h1{padding: 10px 20px 0;}
.news h1 a{font-size:16px; font-weight:700;}
.news strong{ padding:5px 20px; display:block; color:#444;}
.news p{ padding:0 20px;}
.news h2{ font-size:18px; padding:8px 10px; border-bottom:1px solid #EEF2FB; background:#00A3EC; color:#fff; font-weight:700;}
</style>
</head>

<body>
<div class="buyer_day">
	<p class="select_title"><span>我的订单</span></p>
	<div class="day_select">
		<form action="orderList.php" method="get">
            <p class="day_time02">
                <input type="hidden" name="orderStatus" value="<?=$_GET['orderStatus']?>"/>
                <label>订单号:</label>
                <!--$_GET['ordersyn']是关键字-->
                <input type="text" name="ordersyn" value="<?=isset($_GET['ordersyn'])?$_GET['ordersyn']:''?>"/>
                <button  class="selbtn01" >搜索</button>
            </p>
    	</form>
	</div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="day_list">
        <?php
        if($orderList){
        ?>
        <thead>
        <tr>
            <th class="xuhao">编号</th>
            <th class="username">时间</th>
            <th class="userlogin">订单号</th>
            <th class="userpv">用户名</th>
            <th class="usertime">订单状态</th>
            <th class="userip">成交金额</th>
            <th class="websort">操作</th>
        </tr>
        </thead>
        <tbody id="pageBody">
        <?php
        foreach ($orderList as $k => $v) {
            switch($v['orderStatus']){
                case 1:
                    $act='topay';
                    break;
                case 3:
                    $act='receiveGoods';
                    break;
                default :
                    $act='';
            }
            ?>
            <tr>
                <td class="xuhao" style="color: #ff0000"><?=$offset+$k+1?></td>
                <td class="username"><?= date('Y-m-d',$v['addTime']) ?></td>
                <td class="userlogin"><a href="orderDetail.php?oid=<?=$v['id']?>"><?=$v['ordersyn'] ?></a></td>
                <td class="userpv"><a href="#"><?= $_SESSION['userName'] ?></a></td>
                <td class="usertime"><?=$v['statusName'] ?></td>
                <td class="userip"><?=$v['orderPrice'] ?></td>
                <td class="websort">
                    <a href="../cartAction.php?act=<?=$act?>&id=<?=$v['id']?>"><?=$v['useropt']?></a></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <?php
    }else{
        echo"你还没有订单呦";
    }
    ?>

    <div style="clear:both;"></div>
    <div class="listpage">
        <?php if ($curPage > 1) {
            ?>
            <a href="orderList.php?page=1<?=$orderStatus.$keywords?>">首页</a>
            <a href="<?=$curPage==1?'javascript:;':'orderList.php?page='.$prePage.$orderStatus.$keywords?>"><span
                    class="pagepre"><<</span></a>
        <?php
        }
        for ($i = $firstPage; $i <= $lastPage; $i++) {
            ?>
            <a class="paginItem <?= ($i == $curPage) ? 'current' : '' ?>"
               href="orderList.php?page=<?=$i.$orderStatus.$keywords?>"><?=$i?></a>
        <?php
        }
        if ($curPage < $pageNum) {
            ?>
            <a href="<?= ($curPage == $pageNum) ? 'javascript:;' : 'orderList.php?page='.$nextPage.$orderStatus.$keywords ?>"><span
                    class="pagenxt">>></span></a>
            <a href="orderList.php?page=<?=$pageNum.$orderStatus.$keywords?>">尾页</a>
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>
