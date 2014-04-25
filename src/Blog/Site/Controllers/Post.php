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
    	
    	
    	$author = $this->getModel( 'users' )->populateState()
    			->setState( 'filter.id', $item->{'metadata.creator.id'} )
    			->getItem();
    	
    	$related = $item->getRelatedPosts();    	
    	
    	\Base::instance()->set('pagetitle', $item->title);
    	\Base::instance()->set('subtitle', '');
    	$item->hit();
    	\Base::instance()->set( 'item', $item );
    	\Base::instance()->set( 'author', $author );
    	\Base::instance()->set( 'related', $related );
    	
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->render('Blog/Site/Views::posts/view.php');
    }
    
    public function displayComments($slug){
    	// TODO get the slug param.  lookup the blog post.  Check ACL against post.
    	$f3 = \Base::instance();
    	$slug = $this->inputfilter->clean( $slug, 'cmd' );
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
    	\Base::instance()->set('item', $item );
    	 
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->renderLayout('Blog/Site/Views::posts/view_comments.php');
    }
    
    /**
     * This method will generate category tree which can be later used to render category widget
     * 
     * @param unknown $categories
     */
    public static function generateCategoryTree($categories ){
    	$root = new \stdclass();
    	$root->nodes = array();
    	$root->element = null;
    	$root->parent_id = '';
    	
    	$c = count( $categories );
    	for( $i = 0; $i < $c; $i++ ){
    		$pieces = explode( '/', $categories[$i]->{'path'} );
    		
    		
    		$idx = 1;
    		$act_piece = $pieces[$idx];
    		$c_p = count( $pieces );
    		$act_node = & $root;
    		while( !empty( $act_piece ) ){
    			if( !isset( $act_node->nodes[$act_piece] ) ) {
			    	$act_node->nodes[$act_piece] = new \stdclass();
			    	$act_node->nodes[$act_piece]->nodes = array();
			    	$act_node->nodes[$act_piece]->element = null;
			    	$act_node->nodes[$act_piece]->parent_id = $act_node->parent_id;
    			}
    			
    			$idx ++;
    			$act_node = & $act_node->nodes[$act_piece];

    			if( $idx < $c_p ){
    				$act_piece = $pieces[$idx];
    			} else { // we're done with travesing
    				$act_node->element = $categories[$i];
    				$act_piece = '';
    			}
    		}
    	}
    	
    	return $root;
    }
    
    public function displayCategories($categories, $selected_categories ){
    	\Base::instance()->set('selected_categories', $selected_categories );
    	\Base::instance()->set('categories', $categories );
    	 
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->renderLayout('Blog/Site/Views::posts/view_categories.php');
    }
    
    public function displayTagCloud(){
		\Base::instance()->set('tags', $this->getModel()->getTags() );
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->renderLayout('Blog/Site/Views::posts/view_tag_cloud.php');
    }
    
    public function displayCategoryNode( $node ){
    	$orig_node = \Base::instance()->get('node' );
    	\Base::instance()->set('node', $node );
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->renderLayout('Blog/Site/Views::posts/view_category.php');
    	
    	\Base::instance()->set('node', $orig_node );
    }
}