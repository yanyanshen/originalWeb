<?php
include_once"../../config.php";
connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?=SKIN_ADMIN?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=SKIN_ADMIN?>/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=SKIN_ADMIN?>/js/jquery.js"></script>
<script type="text/javascript" src="<?=SKIN_ADMIN?>/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?=SKIN_ADMIN?>/js/select-ui.min.js"></script>
<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
    $(document).ready(function(e) {
        $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">系统设置</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">
        <form action="adminAction.php?act=add" method="post">
            <ul class="forminfo">
                <li><label>管理员名称<b>*</b></label>
                    <input name="username" value="" type="text" class="dfinput" placeholder="请填写分类名称" style="width:340px;"/>
                </li>
                <li><label>管理员密码<b>*</b></label>
                    <input name="password" value="" type="password" class="dfinput" placeholder="请填写分类名称" style="width:340px;"/>
                </li>
                    </div>
                <li>
                        <label>&nbsp;</label><input name="" type="submit" class="btn" value="添加管理员"/>
                </li>
            </ul>
        </form>
    
    </div> 
    </div>
    </div>


</body>

</html>
