<?php
include_once"../../config.php";
include_once"Category.php";
$cateList=getCateList();
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
    <script type="text/javascript" src="<?=SKIN?>/js/kindeditor/kindeditor-all-min.js"></script>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true
            });
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
        <li><a href="#">商品管理</a></li>
        <li><a href="#">商品发布</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="goodsAction.php?act=add" method="post" enctype="multipart/form-data">
                <ul class="forminfo">
                    <li><label>商品名称<b>*</b></label>
                        <input name="goodsName" value="" type="text" class="dfinput" style="width:340px;"/>
                    </li>
                    <li><label>商品分类<b>*</b></label></li>
                        <div class="vocation">
                            <select  class="select1" name="cid" >
                                <option value="0">顶级分类</option>
                                <?php
                                foreach($cateList as $val){
                                    ?>
                                    <option value="<?=$val['id']?>"><?=$val['catename']?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    <li><label>市场价格<b>*</b></label>
                        <input name="marketPrice" value="" type="text" class="dfinput"  style="width:340px;"/>
                    </li>
                    <li><label>商城价格<b>*</b></label>
                        <input name="price" value="" type="text" class="dfinput"  style="width:340px;"/>
                    </li>
                    <li><label>商品数量<b>*</b></label>
                        <input name="num" value="" type="text" class="dfinput"  style="width:340px;"/>
                    </li>
                    <li><label>商品主图<b>*</b></label>
                        <input name="file[]" type="file"  style="width:340px;"/>
                    </li>
                    <li><label>商品副图<b>*</b></label>
                        <input name="file[]" type="file"  style="width:340px;"/>
                        <input name="file[]" type="file"  style="width:340px;"/>
                        <input name="file[]" type="file"  style="width:340px;"/>
                        <input name="file[]" type="file"  style="width:340px;"/>
                    </li>
                    <li><label>商品详情<b>*</b></label>
                        <textarea id="content7" name="detail"  style="width:700px;height:250px;visibility:hidden;"></textarea>
                    </li>
                    <li>
                        <label>&nbsp;</label><input type="submit" class="btn" value="添加商品"/>
                    </li>
                </ul>
            </form>

        </div>
    </div>
</div>


</body>

</html>
