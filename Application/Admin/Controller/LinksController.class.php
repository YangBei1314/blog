<?php
namespace Admin\Controller;
use Think\Controller;
class LinksController extends Controller {
    // //用户未登录时,只能跳转到登录页面,其他页面无法访问
    // public function denyAccess()
    // {
    //     // 用户未登录时,重定向到登录页面
    //    if (!session('username')) 
    //    {
    //        redirect('/admin.php/User/login',3,'redirect....');
    //    }
    // }
   
    //首页显示方法
    public function index(){
        // self::denyAccess();
        //创建模型,查询数据
        $links = M('Links')->select();
        //模板赋值
        $this->assign('links',$links);
        // 模板渲染
        $this->display('index');
    }
    //显示添加页面
    public function add()
    {
        // self::denyAccess();
        // 模板渲染
        $this->display('add');
    }
    //添加数据
    public function insert()
    {
        // self::denyAccess();
        //获取表单提交的数据
        $data['domain'] = $_POST['domain'];
        $data['url'] = $_POST['url'];
        $data['orderby'] = $_POST['orderby'];
        //数据写入
        $result = M('Links')->add($data);
        // 判断数据是否写入成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('新增成功','/admin.php/Links/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('新增失败');
        }
        
    }
    //显示修改页面
    public function edit()
    {
        // self::denyAccess();
        //获取地址栏传递的参数
        $id = $_GET['id'];
        //根据id查询某条数据
        $links = M('Links')->where("id={$id}")->select();
        //模板赋值
        $this->assign('links',$links);
        // 模板渲染
        $this->display('edit');
    }
    public function update()
    {
        // self::denyAccess();
        //获取表单提交的数据
        $id = $_POST['id'];
        $data['domain'] = $_POST['domain'];
        $data['url'] = $_POST['url'];
        $data['orderby'] = $_POST['orderby'];
    
        //根据条件更新记录
        $result = M('Links')->where("id={$id}")->save($data);
        // 判断数据是否更新成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('更新成功','/admin.php/Links/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('更新失败');
        }

    }
    //删除方法
    public function del()
    {
        // self::denyAccess();
        //获取地址栏传递的参数
        $id = $_GET['id'];
        //根据条件删除记录
        $result = M('Links')->delete($id);
        // 判断数据是否删除成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('删除成功','/admin.php/Links/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('删除失败');
        }
    }
}