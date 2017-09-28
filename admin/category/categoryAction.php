<?php
include_once"../../config.php";
connect();
function addCategory(){
    $catename=trim($_POST['catename']);
    $pid=$_POST['pid'];
    if(!$catename){
        echo"<script>alert('分类名称不能为空');location='addCategory.php'</script>";
    }elseif(selectOne("select pid from category_shop where catename='{$catename}'")){
        echo"<script>alert('该分类已经存在，请重新添加');location='addCategory.php'</script>";
    }else{
        $data['catename']=$catename;
        $data['pid']=$pid;
            if($lastId=insert('category_shop',$data)){
                if($pid==0){
                    $path=$lastId;
                }else{
                    $pathInfo=selectOne("select path from category_shop where id={$pid}");
                    $path=$pathInfo['path'].','.$lastId;
                }
                update('category_shop',array("path"=>$path),"id={$lastId}");
                    echo"<script>alert('分类添加成功，请继续添加');location='addCategory.php'</script>";
            }else{
                echo "<script>alert('分类添加失败,请重新添加');location='addCategory.php'</script>";
            }
    }
}
function displayCategory(){
    $id = $_GET['id'];
    //拿到要修改的path通过$id
    $cateInfo = selectOne("select path from category_shop where id=$id");
    $path = $cateInfo['path'];
    $sql="update category_shop set display=1 where path like '{$path}%'";
    if(mysql_query($sql)){
        echo "<script>alert('分类激活成功');location='listCategory.php'</script>";
    }else{
        echo "<script>alert('分类激活失败，请一会再试试！');location='listCategory.php'</script>";
    }
}
function activeCategory()
{
    $id = $_GET['id'];
    //拿到要修改的path通过$id
    $cateInfo = selectOne("select path from category_shop where id=$id");
    $path = $cateInfo['path'];
    $sql="update category_shop set display=0 where path in('{$path}')";
    if(mysql_query($sql)){
        echo "<script>alert('分类下架成功');location='listCategory.php'</script>";
    }else{
        echo "<script>alert('分类下架失败，请一会再试试！');location='listCategory.php'</script>";
    }
}
//编辑分类
function editCategory(){
    //一点确认编辑 就得到 编辑表单里的 提交上来的 id，pid，catename，
    $id=$_POST['id'];
    $pid=$_POST['pid'];
    $catename=$_POST['catename'];
    //新path
    if($pid==0){
        $newpath=$id;
    }else{
        $pathInfo=selectOne("select * from category_shop where id='{$pid}'");
        //查出这个id 对应的 path 给他一个新的路径
        $newpath=$pathInfo['path'].','.$id;
    }
    //用此路径代替老路径
        //拿到要修改的分类的path
    $cateInfo=selectOne("select path from category_shop where id=$id");
    $oldpath=$cateInfo['path'];
    //更新分类的catename,pid及path
    $res1=mysql_query("update category_shop set catename='{$catename}',pid={$pid},path='{$newpath}' where id=$id");
    //更新子分类的path
    $res2=mysql_query("update category_shop set path=replace(path,'{$oldpath}','{$newpath}') where path like '{$oldpath}%'");

    if($res1 && $res2){
        echo "<script>alert('分类信息更新成功');location='editCategory.php?id={$id}'</script>";
    }else{
        echo "<script>alert('分类信息更新失败,请稍后再试');location='editCategory.php?id={$id}'</script>";
    }
}
$act=$_GET['act'];
switch($act){
    case 'add':
        addCategory();
        break;
    case 'active':
        activeCategory();
        break;
    case 'display':
       displayCategory();
        break;
    case 'edit':
        editCategory();
        break;
    default :
        die("其他");
}




