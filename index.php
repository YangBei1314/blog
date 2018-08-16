<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件
//ThinkPHP框架:一个入口文件对应一个模块,即admin.php对应Application/Admin模块(自动生成的),
//index.php对应Application/Home模块(自动生成的)
//可以在入口文件中绑定模块和控制器,以简化访问地址
//define('BIND_MODULE','Home');绑定Home模块到当前入口文件
//define('BIND_CONTROLLER','Index');绑定Index控制器到当前入口文件
//访问地址由:http://yangbei.com/index.php/Home/Index/index
//变为http://yangbei.com/index.php/index


// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
// 定义应用目录
define('APP_PATH','./Application/');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单