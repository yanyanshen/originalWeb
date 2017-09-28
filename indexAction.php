<?php
include_once"config.php";
connect();

function getCateName($path){
    //查每顶级的名字
    $res = selectMul("select catename,id from category_shop where $path=pid");
    foreach($res as $k=> $v) {
        $res[$k]['cate'] = selectMul("select catename from category_shop where {$v["id"]}=pid");
    }
    $arr=json_encode($res);
    return $arr;
}
//print_r(getCateName(12));
if(isset($_GET)&&$_GET){
    $act=$_GET['act'];
    $path=$_GET['path'];
    //$path1=$_GET['path1'];
    switch($act){
        case 'cateName';
            echo getCateName($path);
            break;
        default :
            echo 'bye';
    }
}else{
    $_GET=array();
}






/*$memcache=new memcache;
$memcache->connect("127.0.0.1",'11211');
$path=$_GET['path'];
if(!$memcache->get("arr")){
    try{
    $dsn="mysql:host=127.0.0.1;port=3306;dbname=shop;";
    //连接数据库
    $pdo=new PDO($dsn,"root",'root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $pdo->exec("set names utf8");
    $statement=$pdo->query("select * from category_shop where path in ($path) and path=pid");
     $res=$statement->fetchAll(PDO::FETCH_ASSOC);
     $memcache->set("arr",$res,false,1);
    }catch (PDOException $e){
        $e->getMessage();
    }
}else{
    $res=$memcache->get("arr");
    //print_r($res);
    $arr=json_encode($res);
    echo $arr;
}*/

//echo $path =$_GET['path1'];


