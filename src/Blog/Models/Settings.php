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
    					"theme" => 'dark',
    					"mobile" => "autodetect",
    					"num_posts" => 10,
    					"order" => "reverse_time",
    					"show_faces" => "false",
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