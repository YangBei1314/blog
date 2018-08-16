<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>友情链接管理</title>
<script>
	//确认删除对话框
	function delConfirm(id){
		if( window.confirm("你确定要删除吗?") ){
			location.href = "/admin.php/Links/del?id="+id;
		}
	}
</script>
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
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
<tr class="title" align="center">
	<td>编号</td>
	<td>域名</td>
	<td>网址</td>
	<td>排序</td>
	<td>操作选项</td>
</tr>
<!-- 模板变量输出 -->
<?php if(is_array($links)): foreach($links as $key=>$link): ?><tr class="tdbg" align="center">
	<td><?php echo ($link['id']); ?></td>
	<td align="left"><?php echo ($link['domain']); ?></td>
	<td><?php echo ($link['url']); ?></td>
	<td><?php echo ($link['orderby']); ?></td>
	<td>
		<a href="/admin.php/Links/edit?id=<?php echo ($link['id']); ?>">修改</a> | 
		<a href="javascript:void(0)" onclick="delConfirm(<?php echo ($link['id']); ?>)">删除</a>
	</td>
</tr><?php endforeach; endif; ?>
</table>
</body>
</html>