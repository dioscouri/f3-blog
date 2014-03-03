<?php 
namespace Blog\Admin\Controllers;

class Posts extends \Admin\Controllers\BaseAuth 
{
    public function index()
    {
        // when ACL is ready
        //$this->checkAccess( __CLASS__, __FUNCTION__ );
        
        \Base::instance()->set('pagetitle', 'Posts');
        \Base::instance()->set('subtitle', '');
        
        $model = new \Blog\Models\Posts;
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
        
        $paginated = $model->paginate();
        \Base::instance()->set('paginated', $paginated );
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Blog/Admin/Views::posts/list.php');
    }
}