<?php 
namespace Blog;

class Listener extends \Prefab 
{
    public function onSystemRebuildMenu( $event )
    {
        if ($mapper = $event->getArgument('mapper')) 
        {
            $mapper->reset();
            $mapper->priority = 30;
            $mapper->id = 'f3-blog';
            $mapper->title = 'Blog';
            $mapper->route = '';
            $mapper->icon = 'fa fa-ticket';
            $mapper->children = array(
                    json_decode(json_encode(array( 'title'=>'Posts', 'route'=>'/admin/blog/posts', 'icon'=>'fa fa-list' )))
                    ,json_decode(json_encode(array( 'title'=>'Add New', 'route'=>'/admin/blog/post/create', 'icon'=>'fa fa-plus' )))
                    ,json_decode(json_encode(array( 'title'=>'Categories', 'route'=>'/admin/blog/categories', 'icon'=>'fa fa-folder' )))
                    ,json_decode(json_encode(array( 'title'=>'Add New', 'route'=>'/admin/blog/category/create', 'hidden'=>true )))
            );
            $mapper->save();
            
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