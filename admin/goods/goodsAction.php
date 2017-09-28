<?php
include_once"../../config.php";
include_once"upload.inc.php";
connect();
function addGoods(){
    $goods['goodsName']=trim($_POST['goodsName']);
    $goods['cid']=trim($_POST['cid']);
    $goods['marketPrice']=trim($_POST['marketPrice']);
    $goods['price']=trim($_POST['price']);
    $goods['num']=trim($_POST['num']);
    $goods['detail']=trim($_POST['detail']);
    $goods['addtime']=time();
    //将商品信息下插入到数据表
    $id=insert('goods_shop',$goods);
    //上传图片
    $picArr=upload(UPLOAD_DIR);
   // print_r($picArr);
    //遍历得到的图片 将其插入到 图片数据库里
   foreach($picArr as $val){
       if(isset($val['filename'])&&$val['filename']){
           $arr['gid']=$id;
           $arr['picName']=$val['filename'];
            insert('goods_pic_shop',$arr);
           //生成缩略图
           getThumb(UPLOAD_DIR."/{$val['filename']}",800,UPLOAD_DIR.'/800');
           getThumb(UPLOAD_DIR."/{$val['filename']}",350,UPLOAD_DIR.'/350');
           getThumb(UPLOAD_DIR."/{$val['filename']}",100,UPLOAD_DIR.'/100');
       }
   }
    //将商品的主图更新到 goods_shop表里
    if(update("goods_shop",array("pic"=>$picArr[0]['filename']),"id=$id")){
        echo"<script>alert('商品发布成功，请继续添加商品');location='addGoods.php'</script>";
    }else{
        echo"<script>alert('商品主图更新失败，请重新更新');location='addGoods.php'</script>";
    }
}

function displayGoods(){
    $id = $_GET['id'];
    $sql="update goods_shop set display=1 where id=$id";
    if(mysql_query($sql)){
        echo "<script>alert('分类激活成功');location='goodsList.php'</script>";
    }else{
        echo "<script>alert('分类激活失败，请一会再试试！');location='goodsList.php'</script>";
    }
}
function activeGoods()
{
    $id = $_GET['id'];
    $sql="update goods_shop set display=0 where id=$id";
    if(mysql_query($sql)){
        echo "<script>alert('分类下架成功');location='goodsList.php'</script>";
    }else{
        echo "<script>alert('分类下架失败，请一会再试试！');location='goodsList.php'</script>";
    }
}

//商品编辑
function editGoods(){
    $id=$_POST['id'];
    $arr['goodsName']=$_POST['goodsName'];
    $arr['price']=$_POST['price'];
    $arr['marketPrice']=$_POST['marketPrice'];
    $arr['num']=$_POST['num'];
    $arr['detail']=$_POST['detail'];
    if(update("goods_shop",$arr,"id=$id")){
        echo "<script>alert('编辑成功，请继续编辑！');location='editGoods.php'</script>";
    }else{
        echo "<script>alert('编辑失败，请稍后继续编辑！');location='editGoods.php'</script>";
    }
}





$act=$_GET['act'];
switch($act){
    case 'add':
        addGoods();
        break;
    case 'active':
        activeGoods();
        break;
    case 'display':
        displayGoods();
        break;
    case 'edit':
        editGoods();
        break;
}