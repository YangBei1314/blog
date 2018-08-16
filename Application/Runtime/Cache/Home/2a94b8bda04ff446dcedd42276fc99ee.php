<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Home/css/public.css" rel="stylesheet" type="text/css">
<title>博客首页</title>
<style>
	.comment_content {
		width: 180px;
		height: 14px;
		display: block;
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
</style>
</head>
<!--遗留问题:点击文档归档中的链接如何把符合条件的文章显示出来
查询条件、分页、查询如何结合
tp框架中与str_replace功能相同的函数 路由配置
-->
<body>
<!--项部导航栏-->
<div class="topbar">
	<div class="content">
		<div class="divL">
			<a href="javascript:void(0)">设为首页</a> 
			<a href="javascript:void(0)">加入收藏</a>
		</div>
		<div class="divR">
			<span>欢迎，<font color="red"><?php echo (session('username')); ?></font>(管理员)！</span>
			<a href="/admin.php">后台管理</a>
			<a href="/admin.php/User/logout">退出管理</a>
		</div>
	</div>
</div><!--//顶部导航栏-->

<!--博客背景-->
<div class="blogbg">
	<div class="header">
		<div class="title">
			<h2>九里沟风景区的博客</h2>
			<p><a href="javascript:void(0)">http://www.2016.cn/index.php</a></p>
		</div>
		<div class="menu">
			<ul>
				<li><a href="/index.php/Home/Index/index" class="current">首页</a></li>
				<li><a href="/index.php/Home/Index/menu">博文目录</a></li>
				<li><a href="/index.php/Home/Index/show">图片</a></li>
				<li><a href="/index.php/Home/Index/about" class="noLine">关于我</a></li>
			</ul>
		</div>
	</div>
</div><!--//博客背景-->

<!--博客主体-->
<div class="contains">
<!--左边栏-->
<div class="left">
	<div class="toptitle">博文</div>
	<!--模板变量输出-->
	<?php if(is_array($articleList)): foreach($articleList as $key=>$aList): ?><!--博文简介-->
	<div class="block">
		<div class="title">
			<a href="/index.php/Home/Index/content?id=<?php echo ($aList['id']); ?>"><?php echo ($aList['title']); ?></a>
			<span>(<?php echo (date('Y-m-d H:i:s',$aList['addate'])); ?>)</span>
		</div>
		<div class="content">
			<?php echo mb_substr($aList['content'],0,200,'utf-8');?>...
		</div>
		<div class="bottom">
			<span>
				作者:<?php echo ($aList['username']); ?> | 
				分类:<?php echo ($aList['classname']); ?> | 
				阅读:<?php echo ($aList['read']); ?> | 
				点赞:<?php echo ($aList['praise']); ?> | 
				评论:<?php echo ($aList['comment_count']); ?>
			</span>
			<a href="/index.php/Home/Index/content?id=<?php echo ($aList['id']); ?>">查看全文>></a>
		</div>
	</div><!--//博文简介--><?php endforeach; endif; ?>
	<!--分页代码-->
	<div class="pagelist">
		<?php echo ($show); ?>
	</div><!--//分页代码-->
</div><!--//左边栏-->
<!--右边栏-->
<div class="right">
	<!--文章标题搜索-->
	<div class="search">
		<div class="title">文章标题搜索</div>
		<div class="content">
			<form name="form1" method="post" action="/index.php/Home/Index/index">
				<input class="search" type="text" name="title">
				<input type="submit" value="搜索">
			</form>
		</div>
	</div><!--//文章标题搜索-->
	<!--文章分类-->
	<div class="category">
		<div class="title">文章分类</div>
		<div class="content">
			<ul>
			<!--模板变量输出-->
			<?php if(is_array($categorys)): foreach($categorys as $key=>$category): ?><li>
					<a href="/index.php/Home/Index/index?category_id=<?php echo ($category["id"]); ?>"><?php echo ($category["classname"]); ?></a>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div><!--//文章分类-->
	<!--最新评论-->
	<div class="comment">
		<div class="title">最新评论</div>
		<div class="content">
			<ul>
			<!--模板变量输出-->
			<?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><li>
					<div>
						<?php echo ($comment["username"]); ?>
						<span><?php echo (date('Y-m-d h:i',$comment["addate"])); ?></span>
					</div>
					<a class="comment_content" href="javascript:void(0)"><?php echo ($comment["content"]); ?></a>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div><!--//最新评论-->
	<!--文章归档-->
	<div class="category-date">
		<div class="title">文章归档</div>
		<div class="content">
			<ul>
			<!--模板变量输出-->
			<?php if(is_array($articles)): foreach($articles as $key=>$article): ?><li>
					<a href="/index.php/Home/Index/index?year=<?php echo ($article["addate1"]); ?>"><?php echo ($article["addate1"]); ?></a> 
					(<font color="red"><?php echo ($article["article_count"]); ?></font>)
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div><!--//文章归档-->
	<!--友情链接-->
	<div class="links">
		<div class="title">友情链接</div>
		<div class="content">
			<ul>
			<!--模板变量输出-->
				<?php if(is_array($links)): foreach($links as $key=>$link): ?><li><a href="<?php echo ($link["url"]); ?>"><?php echo ($link["domain"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div><!--//友情链接-->
</div><!--//右边栏-->
<div class="clear"></div>
</div><!--//博客主体-->

<!--网页底部-->
<div class="footer">
版权所有 2006 - 2016 北京传智播客教育科技有限公司   地址：北京市昌平区建材城西路金燕龙办公楼一层   邮编：100096<br />电话：400-618-4000   邮箱: zhanghj@itcast.cn   京ICP备08001421号   京公网安备110108007702
</div><!--//网页底部-->
</body>
</html>