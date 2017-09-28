<?php
include_once"../../config.php";
connect();


$username=$_POST['username'];
$mysql="select id from home_user_login where username='{$username}'";
$res=mysql_query($mysql);
if(mysql_num_rows($res)>0){
    echo"此用户名已存在";
}else{
    echo"此用户可以使用";
}



function addAdmin(){
    if(!trim($_POST['username'])||!trim($_POST['password'])){
        echo "<script>alert('用户名或密码不能为空');location='addAdmin.php'</script>";
    }else{
        if (selectOne("select id from user_shop where username='{$_POST['username']}'")) {
            echo "<script>alert('此管理员名称已存在，请重新添加');location='addAdmin.php'</script>";
        }else {
            $adminArr['username'] = trim($_POST['username']);
            $adminArr['password'] = trim($_POST['password']);
            $adminArr['addtime']=time();
            if ($id = insert("user_shop", $adminArr)) {
                echo "<script>alert('管理员添加成功，请继续添加');location='addAdmin.php'</script>";
            } else{
                echo "<script>alert('管理员添加失败，请稍后继续添加');location='addAdmin.php'</script>";
            }
        }
    }
}
function permission(){
    $id=$_GET['id'];
    $sql="update user_shop set permission=1 where id=$id";
    if(mysql_query($sql)){
        echo "<script>alert('开启成功');location='adminList.php'</script>";
    }else{
        echo "<script>alert('开启失败');location='adminList.php'</script>";
    }
}
function active(){
   $id=$_GET['id'];
    $sql="update user_shop set permission=0 where id=$id";
    if(mysql_query($sql)){
        echo "<script>alert('禁止成功');location='adminList.php'</script>";
    }else{
        echo "<script>alert('禁止失败');location='adminList.php'</script>";
    }
}

//编辑
function editAdmin(){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $res=update("user_shop",array("username"=>$username,"password"=>$password),"id=$id");
    //更新子分类的path
    if($res){
        echo "<script>alert('管理员信息更新成功');location='editAdmin.php'</script>";
    }else{
        echo "<script>alert('管理员更新失败,请稍后再试');location='editAdmin.php'</script>";
    }
}
$act=$_GET['act'];
switch($act){
    case 'add':
        addAdmin();
        break;
    case 'active':
        active();
        break;
    case 'permission':
        permission();
        break;
    case 'edit':
        editAdmin();
        break;
}




