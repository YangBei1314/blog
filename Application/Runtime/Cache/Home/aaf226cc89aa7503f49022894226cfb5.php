<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 图片列表</title>
    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/Public/Home/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Home/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/Public/Home/css/animate.css" rel="stylesheet">
    <link href="/Public/Home/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/Public/Home/css/public.css" rel="stylesheet" type="text/css">

</head>

<body class="gray-bg">
    <!--项部导航栏-->
    <div class="topbar">
        <div class="content">
            <div class="divL">
                <a href="javascript:void(0)">设为首页</a> 
                <a href="javascript:void(0)">加入收藏</a>
            </div>
            <div class="divR">
                <span>欢迎，<font color="red">admin</font>(管理员)！</span>
                <a href="javascript:void(0)">后台管理</a>
                <a href="javascript:void(0)">退出管理</a>
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
                    <li><a href="index.php/Home/Index/show">图片</a></li>
                    <li><a href="index.php/Home/Index/index" class="noLine">关于我</a></li>
                </ul>
            </div>
        </div>
    </div><!--//博客背景-->

    <div class="wrapper wrapper-content">
        <div class="row contains">
        
            <!-- 右侧 -->
            <div class="col-sm-9 animated fadeInRight left">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="file-box">
                            <div class="file">
                                <a href="file_manager.html#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <img alt="image" class="img-responsive" src="img/p1.jpg">
                                    </div>
                                    <div class="file-name">
                                        Italy street.jpg
                                        <br/>
                                        <small>添加时间：2014-10-13</small>
                                    </div>
                                </a>

                            </div>
                        </div>
                        
                       
                       
                        
                       

                    </div>
                </div>
            </div><!-- 右侧 -->

            <!-- 左侧 -->
            <div class="col-sm-3 right">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">   
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div><!-- 左侧 -->

            <div class="clear"></div>
        </div>
    </div>

    <!--网页底部-->
    <div class="footer">
    版权所有 2006 - 2016 北京传智播客教育科技有限公司   地址：北京市昌平区建材城西路金燕龙办公楼一层   邮编：100096<br />电话：400-618-4000   邮箱: zhanghj@itcast.cn   京ICP备08001421号   京公网安备110108007702
    </div><!--//网页底部-->
    <!-- 全局js -->
    <script src="/Public/Home/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Home/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script src="/Public/Home/js/content.js?v=1.0.0"></script>
    <script>
        $(document).ready(function () {
            $('.file-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>
</body>

</html>