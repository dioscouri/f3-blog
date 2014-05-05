<?php 
namespace Blog\Site\Controllers;

class Post extends \Dsc\Controller 
{    
    protected function getModel($name = 'posts') 
    {
        $model = null;
        switch( $name ) {
        	case 'posts':
        		$model = new \Blog\Models\Posts;
        		break;
        	case 'users':
        		$model = new \Users\Models\Users;
        		break;
        }
        return $model; 
    }
    
    public function read()
    {
    	// TODO get the slug param.  lookup the blog post.  Check ACL against post.
    	$f3 = \Base::instance();
    	$slug = $this->inputfilter->clean( $f3->get('PARAMS.slug'), 'cmd' );
    	$model = $this->getModel()->populateState()
            ->setState('filter.slug', $slug)
	    	->setState( 'filter.published_today', true )
	    	->setState( 'filter.publication_status', 'published' );
    	 
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
    	
    	// increase the view count
    	$item->hit();
    	
    	$author = $this->getModel( 'users' )->setState( 'filter.id', $item->{'author.id'} )->getItem();
    	$related = $item->getRelatedPosts();
    	    	
    	\Base::instance()->set('pagetitle', $item->title);
    	\Base::instance()->set('subtitle', '');
    	\Base::instance()->set( 'item', $item );
    	\Base::instance()->set( 'author', $author );
    	\Base::instance()->set( 'related', $related );
    	
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->render('Blog/Site/Views::posts/view.php');
    }
}