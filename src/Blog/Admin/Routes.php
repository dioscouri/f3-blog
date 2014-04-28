<?php
namespace Blog\Admin;

class Routes extends \Dsc\Routes\Group
{
    public function initialize()
    {
        $this->setDefaults( array(
            'namespace' => '\Blog\Admin\Controllers',
            'url_prefix' => '/admin/blog' 
        ) );
        
        $this->addSettingsRoutes();
        
        $this->addCrudGroup( 'Posts', 'Post' );
        
        $this->addCrudGroup( 'Categories', 'Category', array(
            'datatable_links' => true,
            'get_parent_link' => true 
        ) );
        
        $this->add( '/categories/checkboxes', array(
            'GET',
            'POST' 
        ), array(
            'controller' => 'Categories',
            'action' => 'getCheckboxes' 
        ) );
    }
}