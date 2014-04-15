<?php 
namespace Blog\Models;

class Settings extends \Dsc\Mongo\Collections\Settings
{
    public $home = array(
        'include_categories_widget' => 1,
    );
    
    public $general = array(
   		'comment' => "facebook",
    );
    
    public $social = array(
    	'facebook' =>
    		array(
    			"theme" => 'dark',
    			"mobile" => "autodetect",
    			"num_posts" => 10,
    			"order" => "reverse_time",
    		),
    );
    
    protected $__type = 'blog.settings';
}