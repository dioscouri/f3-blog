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

		$this->add( '/categories', 'GET', array(
				'controller' => 'Categories',
				'action' => 'getDatatable',
				'ajax' => true
		));

		$this->add( '/categories/all', 'GET', array(
				'controller' => 'Categories',
				'action' => 'getAll',
				'ajax' => true
		));

		$this->add( '/categories/checkboxes', array('GET', 'POST'), array(
				'controller' => 'Categories',
				'action' => 'getCheckboxes',
				'ajax' => true
		));
		$this->addCrudList( 'Categories' );
		$this->addCrudItem( 'Category' );
	}
}