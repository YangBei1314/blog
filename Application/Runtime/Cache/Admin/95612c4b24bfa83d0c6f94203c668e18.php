<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>文章分类管理</title>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>文章分类管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="/admin.php/Category/index">管理首页</a>&nbsp;|&nbsp;
			<a href="/admin.php/Category/add">添加文章分类</a>
		</td>
	</tr>
</table>
<br />
<form name="form1" method="post" action="/admin.php/Category/insert">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title">
		<td colspan="2" align="center">添加文章分类</td>
	</tr>
	<tr class="tdbg">
		<td width="11%" height="30" align="right">名&nbsp;&nbsp;称：</td>
		<td width="89%"><input name="classname" type="text" size="90" maxlength="50" /></td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">排&nbsp;&nbsp;序：</td>
		<td>
			<input name="orderby" type="text" value="50" size="5" maxlength="5" /> 
			数值数小，排序越靠前
		</td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">父分类：</td>
		<td>
			<select name="pid">
				<option value="0">无</option>
				<!-- 模板变量输出 -->
				<?php if(is_array($categorys)): foreach($categorys as $key=>$category): ?><option value="<?php echo ($category['id']); ?>"><?php echo str_repeat( '--',($category['level']+1)*2 ); echo ($category['classname']); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
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