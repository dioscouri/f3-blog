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
    	
    	\Base::instance()->set('pagetitle', $item->title);
    	\Base::instance()->set('subtitle', '');
    	
    	\Base::instance()->set('item', $item );
    	
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->render('Blog/Site/Views::posts/view.php');
    	 
    }


    /*
     * This method displays HTML with tag cloud for selected ID
    *
    * @param	$id
    *
    */
    public function getTagCloud( $id ){
    	$model = $this->getModel();
    	
    	$id = $model->inputFilter()->clean( $id, "alnum");
    	 
    	$item = $model->emptyState()->populateState()->setCondition( "_id", new \MongoId( (string)$id ) )->getItem();

    	if( $item == null ){
    		throw new \Exception( "Blog post with this ID does not exist" );
    	}
    	
    	$tags = $item->get("tags");
    	if( empty( $tags ) ||  is_array( $tags ) === false) {
    		$tags = array();
    	}
    	\Base::instance()->set( "tags", $tags );
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->renderLayout('Blog/Site/Views::posts/view_tag_cloud.php');
    }
}