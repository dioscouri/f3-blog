<?php
namespace Blog\Site\Controllers;

class Post extends \Dsc\Controller
{
	use \Dsc\Traits\Controllers\SupportPreview;
	
    protected function getModel($name = 'posts')
    {
        $model = null;
        switch ($name)
        {
            case 'posts':
                $model = new \Blog\Models\Posts();
                break;
            case 'users':
                $model = new \Users\Models\Users();
                break;
        }
        return $model;
    }

    public function read()
    {
        $f3 = \Base::instance();
        
        $slug = $this->inputfilter->clean($f3->get('PARAMS.slug'), 'cmd');
        $model = $this->getModel()
            ->populateState()
            ->setState('filter.slug', $slug);
       	$preview = $this->input->get( "preview", 0, 'int' );
       	
       	
       	if( $preview ){
       		$this->canPreview();
       	} else {
       		$model->setState('filter.published_today', true)
       		->setState('filter.publication_status', 'published');
       	}

        try
        {
            $item = $model->getItem();
            if (empty($item->id))
            {
                throw new \Exception();
            }
            
            // increase the view count
            $item->hit();
        }
        catch (\Exception $e)
        {
            \Dsc\System::instance()->addMessage("Invalid Item", 'error');
            $f3->reroute('/blog');
            return;
        }
        
        $author = $this->getModel('users')
            ->setState('filter.id', $item->{'author.id'})
            ->getItem();
        $related = $item->getRelatedPosts();
        
        \Base::instance()->set('item', $item);
        \Base::instance()->set('author', $author);
        \Base::instance()->set('related', $related);
        
        if( $preview ) {
        	$this->app->set('meta.title', $item->title . ' | Blog (Preview mode)');
        } else {
        	$this->app->set('meta.title', $item->title . ' | Blog');
        }
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Blog/Site/Views::posts/view.php');
    }
}