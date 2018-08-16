<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    //用户未登录时,只能跳转到登录页面,其他页面无法访问
    public function denyAccess()
    {
        // 用户未登录时,重定向到登录页面
       if (!session('username')) 
       {
           redirect('/admin.php/User/login',3,'redirect....');
       }
    }
    //显示登录登录页面
    public function login()
    {
        //模板渲染
        $this->display('login');
    }
    //验证用户名、密码、验证码
    public function verifyLogin()
    {
        //获取表单提交的数据
        $username = $_POST['username'];
        $password = md5( $_POST['password'] );
        $captche = $_POST['verify'];
        //判断用户名是否为空
        if ( !empty( $username ) ) //不为空
        {
            //判断密码是否为空
            if ( !empty( $password ) ) //不为空
            {
               //判断验证码是否一致
               if ( self::check_verify($captche) ) 
               {
                    //判断用户名和密码是否存在
                    if ( $result = M('User')->where("username='{$username}' and password='{$password}'")->select() ) 
                    {
                        // 将用户id存入会话,在添加文章的时候会用到
                        session('user_id',$result[0]['id']);
                        session('username',$username);//将用户名存入会话中
                        $this->success('登陆成功','/admin.php');
                    }else
                    {
                       $this->error('登录失败'); 
                    }
               }else
               {
                    $this->error('验证码不正确');
               } 
            }
        }
    }
    //检测输入的验证码是否正确,$code为用户输入的验证码字符串
    private function check_verify($code)
    {
        $verify = new \Think\Verify();
        return $verify->check($code);
    }
    //生成验证码
    public function Captche()
    {
        //参数设置
        $paras = array(
            'fontSize' => 50,//验证码字体大小
            'length' => 3,
            'useNoise' => false,//关闭验证码杂点
            );   
        $verify = new \Think\Verify($paras);
        $verify->entry();
    }
    //用户退出
    public function logout()
    {
        //删除session
        session('username',null);
        $this->success('即将退出....','/admin.php/User/login');
    }
    //首页显示方法
    public function index()
    {
        //验证登录
        self::denyAccess();
        //创建模型,查询数据
        $users = M('User')->select();
        //模板赋值
        $this->assign('users',$users);
        // 模板渲染
        $this->display('index');
    }
    //显示添加页面
    public function add()
    {
        //验证登录
        self::denyAccess();
        // 模板渲染
        $this->display('add');
    }
    //添加数据
    public function insert()
    {
        //验证登录
        self::denyAccess();
        //获取表单提交的数据
        $data['username'] = $_POST['username'];
        $data['password'] = md5( $_POST['password'] );
        $data['name'] = $_POST['name'];
        $data['tel'] = $_POST['tel'];
        $data['status'] = $_POST['status'];
        $data['role'] = $_POST['role'];
        $data['addate'] = time();
        //数据写入
        $result = M('User')->add($data);
        // 判断数据是否写入成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('新增成功','/admin.php/User/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('新增失败');
        }
        
    }
    //显示修改页面
    public function edit()
    {
        //验证登录
        self::denyAccess();
        //获取地址栏传递的参数
        $id = $_GET['id'];
        //根据id查询某条数据
        $user = M('user')->where("id={$id}")->select();
        //模板赋值
        $this->assign('user',$user);
        // 模板渲染
        $this->display('edit');
    }
    public function update()
    {
        //验证登录
        self::denyAccess();
        //获取表单提交的数据
        $id = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['tel'] = $_POST['tel'];
        $data['status'] = $_POST['status'];
        $data['role'] = $_POST['role'];
        //判断密码是否为空,若为空,则不修改
        // 密码不为空,将密码加密后放入数组
        if ( !empty( $_POST['password'] ) ) $data['password'] = md5( $_POST['password'] );

        //根据条件更新记录
        $result = M('User')->where("id={$id}")->save($data);
        // 判断数据是否更新成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('更新成功','/admin.php/User/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('更新失败');
        }

    }
    //删除方法
    public function del()
    {
        //验证登录
        self::denyAccess();
        //获取地址栏传递的参数
        $id = $_GET['id'];
        //根据条件删除记录
        $result = M('User')->delete($id);
        // 判断数据是否删除成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('删除成功','/admin.php/User/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('删除失败');
        }
    }
}