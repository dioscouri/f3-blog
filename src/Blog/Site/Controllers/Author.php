<?php 
namespace Blog\Site\Controllers;

class Author extends \Dsc\Controller 
{    
    protected function getModel($name = 'users') 
    {
        $model = new \Blog\Models\Posts;
        switch( $name ) {
        	case 'users':
        		$model = new \Users\Models\Users;
        		break;
        	case 'posts':
        		$model = new \Blog\Models\Posts;
        }
        return $model; 
    }
    
    public function index()
    {
    	// TODO get the slug param.  lookup the category.  Check ACL against both category.
    	// get paginated list of blog posts associated with this category
    	// only posts that are published as of now
    	
    	$f3 = \Base::instance();
    	$id = $this->inputfilter->clean( $f3->get('PARAMS.id'), 'alnum' );
    	
    	$model_author = $this->getModel( 'users' )->populateState()
            ->setState('filter.username', $id);
    	
        try {
    		$author = $model_author->getItem();
    	} catch ( \Exception $e ) {
    	    // TODO Change to a normal 404 error
    		\Dsc\System::instance()->addMessage( "Unknown Author: " . $e->getMessage(), 'error');
    		$f3->reroute( '/' );
    		return;
    	}
    	
    	if( empty( $author ) ){
    		// TODO Change to a normal 404 error
    		\Dsc\System::instance()->addMessage( "Unknown Author", 'error');
    		$f3->reroute( '/' );
    		return;
    	}

    	$model_posts = $this->getModel( 'posts' )->populateState()
    					->setState('filter.creator.id', $author->{'id'});
    	 
    	
    	try {
    		$paginated = $model_posts->paginate();
    	} catch ( \Exception $e ) {
    		$paginated = null;
    	}
    	
    	\Base::instance()->set('pagetitle', 'Posts');
    	\Base::instance()->set('subtitle', '');
    	
    	$state = $model_posts->getState();
    	\Base::instance()->set('state', $state );
    	
    	\Base::instance()->set( 'paginated', $paginated );
    	\Base::instance()->set( 'author', $author );
    	
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->render('Blog/Site/Views::author/view.php');
    	 
    }
}