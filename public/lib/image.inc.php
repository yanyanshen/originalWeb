<?php
/**
 * 图片验证码
 * @param
 * @param
 * return img
 */
//生成随机字符串
function verifyCode($type=3,$length=4,$width=80,$height=40,$angle=-10){
//创建图片资源
    $img=imagecreatetruecolor($width,$height);
    //创建背景颜色  操作对象  16进制rgb颜色
    $bgColor=imagecolorallocate($img,mt_rand(220,255),mt_rand(200,255),mt_rand(200,255));
    //创建文字颜色  操作对象  16进制rgb颜色
    $fontColor=imagecolorallocate($img,mt_rand(0,99),mt_rand(0,99),mt_rand(0,99));
    //给图片资源填充背景 目标 从0,0坐标开始  到资源图片得结束坐标 颜色
    imagefilledrectangle($img,0,0,$width,$height,$bgColor);
    $fonts=array('msyh.ttf','msyhbd.ttf','simkai.ttf');
    $font='./lib/fonts/'.$fonts[array_rand($fonts)];
    $fontSize=mt_rand(14,16);
    $str=getRandString($type,$length);
    session_start();
    $_SESSION['text']=$str;
    imagettftext($img,$fontSize,$angle,mt_rand(8,$width-60),mt_rand(15,$height-10),$fontColor,$font,$str);
    //干扰点
    for($i=0;$i<=200;$i++){
        $pixelColor=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$pixelColor);
    }
    //干扰线
    for($i=0;$i<=20;$i++){
        $lineColor=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        $x=mt_rand(0,$width);$y=mt_rand(0,$height);
        imageline($img,$x,$y,$x+mt_rand(20,35),$y+mt_rand(10,30),$lineColor);
    }

    //输出到浏览器
    header('Content-type:image/png');
    imagepng($img);
//销毁图片资源
    imagedestroy($img);
}


/**
 * 水印文字
 * @param
 * @param
 * return img
 */
function waterText($image,$type=array('msyh.ttf','msyhbd.ttf','simkai.ttf')){
//创建图片资源
    //1.得到图片信息
    $imgInfo=getimagesize($image);
    //得到后缀名jpeg
    $imgExt=image_type_to_extension($imgInfo[2],false);
    //创建图片资源
    $fun='imagecreatefrom'.$imgExt;
    $img=$fun($image);
    //创建文字颜色
    $fontColor=imagecolorallocatealpha($img,mt_rand(20,200),mt_rand(20,250),mt_rand(20,220),50);
//写入文字
    imagettftext($img,38,0,50,50,$fontColor,'./lib/fonts/'.$type[2],'文字水印');
    //输出图像到浏览器
    //header('Content-Type:image/'.$imgExt);
//输入到指定的目录
    $dir='images';
    if(!file_exists($dir)){
        mkdir($dir);
    }
    $outFun='image'.$imgExt;
    $outFun($img,$dir.'/'.'water_'.$image);
//销毁图片资源
    imagedestroy($img);
}




/**
 * 水印图片
 * @param
 * @param
 * return img
 */
function waterImg($image,$waterImg){
//创建图片资源
    //1得到图片信息
    $imgInfo=getimagesize($image);
    //2得到大图后缀名
    $imgExt=image_type_to_extension($imgInfo[2],false);
    //3创建图片片资源
    $fun='imagecreatefrom'.$imgExt;
    $img=$fun($image);

//创建水印图片资源
    //1获得水印图片信息
    $waterInfo=getimagesize($waterImg);
    //2得到水印图片后缀
    $waterImgExt=image_type_to_extension($waterInfo[2],false);
    //3创建资源
    $waterFun='imagecreatefrom'.$waterImgExt;
    $waterimg=$waterFun($waterImg);

//把水印图片放在  图片上
    //目标 水印图片 从目标文件的那个坐标开始放  水印图片从那个坐标开始放  放到哪个坐标开始结束   水印图片的透明度 0-100
    imagecopymerge($img,$waterimg,10,10,0,0,$waterInfo[0],$waterInfo[1],80);
//输出到目录
    $dir='images';
    if(!file_exists($dir)){
        mkdir($dir);
    }
    $outPutFun='image'.$imgExt;
    $outPutFun($img,$dir.'/'.'waterImg_'.$image);
//销毁资源
    imagedestroy($img);
}


function getThumb($src,$w, $dir='images'){
    $thumbInfo=getimagesize($src);
    $thumb_Ext=image_type_to_extension($thumbInfo[2],false);
    $thumbFun='imagecreatefrom'.$thumb_Ext;
    $img=$thumbFun($src);//得到图片
    //创建缩略图资源
    $h=($thumbInfo[1]*$w)/$thumbInfo[0];
    $thumbImg=imagecreatetruecolor($w,$h);
    imagecopyresampled($thumbImg,$img,0,0,0,0,$w,$h,$thumbInfo[0],$thumbInfo[1]);
    //输入到指定目录
    if(!file_exists($dir)){
        mkdir($dir);
    }
    $outPutFun='image'.$thumb_Ext;
    $outPutFun($thumbImg,$dir.'/'.'thumbImg_'.$w.'_'.basename($src));
    imagedestroy($img);
    imagedestroy($thumbImg);
}
