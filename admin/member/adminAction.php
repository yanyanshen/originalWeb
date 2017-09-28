<?php
include_once"../../config.php";
connect();
function addAdmin(){
    if(!trim($_POST['username'])||!trim($_POST['password'])){
        echo "<script>alert('用户名或密码不能为空');location='addAdmin.php'</script>";
    }else{
        if (selectOne("select id from home_user_login where username='{$_POST['username']}'")) {
            echo "<script>alert('此会员名称已存在，请重新添加');location='addAdmin.php'</script>";
        }else {
            $adminArr['username'] = trim($_POST['username']);
            $adminArr['password'] = trim($_POST['password']);
            $adminArr['moblie']=trim($_POST['moblie']);
            $adminArr['qq']=trim($_POST['qq']);
            $adminArr['emil']=trim($_POST['emil']);
            $adminArr['registerTime']=time();
            if ($id=insert("home_user_login",$adminArr)){
                echo "<script>alert('会员添加成功，请继续添加');location='addAdmin.php'</script>";
            } else{
                echo "<script>alert('会员添加失败，请稍后继续添加');location='addAdmin.php'</script>";
            }
        }
    }
}
function permission(){
    $id=$_GET['id'];
    $sql="update home_user_login set permission=1 where id=$id";
    if(mysql_query($sql)){
        echo "<script>alert('开启成功');location='adminList.php'</script>";
    }else{
        echo "<script>alert('开启失败');location='adminList.php'</script>";
    }
}
function active(){
   $id=$_GET['id'];
    $sql="update home_user_login set permission=0 where id=$id";
    if(mysql_query($sql)){
        echo "<script>alert('禁止成功');location='adminList.php'</script>";
    }else{
        echo "<script>alert('禁止失败');location='adminList.php'</script>";
    }
}

//编辑
function editAdmin(){
    $id=$_POST['id'];
    $adminArr['moblie']=trim($_POST['moblie']);
    $adminArr['qq']=trim($_POST['qq']);
    $adminArr['emil']=trim($_POST['emil']);
    $res=update("home_user_login",$adminArr,"id=$id");
    //更新子分类的path
    if($res){
        echo "<script>alert('会员信息更新成功');location='editAdmin.php'</script>";
    }else{
        echo "<script>alert('会员更新失败,请稍后再试');location='editAdmin.php'</script>";
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




