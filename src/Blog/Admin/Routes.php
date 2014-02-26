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
		
		$this->add( '/settings', 'GET', array(
								'controller' => 'Settings',
								'action' => 'display'
								));

		$this->add( '/settings', 'POST', array(
				'controller' => 'Settings',
				'action' => 'save'
		));

		$this->add( '/posts', array('GET','POST'), array(
				'controller' => 'Posts',
				'action' => 'display'
		));

		$this->add( '/posts/page/@page', array('GET','POST'), array(
				'controller' => 'Posts',
				'action' => 'display'
		));

		$this->add( '/posts/delete', array('GET','POST'), array(
				'controller' => 'Posts',
				'action' => 'delete'
		));

		$this->add( '/post/create', 'GET', array(
				'controller' => 'Post',
				'action' => 'create'
		));

		$this->add( '/post/add', 'POST', array(
				'controller' => 'Post',
				'action' => 'add'
		));

		$this->add( '/post/read/@id', 'GET', array(
				'controller' => 'Post',
				'action' => 'read'
		));

		$this->add( '/post/edit/@id', 'GET', array(
				'controller' => 'Post',
				'action' => 'edit'
		));

		$this->add( '/post/update/@id', 'GET', array(
				'controller' => 'Post',
				'action' => 'update'
		));

		$this->add( '/post/delete/@id', array('GET', 'DELETE'), array(
				'controller' => 'Post',
				'action' => 'delete'
		));

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

		$this->add( '/categories', array( 'GET', 'POST' ), array(
				'controller' => 'Categories',
				'action' => 'display'
		));

		$this->add( '/categories/page/@page', array( 'GET', 'POST' ), array(
				'controller' => 'Categories',
				'action' => 'display'
		));

		$this->add( '/categories/delete', array( 'GET', 'POST' ), array(
				'controller' => 'Categories',
				'action' => 'delete'
		));

		$this->add( '/category/create', 'GET', array(
				'controller' => 'Category',
				'action' => 'create'
		));

		$this->add( '/category/add', 'POST', array(
				'controller' => 'Category',
				'action' => 'add'
		));

		$this->add( '/category/read/@id', 'GET', array(
				'controller' => 'Category',
				'action' => 'read'
		));

		$this->add( '/category/edit/@id', 'GET', array(
				'controller' => 'Category',
				'action' => 'edit'
		));

		$this->add( '/category/update/@id', 'POST', array(
				'controller' => 'Category',
				'action' => 'update'
		));

		$this->add( '/category/delete/@id', array('GET', 'DELETE'), array(
				'controller' => 'Category',
				'action' => 'delete'
		));
	}
}