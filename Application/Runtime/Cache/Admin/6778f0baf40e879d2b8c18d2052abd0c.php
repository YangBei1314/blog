<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="/Public/Admin/Css/public.css" />
<script type="text/javascript" src="/Public/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/Js/menu.js"></script>
<title>管理左边页</title>
<base target="main" />
</head>
<body>
<div class="left">
	<div><img src="/Public/Admin/Images/menu_topimg.gif" /></div>
	<div class="title"><b>网站管理菜单</b></div>
	<div><img src="/Public/Admin/Images/menu_topline.gif" /></div>
	<div class="content">
		<ul class="menu collapsible">
			<li><a href="#">分类管理</a>
				<ul class="acitem">
					<li><a href='/admin.php/Category/add'>添加分类</a></li>
					<li><a href='/admin.php/Category/index'>管理分类</a></li>
				</ul>
			</li>
			<li><a href="#">文章管理</a>
				<ul class="acitem">
					<li><a href='/admin.php/Article/add'>添加文章</a></li>
					<li><a href='/admin.php/Article/index'>管理文章</a></li>
				</ul>
			</li>
			<li><a href="#">文章评论</a>
				<ul class="acitem">
					<li><a href='/admin.php/Comment/index'>管理文章评论</a></li>
				</ul>
			</li>
			<!--友情链接-->
			<li><a href="#">友情链接</a>
				<ul class="acitem">
					<li><a href='/admin.php/Links/add'>添加链接</a></li>
					<li><a href='/admin.php/Links/index'>管理链接</a></li>
				</ul>
			</li>
			<!--用户管理-->
			<li><a href="#">用户管理</a>
				<ul class="acitem">
					<li><a href='/admin.php/User/add'>添加用户</a></li>
					<li><a href='/admin.php/User/index'>用户管理</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div><img src="/Public/Admin/Images/menu_bottomimg.gif" /></div>
</div>
</body>
</html>