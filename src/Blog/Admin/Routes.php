<?php

namespace Blog\Admin;

/**
 * Group class is used to keep track of a group of routes with similar aspects (the same controller, the same f3-app and etc)
 */
class Routes extends \Dsc\Routes\Group{
	
	
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * Initializes all routes for this group
	 * NOTE: This method should be overriden by every group
	 */
	public function initialize(){
		$this->setDefaults(
				array(
					'namespace' => '\Blog\Admin\Controllers',
					'url_prefix' => '/admin/blog'
				)
		);

		$this->addSettingsRoutes();
		$this->addCrudList( 'Posts' );
		$this->addCrudItem( 'Post' );

		$this->addCrudList( 'Categories', array( 'databable_links' => true ) );
		$this->addCrudItem( 'Category' );
	}
}