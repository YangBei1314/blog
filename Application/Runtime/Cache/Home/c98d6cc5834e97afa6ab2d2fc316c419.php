<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Home/css/public.css" rel="stylesheet" type="text/css">
<title>博文内容页</title>
<style>
	.comment_content {
		width: 180px;
		height: 16px;
		display: block;
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
</style>
</head>

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
				<li><a href="/index.php/Home/Index/index">首页</a></li>
				<li><a href="/index.php/Home/Index/menu" class="current">博文目录</a></li>
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
	<div class="toptitle">博文正文</div>
	<!--模板变量输出-->
	<?php if(is_array($articleLists)): foreach($articleLists as $key=>$articleList): ?><!--博文正文-->
	<div class="blogdetail">
		<div class="title">
			<a href="javascript:void(0)"><?php echo ($articleList["title"]); ?></a>
			<span>(<?php echo (date('Y-m-d H:i:s',$articleList["addate"])); ?>)</span>
		</div>
		<div class="content">
			<?php echo ($articleList["content"]); ?>
		</div>
		<div class="bottom">
			<!--页面分享代码-->
			<div class="bdsharebuttonbox">
				<a href="#" class="bds_more" data-cmd="more"></a>
				<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
				<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
				<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
				<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
			</div>
			<!--<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>-->
			<!--//页面分享代码-->
			<div class="other">
				作者:<?php echo ($articleList["username"]); ?> | 
				分类:<?php echo ($articleList["classname"]); ?> | 
				阅读:<?php echo ($articleList["read"]); ?> | 
				点赞:<a href="/index.php/Home/Index/praise?id=<?php echo ($articleList["id"]); ?>"><?php echo ($articleList["praise"]); ?></a> | 
				评论:<?php echo ($articleList["comment_count"]); ?>
			</div>
		</div>
	</div><!--//博文正文--><?php endforeach; endif; ?>
	<!--分页代码-->
	<div class="pagelist2">
		<ul>
		<!-- empty标签用于判断某个变量是否为空 -->
		<?php if(empty($pageBefore)): ?><li>前一篇：没有了</li>
		<?php else: ?>
			<li>前一篇：<a href="/index.php/Home/Index/content?id=<?php echo ($pageBefore[0]['id']); ?>"><?php echo ($pageBefore[0]['title']); ?></a></li><?php endif; ?>
		<?php if(empty($pageAfter)): ?><li>后一篇：没有了</li>
		<?php else: ?>
			<li>后一篇：<a href="/index.php/Home/Index/content?id=<?php echo ($pageAfter[0]['id']); ?>"><?php echo ($pageAfter[0]['title']); ?></a></li><?php endif; ?>
		</ul>
	</div><!--//分页代码-->

	<!--评论-->
	<div class="comment">
		<div class="title">评论列表</div>
		<!--模板变量输出-->
		<?php if(is_array($commentLists)): foreach($commentLists as $key=>$commentList): ?><!--主评论内容-->
		<!--我们可以对模板输出使用运算符，包括对“+”“ ” “*” “/”和“%”的支持-->
		<!--在使用运算符的时候，不再支持点语法和常规的函数用法-->
		<!--利用level显示无限极分类的等级-->
		<ul class="ul01" style="padding-left:<?php echo ($commentList['level']*30); ?>px">
			<li>
				<img src="/Public/Home/images/head.png">
				<p class="p1">
					<b><a href="#"><?php echo ($commentList['username']); ?></a> 
					发布于<?php echo (date('Y-m-d H:i:s',$commentList['addate'])); ?></b>
					<a href="javascript:void(0)">回复</a>
				</p>
				<p class="p2"><?php echo ($commentList['content']); ?></p>
				<div class="clear">
			</li>
		</ul><!--//主评论内容--><?php endforeach; endif; ?>
		<form name="comment" method="post" action="/admin.php/Comment/insert">
			<div>发表评论(*)</div>
			<textarea name="content" style="width:95%;height:150px;"></textarea>
			<!-- 将当前文章的id通过隐藏域提交
			文章表中的id等于评论表中的article_id
			 -->
			<input type="hidden" name="article_id" value="<?php echo ($articleList["id"]); ?>">
			<input type="hidden" name="pid" value="0">
			<br><input type="submit" value="提交" />
		</form>
	</div><!--//评论-->
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