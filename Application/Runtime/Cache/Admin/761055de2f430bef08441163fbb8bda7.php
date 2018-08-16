<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>文章管理</title>
<link href="/Public/Admin/Css/public.css" type="text/css" rel="stylesheet" />
<script charset="utf-8" src="/Public/Admin/Js/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="/Public/Admin/Js/editor/lang/zh_CN.js"></script>
<script>
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
	<tr class="topbg"><td>文章管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="/admin.php/Article/index">管理首页</a>&nbsp;|&nbsp;
			<a href="/admin.php/Article/add">添加文章</a>
		</td>
	</tr>
</table>
<br />
<form name="form1" method="post" action="/admin.php/Article/update">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title"><td colspan="6" align="center">修改文章</td></tr>
	<tr class="tdbg">
		<td width="17%" height="30" align="right">文章类别：</td>
		<td>
			<select name="category_id">
				<option value="0">无分类</option>
				<!-- 模板变量输出 -->
				<?php if(is_array($categorys)): foreach($categorys as $key=>$category): ?><option value="<?php echo ($category["id"]); ?>" <?php if($articles[0]['category_id'] == $category['id']): ?>selected<?php endif; ?>>
					<?php echo str_repeat('--',($category['level']+1)*2 ); echo ($category['classname']); ?>
				</option><?php endforeach; endif; ?>
			</select>      
		</td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">标&nbsp;&nbsp;题：</td>
		<td colspan="5"><input name="title" type="text" size="90" maxlength="50" value="<?php echo ($articles[0]['title']); ?>"/></td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">排&nbsp;&nbsp;序：</td>
		<td>
			<input name="orderby" type="text" value="50" size="2" maxlength="3" value="<?php echo ($articles[0]['orderby']); ?>"/>
			<input name="top" type="radio" value="0" <?php if($articles[0]['top'] == 0): ?>checked<?php endif; ?> />不置顶
			<input name="top" type="radio" value="1" <?php if($articles[0]['top'] == 1): ?>checked<?php endif; ?>/>置顶
			<!-- <span style="padding-left:20px;">置顶：</span>
			<input name="top" type="checkbox" value="1" <?php if($articles[0]['top'] == 1): ?>checked<?php endif; ?> />
			<span style="padding-left:20px;">不置顶：</span>
			<input name="top" type="checkbox" value="0" <?php if($articles[0]['top'] == 0): ?>checked<?php endif; ?> /> -->
		</td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">内&nbsp;&nbsp;容：</td>
		<td><textarea name="content" style="width:95%;height:300px;">
			<?php echo ($articles[0]['content']); ?>
		</textarea></td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">&nbsp;</td>
		<td colspan="5">
		<!-- 将当前文章的id通过隐藏域进行提交 -->
			<input type="hidden" name="id" value="<?php echo ($articles[0]['id']); ?>" />
			<input type="submit" value="更新" />
			<input type="button" onclick="history.go(-1)" value="返回" />
		</td>
	</tr>
</table>
</form>
</body>
</html>