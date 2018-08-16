<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>用户管理</title>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>用户管理</td></tr>
	<tr class="tdbg"><td height="30">&nbsp;&nbsp;<a href="#">管理首页</a>&nbsp;|&nbsp;<a href="#">添加用户</a></td></tr>
</table>
<br />
<form id="form1" name="form1" method="post" action="/admin.php/User/update" onsubmit="return checkForm()">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title"><td colspan="2" align="center">修改用户</td></tr>
    <tr class="tdbg">
		<td width="15%" height="30" align="right">用户名称：</td>
		<td width="85%"><font color="#0000ff">admin</font></td>
    </tr>
    <tr class="tdbg">
		<td height="30" align="right">用户密码：</td>
		<td>
			<input name="password" type="password" size="20" maxlength="15" />
			<font color="#FF0000">*</font>
			<font color="#666666">长度为5-15位（字母、数字），不能含有特殊符号；不修改请留空！</font>
		</td>
    </tr>
    <tr class="tdbg">
		<td height="30" align="right">确认密码：</td>
		<td>
			<input name="confirmpwd" type="password" maxlength="15" />
			<font color="#FF0000">*</font>
			<font color="#666666">两次输入的密码必须一致；不修改请留空！</font>
		</td>
    </tr>
    <tr class="tdbg">
		<td height="30" align="right">真实姓名：</td>
		<td>
			<input name="name" type="text" size="20" value="<?php echo ($user[0]["name"]); ?>"/>
			<font color="#FF0000">*</font>
			<font color="#666666">你的姓名</font>
		</td>
    </tr>
    <tr class="tdbg">
		<td height="30" align="right">联系方式：</td>
		<td>
			<input name="tel" type="text" size="20" value="<?php echo ($user[0]["tel"]); ?>"/>
			<font color="#FF0000">*</font>
			<font color="#666666">例如：13671181498 或 010-12345678</font>
		</td>
    </tr>
    <tr class="tdbg">
		<td height="30" align="right">账号状态：</td>
		<td>
			<!-- 使用tp3框架中的if标签对状态进行判断 -->
			<input type="radio" name="status" value="1" 
			<?php if($user[0]['status'] == 1): ?>checked<?php endif; ?> >正常
			<input type="radio" name="status" value="0" 
			<?php if($user[0]['status'] == 0): ?>checked<?php endif; ?> >停用
		</td>
	</tr>
    <tr class="tdbg">
		<td height="30" align="right">角色：</td>
		<td>
			<select name="role">
				<option value="1" <?php if($user[0]['role'] == 1): ?>selected<?php endif; ?> >超级管理员</option>
				<option value="0" <?php if($user[0]['role'] == 0): ?>selected<?php endif; ?> >普通管理员</option>
			</select>
		</td>
    </tr>
    <tr class="tdbg">
		<td height="30" align="right">&nbsp;</td>
		<td>
			<input type="submit" value="提交" />
			<!-- 使用隐藏域将当前用户id传递给update方法 -->
			<input type="hidden" name="id" value="<?php echo ($user[0]['id']); ?>" />
			<input type="button" onclick="history.go(-1)" value="返回" />
		</td>
    </tr>
  </table>
</form>
</body>
</html>