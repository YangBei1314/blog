<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>关闭左边菜单</title>
<script type="text/javascript">
var displayBar=true;
var displayBar1=true;
function switchBar(obj,i){
	if(i=="top"){
		if(displayBar1)
		{
			parent.frametop.rows="0,*";
			displayBar1=false;
			obj.title="打开上边页";
		}else{
			parent.frametop.rows="60,*";
			displayBar1=true;
			obj.title="关闭上边页";
		}
	}else
	  {
		if(displayBar)
		{
			parent.frameb.cols="0,10,*";
			displayBar=false;
			obj.src="/Public/Admin/Images/ad_show_left.gif";
			obj.title="打开左边页";
		}else
		{
			parent.frameb.cols="185,10,*";
			displayBar=true;
			obj.src="/Public/Admin/Images/ad_hide_left.gif";
			obj.title="关闭左边页";
		}
	}
}
</script>
</head>
<body leftmargin="0" topmargin="0" oncontextmenu='self.event.returnValue=false'>
<noscript><iframe src=*.html></iframe></noscript>
<table height='530' width='10%' border=0 cellpadding=0 cellspacing=1 bgcolor="FFFFF">
	<tr>
		<td valign=top><img src="/Public/Admin/Images/ad_show_top.gif" title="关闭上边页" style="cursor:pointer" align='top'onClick="switchBar(this,'top')"></td>
	</tr>
	<tr>
		<td height="100%" valign="middle"><img src="/Public/Admin/Images/ad_hide_left.gif" title="关闭左边页" style="cursor:pointer" onClick="switchBar(this,'bottom')"></td>
	</tr>
</table>
</body>
</html>