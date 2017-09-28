<?php
//获取文件扩展名
function getFileExt($filename){
    return pathinfo($filename,PATHINFO_EXTENSION);
}

//生成唯一字符串

function uniqStr(){
    return md5(uniqid(microtime(true)));
}

//生成指定长度的随机字符串

function getRandString($type=1,$length=4){
    switch($type){
        case 1:
            $str=join('',range(0,9));
            break;
        case 2:
            $str=join('',array_merge(range('a','z'),range('A','Z')));
            break;
        case 3:
            $str=join('',array_merge(range('a','z'),range('A','Z'),range(0,9)));
            break;
    }
    $str=str_shuffle($str);
    return substr($str,0,$length);
}


