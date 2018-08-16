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
    <link href="/Public/Home/css/style.css" rel="stylesheet">
    <link href="/Public/Home/css/public.css" rel="stylesheet" type="text/css">

</head>

<body class="">
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
    <!-- 博客主体 -->
    <div class="wrapper wrapper-content">
        <div class="row contains">
            <!-- 左侧 -->
            <div class="col-sm-8 animated fadeInRight left">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人资料</h5>
                    </div>
                    <div>
                        <div class="ibox-content profile-content">
                            <h4><strong>姓名:张三丰</strong></h4>
                            <h4><strong>性别:男</strong></h4>
                            <h4><strong>生日:1980年11月18日</strong></h4>
                            <h4><strong>星座:摩羯座</strong></h4>
                            <h4><strong>爱好:读书、旅行</strong></h4>
                            <h4><strong>地址：上海市闵行区绿地科技岛广场A座2606室</strong></h4>
                            <h4><strong>简介:会点前端技术，div+css啊，jQuery之类的，不是很精；热爱生活，热爱互联网，热爱新技术；有一个小的团队，在不断的寻求新的突破。
                            </strong></h4>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div><!-- 左侧 -->

            <!-- 右侧 -->
            <div class="col-sm-4 right">
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
            </div><!-- 右侧 -->

            <div class="clear"></div>
        </div>
    </div><!-- 博客主体 -->

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