<?php
namespace Admin\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class CategoryController extends Controller {
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
        //创建模型,查询数据,并对查询出的原始数据进行无限极分类
        $model = new \Admin\Model\CategoryModel();
        //连表查询
        $lists = $model
                ->field('category.*,count(category_id) as article_counts')
                ->join('left join article on article.category_id=category.id')
                ->group('id')
                ->select();
        $categorys = $model->categoryList( $lists );
        // var_dump($categorys);
        // die();
        //模板赋值
        $this->assign('categorys',$categorys);
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
        // 模板赋值
        $this->assign('categorys',$categorys);
        // 模板渲染
        $this->display('add');
    }
    //添加数据
    public function insert()
    {
        // self::denyAccess();
        //获取表单提交的数据
        $data['classname'] = $_POST['classname'];
        $data['orderby'] = $_POST['orderby'];
        $data['pid'] = $_POST['pid'];
        //数据写入
        $result = M('Category')->add($data);
        // 判断数据是否写入成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('新增成功','/admin.php/Category/index');
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
        //读取无限极分类数据
        $model = new \Admin\Model\CategoryModel();
        $categoryLists = $model->categoryList( $model->select() );
        //获取地址栏传递的参数
        $id = $_GET['id'];
        //根据id查询某条数据
        $categorys = M('Category')->where("id={$id}")->select();
        //模板赋值
        $this->assign('categoryLists',$categoryLists);
        $this->assign('categorys',$categorys);
        // 模板渲染
        $this->display('edit');
    }
    public function update()
    {
        // self::denyAccess();
        //获取表单提交的数据
        $id = $_POST['id'];
        $data['classname'] = $_POST['classname'];
        $data['orderby'] = $_POST['orderby'];
        $data['pid'] = $_POST['pid'];
    
        //根据条件更新记录
        $result = M('Category')->where("id={$id}")->save($data);
        // 判断数据是否更新成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('更新成功','/admin.php/Category/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('更新失败');
        }

    }
    //删除方法
    public function del()
    {
        /**
         * 1.获取要删除的id,即地址栏传递的参数
         * 2.调用无限极分类方法判断当前id下是否还有分类
         * 3.若有分类,获取其分类的id
         * 4.对所有id进行拼接,然后删除
         */
        // self::denyAccess();
        //1.获取地址栏传递的参数
        $id = $_GET['id'];
        //2.根据条件读取无限极分类数据,即判断当前id下是否还有分类
        $model = new \Admin\Model\CategoryModel();
        $categorys = $model->categoryList( $model->select(),$id );
        //3.遍历数组,去除每个元素中id值
        foreach ($categorys as $key => $value) {
            $id .= ','.$value['id'];
        }
        //4.根据条件删除记录
        $result = M('Category')->delete($id);
        // 判断数据是否删除成功
        if ( $result ) 
        {
            //设置成功后跳转页面的地址
            $this->success('删除成功','/admin.php/Category/index');
        }else
        {
            // 错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('删除失败');
        }
    }
}