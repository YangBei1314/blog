<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>文章评论管理</title>
<script>
	//确认删除对话框
	function delConfirm(id){
		if (window.confirm("你确定要删除吗?")) {
			location.href = "/admin.php/Comment/del?id="+id;
		}
	}
</script>
</head>


<body>
<!--导航栏-->
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>文章评论管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="/admin.php/Comment/index">管理首页</a>&nbsp;|&nbsp;
		</td>
	</tr>
</table>

<!--搜索表单-->
<div style="padding:8px 5px;margin:8px 3px;background-color:#fefefe;text-align:center;">
<form name="form1" method="post" action="/admin.php/Comment/index">
	<input type="text" name="keyword" style="width:300px;" />
	<input type="submit" value="搜索" />
	<input type="hidden" name="ac" value="search" />
</form>
</div>

<!--文章列表-->
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
<tr class="title" align="center">
	<td>编号</td>
	<td>上层评论内容</td>
	<td>用户</td>
	<td>评论内容</td>
	<td>文章标题</td>
	<td>评论时间</td>
	<td>操作选项</td>
</tr>
<!-- 模板变量输出 -->
<?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><tr class="tdbg" align="center">
	<td><?php echo ($comment["id"]); ?></td>
	<td align="left">传智播客响当当</td>
	<td><?php echo ($comment["username"]); ?></td>
	<td align="left"><?php echo mb_substr($comment['content'],0,40,'utf-8');?>...</td>
	<td align="left"><?php echo mb_substr($comment['title'],0,20,'utf-8');?>...</td>
	<td><?php echo (date('Y年m月d日',$comment["addate"])); ?></td>
	<td><a href="javascript:void(0)" onclick="delConfirm(<?php echo ($comment["id"]); ?>)">删除</a></td>
</tr><?php endforeach; endif; ?>
<!--评论分页-->
<tr class="tdbg">
	<td colspan="7" align="center"><?php echo ($page); ?></td>
</tr>
</table>
</body>
</html>