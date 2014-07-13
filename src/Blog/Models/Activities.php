<?php
namespace Blog\Models;

class Activities extends \Dsc\Activities
{
    public static function track($action, $properties=array())
    {
        $action_properties = $properties + array(
            'app' => 'blog'
        );
        
        return parent::track($action, $action_properties);
    }
}