<?php
namespace Blog\Site\Controllers;

class Author extends \Dsc\Controller
{

    protected function getModel($name = 'users')
    {
        $model = new \Blog\Models\Posts();
        switch ($name)
        {
            case 'users':
                $model = new \Users\Models\Users();
                break;
            case 'posts':
                $model = new \Blog\Models\Posts();
        }
        return $model;
    }

    public function index()
    {
        $f3 = \Base::instance();
        
        $id = $this->inputfilter->clean($f3->get('PARAMS.id'), 'alnum');
        
        $safemode_user = \Base::instance()->get('safemode.username');
        
        // slug contaings safeuser username ==> redirect to blog home page
        if ($safemode_user == $id)
        {
            \Dsc\System::instance()->addMessage("Unknown Author", 'error');
            $f3->reroute('/blog');
            return;
        }
        
        $model_author = $this->getModel('users')
            ->populateState()
            ->setState('filter.username', $id);
        
        try
        {
            $author = $model_author->getItem();
            if (empty($author->id))
            {
                throw new \Exception();
            }
        }
        catch (\Exception $e)
        {
            \Dsc\System::instance()->addMessage("Unknown Author", 'error');
            $f3->reroute('/blog');
            return;
        }
        
        $model_posts = $this->getModel('posts')
            ->populateState()
            ->setState('filter.author.username', $id)
            ->setState('filter.published_today', true)
            ->setState('filter.publication_status', 'published');
        
        try
        {
            $paginated = $model_posts->paginate();
        }
        catch (\Exception $e)
        {
            $paginated = null;
        }
        
        $state = $model_posts->getState();
        \Base::instance()->set('state', $state);
        \Base::instance()->set('paginated', $paginated);
        \Base::instance()->set('author', $author);
        
        $this->app->set('meta.title', $author->fullName() . ' | Blog');
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Blog/Site/Views::author/index.php');
    }
}