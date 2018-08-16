<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理员登录</title>
<link href="/Public/Admin/Css/public.css"   rel="stylesheet" type="text/css" />
<link href="/Public/Admin/Css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//初始设置用户名为当前焦点
function SetFocus()
{
	if(document.form1.username.value==""){
		document.form1.username.focus();
	}else{
		document.form1.username.select();
	}
}


</script>
</head>
<body>
<center>
<form name="form1" method="post" action="/admin.php/User/verifyLogin" id="form1" onSubmit="return checkForm();">
<div id="position">
	<div id="inposition">
		<div class="login-left">
			<div class="login-left-logo"><img src="/Public/Admin/Images/logo.png"  width="296" height="50" /></div>
			<div class="login-left-content">
				<ul>
					<li>为莘莘学子改变命运而讲课，为千万学生少走弯路而著书</li>
					<li>探索教育本源，开辟教育新生态</li>
					<li>务实、质量、创新、分享、专注、责任</li>
					<li>爱岗敬业、为人师表、诚实守信、团结友善、勇于担当、乐于奉献</li>
			</div>
		</div>
        <div class="login-right">
			<div id="UpdatePanel1">
            	<div class="login-right-title">网站后台管理系统</div>
                <div class="login-right-input">
                <table width="200" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    	<td nowrap="nowrap" align="right" id="tdLeft">用户名：</td>
                        <td><input name="username" type="text" id="username" class="input" size="10" maxlength="20"/></td>
					</tr>
					<tr>
						<td style="height:30px" align="right">密&nbsp;&nbsp;码：</td>
						<td style="height:30px"><input name="password" type="password" id="password" class="input" size="10" maxlength="32"/></td>
					</tr> 
					<tr>
						<td align="right">验证码：</td>
						<td><input id="verify" name="verify"  class="input2" maxlength="4">&nbsp;<img style="float:right" width="70" height="25" src="/admin.php/User/Captche" onclick='this.src = "/admin.php/User/Captche?k="+Math.random();' /></td>
					</tr>
					<tr>
						<td style="height: 30px" align="right"></td>
						<td style="height: 30px" nowrap="nowrap">
							<input type="submit" name="btnLogin" value="登 录" id="btnLogin" class="button" />
							<input type="reset" name="btnTest" value="清 除" id="btnTest" class="button" />
						</td>
					</tr>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</center>
<!--顶部背景DIV-->
<div id="header"></div>
<!--欢迎光临-->
<div id="content"><img src="/Public/Admin/Images/login-wel.gif" /></div>
<div id="buttom">
	<div class="copy2">
		<nobr>Copyright &copy; 2006-<?php echo date("Y")?>&nbsp;&nbsp;itcast.cn All Rights Reserved.</nobr>
	</div>
	<div class="copy"><img src="/Public/Admin/Images/login-copy.gif" /></div>
</div>
</body>
</html>
<script language="javascript">
SetFocus();
function checkForm()
{
	//定义用户名、密码正则表达式
	var reg1 = /^(\w{5,15})$/;
	if(!reg1.test(document.form1.username.value))
	{
		alert("用户名称没有填写或格式不正确！");
		document.form1.username.focus();
		return false;
	}else if(!reg1.test(document.form1.password.value))
	{
		alert("用户密码没有填写或格式不正确！");
		document.form1.password.focus();
		return false;
	}
}
</script>