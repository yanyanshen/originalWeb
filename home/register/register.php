<?php
include "../../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>易购网-用户注册</title>
	<link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/public.css">
	<link rel="stylesheet" type="text/css" href="<?=SKIN?>/css/register.css">
    <script src="../login/jQuery-1.8.2.min.js"></script>
</head>
<body>
<!--  头部开始 -->
	<div class="header">		
		<div class="box logoBar">
			<div class="logo lf">
				<a href="index.html"><img src="<?=SKIN?>/images/logo.png"></a>
			</div>	
			<div class="reg lf">
				|    <span>用户注册</span>
			</div>		
		</div>
		<hr class="headLine" />
	</div>
<!-- 头部结束 -->
<!-- 注册表单开始 -->
   <div class="box">
	  	  <div class="regArea">
	  		   	<div class="regLeft lf">
	  		   		<img src="<?=SKIN?>/images/reg.png" />
	  		   	</div>
	  		   	<div class="regRight lf">
	  		   	  <form action="../login/loginAction.php?act=register" method="post" name="loginForm" id="loginForm">
	  		   		<table border="0">
	  		   			<tr>
	  		   				<td><label>用户名：</label><span></span></td>
	  		   				<td>
	  		   					<input type="text" name="username" value="" id="username" placeholder="请输入用户名"  onblur="chkUsername()" onfocus="usernameRule();" /><div></div>
	  		   				</td>
	  		   			</tr>
	  		   			<tr>
	  		   				<td><label>密码：</label></td>
	  		   				<td>
	  		   					<input type="password" name="pwd" value="" id="pwd" placeholder="请输入密码" onblur="chkPwd()"/><div></div>
	  		   				</td>
	  		   			</tr>
	  		   			<tr>
	  		   				<td><label>确认密码：</label></td>
	  		   				<td>
	  		   					<input type="password" name="repwd" value="" id="repwd" placeholder="请再次输入密码" /><div></div>
	  		   				</td>
	  		   			</tr>
	  		   			<tr>
	  		   				<td><label>验证码：</label></td>
	  		   				<td>
	  		   					<input type="text"  name="verify" class='yzm' id="yzm"/>
	  		   					<img src="../../public/verify.php"  class='yzmImg'  onclick="this.src='../../public/verify.php?num='+Math.random()"/>
	  		   				</td>
	  		   			</tr>
	  		   			<tr id="protocol">
	  		   				<td colspan="2">
	  		   					<input type="checkbox"  checked  name="protocol" id="myprotocol" onclick="chkProtocol();" />
	  		   				 		<span>我已阅读并同意</span> <a href="#">用户服务协议</a>
	  		   			    </td>
	  		   			 </tr>
	  		   			<tr>
	  		   				<td colspan="2" id="loginTd">	  		   			 
	  		   					<a class="loginBtn">注册</a>
	  		   				</td>	  		   				
	  		   			</tr>
	  		   			<tr>
	  		   				<td colspan="2" id="tologin">	  		   			 
	  		   					<span>
	  		   					您已注册账号？请立即 <a href="../login/login.php" >登录</a>
	  		   					</span>
	  		   					<span>
	  		   					忘记密码？<a href="#" class="">找回密码</a>
	  		   					</span>
	  		   				</td>	  		   				
	  		   			</tr>
	  		   		</table>
	  		   	  </form>
	  		   	</div>
	  	  </div> 
   </div>
<!-- 注册表单结束 -->
<!-- 尾部开始 -->
	<div class="footer">
			<p>版权所有：河南云和数据信息技术有限公司</p>
			<p>© CopyRight2016 All rights reserved.</p>
			<p>豫ICP备14003305号</p>
	</div>
<!-- 尾部结束 -->

</body>
<script type="text/javascript">
    var username=document.getElementById('username');
    var protocol=document.getElementById('myprotocol');
	function usernameRule(){
		username.nextSibling.style.display="block";
		username.nextSibling.innerHTML="用户名长度在5~18个字符之间";
	}
	function chkUsername(){
		var res=false;
		if(!username.value){
			username.nextSibling.style.display="block";
			username.nextSibling.style.color="red";
			username.nextSibling.innerHTML="用户名不能为空";
		}else if(username.value.length<5 || username.value.length>18){
			username.nextSibling.style.display="block";
			username.nextSibling.style.color="red";
			username.nextSibling.innerHTML="用户名长度必须在5~18个字符之间";
		}else{
			username.nextSibling.style.display="none";
			username.nextSibling.innerHTML="";
			res=true;
		}
        return res;
	}

	function chkProtocol(){
		var res=false;
		//alert(protocol);
		if(!protocol.checked){
			document.getElementsByClassName('loginBtn')[0].style.backgroundColor="#ccc";
			document.getElementsByClassName('loginBtn')[0].style.cursor="default";
		}else{
			document.getElementsByClassName('loginBtn')[0].style.backgroundColor="#b00";
			document.getElementsByClassName('loginBtn')[0].style.cursor="pointer";
			res=true;
		}
		  return res;
	}

	document.getElementsByClassName('loginBtn')[0].onclick=function(){
		if(chkUsername() && chkProtocol()){
			document.getElementById('loginForm').submit();
		}
	}

</script>
</html>
