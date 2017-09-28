<?php
include_once "../config.php";
connect();
//print_r($_POST['id']);
//确认商品 id 已经传过来了
function addCart(){
    $gid=$_POST['gid'];
    $buyNum=$_POST['buyNum'];
    $addTime=time();
    if(isset($_SESSION['mid']) && $_SESSION['mid']>0){
        //用户登录的情况下，直接写数据库
        //判断一下购物车数据表中是否有该用户的该 商品信息，如果有只需要增加购买数量
        $mid=$_SESSION['mid'];
        if($cartInfo=selectOne("select id from home_cart_shop where gid=$gid and mid=$mid")){
            //print_r($cartInfo);
            //如果$cartInfo为真 说明购物车里 有这个产品  然后就更新 这数据库 使其 数目增加 添加时间变化 而其他不变
            $sql="update home_cart_shop set buyNum=buyNum+$buyNum,addTime=$addTime where id={$cartInfo['id']}";
            mysql_query($sql);
        }else{
            $cartInfo['gid']=$gid;
            $cartInfo['mid']=$mid;
            $cartInfo['buyNum']=$buyNum;
            $cartInfo['addTime']=$addTime;
            insert('home_cart_shop',$cartInfo);
        }
    }else {
        //print_r(selectOne("select * from home_cart_shop where gid=$gid"));
        //用户未登陆的时候，将购物车的东西写入session
        //加购物车前先判session内是否有该商品
        if (isset($_SESSION['cart'][$gid]) && $_SESSION['cart'][$gid] > 0) {
            $_SESSION['cart'][$gid]['buyNum'] += $buyNum;
            $_SESSION['cart'][$gid]['addTime'] = $addTime;
        } else {
            $cart['gid'] = $gid;
            $cart['buyNum'] = $buyNum;
            $cart['addTime'] = $addTime;
            $_SESSION['cart'][$gid] = $cart;
        }
    }
    header("location:addCartSuccess.php?gid=$gid");
}

function delCartByGid(){
    $gid=$_GET['id'];
    //未登陆之前  删除session里的产品信息
    if(isset($_SESSION['mid'])&&$_SESSION['mid']>0){
        deleteMsg("home_cart_shop","mid={$_SESSION['mid']} and gid=$gid");
        header("location:cartList.php");
    }else{
        //print_r($_SESSION['cart']);
        unset($_SESSION['cart'][$gid]);
        echo"<script>alert('删除成功');location='cartList.php'</script>";
    }
}

function createOrder(){
    //print_r($_POST);
    if(isset($_SESSION['mid'])&&($mid=$_SESSION['mid'])>0){
        //将 信息写入订单表
        $order['ordersyn']=date('Ymd').substr(uniqStr(),0,15);
        $order['mid']=$mid;
        $order['addTime']=time();
        $order['orderPrice']=$_POST['orderprice'];
        //insert函数返回的是插入的id号
        $oid=insert("home_order_shop",$order);
       // print_r($oid);
        //将商品表写入商品订单表
        foreach($_POST['chk'] as $gid){
            //print_r($v);
            $date['oid']=$oid;
            $date['gid']=$gid;
            $date['buyNum']=$_POST['buyNum'.$gid];
            //print_r($_POST['buyNum'.$gid]);
            $rows=insert("home_orderGoods_shop",$date);
            //print_r($rows);
        }if($rows){
            header("location:createOrder.php?oid={$oid}");
        }
    }else{
        $_SESSION['url']='/home/cartList.php';
        echo"<script>alert('请先登陆');location='./Login/Login.php'</script>";
    }
}


function toBuy(){
    // print_r($_POST);
    $gid=$_POST['gid'];
    // print_r($_SESSION);
    if(isset($_SESSION['mid'])&&($mid=$_SESSION['mid'])>0){
        $goodsInfo=selectOne("select price from goods_shop where id=$gid");
        //print_r($goodsInfo);
        $order['ordersyn']=date('Ymd').substr(uniqStr(),0,15);
        $order['mid']=$mid;
        $buyNum=$_POST['buyNum'];
        $order['orderPrice']=$goodsInfo['price']*$buyNum;
        $order['addTime']=time();
        //print_r($order);
        $oid=insert("home_order_shop",$order);
        //将商品写入商品订单表
        $date['oid']=$oid;
        $date['gid']=$gid;
        $date['buyNum']=$buyNum;
        //print_r($date);
        $rows=insert("home_orderGoods_shop",$date);
        if($rows){
            header("location:createOrder.php?oid={$oid}");
        }
    }else{
        $_SESSION['url']="/home/goodsDetail.php?id={$gid}";
        echo"<script>alert('请先登陆您的账户');location='Login/Login.php'</script>";
    }
}



function submitOrdersyn(){
    $oid=$_GET['oid'];
    $idnum=selectMul("SELECT gid FROM home_ordergoods_shop where oid=$oid");
//print_r($idnum);

    foreach ($idnum as $v) {
        //print_r($v);
        $arr[]=$v['gid'];
    }
//得出提交订单后的商品的id集合   删除购物车里 在这个id集合的商品 gid
    $str=join(',',$arr);
//print_r($str);
    //判断此物品是否在够我购物车里
    $res=selectOne("SELECT g.id,num,salenum goodsName FROM `goods_shop` as g,home_ordergoods_shop as o,home_order_shop as s
,home_cart_shop as c  where c.gid=g.id and g.id=o.gid and s.id=o.oid and c.mid={$_SESSION['mid']} and oid=$oid");
    if(!$res==array()){
        deleteMsg("home_cart_shop","mid={$_SESSION['mid']} and gid in ($str)");
        $result=update("home_order_shop",array("orderStatus"=>2),"id={$oid} and mid={$_SESSION['mid']}");
    }else{
        $result=update("home_order_shop",array("orderStatus"=>2),"id={$oid} and mid={$_SESSION['mid']}");
    }

// "delete from home_cart_shop where id in($str)";
    if($result){
        //不付款则是待付款状态


        //若付款
        //更新订单状态为 已付款
        //如果付款


        //更新goods_shop 表里的num和salenum
        $goodsInfo = selectMul("SELECT g.id,num,salenum,SUM(buyNum) as count,goodsName FROM `goods_shop` as g,home_ordergoods_shop as o,home_order_shop as s
        where g.id=o.gid and s.id=o.oid and mid={$_SESSION['mid']} and oid={$oid} GROUP BY g.id");
        //print_r($goodsInfo);
       /* foreach ($goodsInfo as $k => $v) {
            for ($i = 0; $i <= $k; $i++) {
                if ($i == $k) {
                    $id = $goodsInfo[$k]['id'];
                   // print_r($id)
                    if(isset($goodsInfo[$i]['salenum'])&&$goodsInfo[$i]['salenum']){
                        $sql="update goods_shop set salenum=salenum+{$goodsInfo[$i]['count']},num=num-{$goodsInfo[$i]['count']} where id=$id";
                        mysql_query($sql);
                    }else{
                        $sql="update goods_shop set salenum={$goodsInfo[$i]['count']},num=num-{$goodsInfo[$i]['count']} where id=$id";
                       mysql_query($sql);
                    }
                    //  print_r($res);
                }
            }
        }*/

        foreach ($goodsInfo as $k => $v) {
                    // print_r($id)
                    if(isset($v['salenum'])&&$v['salenum']){
                        $sql="update goods_shop set salenum=salenum+{$v['count']},num=num-{$v['count']} where id={$v['id']}";
                        mysql_query($sql);
                    }else{
                        $sql="update goods_shop set salenum={$v['count']},num=num-{$v['count']} where id={$v['id']}";
                        mysql_query($sql);
                    }
                    //  print_r($res);
            }
        }
        header("location:submitSuccess.php?oid={$oid}");

}


function topay(){
//print_r($_GET['id']);
    $id=$_GET['id'];
    //点完付款将订单状态 变为 已付款 状态 也就是home_order_shop里的orderStatus的值更新为 2
    $res=update("home_order_shop",array('orderStatus'=>'2'),"id={$id}");


    //根据商品的状态查询商品的销售数量和库存量
   $goodsInfo = selectMul("SELECT g.id,num,salenum,SUM(buyNum) as count,goodsName FROM `goods_shop` as g,home_ordergoods_shop as o,home_order_shop as s
        where g.id=o.gid and s.id=o.oid  and oid=$id GROUP BY g.id");
 /*   foreach ($goodsInfo as $k => $v) {
        for ($i = 0; $i <= $k; $i++) {
            if ($i == $k) {
                $id = $goodsInfo[$k]['id'];
                // print_r($id)
                if(isset($goodsInfo[$i]['salenum'])&&$goodsInfo[$i]['salenum']){
                    $sql="update goods_shop set salenum=salenum+{$goodsInfo[$i]['count']},num=num-{$goodsInfo[$i]['count']} where id=$id";
                    $res= mysql_query($sql);
                }else{
                    $sql="update goods_shop set salenum={$goodsInfo[$i]['count']},num=num-{$goodsInfo[$i]['count']} where id=$id";
                    $res=mysql_query($sql);
                }
                //  print_r($res);
            }
        }
    }*/
    foreach ($goodsInfo as $k => $v) {
        // print_r($id)
        if(isset($v['salenum'])&&$v['salenum']){
            $sql="update goods_shop set salenum=salenum+{$v['count']},num=num-{$v['count']} where id={$v['id']}";
            mysql_query($sql);
        }else{
            $sql="update goods_shop set salenum={$v['count']},num=num-{$v['count']} where id={$v['id']}";
            mysql_query($sql);
        }
        //  print_r($res);
    }

    if($res){
        echo"<script>alert('付款成功');location='membercenter/orderList.php'</script>";
    }

}

function receiveGoods(){
    $id=$_GET['id'];
    if(update("home_order_shop",array('orderStatus'=>'4'),"id={$id}")){
        echo"<script>alert('订单完成');location='membercenter/orderList.php'</script>";
    }
}


function getCart(){
    $goodsInfo=array();
    if(isset($_SESSION['mid'])&&($mid=$_SESSION['mid'])>0){
        $goodsInfo=selectMul("select goodsName,pic,price,buyNum,gid,(price*buyNum) as totalprice from goods_shop as g,home_cart_shop as c where g.id=c.gid and mid=$mid ORDER by c.addTime desc");
        // print_r($goodsInfo);

    }else{
        //未登陆的时候 信息从 session里拿   session 里是个数组  遍历这个数组
        //session 里有物品的gid 通过物品的gid 从goods表里 拿物品的信息
        foreach(array_reverse($_SESSION['cart']) as $k=> $v){
            //print_r($v);
            $goodsInfo[$k]=selectOne("select goodsName,pic,price,id as gid from goods_shop where id={$v['gid']}");
            $goodsInfo[$k]['buyNum']=$v['buyNum'];
            $goodsInfo[$k]['totalprice']=$goodsInfo[$k]['buyNum']*$goodsInfo[$k]['price'];
        }
    }
    $goodsInfo=json_encode($goodsInfo);
    return $goodsInfo;
}

function delCart (){
        $gid=$_GET['id'];
    //print_r($gid);
        //未登陆之前  删除session里的产品信息
        if(isset($_SESSION['mid'])&&$_SESSION['mid']>0){
            deleteMsg("home_cart_shop","mid={$_SESSION['mid']} and gid=$gid");
            /*header("location:../index.php");*/
        }else{
            //print_r($_SESSION['cart']);
            unset($_SESSION['cart'][$gid]);
            /*echo"删除成功";*/
        }
}

//插件validate验证
function checkUsername(){
    $username=trim($_POST['username']);
    //$pwd=trim($_POST['pwd']);
    $res=selectOne("select id from home_user_login where username='{$username}'");
    if($res>0){
        return 'true';
    }else{
        return 'false' ;
    }
}
function layerLogin(){
    $gid=$_GET['gid'];
    $username=$_POST['username'];
    $pwd=$_POST['pwd'];
    $res=selectOne("select id,username,password from home_user_login where username='{$username}' and password='{$pwd}'");
    if($res>0){
       $_SESSION['mid']= $res['id'];
        $_SESSION['userName']=$username;
        $goodsInfo=selectOne("select price from goods_shop where id=$gid");
        //print_r($goodsInfo);
        $order['ordersyn']=date('Ymd').substr(uniqStr(),0,15);
        $order['mid']=$_SESSION['mid'];
        $buyNum=$_GET['buyNum'];
        $order['orderPrice']=$goodsInfo['price']*$buyNum;
        $order['addTime']=time();
        //print_r($order);
        $oid=insert("home_order_shop",$order);
        //将商品写入商品订单表
        $date['oid']=$oid;
        $date['gid']=$gid;
        $date['buyNum']=$buyNum;
        //print_r($date);
        $rows=insert("home_orderGoods_shop",$date);
        if($rows){
            $res['oid']=$oid;
            return json_encode($res);
        }else{
            return false;
        }
        //return $date;
    }else{
        return "false";
    }
}

function verify(){
    if(strtolower($_GET['verify1'])==''){
        $arr['nullword']='null';
    }elseif(strtolower($_GET['verify1'])!=strtolower($_SESSION['text'])){
            $arr['false']= 'false';
    }else{
        $arr['true']='true';
    }
    return json_encode($arr);
}



switch($_GET['act']){
    case 'addCart':
        addCart();
        break;
    case 'toBuy':
        toBuy();
        break;
    case 'delCartByGid':
        delCartByGid();
        break;
    case 'createOrder':
        createOrder();
        break;
    case 'topay':
        topay();
        break;
    case 'receiveGoods':
        receiveGoods();
        break;
    case 'submitOrdersyn':
        submitOrdersyn();
        break;
    case 'getCart':
        echo getCart();
        break;
    case 'delCart':
        delCart();
        break;
    case 'checkUsername':
        echo checkUsername();
        break;
   case 'layerLogin':
        echo layerLogin();
        break;
    case 'verify';
        echo verify();
        break;
    default :
        echo"Bye";
}

