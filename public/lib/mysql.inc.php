<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 12:39
 */
//连接函数库
include_once 'common.inc.php';
function connect(){
    $connect=mysql_connect(DB_HOST.':'.DB_PORT,DB_USER,DB_PWD) or die("数据服务连接失败：错误号为：".mysql_errno());
    mysql_set_charset('utf8');
    mysql_select_db(DB_NAME) or die("数据库连接失败：错误号为：".mysql_errno());
    //print_r($connect) ;
    return $connect;
}
//查询一条记录
//$sql='select id,goodName from goods';
function selectOne($sql,$result_type=MYSQL_ASSOC)
{
    if ($result = mysql_query($sql)) {
        if (mysql_num_rows($result) > 0) {
            $row = mysql_fetch_array($result, $result_type);
            return $row;
        } else{
            return false;
        }
    } else {
        return false;
    }
}
//查询多行记录
//$sql='select id,goodName from goods';
function selectMul($sql,$result_type=MYSQL_ASSOC){
    if($result=mysql_query($sql)){
        if(mysql_num_rows($result)>0){
            while( $row=mysql_fetch_array($result,$result_type)){
                $arr[]=$row;
            }
            return $arr;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

//更新数据并返回手影响的记录条数
//update 表名 set 字段名='值',字段名='值',...... where 语句
//array('goodsName'=>'iphone 7','price'=>'5200')

function update($table,$arr,$where=null){
    $str='';
    foreach($arr as $k=>$v){
        $str.=$k."=".'"'.$v.'"'.',';
    }
    $str=substr($str,0,-1);
    $w=$where==null?null:' where '.$where;
    $update="update {$table} set {$str} {$w}";
    //print_r($update);
    if(mysql_query($update)){
        if(mysql_affected_rows()>0){
            return mysql_affected_rows();
        }else{
            return false;
        }
    }else{
        return false;
    }
}




function insert($table,$arr){
    $key=join(',',array_keys($arr));
    $value=join('"'.','.'"',array_values($arr));
    $sql="insert into $table(".$key.") values(".'"'.$value.'"'.")";
    if(mysql_query($sql)){
        return mysql_insert_id();
    }
    else{
        return false;
    }
}

//删除数据 返回 删除的条数
//delete from brand where id=9
function deleteMsg($table,$where=null){
    $w=$where==null?null:' where '.$where;
    $delete="delete from $table $w";
    //print_r($delete);
    if($result=mysql_query($delete)){
        if(mysql_affected_rows()>0){
            return mysql_affected_rows();
        }else{
            return false;
        }
    }else{
        return false;
    }
}



















