<?php 
namespace Blog;

class Listener extends \Prefab 
{
    public function onSystemRebuildMenu( $event )
    {
        if ($mapper = $event->getArgument('mapper')) 
        {
            $mapper->reset();
            $mapper->id = 'f3-blog';
            $mapper->title = 'Blog';
            $mapper->route = '';
            $mapper->icon = 'fa fa-ticket';
            $mapper->children = array(
                    json_decode(json_encode(array( 'title'=>'Posts', 'route'=>'/admin/blog/posts', 'icon'=>'fa fa-list' )))
                    ,json_decode(json_encode(array( 'title'=>'Add New', 'route'=>'/admin/blog/post', 'icon'=>'fa fa-plus' )))
                    ,json_decode(json_encode(array( 'title'=>'Categories', 'route'=>'/admin/blog/categories', 'icon'=>'fa fa-folder' )))
                    ,json_decode(json_encode(array( 'title'=>'Add New', 'route'=>'/admin/blog/category', 'hidden'=>true )))
            );
            $mapper->save();
            
            \Dsc\System::instance()->addMessage('Blog added its admin menu items.');
        }
    }
    
    public function onAdminNavigationGetQuickAddItems( $event )
    {
        $items = $event->getArgument('items');
        $tree = $event->getArgument('tree');
        
        \Base::instance()->set('tree', $tree );
        
        $item = new \stdClass;
        $item->title = 'Blog Category';
        $item->form = \Blog\Admin\Controllers\MenuItemQuickAdd::instance()->category();
        
        $items[] = $item;
        
        $event->setArgument('items', $items);
    }
}