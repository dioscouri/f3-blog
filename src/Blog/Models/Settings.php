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
    			"comments" => array(
    					"theme" => 'dark',
    					"mobile" => "autodetect",
    					"num_posts" => 10,
    					"order" => "reverse_time",
    						),
    			"likes" => array(
    					"action" => "like",
    					"layout" => "standard",
    					"theme" => 'dark',
    					"width" => "",
    					"show_faces" => "false",
    						),
    			"share" => array(
    					"layout" => 'standard',
    					"width" => '',
    						),
    			),
    	'disqus' =>
    		array(
    				"comments" =>
    						array(
    								'shortname' => '',
    						),
    				
    			),
    );
    
    protected $__type = 'blog.settings';
}