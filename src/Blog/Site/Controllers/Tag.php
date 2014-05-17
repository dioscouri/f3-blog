<?php
namespace Blog\Site\Controllers;

class Tag extends \Dsc\Controller
{

    protected function getModel()
    {
        $model = new \Blog\Models\Posts();
        return $model;
    }

    public function index()
    {
        $f3 = \Base::instance();
        
        $tag = $this->inputfilter->clean($f3->get('PARAMS.tag'));
        $model = $this->getModel()
            ->populateState()
            ->setState('filter.tag', $tag)
            ->setState('filter.published_today', true)
            ->setState('filter.publication_status', 'published');
        
        try
        {
            $paginated = $model->paginate();
            if (empty($paginated->items))
            {
                throw new \Exception();
            }
        }
        catch (\Exception $e)
        {
            \Dsc\System::instance()->addMessage("Invalid Tag", 'error');
            $f3->reroute('/blog');
            return;
        }
        
        $state = $model->getState();
        \Base::instance()->set('state', $state);
        \Base::instance()->set('paginated', $paginated);
        \Base::instance()->set('tag', $tag);
        
        $this->app->set('meta.title', 'Tag: ' . $tag . ' | Blog');
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Blog/Site/Views::tags/index.php');
    }
}