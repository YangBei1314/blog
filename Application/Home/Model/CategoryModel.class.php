<?php 
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model
{
	// 无限级分类的方法
	public function categoryList($arrs,$id=0,$level=0)
	{
		//定义静态的存储数组
		static $catrgorysList = Array();
		// 遍历数组
		foreach ($arrs as $arr) 
		{
			// 判断当前元素的pid是否等于传入的id
			if ( $arr['pid'] == $id ) 
			{
				// 为当前数组添加level下标
				$arr['level'] = $level;
				// 将当前数组存入
				$catrgorysList[] = $arr;
				// 递归
				self::categoryList($arrs,$arr['id'],$level+1);
			}
		}
		// 返回数组
		return $catrgorysList;
	}

	
}


 ?>