<?php
include_once "../config.php";
connect();
$id=$_GET['id'];
//根据id获取商品信息
$goodsInfo=selectOne("select * from goods_shop where id=$id");
//根据id获取商品图片
$goodsPic=selectMul("select * from goods_pic_shop where gid=$id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>易购网-商品详情-<?=$goodsInfo['goodsName']?></title>
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/public.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/detail.css">
    <link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/jquery.jqzoom.css">
    <script type="text/javascript" src="<?=SKIN?>/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="<?=SKIN?>/layer/layer.js"></script>
    <script type="text/javascript" src="<?=SKIN?>/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?=SKIN?>/js/jquery.jqzoom-core.js"></script>

    <style>
        #form2 input{width: 200px;}
        .table label.error{color: #ff0000;font-size: 13px;padding: 0 20px;font-weight: bolder;
        margin-left: 10px;display: block}
        .table label.ok{color: #00a400;font-size: 13px;padding: 0 20px;font-weight: bolder;
            margin-left: 10px; display: block}
        .verifyerror{margin-left:75px;font-size: 14px;line-height: 30px;text-align: center;font-weight: bolder}
        .verifyok{color: green;font-size: 14px;line-height: 30px;text-align: center;font-weight: bolder}
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.jqzoom').jqzoom({
                zoomType: 'standard',
                lens:true,
                preloadImages: true,
                alwaysOn:false,
                title:false,
                zoomWidth:430,
                zoomHeight:430,
                xOffset:20,
                yOffset:0
            });

        });
//点击出现弹框
        function layerclick(){
            $(function(){
                $(".tobuy").click(function(){
                    layer.open({
                        type:1,
                        shade:false,
                        title:'登录',
                        content:"<div style='width: 300px;height: 300px;background: #ffff00;padding: 20px;'>" +
                        "<form action='cartAction.php?act=layerLogin' method='post' id='form2'>" +
                        "<table class='table'>" +
                        "<tr>" +
                        "<td>用户名：</td><td><input type='text' value='' name='username'/></td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td>密码：</td><td><input type='password' value='' name='pwd'/></td>" +
                        "</tr>" +
                        "<tr>" + "<td>验证码：</td><td ><input name='verify' style='width: 120px' type='text'  value=''/>" +
                        "<span><img src='/public/verify.php' onclick='this.src="+'"/public/verify.php"'+"'/></span></td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td colspan='2' style='width: 60px;height: 30px; border: 1px solid red'><span class='verify'></span></td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td></td><td><input id='btn1' type='submit' value='登录'/></td>" +
                        "</tr>" +
                        "</table>" +
                        "</form>" +
                        "</div>",
                        cancel:function(index){
                            layer.close(index);
                            layer.msg('byebye',{time:10000000,icon:6});
                        }
                    });
                    var validate=$("#form2").validate({
                        rules:{
                            username:{
                                required:true,
                                remote:{
                                    url:'cartAction.php?act=checkUsername',
                                    type:'post'
                                }
                            },
                            pwd:{
                                required:true
                            }
                        },
                        messages:{
                            username:{
                                required:"用户名不能为空",
                                remote:"此用户名不存在"
                            },
                            pwd:{
                                required:"密码不能为空"
                            }
                        },
                        success:function(label){
                            label.addClass("ok").text('验证通过');
                        },
                        validClass:'ok'
                    });

                   $("#form2").submit(function(){
                        var buyNum=$("#buynum").val();
                        if(validate.form()){
                            $.post('cartAction.php?act=layerLogin&gid=&buyNum='+buyNum,$("#form2").serialize(),function(response){
                                if($("#form2 input[name='pwd']").val()!=response.password){
                                    $("#form2 input[name='pwd']").next().text("用户名或密码错误");
                                 }else {
                                    location="createOrder.php?oid="+response.oid;
                                 }
                            },'json')
                        }
                        return false;
                    });

                });
                //验证码验证

                $("#form2 input[name='verify']").blur(function(){
                         var verify=$(this).val();
                    $.get('cartAction.php?act=verify&verify1='+verify,function(res){
                        if(res.nullword=='null'){
                            $(".verify").text('验证码不能为空');
                            $(".verify").addClass('verifyerror')
                        }
                        if(res.true=='true'){
                            $(".verify").text('验证码输入正确');
                            $(".verify").addClass('verifyok')
                        }if(res.false=='false'){
                            $(".verify").text('验证码输入错误，请重新输入');
                            $(".verify").addClass('verifyerror')
                        }
                    },'json')
                });
                //验证码验证
            })


        }
//现弹框结束
    </script>
</head>
<body>
<!--  头部开始 -->
<?php
include_once"./public/top.php";
?>
<!-- 头部结束 -->
<div class="box goodsinfo">
    <div class="lf leftinfo">
        <!--jQzoom开始-->

        <!--显示上面大图和放大镜-->
        <div>
            <a href="<?=UPLOAD.'/800/thumbImg_800_'.$goodsInfo['pic']?>" class="jqzoom" rel='gal1'  title="triumph" >
                <img src="<?=UPLOAD.'/350/thumbImg_350_'.$goodsInfo['pic']?>"  title="triumph" />
            </a>
        </div>
        <!--显示下面三张小图-->
        <div >
            <ul id="thumblist" class="clear" >
                <?php
                    foreach($goodsPic as $k=>$pic){
                    ?>
                    <li>
                        <a class="<?=$k?'':'zoomThumbActive'?>" href='javascript:void(0);'
                           rel="{gallery: 'gal1', smallimage: '<?=UPLOAD.'/350/thumbImg_350_'.$pic['picName']?>',
                           largeimage: '<?=UPLOAD.'/800/thumbImg_800_'.$pic['picName']?>'}">
                            <img width="50" src='<?=UPLOAD.'/100/thumbImg_100_'.$pic['picName']?>'/>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>

        <!--jQzoom结束-->
    </div>
    <div class="lf rightinfo">
        <div>
            <h2><?=$goodsInfo['goodsName']?></h2>
            <form action="cartAction.php?act=toBuy" method="post" enctype="multipart/form-data" id="form1">
                <input type="hidden" name="gid" value="<?=$id?>"/>
                <dl>
                    <dd>市场价：<span class='marketprice'>¥ <?=$goodsInfo['marketPrice']?><span></dd>
                    <dd>易购价：<span class='price'>¥<?=$goodsInfo['price']?><span></dd>
                    <dd>总销量：<span><?=$goodsInfo['salenum']?><span> &nbsp;&nbsp;现余库存：<span><?=$goodsInfo['num']?><span></dd>
                    <dd>上架时间：<span><?=date('Y-m-d',$goodsInfo['addtime'])?><span></dd>
                    <dd></dd>
                    <dd></dd>
                    <dd >
                        <span>购买数量:</span>
                        <a href="javascript:jian();" class="decrement">-</a>&nbsp;
                        <input name="buyNum" type="text" value="1"  id="buynum"/>&nbsp;
                        <a href="javascript:jia();" class="increment">+</a>
                    </dd>
                    <dd>
                        <div id="buy"><!--javascript:document.getElementById('form1').submit()-->
                            <a href="javascript:<?=(isset($_SESSION['mid'])&&$_SESSION['mid'])>0?"document.getElementById('form1').submit();":'layerclick();'?>" class="tobuy">立即购买</a>
                            <a href="javascript:document.getElementById('form1').action='cartAction.php?act=addCart';document.getElementById('form1').submit();" class="tocart" >加入购物车</a>
                        </div>
                    </dd>
                </dl>
            </form>
        </div>
    </div>
</div>

<!-- 尾部开始 -->
<?=include_once"../home/public/footer.php"?>
<!-- 尾部结束 -->
<!--返回顶部开始-->
<a href="#" class="goTop">返回顶部</a>
<!--返回顶部结束-->
</body>
<script type="text/javascript">
    $('.cateList').hide();
    function jian(){
        var buynum=document.getElementById('buynum').value;
        if(buynum>1){
            document.getElementById('buynum').value=parseInt(buynum)-1;
        }
    }

    function jia(){
        var buynum=document.getElementById('buynum').value;
        if(buynum<199){
            document.getElementById('buynum').value=parseInt(buynum)+1;
        }
    }

    document.getElementById('buynum').onkeyup=function(){
        if(this.value<1){
            this.value=1;
        }
        if(this.value>199){
            this.value=199;
        }
        if(isNaN(this.value)){
            this.value=1;
        }
    };


</script>
</html>