<?php
include "../../config.php";
connect();
function userRegister()
{
//注册
    $verify = strtolower(trim($_POST['verify']));
    $username = $_POST['username'];
    $userPreg = '/^[a-zA-Z]\w*$/';

    $password=$_POST['pwd'];
    $pregPwd='/^[a-zA-Z]\w+$/';

    $repwd=$_POST['repwd'];;
    if (!$verify) {
        echo "<script>alert('验证码不能为空');location='Login.php';</script>";
    }
    if ($verify!=strtolower($_SESSION['text'])) {
        echo "<script>alert('验证码输入不正确');location='Login.php';</script>";
    }

    if (!$username) {
        echo "<script>alert('用户名不能为空');location='../register/register.php'</script>";
    }elseif (strlen($username) > 18 || strlen($username) < 5) {
        echo "<script>alert('用户名的长度要在5-18之间');location='../register/register.php'</script>";
    }elseif(!preg_match_all($userPreg,$username)){
        echo "<script>alert('用户名只能由字母开始的数字、字母、下划线组成');location='../register/register.php'</script>";
    }

    if(!$password){
        echo "<script>alert('密码不能为空');location='../register/register.php'</script>";
    }elseif(strlen($password)<6||strlen($password)>18){
        echo "<script>alert('密码的长度要在5-18之间');location='../register/register.php'</script>";
    }elseif(!preg_match_all($pregPwd,$password)){
        echo "<script>alert('密码只能由字母开始的数字、字母、下划线组成');location='../register/register.php'</script>";
    }

    if($password!=$repwd){
        echo "<script>alert('密码与上次不一样');location='../register/register.php'</script>";
    }

    $userInfo = selectOne("select id,username from home_user_login where
    username='{$username}'");
    if ($userInfo) {
        echo "<script>alert('此用户名已存在，请重新添加');location='../register/register.php'</script>";
        $userArr['lastTime'] = time();
    } else {
        $userArr['username']=$_POST['username'];
        $userArr['password']=$_POST['pwd'];
        $userArr['registerTime'] = time();
        insert('home_user_login', $userArr);
        unset($_SESSION['text']);
        echo "<script>alert('注册成功');location='Login.php';</script>";
    }
}


function userLogin()
{
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);
    $verify = strtolower(trim($_POST['verify']));
    if (!$verify) {
        echo "<script>alert('验证码不能为空');location='Login.php';</script>";
    }
    if ($verify != strtolower($_SESSION['text'])) {
        echo "<script>alert('验证码输入错误');location='Login.php';</script>";
    }
    if (!$username) {
        echo "<script>alert('用户名不能为空');location='Login.php';</script>";
    }
    if (!$password) {
        echo "<script>alert('密码不能为空');location='Login.php';</script>";
    }
    $userInfo = selectOne("select id,username from home_user_login where
    username='{$username}' and password='{$password}'");
    if ($userInfo) {
        $_SESSION['mid'] = $userInfo['id'];
        $_SESSION['userName'] = $userInfo['username'];
        unset($_SESSION['text']);
        //将session里的商品添加到 数据库
        if(isset($_SESSION['cart'])){
            $mid=$_SESSION['mid'];
            foreach($_SESSION['cart'] as $v){
                $v['mid']=$mid;
                //判断购物车数据库里 有没有该用户的信息
                if($cartId=selectOne("select id from home_cart_shop where gid={$v['gid']} and mid={$v['mid']}")){
                    $res=mysql_query("update home_cart_shop set buyNum=buyNum+{$v['buyNum']} where id={$cartId['id']}");
                }else{
                    $res=insert("home_cart_shop",$v);
                }
                if($res){
                    unset($_SESSION['cart']);
                }
            }
        }
        $userArr['lastLoginIp'] = $_SERVER['REMOTE_ADDR'];
        $userArr['lastTime'] = time();

        update('home_user_login', $userArr, "id={$_SESSION['mid']}");
        if(isset($_SESSION['url'])||isset($_SESSION['urlde'])){
            if(isset($_SESSION['url'])){
                $url=$_SESSION['url'];
                unset($_SESSION['url']);
            }else{
                $url=$_SESSION['urlde'];
                unset($_SESSION['urlde']);
            }
        }else{
            $url="../../index.php";
        }
            echo "<script>alert('登录成功');location='{$url}';</script>";
    } else {
        echo "<script>alert('登录失败');location='Login.php';</script>";
    }
}

function loginOut(){
    unset($_SESSION['mid']);
    unset($_SESSION['userName']);
    setcookie(session_name(),'',time()-3600*24*7,'/');
    echo"<script>alert('退出成功');location='Login.php';</script>";
}


$act=$_GET['act'];
switch($act){
    case 'Login':
        userLogin();
        break;
    case 'register':
        userRegister();
        break;
    case 'loginOut':
        loginOut();
        break;
}


