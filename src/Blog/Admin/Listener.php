<?php 
namespace Blog\Admin;

class Listener extends \Prefab 
{
	public function onDisplayAdminUserEdit($event){
		$item = $event->getArgument( 'item'  );
		$tabs = $event->getArgument( 'tabs' );
		$content = $event->getArgument( 'content' );
			
		\Base::instance()->set('item', $item );
		$view = \Dsc\System::instance()->get('theme');
				
		$tabs['blog'] = 'Blog';			
		$content['blog'] = $view->renderLayout('Blog/Admin/Views::users/tab.php');
			
		$event->setArgument( 'tabs', $tabs );
		$event->setArgument( 'content', $content );
	}
	
	public function onSystemRebuildMenu( $event )
	{
		if ($model = $event->getArgument('model'))
		{
			$root = $event->getArgument( 'root' );
			$blog = clone $model;
			 
			$blog->insert(
					array(
							'type'	=> 'admin.nav',
							'priority' => 30,
							'title'	=> 'Blog',
							'icon'	=> 'fa fa-keyboard-o',
        					'is_root' => false,
							'tree'	=> $root,
							'base' => '/admin/blog/',
						)
			);
	        $children = array(
	            array( 'title'=>'Posts', 'route'=>'/admin/blog/posts', 'icon'=>'fa fa-list' ),
	            array( 'title'=>'Categories', 'route'=>'/admin/blog/categories', 'icon'=>'fa fa-folder' ),
	            array( 'title'=>'Add New', 'route'=>'/admin/blog/category/create', 'hidden'=>true ),
	            array( 'title'=>'Settings', 'route'=>'/admin/blog/settings', 'icon'=>'fa fa-cogs' ),
	        );
	        $blog->addChildrenItems( $children, $root );
	
	        \Dsc\System::instance()->addMessage('Blog added its admin menu items.');
	    }
	}
	
	public function onAdminNavigationGetQuickAddItems( $event )
	{
	    $items = $event->getArgument('items');
	    $tree = $event->getArgument('tree');
	
	    $item = new \stdClass;
	    $item->title = 'Blog Category';
	    $item->form = \Blog\Admin\Controllers\MenuItemQuickAdd::instance()->category($event);
	
	    $items[] = $item;
	
	    $item = new \stdClass;
	    $item->title = 'Blog Tag';
	    $item->form = \Blog\Admin\Controllers\MenuItemQuickAdd::instance()->tag($event);
	
	    $items[] = $item;
	
	    $event->setArgument('items', $items);
	}
	
	public function onDisplayAdminMenusEdit( $event )
	{
	    $item = $event->getArgument('item');
	    $tabs = $event->getArgument('tabs');
	    $content = $event->getArgument('content');
	
	    // TODO switch this to in_array()
	    if (strpos($item->{'details.type'}, 'blog-') !== false)
	    {
	        $tabs[] = 'Blog Menu Item Tab';
	        $content[] = 'Additional fields from the Blog Listener';
	    }
	
	    $event->setArgument('tabs', $tabs);
	    $event->setArgument('content', $content);
	}
}