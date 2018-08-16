<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {
    // //用户未登录时,只能跳转到登录页面,其他页面无法访问
    // public function denyAccess()
    // {
    //     // 用户未登录时,重定向到登录页面
    //    if (!session('username')) 
    //    {
    //        redirect('/admin.php/User/login',3,'redirect....');
    //    }
    // }
    
   // 评论功能未完善的地方:1、后台首页如何读取上层评论;
   // 2、前台页面(内容详情页)发表评论时如何实现在某一个用户下去评论:
   // 解决办法：每一条评论后面有一个回复的链接,当点击链接的时候,将该条评论的id值放在地址栏进行提交到insert方法,作为新插入评论的父id
   

    //首页显示方法
    public function index(){
        // self::denyAccess();
        //构建查询条件
        $where = 2>1;
        //获取表单提交的关键字
        if( !empty( $_POST['keyword'] ) ) $where .= " and comment.content like '%".$_POST['keyword']."%'";
        // echo $where;
        //创建模型,查询数据
        //创建Comment模型类对象
        $model = new \Admin\Model\CommentModel();
        $lists = $model
                    ->field('comment.*,username,title')
                    ->join('left join user on comment.user_id=user.id')
                    ->join('left join article on comment.article_id=article.id')
                    ->where($where)
                    ->page($_GET['p'].',25')
                    ->select();
        // var_dump($lists);
        // die();
        $comments = $model->commentList( $lists );
        $count = $model->where($where)->count();//查询满足要求的总记录数
        //实例化分页类 传入总记录数和每页显示条数
        $Page = new \Think\Page($count,25);
        $show = $Page->show();//分页输出显示

        //模板赋值
        $this->assign('comments',$comments);//赋值数据集
        $this->assign('page',$show);//赋值分页输出
        // 模板渲染
        $this->display('index');
    }
    //添加数据
    public function insert()
    {
        // self::denyAccess();
        //获取表单提交的数据
        $data['user_id'] = session('user_id');//从会话中取出当前用户的id
        $data['article_id'] = $_POST['article_id'];
        $data['pid'] = $_POST['pid'];
        $data['content'] = $_POST['content'];
        $data['addate'] = time();

        //数据写入
        $result = M('Comment')->add($data);
        // 判断数据是否写入成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('新增成功',"/index.php/Home/Index/content?id={$_POST['article_id']}");
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('新增失败');
        }
        
    }
    //删除方法
    public function del()
    {
        // self::denyAccess();
        //获取地址栏传递的参数
        $id = $_GET['id'];
        //根据当前id值进行无限极评论的查询,即判断当前id下是否还有子评论
        $model = new \Admin\Model\CommentModel();
        $comments = $model->commentList( $model->select(),$id );
        //遍历二维数组,取出每个元素下的id属性的值,并对id进行拼接
        foreach ($comments as $comment) {
            $id .= ','.$comment['id'];
        }

        //根据条件删除记录
        $result = M('Comment')->delete($id);
        // 判断数据是否删除成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('删除成功','/admin.php/Comment/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('删除失败');
        }
    }
}