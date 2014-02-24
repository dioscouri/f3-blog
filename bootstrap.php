<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "admin":
        // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Blog\Listener::instance());
        
        // register all the routes
        $f3->route('GET /admin/blog/settings', '\Blog\Admin\Controllers\Settings->display');
        $f3->route('POST /admin/blog/settings', '\Blog\Admin\Controllers\Settings->save');
                
        $f3->route('GET|POST /admin/blog/posts', '\Blog\Admin\Controllers\Posts->display');
        $f3->route('GET|POST /admin/blog/posts/page/@page', '\Blog\Admin\Controllers\Posts->display');
        $f3->route('GET|POST /admin/blog/posts/delete', '\Blog\Admin\Controllers\Posts->delete');
        
        $f3->route('GET /admin/blog/post/create', '\Blog\Admin\Controllers\Post->create');
        $f3->route('POST /admin/blog/post/add', '\Blog\Admin\Controllers\Post->add');
        $f3->route('GET /admin/blog/post/read/@id', '\Blog\Admin\Controllers\Post->read');
        $f3->route('GET /admin/blog/post/edit/@id', '\Blog\Admin\Controllers\Post->edit');
        $f3->route('POST /admin/blog/post/update/@id', '\Blog\Admin\Controllers\Post->update');
        $f3->route('GET|DELETE /admin/blog/post/delete/@id', '\Blog\Admin\Controllers\Post->delete');
        
        $f3->route('GET /admin/blog/categories [ajax]','\Blog\Admin\Controllers\Categories->getDatatable');
        $f3->route('GET /admin/blog/categories/all [ajax]','\Blog\Admin\Controllers\Categories->getAll');
        $f3->route('GET|POST /admin/blog/categories/checkboxes [ajax]','\Blog\Admin\Controllers\Categories->getCheckboxes');
        
        $f3->route('GET|POST /admin/blog/categories', '\Blog\Admin\Controllers\Categories->display');
        $f3->route('GET|POST /admin/blog/categories/page/@page', '\Blog\Admin\Controllers\Categories->display');
        $f3->route('GET|POST /admin/blog/categories/delete', '\Blog\Admin\Controllers\Categories->delete');
        
        $f3->route('GET /admin/blog/category/create', '\Blog\Admin\Controllers\Category->create');
        $f3->route('POST /admin/blog/category/add', '\Blog\Admin\Controllers\Category->add');
        $f3->route('GET /admin/blog/category/read/@id', '\Blog\Admin\Controllers\Category->read');
        $f3->route('GET /admin/blog/category/edit/@id', '\Blog\Admin\Controllers\Category->edit');
        $f3->route('POST /admin/blog/category/update/@id', '\Blog\Admin\Controllers\Category->update');
        $f3->route('GET|DELETE /admin/blog/category/delete/@id', '\Blog\Admin\Controllers\Category->delete');

        // append this app's UI folder to the path
        // new way
        \Dsc\System::instance()->get('theme')->registerViewPath( __dir__ . '/src/Blog/Admin/Views/', 'Blog/Admin/Views' );
        // old way        
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "vendor/dioscouri/f3-blog/src/Blog/Admin/Views/";
        $f3->set('UI', $ui);
        
        // TODO set some app-specific settings, if desired
                
        break;
    case "site":
        // register all the routes
        $f3->route('GET /blog', '\Blog\Site\Controllers\Home->index');
        $f3->route('GET /blog/page/@page', '\Blog\Site\Controllers\Home->index');
        $f3->route('GET /blog/post/@slug', '\Blog\Site\Controllers\Post->read');
        $f3->route('GET /blog/post/@slug/@page', '\Blog\Site\Controllers\Post->read');                
        $f3->route('GET /blog/category/@slug', '\Blog\Site\Controllers\Category->index');
        $f3->route('GET /blog/category/@slug/@page', '\Blog\Site\Controllers\Category->index');
        $f3->route('GET /blog/tag/@tag', '\Blog\Site\Controllers\Tag->index');
        $f3->route('GET /blog/tag/@tag/@page', '\Blog\Site\Controllers\Tag->index');
        $f3->route('GET /blog/author/@id', '\Blog\Site\Controllers\Author->index');
        $f3->route('GET /blog/author/@id/@page', '\Blog\Site\Controllers\Author->index');
        
        // append this app's UI folder to the path
        // new way
        \Dsc\System::instance()->get('theme')->registerViewPath( __dir__ . '/src/Blog/Site/Views/', 'Blog/Site/Views' );
        // old way        
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "vendor/dioscouri/f3-blog/src/Blog/Site/Views/";
        $f3->set('UI', $ui);
                
        // TODO set some app-specific settings, if desired
        break;
}
?>