<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class IndexController extends Controller {
    //页面右侧文档归档、评论、友情链接获取的公共方法
    public function common()
    {
        // 无限级分类
        $model = new \Home\Model\CategoryModel();
        $categorys = $model->categoryList( $model->select() );
        
        //评论
        $comments = M('Comment')->field('username,comment.addate as addate,content')->join('left join user on user.id=comment.user_id')->limit(5)->select();
        
        //按日期对文章进行归档:
        //难点:mysql中的聚合函数的特征
        $sql = "select date_format(from_unixtime(addate),'%Y年%m月') as addate1,count(addate) as article_count from article group by addate1";
        $articles = M('Article')->query($sql);
        
        //实例化友情链接模型类,并读取数据集
        $links = M('Links')->select();

        // 模板赋值
        $this->assign('categorys',$categorys);
        $this->assign('comments',$comments);
        $this->assign('articles',$articles);
        $this->assign('links',$links);
    }


	//博客首页显示方法
    public function index()
    {

        //获取地址栏和表单提交的数据
        $id = $_GET['category_id'];

        //$yearmonth = $_GET['year'];
        $keyword = $_POST['title'];
        //构建where子句
        $where = 2>1;
        if(isset($id)) $where .= " and category_id={$id}";
        //if(isset($yearmonth)) $where .= " and article.addate='{$yearmonth}'";
        if(isset($keyword)) $where .= " and title like '%".$keyword."%'";
        // echo $where;
        //数据分页
        $counts = M('Article')->where($where)->count();//查询满足要求的总记录数
        //实例化分页类 传入总记录数和每页显示的记录数5
        $Page = new \Think\Page($counts,5);
        // 分页显示输出
        $show = $Page->show();
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $articleList = M('article')
            ->field("article.*,username,classname")
            ->join('left join user on article.user_id=user.id')
            ->join('left join category on article.category_id=category.id')
            ->where($where)//查询条件
            ->limit($Page->firstRow.','.$Page->listRows)->select();

        // 调用公共方法
        $this->common();
    	// 模板赋值
        $this->assign('articleList',$articleList);//赋值数据集
        $this->assign('show',$show);//赋值分页输出
    	// 模板渲染
        $this->display('index');
    }
    // 内容页显示方法
    public function content()
    {
        //获取查看当前文章的id
        $id = $_GET['id'];
        //对文章的阅读数进行更新
        M('Article')->execute("update article set `read`=`read`+1 where id={$id}");
        // 根据条件对文章表进行查询
        $articleLists = M('article')
            ->field('article.*,user.username,category.classname')
            ->join('left join user on article.user_id=user.id')
            ->join('left join category on article.category_id=category.id')
            ->where("article.id={$id}")
            ->select();
        //上一篇
        $pageBefore = M('article')->where("id<{$id}")->order('id desc')->limit(1)->select();  
        //下一篇
        $pageAfter = M('article')->where("id>{$id}")->order('id asc')->limit(1)->select();
        //评论列表
        $model = new \Home\Model\CommentModel();
        //评论表与用户表联合查询当前文章下的评论
        $list = $model->field('comment.*,username')
            ->join('left join user on user.id=comment.user_id')
            ->where("article_id={$id}")
            ->select();
        $commentLists = $model->commentList( $list );

        // 调用公共方法
        $this->common();

        //模板赋值
        $this->assign('articleLists',$articleLists);
        $this->assign('pageBefore',$pageBefore);
        $this->assign('pageAfter',$pageAfter);
        $this->assign('commentLists',$commentLists);
        // 显示
        $this->display('content');
    }
    //添加评论:content页面表单中的父id如何获取
    // public function insert()
    // {
    //     //获取表单提交的数据
    //     $data['content'] = $_POST['name'];
    //     $data['article_id'] = $_POST['article_id'];
    //     $data['pid'] = $_POST['pid'];
    //     var_dump($data);
    //     die();
    // }
    //点赞功能
    public function praise()
    {
        //获取文章的id
        $id = $_GET['id'];
        //判断用户是否登录,只有登录用户才能点赞
        $user = session('username');//从会话中取出用户名
        if ( !empty($user) ) 
        {
            // 判断该文章是否点赞过,如果已经点赞过,不能对同一篇文章重复点赞
            // 需要记录文章点赞过的状态,可以用数组来存储点赞状态
            if ( empty($_SESSION['praise'][$id]) ) 
            {
                //更新点赞数
                $model = new \Home\Model\ArticleModel();//实例化模型类
                $model->execute("update article set praise=praise+1 where id={$id}");
                //将更新的点赞状态存入会话
                $_SESSION['praise'][$id] = true;
                $this->success('点赞成功',"/index.php/Home/Index/content?id={$id}",3);
            }else
            {
                $this->error('不能重复点赞',"/index.php/Home/Index/content?id={$id}",3);
            }
        }else
        {//用户未登录,跳转至登录页面
            $this->error('请先登录...','/admin.php/User/login',3);
        }
        //判断是否是第一次点赞
    }
    // 博客列表页显示方法
    public function menu()
    {
        //获取地址栏和表单提交的数据
        $id = $_GET['category_id'];

        //$yearmonth = $_GET['year'];
        $keyword = $_POST['title'];
        //构建where子句
        $where = 2>1;
        if(isset($id)) $where .= " and category_id={$id}";
        //if(isset($yearmonth)) $where .= " and article.addate='{$yearmonth}'";
        if(isset($keyword)) $where .= " and title like '%".$keyword."%'";
        // echo $where;
        //数据分页
        $counts = M('Article')->where($where)->count();//查询满足要求的总记录数
        //实例化分页类 传入总记录数和每页显示的记录数5
        $Page = new \Think\Page($counts,35);
        // 分页显示输出
        $show = $Page->show();
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $articleLists = M('article')
            ->field("article.*,username,classname")
            ->join('left join user on article.user_id=user.id')
            ->join('left join category on article.category_id=category.id')
            ->where($where)//查询条件
            ->limit($Page->firstRow.','.$Page->listRows)->select();

        // 调用公共方法
        $this->common();
        // 模板赋值
        $this->assign('articleLists',$articleLists);//赋值数据集
        $this->assign('show',$show);//赋值分页输出
        // 模板渲染
        $this->display('list');
    }
    //图片列表页显示方法
    public function show()
    {
        $this->common();
        $this->display('image');
    }
    //关于我页面显示方法
    public function about()
    {
        $this->common();
        $this->display('about');
    }
}