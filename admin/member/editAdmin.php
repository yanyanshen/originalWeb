<?php
include_once"../../config.php";
connect();
@$id=$_GET['id'];
$adminInfo=selectOne("select * from home_user_login where  id=$id");
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
            <form action="adminAction.php?act=edit" method="post">
                <ul class="forminfo">
                    <li><label>会员名称<b>*</b></label>
                        <input name="id"  type="hidden" value="<?=$id?>"/>
                        <span><?=$adminInfo['username']?></span>
                    </li>
                    <li><label>会员手机<b>*</b></label>
                        <input name="moblie" value="<?=$adminInfo['moblie']?>" type="text" class="dfinput" placeholder="请填写会员手机号" style="width:340px;"/>
                    </li>
                    <li><label>会员qq<b>*</b></label>
                        <input name="qq" value="<?=$adminInfo['qq']?>" type="text" class="dfinput" placeholder="请填写会员qq" style="width:340px;"/>
                    </li>
                    <li><label>会员emil<b>*</b></label>
                        <input name="emil" value="<?=$adminInfo['emil']?>" type="text" class="dfinput" placeholder="请填写会员emil" style="width:340px;"/>
                    </li>

        </div>
        <li>
            <label>&nbsp;</label><input name="" type="submit" class="btn" value="确认编辑"/>
        </li>
        </ul>
        </form>

    </div>
</div>


</body>

</html>

