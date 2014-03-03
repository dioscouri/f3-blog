<?php 
namespace Blog\Site\Controllers;

class Author extends \Dsc\Controller 
{    
    protected function getModel() 
    {
        $model = new \Blog\Models\Posts;
        return $model; 
    }
    
    public function index()
    {
    	// TODO get the slug param.  lookup the category.  Check ACL against both category.
    	// get paginated list of blog posts associated with this category
    	// only posts that are published as of now
    	
    	$f3 = \Base::instance();
    	$id = $this->inputfilter->clean( $f3->get('PARAMS.id'), 'alnum' );
    	$model = $this->getModel()->populateState()
            ->setState('filter.creator.id', $id);
    	
    	try {
    		$list = $model->paginate();
    	} catch ( \Exception $e ) {
    	    // TODO Change to a normal 404 error
    		\Dsc\System::instance()->addMessage( "Invalid Items: " . $e->getMessage(), 'error');
    		$f3->reroute( '/' );
    		return;
    	}
    	
    	\Base::instance()->set('pagetitle', 'Posts');
    	\Base::instance()->set('subtitle', '');
    	
    	$state = $model->getState();
    	\Base::instance()->set('state', $state );
    	
    	\Base::instance()->set('list', $list );
    	
    	$pagination = new \Dsc\Pagination($list['total'], $list['limit']);
    	\Base::instance()->set('pagination', $pagination );
    	
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->render('Blog/Site/Views::posts/category.php');
    	 
    }
}