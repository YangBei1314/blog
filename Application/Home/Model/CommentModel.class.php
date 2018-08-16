<?php 
namespace Home\Model;
use Think\Model;
class CommentModel extends Model
{
	//无限极分类评论查询
	public function commentList($arrs,$id=0,$level=0)
	{
		//静态变量数组
		static $commentLists = array();
		foreach ($arrs as $arr) 
		{
			//判断当前元素的父id是否等于传入的id,即判断传入的id是否有子元素
			if($arr['pid'] == $id)
			{
				//将$level值放入当前数组的最后面
				$arr['level'] = $level;
				//将当前数组放入$commentList数组
				$commentLists[] = $arr;
				//递归
				$this->commentList($arrs,$arr['id'],$level+1);
			}
		}
		//将数组返回
		return $commentLists;
	}
}


 ?>