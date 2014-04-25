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
}