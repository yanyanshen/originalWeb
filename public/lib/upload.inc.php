<?php
/**将上传的文件数组统一为二维索引数组
 * @return array
 */
function getFilesArr(){
    $i=0;
    foreach($_FILES as $file){
        if(is_string($file['name'])){
            $arr[$i]=$file;
            $i++;
        }elseif(is_array($file['name'])){
            foreach($file['name'] as $k=>$v){
                $arr[$i]['name']=$file['name'][$k];
                $arr[$i]['type']=$file['type'][$k];
                $arr[$i]['tmp_name']=$file['tmp_name'][$k];
                $arr[$i]['error']=$file['error'][$k];
                $arr[$i]['size']=$file['size'][$k];
                $i++;
            }
        }
    }
    return $arr;
}

/**文件上传
 * @param string $uploadDir  上传的目录名
 * @param int $maxSize       上传文件的最大值
 * @param array $allowType   上传文件类型的范围
 * @return array
 */
function upload($uploadDir,$maxSize=1048576,$allowType=array('jpg','jpeg','png','gif')){
    $files=getFilesArr();
    foreach($files as $k=>$file){
        $name=$file['name'];
        $size=$file['size'];
        $tmp=$file['tmp_name'];
        $error=$file['error'];

        if($error==UPLOAD_ERR_OK){
            //$maxSize=1048576;
           // $allowType=array('jpg','jpeg','png','gif');

            //判断文件是否超过大小限制
            if($size>$maxSize){
                $res[$k]['msg']='文件超过了网站要求的最大限制';
                continue;
            }
            //判断图片类型是否允许
            $fileExt=getFileExt($name);
            if(!in_array($fileExt,$allowType)){
                $res[$k]['msg']='上传的文件类型不允许';
                continue;
            }
            //判断图片真实类型
            if(!getimagesize($tmp)){
                $res[$k]['msg']='上传不是一个标准的图片';
                continue;
            }

            //验证是否为http-post方式上传
            if(!is_uploaded_file($tmp)){
                $res[$k]['msg']='文件不是以http-post方式上传';
                continue;
            }
            //创建上传目录
            // $uploadDir='./upload';
            if(!file_exists($uploadDir)){
                mkdir($uploadDir,0777,true);
                chmod($uploadDir,0777);
            }

            //生成文件名
            $filename=uniqStr().'.'.$fileExt;

            if(move_uploaded_file($tmp,$uploadDir.'/'.$filename)){
               $res[$k]['filename']= $filename;
            }
        }else{
            switch($error){
                case 1:
                   $msg='文件大小超过配置文件上传最大限制';
                    break;
                case 2:
                    $msg='文件大小超过MAX_FILE_SIZE最大限制';
                    break;
                case 3:
                    $msg='文件部分被上传';
                    break;
                case 4:
                    $msg='没有选择上传的文件';
                    break;
                case 6:
                    $msg='没有临时目录';
                    break;
                case 7:
                    $msg='临时目录没有写权限';
                    break;
                default:
                    $msg='未知错误';
            }
            $res[$k]['msg']=$msg;
        }
    }
    return $res;
}