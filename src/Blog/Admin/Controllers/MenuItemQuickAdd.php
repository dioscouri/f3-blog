<?php 
namespace Blog\Admin\Controllers;

class MenuItemQuickAdd extends \Admin\Controllers\BaseAuth 
{
	public function category($event)
	{
		$model = \Blog\Models\Categories::instance();
		$categories = $model->getList();
		\Base::instance()->set('categories', $categories );
		
		$view = \Dsc\System::instance()->get('theme');
		return $view->renderLayout('Blog/Admin/Views::quickadd/category.php');
	}
	
	public function tag($event)
	{
	    $model = \Blog\Models\Posts::instance();
	    $tags = $model->getTags();
	    \Base::instance()->set('tags', $tags );
	
	    $view = \Dsc\System::instance()->get('theme');
	    return $view->renderLayout('Blog/Admin/Views::quickadd/tag.php');
	}
}