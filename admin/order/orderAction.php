<?php
include_once"../../config.php";
connect();
function sendGoods(){
    //print_r($_GET['id']);
    $id=$_GET['id'];
    if(update("home_order_shop",array("orderStatus"=>"3"),"id={$id}")){
        echo "<script>alert('发货成功');location='orderList.php'</script>";
    }
}
switch($act=$_GET['act']){
    case 'sendGoods':
        sendGoods();
        break;
}
