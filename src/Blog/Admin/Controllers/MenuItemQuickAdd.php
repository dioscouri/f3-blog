<?php 
namespace Blog\Admin\Controllers;

class MenuItemQuickAdd extends \Admin\Controllers\BaseAuth 
{
	public function category($event)
	{
		$model = \Blog\Admin\Models\Categories::instance();
		$categories = $model->getList();
		\Base::instance()->set('categories', $categories );
		
		$view = new \Dsc\Template;
		return $view->renderLayout('Blog/Admin/Views::quickadd/category.php');
	}
}