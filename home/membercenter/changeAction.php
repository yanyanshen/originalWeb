<?php
include_once"../.././config.php";
connect();
function changePwd()
{
    $id = trim($_POST['id']);
    $password = trim($_POST['password']);
    if (!$password) {
        echo "<script>alert('密码不能为空');location='pwdchange.php'</script>";
    } else {
        $userInfo = selectOne("select password from home_user_login where id=$id");

        if ($password != $userInfo['password']) {
            echo "<script>alert(' 您输入的原密码不正确，请重新输入');location='pwdchange.php'</script>";
        } else {
            //新密码
            $newpws = $_POST['newpwd'];
            //再次输入的密码
            $respwd = $_POST['respwd'];
            if (!$newpws && !$respwd) {
                echo "<script>alert('请输入您的新密码');location='pwdchange.php'</script>";
            } else {
                if ($newpws != $respwd) {
                    echo "<script>alert('俩次密码输入不一致，请重新输入您的新密码');location='pwdchange.php'</script>";
                } else {
                    $date['password']=$newpws;
                    $res=update("home_user_login",$date,"id={$id}");
                    unset($_SESSION['mid']);
                    unset($_SESSION['userName']);
                    if($res){
                        echo "<script>alert('修改成功请您重新登录');location='../Login/Login.php'</script>";
                    }else{
                        echo "<script>alert('修改失败，请稍后再试');location='pwdchange.php'</script>";
                    }
                }
            }
        }
    }
}


//include_once"../Login/Login.php";


function changeMsg(){
    $id = trim($_POST['id']);
    $qq=trim($_POST['qq']);
    $moblie=trim($_POST['moblie']);
    $emil=trim($_POST['emil']);

//手机号
    $pregmo='/^1[34578]\d{9}$/';
    if(!$moblie){
        exit('手机号不能为空');
    }elseif(strlen($moblie)!=11){
        exit('手机号长度为11位') ;
    }elseif(!preg_match_all($pregmo,$moblie)) {
        exit('手机号格式不正确') ;
    }

    $pregm='/\w+\@([a-z]?)+\.[a-z]+/';
    if(!$emil){
        exit('邮箱不能为空');
    }elseif(!preg_match_all($pregm,$emil)) {
        exit('邮箱格式不正确') ;
    }

    $date['moblie']=$moblie;
    $date['qq']=$qq;
    $date['emil']=$emil;

        $res=update("home_user_login",$date,"id={$id}");
        if($res){
            exit("更新成功");
        }

}




function loginOut(){
    unset($_SESSION['mid']);
    unset($_SESSION['userName']);
    setcookie(session_name(),'',time()-3600*24*7,'/');
    echo"<script>alert('退出成功');location='../Login/Login.php';</script>";
}





switch($act=$_GET['act']){
    case 'changePwd':
        changePwd();
        break;
    case 'changeMsg':
        changeMsg();
        break;
    case 'loginOut':
        loginOut();
        break;
}