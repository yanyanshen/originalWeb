<?php
include_once"../../config.php";
connect();
$userInfo=selectOne("select password,username,id from home_user_login where id={$_SESSION['mid']}");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>账户设置</title>
<meta name="keywords" content="标题">
<meta name="description" content="内容">
<link type="text/css" rel="stylesheet" rev="stylesheet" href="../css/membercenter.css" />
<script type="text/javascript" src="../js/jQuery.1.8.2.min.js"></script>
<style type="text/css">
i{font-style:normal;}
a{ text-decoration:none;}
.main{margin-top:20px;margin-left:10px;}
.main .title{border-bottom:solid 1px #dfdfdf;}
.main .title span{height:30px;line-height:30px; padding:7px 20px;background-color:#F9F9F9;color:#444;font-size:14px; border:solid 1px #DFDFDF;border-bottom:none 0;font-weight:700;}
table .textright{ text-align:right;padding-left:50px; width:16%;}
table td{ padding:5px 0;background-color:#F9F9F9;}
table td input{width: 200px;height: 22px;line-height: 22px;padding: 5px 2px 5px 5px;border: 1px solid #DDD;margin-left:5px;}
table .pwd span{display:block;position:relative;margin-top:10px;}
table .pwd span b{position:absolute; top:0px;left:50px; border:solid 1px #dfdfdf;display:block; height:16px; width:130px;}
table td .btns{display:block;width:100px;height:30px;line-height:30px; text-align:center; background-color:#0093DD; color:#fff; border-radius:5px;font-size:14px;margin:20px 0;margin-left:240px;}
</style>
</head>

<body>
<div class="main">
	<p class="title"><span>更改密码</span></p>

    <form action="changeAction.php?act=changePwd" method="post" id="form2" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$userInfo['id']?>"/>
	<table cellpadding="0" cellspacing="0" width="100%">
    	<tr><td class="textright">用户名:&nbsp;</td><td><?=$userInfo['username']?></td></tr>
    	<tr><td class="textright">原密码：</td><td><input name="password" value="" type="password" /></td></tr>
    	<tr><td class="textright">新密码：</td><td class="pwd"><input name="newpwd" value="" type="password" /></td></tr>
    	<tr><td class="textright">再次输入新密码：</td><td><input name="respwd" value="" type="password" /></td></tr>
        <tr><td colspan="2"><a class="btns" href="javascript:document.getElementById('form2').submit();" target="_parent">保存</a></td></tr>
    </table>
    </form>
</div>
</body>
</html>
