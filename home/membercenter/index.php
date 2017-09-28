<?php
include_once"../../config.php";
if(!isset($_SESSION['mid'])){
    header("location:../Login/Login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>易购网-用户中心</title>
	<link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/public.css">
	<link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/index.css">
	<link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/shopcart.css">
	<script type="text/javascript" src="<?=SKIN?>/js/jQuery.1.8.2.min.js"></script>
</head>
<body>
<!--  头部开始 -->
	<div class="box">
		<iframe name="topFrame" src="membertop.php"  frameborder="0" width="1200" height="70" scrolling="no"></iframe>
	</div>
	<div style="width:100%;height:3px;background-color:#ccc;"></div>
<!-- 头部结束 -->
<div class="box main">
	<div class="lf">
		<iframe name="leftFrame" src="memberleft.php" frameborder="0" width="195" height="1000" scrolling="no"></iframe>
	</div>
	<div class="rf">
		<iframe name="main" src="orderList.php"  frameborder="0" width="1000"  height="1000" scrolling="no"></iframe>
	</div>

</div>

<div style="clear:both;"></div>
<?php
include_once"../public/footer.php";
?>
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