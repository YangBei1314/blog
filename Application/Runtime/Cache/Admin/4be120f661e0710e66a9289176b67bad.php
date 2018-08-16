<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>友情链接管理</title>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>友情链接管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="/admin.php/Links/index">管理首页</a>&nbsp;|&nbsp;
			<a href="/admin.php/Links/add">添加友情链接</a>
		</td>
	</tr>
</table>
<br />
<form name="form1" method="post" action="/admin.php/Links/update">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title"><td colspan="2" align="center">编辑友情链接</td></tr>
	<tr class="tdbg">
		<td width="11%" height="30" align="right">域&nbsp;&nbsp;名：</td>
		<td width="89%"><input name="domain" type="text" size="90" maxlength="20" value="<?php echo ($links[0]["domain"]); ?>"/></td>
	</tr>
	<tr class="tdbg">
		<td width="11%" height="30" align="right">网&nbsp;&nbsp;址：</td>
		<td width="89%"><input name="url" type="text" size="90" maxlength="20" value="<?php echo ($links[0]["url"]); ?>"/></td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">排&nbsp;&nbsp;序：</td>
		<td>
			<input name="orderby" type="text" size="5" maxlength="5" value="<?php echo ($links[0]["orderby"]); ?>"/>
			数值数小，排序越靠前
		</td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">&nbsp;</td>
		<td>
			<input type="submit" value="修改" />
			<input type="hidden" name="id" value="<?php echo ($links[0]["id"]); ?>" />
			<input type="button" onclick="history.go(-1)" value="返回" />
		</td>
	</tr>
</table>
</form>
</body>
</html>