<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    // //构造函数,验证用户是否登录
    // public function __construct()
    // {
    //     //用户未登录时,重定向到登录页面
    //     if (!session('username')) 
    //    {
    //        redirect('/admin.php/User/login',3,'redirect....');
    //    }
    // }
    //用户未登录时,只能跳转到登录页面,其他页面无法访问
    public function denyAccess()
    {
       if (!session('username')) 
       {
           redirect('/admin.php/User/login',3,'redirect....');
       }
    }
    //首页显示
    public function index(){
        self::denyAccess();
        $this->display('index');
    }
    public function center(){
        self::denyAccess();
        $this->display('center');
    }
    public function left(){
        self::denyAccess();
        $this->display('left');
    }
    public function main(){
        self::denyAccess();
        $this->display('main');
    }
    public function top(){
        self::denyAccess();
        $this->display('top');
    }
}