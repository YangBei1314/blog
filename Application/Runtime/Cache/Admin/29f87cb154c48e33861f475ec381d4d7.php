<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>评论管理</title>
<script charset="utf-8" src="/Public/Admin/Js/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="/Public/Admin/Js/editor/lang/zh_CN.js"></script>
<script type="text/javascript">
//引入KindEditor在线编辑器
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});
});
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>评论管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="/admin.php/Article/index">管理首页</a>&nbsp;|&nbsp;
			<a href="/admin.php/Article/add">添加评论</a>
		</td>
	</tr>
</table>
<br />
<form name="form1" method="post" action="/admin.php/Article/insert">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title"><td colspan="2" align="center">添加评论</td></tr>
	
	<tr class="tdbg">
		<td height="30" align="right">内&nbsp;&nbsp;容：</td>
		<td><textarea name="content" style="width:95%;height:300px;"></textarea></td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">&nbsp;</td>
		<td>
			<input type="submit" value="添加" />
			<input type="button" onclick="history.go(-1)" value="返回" />
		</td>
	</tr>
</table>
</form>
</body>
</html>