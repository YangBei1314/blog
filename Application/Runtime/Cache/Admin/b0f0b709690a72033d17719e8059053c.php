<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="/Public/Admin/Css/public.css" />
<style type="text/css">
</style>
<title>主框架页面</title>
</head>

<body leftmargin="5" topmargin="0" marginwidth="0" marginheight="0" oncontextmenu="self.event.returnValue=false">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>系统信息</td></tr>
	<tr class="tdbg">
		<td height="30">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#f0f0f0" >
			<tr class="tr_southidc"> 
				<td width="38%" height="23" bgcolor="#fcfcfc">用户名：<font class="t4"><?php echo (session('username')); ?></font></td>
				<td width="62%" bgcolor="#fcfcfc">IP地址：<font class="t4"><?php echo ($_SERVER['SERVER_ADDR']); ?></font></td>
			</tr>
			<tr class="tr_southidc"> 
				<td width="38%" height="23" bgcolor="#fcfcfc">身份过期：<font class="t4">1440秒</font></td>
				<td width="62%" bgcolor="#fcfcfc">登录时间：<font class="t4"><?php echo date('Y年m月d日',time());?></font></td>
			</tr>
			<tr class="tr_southidc"> 
				<td width="38%" height="23" bgcolor="#fcfcfc">服务器域名：<font class="t4"><?php echo ($_SERVER['SERVER_NAME']); ?></font></td>
				<td width="62%" bgcolor="#fcfcfc">PHP环境：<font class="t4"><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></font></td>
			</tr>
			<tr class="tr_southidc"> 
				<td height="23" bgcolor="#fcfcfc">官方网站：<font class="t4"> <a href="http://www.itcast.cn" target="_blank">www.itcast.cn</a></font></td>
				<td bgcolor="#fcfcfc">公司电话：<font class="t4">400-618-4000</font></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</body>
</html>