<?php
include_once"../../config.php";
function login(){
    //print_r($_POST);
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
    $verify=strtolower(trim($_POST['verify']));

    if(!$verify){
        die('请输入验证码');
    }
    if($verify!=strtolower($_SESSION['text'])){
        die('验证码输入错误');
    }
    if(!$username){
        die('用户名不能为空');
    }
    if(!$password){
        die('密码名不能为空');
    }
    connect();
    $userInfo=selectOne("select id,username from user_shop
    where username='{$username}' and password='{$password}'");
    if($userInfo){
        $_SESSION['id']=$userInfo['id'];
        $_SESSION['username']=$userInfo['username'];
        update('user_shop',array('lastlogin'=>time(),'lastip'=>"$_SERVER[REMOTE_ADDR]"),"id={$_SESSION['id']}");
        unset($_SESSION['text']);
        if(isset($_POST['remember'])&&$_POST['remember']==1){
            ini_set('session.gc_maxlifetime',3600*24*7);
            //设置过期时间
            setcookie(session_name(),session_id(),time()+3600*24*7,'/');
        }
        echo"<script>alert('登录成功');location='../index/index.php';</script>";
    }else{
        echo"<script>alert('用户名或密码错误');location='../Login.php';</script>";
    }
}

function loginOut(){
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    setcookie(session_name(),'',time()-3600*24*7,'/');
    echo"<script>alert('退出成功');location='../Login.php';</script>";
}
if($_GET['act']=='Login'){
    login();
}elseif($_GET['act']=='loginOut'){
    loginOut();
}
