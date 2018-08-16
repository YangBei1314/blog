<?php  
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model
{
	//无限极分类的读取
	public function categoryList($arrs=array(),$id=0,$level=0)
	{
		//静态的存储变量的数组
		static $categoryLists = array();
		// 遍历数组
		foreach ($arrs as $arr) 
		{
			//判断当前元素下是否还有下级元素
			if ( $arr['pid'] == $id ) 
			{
				//为当前元素添加一个级别单元
				$arr['level'] = $level;
				//将当前元素添加到$categoryLists数组中
				$categoryLists[] = $arr;
				// 递归
				self::categoryList($arrs,$arr['id'],$level+1);
			}
		}
		return $categoryLists;
	}
}


?>