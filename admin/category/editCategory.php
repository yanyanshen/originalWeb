<?php
include_once"../../config.php";
include_once"Category.php";
$cateList=getCateList();
//从分类列表里点击 编辑  然后 把这行的id 通过 href链接  连接到 编辑里   在编辑里  得到 这编辑的物品的id   通过$_GET[]接收
$id=$_GET['id'];
$cateInfo=selectOne("select * from category_shop where id=$id");
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
            <form action="categoryAction.php?act=edit" method="post">
                <ul class="forminfo">
                    <li><label>分类名称<b>*</b></label>
                        <input type="hidden" value="<?=$id?>" name="id"/>
                        <input name="catename" value="<?=$cateInfo['catename']?>" type="text"  class="dfinput"  style="width:340px;"/>
                    </li>
                    <li><label>上级分类<b>*</b></label>
                        <div class="vocation">
                            <select  class="select1" name="pid" >
                                <option value="0">顶级分类</option>
                                <?php
                                foreach($cateList as $val){
                                    ?>
                                    <option value="<?=$val['id']?>"<?=$val['id']==$cateInfo['pid']?'selected':''?>><?=$val['catename']?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    <li>
                        <label>&nbsp;</label><input type="submit" class="btn" value="确认编辑"/>
                    </li>
                </ul>
            </form>

        </div>
    </div>
</div>


</body>

</html>
