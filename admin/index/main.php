<?php
include_once"../../config.php";
if(!isset($_SESSION['id'])){
    header("location:/admin/Login.php");
}
connect();
//登录时间
$res=selectOne("select lastlogin,lastip from user_shop where id={$_SESSION['id']}");
//登录的主机ip

//服务器软件
$softWare=$_SERVER['SERVER_SOFTWARE'];
//开发版本
$version=phpversion();
//mysql 版本
$sql="select version()";
$sqlVersion=selectOne($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link href="<?=SKIN_ADMIN?>/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=SKIN_ADMIN?>/js/jquery.js"></script>

</head>


<body>

	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
        </ul>
    </div>

    <div class="mainindex">
    
    
    <div class="welinfo">
        <span><img src="<?=SKIN_ADMIN?>/images/sun.png" alt="天气" /></span>
        <b>Admin早上好，欢迎使用后台管理系统</b>
    </div>
    
    <div class="welinfo">
        <span><img src="<?=SKIN_ADMIN?>/images/time.png" alt="时间" /></span>
        <i>您上次登录的时间：<?=date('Y-m-d H:i:s',$res['lastlogin'])?></i> <i>您上次登录IP：<?=$res['lastip']?></i> 如非本人操作，请及时更改密码
    </div>
    
    <div class="xline"></div>
    
 <!--    <ul class="iconlist">
 
    <li><img src="<?=SKIN_ADMIN?>/images/ico01.png" /><p><a href="#">管理设置</a></p></li>
    <li><img src="<?=SKIN_ADMIN?>/images/ico02.png" /><p><a href="#">发布文章</a></p></li>
    <li><img src="<?=SKIN_ADMIN?>/images/ico03.png" /><p><a href="#">数据统计</a></p></li>
    <li><img src="<?=SKIN_ADMIN?>/images/ico04.png" /><p><a href="#">文件上传</a></p></li>
    <li><img src="<?=SKIN_ADMIN?>/images/ico05.png" /><p><a href="#">目录管理</a></p></li>
    <li><img src="<?=SKIN_ADMIN?>/images/ico06.png" /><p><a href="#">查询</a></p></li>
         
 </ul>
 
   
 
 <div class="xline"></div> -->
    <div class="box"></div>
    
    <div class="welinfo">
        <span><img src="<?=SKIN_ADMIN?>/images/dp.png" alt="提醒" /></span>
        <b>服务器信息</b>
    </div>
    <ul class="infolist">
    <li><span>服务器软件：<?=$softWare?></span></li>
    <li><span>开发语言：<?=$version?></span></li>
    <li><span>数据库:  <?= 'MYSQL '.$sqlVersion['version()']?></span></li>
    </ul>
    
    <div class="xline"></div>
    
    <div class="uimakerinfo"><b>版权所有：易购网</b>(<a href="http://www.egoods.com" target="_blank">www.egoods.com</a>)</div>
    
 
    
    
    </div>
    
    

</body>

</html>
