<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
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
        /**
         * 搜索条件如何显示在页面上的流程：
         * 当点击搜索按钮的时候,先跳到控制器执行响应方法,然后把搜索条件的值赋值传递给模板
         * 最后在模板中将搜索条件显示在页面上
         */
        // 构建查询条件
        $where = 2>1;
        if ( !empty($_REQUEST['category_id']) ) $where .= " and category_id={$_REQUEST['category_id']}";
        if ( !empty($_REQUEST['keyword']) ) $where .= " and title like '%".$_REQUEST['keyword']."%'";
        // echo $where;
        // die();

        //实例化Article对象
        $article = M('Article');
        //查询满足要求的总记录数
        $count = $article->where($where)->count();
        // 实例化分页类:传入总记录数和每页显示的记录数
        $Page = new \Think\Page($count,25);
        $show = $Page->show();//分页显示输出
        //进行分页数据查询,注意limit方法的参数要使用Page类的属性
        $articles = $article
                    ->field('article.*,classname,username')
                    ->join('left join category on article.category_id=category.id')
                    ->join('left join user on article.user_id=user.id')
                    ->where($where)
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select();
        //读取无限极分类数据
        $model = new \Admin\Model\CategoryModel();
        $categorys = $model->categoryList( $model->select() );
        // var_dump($categorys);
        
        //模板赋值
        $this->assign('articles',$articles);//赋值数据集
        $this->assign('page',$show);//赋值分页输出
        $this->assign('categorys',$categorys);
        $this->assign('keywords',$_REQUEST['keyword']);//为搜索关键词赋值
        $this->assign('categoryId',$_REQUEST['category_id']);//为搜索关键词赋值
        // 模板渲染
        $this->display('index');
    }
    //显示添加页面
    public function add()
    {
        // self::denyAccess();
        //读取无限极分类数据
        $model = new \Admin\Model\CategoryModel();
        $categorys = $model->categoryList( $model->select() );
        // var_dump($categorys);
        // die();
        //模板赋值
        $this->assign('categorys',$categorys);
        // 模板渲染
        $this->display('add');
    }
    //添加数据
    public function insert()
    {
        // self::denyAccess();
        //获取表单提交的数据
        $data['category_id'] = $_POST['category_id'];
        //从会话中取出user_id
        $data['user_id'] = session('user_id');
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];
        $data['orderby'] = $_POST['orderby'];
        $data['top'] = $_POST['top'];
        $data['addate'] = time();
        //数据写入
        $result = M('Article')->add($data);
        // 判断数据是否写入成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('新增成功','/admin.php/Article/index');
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
        $articles = M('Article')->where("id={$id}")->select();

        //读取无限极分类数据
        $model = new \Admin\Model\CategoryModel();
        $categorys = $model->categoryList( $model->select() );

       
        //模板赋值
        $this->assign('articles',$articles);
        $this->assign('categorys',$categorys);
        // 模板渲染
        $this->display('edit');
    }
    public function update()
    {
        // self::denyAccess();
        //获取表单提交的数据
        $id = $_POST['id'];
        $data['category_id'] = $_POST['category_id'];
        $data['title'] = $_POST['title'];
        $data['orderby'] = $_POST['orderby'];
        $data['top'] = ( $_POST['top'] ) == 1  ? 1 : 0;
        $data['content'] = $_POST['content'];

        // echo $data['top'] ;
        // die();
    
        //根据条件更新记录
        $result = M('Article')->where("id={$id}")->save($data);
        // 判断数据是否更新成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('更新成功','/admin.php/Article/index');
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
        $result = M('Article')->delete($id);
        // 判断数据是否删除成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('删除成功','/admin.php/Article/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('删除失败');
        }
    }
}