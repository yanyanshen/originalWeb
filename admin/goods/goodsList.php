<?php
include_once"../../config.php";
connect();
//print_r($cateList);
//获取当前页
$curPage=isset($_GET['page'])?$_GET['page']:1;
//每页显示多少条
$pageId=4;
//一共有几页
$totalId=selectOne("select count(id) from goods_shop ");
//print_r($totalId);
$pageNum=ceil(($totalId['count(id)']/$pageId));

//每页从第几个开始
$offset=($curPage-1)*$pageId;
$goodsList=selectMul("select g.*,catename from goods_shop as g,category_shop as cate
 where g.cid=cate.id order by path limit $offset,$pageId");
//下一页
$prePage=($curPage==1)?1:$curPage-1;
//print_r($prePage);
//上一页
$nextPage=($curPage==$pageNum)?$pageNum:$curPage+1;
//print_r($nextPage);



//显示的页数
$showPage=5;

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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="<?=SKIN_ADMIN?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?=SKIN_ADMIN?>/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=SKIN_ADMIN?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?=SKIN_ADMIN?>/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="<?=SKIN_ADMIN?>/js/select-ui.min.js"></script>
    <script type="text/javascript" src="editor/kindeditor.js"></script>

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
        <div id="tab2" class="tabson">
            <ul class="seachform">
                <li><label>综合查询</label><input name="" type="text" class="scinput" /></li>
                <li><label>指派</label>
                    <div class="vocation">
                        <select class="select3">
                            <option>全部</option>
                            <option>其他</option>
                        </select>
                    </div>
                </li>
                <li><label>重点客户</label>
                    <div class="vocation">
                        <select class="select3">
                            <option>全部</option>
                            <option>其他</option>
                        </select>
                    </div>
                </li>
                <li><label>客户状态</label>
                    <div class="vocation">
                        <select class="select3">
                            <option>全部</option>
                            <option>其他</option>
                        </select>
                    </div>
                </li>
                <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
            </ul>


            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="<?=SKIN_ADMIN?>/images/px.gif" /></i></th>
                    <th>商品图片</th>
                    <th>商品名称</th>
                    <th>商品详情</th>
                    <th>商品分类</th>
                    <th>市场价格</th>
                    <th>商场价格</th>
                    <th>库存量</th>
                    <th>销售数量</th>
                    <th>发布时间</th>
                    <th>是否展示</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($goodsList as $k=>$v){
                    ?>
                    <tr>
                        <td><input name="" type="checkbox" value="" /></td>
                        <td><?=$offset+$k+1?></td>
                        <td><img src="<?=UPLOAD.'/100/thumbImg_100_'.$v['pic']?>" alt=""/></td>
                        <td><?=$v['goodsName']?></td>
                        <td><?=$v['detail']?></td>
                        <td><?=$v['catename']?></td>
                        <td>￥<?=$v['marketPrice']?></td>
                        <td>￥<?=$v['price']?></td>
                        <td><?=$v['num']?></td>
                        <td><?=$v['salenum']?></td>
                        <td><?=date('Y-m-d',$v['addtime'])?></td>
                        <td><?=$v['display']==1?'展示':'下架'?></td>
                        <td>
                            <a href="editGoods.php?id=<?=$v['id']?>" class="tablelink">编辑</a>
                            <a href="goodsAction.php?act=<?=$v['display']==1?'active':'display'?>&id=<?=$v['id']?>" class='tablelink'>
                                <?=$v['display']==1?'下架':'展示'?></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue"><?=$totalId['count(id)']?></i>条记录，当前显示第&nbsp;<i class="blue"><?=$curPage?>&nbsp;</i>页</div>
                <ul class="paginList">
                    <?php if($curPage>1){
                        ?>
                        <li class="paginItem"><a href="goodsList.php?page=1">首页</a></li>
                        <li class="paginItem"><a href="<?=$curPage==1?'javascript:;':'goodsList.php?page='.$prePage?>"><span class="pagepre"></span></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    for($i=$firstPage;$i<=$lastPage;$i++){
                        ?>
                        <li class="paginItem <?=($i==$curPage)?'current':''?>"><a href="goodsList.php?page=<?=$i?>"><?=$i?></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if($curPage<$pageNum) {
                        ?>
                        <li class="paginItem"><a href="<?=($curPage==$pageNum)?'javascript:;':'goodsList.php?page='.$nextPage?>"><span class="pagenxt"></span></a></li>
                        <li class="paginItem"><a href="goodsList.php?page=<?=$pageNum?>">尾页</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>


        </div>

    </div>

    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>





</div>


</body>

</html>
