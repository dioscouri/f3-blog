<?php 
namespace Blog\Site\Controllers;

class Post extends \Dsc\Controller 
{    
    protected function getModel() 
    {
        $model = new \Blog\Models\Posts;
        return $model; 
    }
    
    public function read()
    {
    	// TODO get the slug param.  lookup the blog post.  Check ACL against post.
    	
    	$f3 = \Base::instance();
    	$slug = $this->inputfilter->clean( $f3->get('PARAMS.slug'), 'cmd' );
    	$model = $this->getModel()->populateState()
            ->setState('filter.slug', $slug);
    	
    	try {
    		$item = $model->getItem();
    	} catch ( \Exception $e ) {
    	    // TODO Change to a normal 404 error
    		\Dsc\System::instance()->addMessage( "Invalid Item: " . $e->getMessage(), 'error');
    		$f3->reroute( '/' );
    		return;
    	}
    	
    	if( empty( $item ) ){
    		// TODO Change to a normal 404 error
    		\Dsc\System::instance()->addMessage( "Invalid Post", 'error');
    		$f3->reroute( '/' );
    		return;
    	}
    	
    	\Base::instance()->set('pagetitle', $item->title);
    	\Base::instance()->set('subtitle', '');
    	
    	\Base::instance()->set('item', $item );
    	
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->render('Blog/Site/Views::posts/view.php');
    }
    
    /**
     * This method will generate category tree which can be later used to render category widget
     * 
     * @param unknown $categories
     */
    public function generateCategoryTree($categories ){
    	$root = new \stdclass();
    	$root->nodes = array();
    	$root->element = null;
    	
    	$c = count( $categories );
    	for( $i = 0; $i < $c; $i++ ){
    		$pieces = explode( '/', $categories[$i]->{'path'} );
    	}
    	
    }
}