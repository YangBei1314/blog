<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>文章管理</title>
<script>
	//确认删除对话框
	function delConfirm(id){
		if (window.confirm("你确定要删除吗?")) {
			location.href = "/admin.php/Article/del?id="+id;
		}
	}
</script>
</head>

<body>
<!--导航栏-->
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>文章管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="/admin.php/Article/index">管理首页</a>&nbsp;|&nbsp;
			<a href="/admin.php/Article/add">添加文章</a>
		</td>
	</tr>
</table>

<!--搜索表单-->
<div style="padding:8px 5px;margin:8px 3px;background-color:#fefefe;text-align:center;">
<!-- 按条件进行搜索时,如何使搜索条件显示在页面? -->
<form name="form1" method="post" action="/admin.php/Article/index">
	<span style="padding:0px 5px;">分类</span>
	<select name="category_id">
		<option value="">任意</option>
		<!-- 模板变量输出 -->
		<?php if(is_array($categorys)): foreach($categorys as $key=>$category): ?><!-- 判断当前分类的id$categoryId是否等于当前元素的id$category['id'],如果是的话则被选中 -->
		<option value="<?php echo ($category["id"]); ?>" <?php if($categoryId == $category['id']): ?>selected<?php endif; ?> >
			<?php echo str_repeat('--',($category['level']+1)*2 ); echo ($category['classname']); ?>
		</option><?php endforeach; endif; ?>
	</select>
	<span style="padding:0px 5px;">标题</span>
	<!-- 搜索关键词显示在页面:value="<?php echo ($keywords); ?>" -->
	<input type="text" name="keyword" value="<?php echo ($keywords); ?>"/>
	<input type="submit" value="搜索" />
	<input type="hidden" name="ac" value="search" />
</form>
</div>

<!--文章列表-->
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
<tr class="title" align="center">
	<td>编号</td>
	<td>分类</td>
	<td>标题</td>
	<td>作者</td>
	<td>发布时间</td>
	<td>操作选项</td>
</tr>
<!-- 模板变量输出 -->
<?php if(is_array($articles)): foreach($articles as $key=>$article): ?><tr class="tdbg" align="center">
	<td><?php echo ($article["id"]); ?></td>
	<td><?php echo ($article["classname"]); ?></td>
	<td align="left">
		<a target="_blank" href="#"><?php echo ($article["title"]); ?></a>
		<!-- tp框架中的if标签:判断当前文章元素的top列的值是否为1 -->
		<?php if($article['top'] == 1): ?>[<font color="red">顶</font>]<?php endif; ?>
	</td>
	<td><?php echo ($article["username"]); ?></td>
	<td><?php echo (date('Y-m-d',$article["addate"])); ?></td>
	<td>
		<a href="/admin.php/Article/edit?id=<?php echo ($article["id"]); ?>">修改</a> | 
		<a href="javascript:void(0)" onclick="delConfirm(<?php echo ($article["id"]); ?>)">删除</a>
	</td>
</tr><?php endforeach; endif; ?>
<!--文章分页-->
<tr class="tdbg">
	<td colspan="7" align="center"><?php echo ($page); ?></td>
</tr>
</table>
</body>
</html>