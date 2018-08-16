<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/Public/Admin/Css/public.css" rel="stylesheet" type="text/css" />
<title>用户管理</title>
<script>
	//确认是否删除的方法
	function delConfirm(id){
		if ( window.confirm("你确定要删除吗?") ) {
			location.href = "/admin.php/User/del?id="+id;
		}
	}

</script>
</head>

<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0" oncontextmenu="self.event.returnValue=false">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>用户管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="/admin.php/User/index">管理首页</a>&nbsp;|&nbsp;
			<a href="/admin.php/User/add">添加用户</a>
		</td>
	</tr>
</table>
<br />
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title">
		<td align="center">编号</td>
		<td align="center">用户名</td>
		<td align="center">真实姓名</td>
		<td align="center">联系电话</td>
		<td align="center">角色</td>
		<td align="center">最后登录IP</td>
		<td align="center">最后登录时间</td>
		<td align="center">登录总次数</td>
		<td align="center">账号状态</td>
		<td align="center">操作选项</td>
	</tr>
	<!-- 模板变量输出 -->
	<?php if(is_array($users)): foreach($users as $key=>$user): ?><tr class="tdbg">
		<td align="center"><?php echo ($user["id"]); ?></td>
		<td align="center"><?php echo ($user["username"]); ?></td>
		<td align="center"><?php echo ($user["name"]); ?></td>
		<td align="center"><?php echo ($user["tel"]); ?></td>
		<td align="center">
			<?php if(($user["role"] == 1)): ?><font color="red">超级管理员</font>
			<?php elseif(($user["role"] == 0)): ?>普通管理员<?php endif; ?>
		</td>
		<td align="center"><?php echo ($user["last_login_ip"]); ?></td>
		<td align="center"><?php echo (date("Y-m-d H:i:s",$user["last_login_time"])); ?></td>
		<td align="center"><?php echo ($user["login_times"]); ?></td>
		<td align="center">
			<?php if(($user["status"] == 1)): ?>正常
			<?php elseif(($user["status"] == 0)): ?><font color="red">关闭</font><?php endif; ?>
		</td>
		<td align="center">
			<a href="/admin.php/User/edit?id=<?php echo ($user["id"]); ?>">修改</a> | 
			<a href="javascript:void(0)" onclick="delConfirm(<?php echo ($user["id"]); ?>)">删除</a>
		</td>
	</tr><?php endforeach; endif; ?>
</table>
</body>
</html>