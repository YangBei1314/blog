<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>文章分类管理</title>
<script>
//确认是否删除对话框
	function delConfirm(id){
		if (window.confirm("你确定要删除吗?")) {
			location.href = "/admin.php/Category/del?id="+id;
		}
	}
</script>
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
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
<tr class="title" align="center">
	<td>编号</td>
	<td>分类名称</td>
	<td>排序</td>
	<td>文章数量</td>
	<td>操作选项</td>
</tr>
<!-- 模板变量输出 -->
<?php if(is_array($categorys)): foreach($categorys as $key=>$category): ?><tr class="tdbg" align="center">
	<td><?php echo ($category['id']); ?></td>
	<!-- 变量输出使用的函数可以支持内置的PHP函数或者用户自定义函数，甚至是静态方法。 -->
	<!-- 使用方法如下:<?php echo str_repeat();?> -->
	<td align="left"><?php echo str_repeat( '--',($category['level']+1)*2 );?>
	<?php echo ($category['classname']); ?></td>
	<td><?php echo ($category['orderby']); ?></td>
	<td><?php echo ($category['article_counts']); ?></td>
	<td>
		<a href="/admin.php/Category/edit?id=<?php echo ($category['id']); ?>">修改</a> | 
		<a href="javascript:void(0)" onclick="delConfirm(<?php echo ($category['id']); ?>)">删除</a>
	</td>
</tr><?php endforeach; endif; ?>
</table>
</body>
</html>