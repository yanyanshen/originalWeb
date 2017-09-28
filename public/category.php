<?php
include_once"../../config.php";
include_once"lib/mysql.inc.php";
connect();
function getCateList($pid=0,$spaceNum=-6,&$list=array()){
    $spaceNum+=6;
    //查每顶级的名字
    $sql="select * from category_shop where pid=$pid";
    //如果查出有结果集 输出 的到数组
    if($res=mysql_query($sql)){
        while($row=mysql_fetch_assoc($res)){
            $row['catename']=str_repeat("&nbsp;",$spaceNum).$row['catename'];
            $list[]=$row;
            getCateList($row['id'],$spaceNum,$list);
            //print_r($row);
        }
        return $list;
    }else{
        return false;
    }
}