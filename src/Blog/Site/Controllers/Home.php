<?php
namespace Blog\Site\Controllers;

class Home extends \Dsc\Controller
{

    protected function getModel()
    {
        $model = new \Blog\Models\Posts();
        return $model;
    }

    public function index()
    {
        $f3 = \Base::instance();
        
        $model = $this->getModel();
        
        try
        {
            $paginated = $model->populateState()
                ->setState('filter.publication_status', 'published')
                ->setState('filter.published_today', true)
                ->paginate();
        }
        catch (\Exception $e)
        {
            \Dsc\System::instance()->addMessage("Error loading Blog", 'error');
            $f3->reroute('/');
            return;
        }
        
        $state = $model->getState();
        \Base::instance()->set('state', $state);
        \Base::instance()->set('paginated', $paginated);
        
        $this->app->set('meta.title', 'Blog');
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Blog/Site/Views::home/index.php');
    }
}