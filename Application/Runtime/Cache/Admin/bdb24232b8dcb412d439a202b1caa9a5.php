<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="/Public/Admin/Css/public.css">
<title>顶部框架页</title>
<script type="text/javascript">
//JS简单问候语函数
function showTime(){
	//定义问候语变量
	var str = "";
	//获取id=showTime的元素
	var liObj = document.getElementById("showTime");
	//创建日期对象实例
	var today = new Date();
	//取出小时数
	var hours = today.getHours();
	//根据小时数，输出不同的问候语
	if(parseInt(hours)>=0 && parseInt(hours)<=11){
		str = "早上好";
	}else if(parseInt(hours)>11 && parseInt(hours)<=13){
		str = "中午好";
	}else if(parseInt(hours)>13 && parseInt(hours)<=17){
		str = "下午好";
	}else{
		str = "晚上好";
	}
	//向id=showTime元素写入内容
	liObj.innerHTML = str;

}
window.onload = showTime;
</script>
</head>

<body>
<div class="top">
	<div class="top1">
		<ul>
			<li>
			<!-- 点击退出按钮时,如何让登录页面跳出框架?使用target="_top" -->
				<a target="_top" href="/admin.php/User/logout" class="exit">
					<img style="border:none;" src="/Public/Admin/Images/tuichu.gif">
				</a>
			</li>
			<li><a target="_top" href="javascript:void(0)"><?php echo (session('username')); ?></a>，欢迎你！</li>
			<li id="showTime"></li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="top2">
		<ul>
			<li><a target="_top" href="/index.php">返回前台</a></li>
			<li><a target="_top" href="/admin.php/Index/index">后台首页</a></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
</body>
</html>