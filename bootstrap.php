<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "admin":
        // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Blog\Listener::instance());
        
        // register all the routes
        $f3->route('GET|POST /admin/posts', '\Blog\Admin\Controllers\Posts->display');
        $f3->route('GET|POST /admin/posts/@page', '\Blog\Admin\Controllers\Posts->display');
        $f3->route('GET|POST /admin/posts/delete', '\Blog\Admin\Controllers\Posts->delete');
        $f3->route('GET /admin/post', '\Blog\Admin\Controllers\Post->create');
        $f3->route('POST /admin/post', '\Blog\Admin\Controllers\Post->add');
        $f3->route('GET /admin/post/@id', '\Blog\Admin\Controllers\Post->read');
        $f3->route('GET /admin/post/@id/edit', '\Blog\Admin\Controllers\Post->edit');
        $f3->route('POST /admin/post/@id', '\Blog\Admin\Controllers\Post->update');
        $f3->route('DELETE /admin/post/@id', '\Blog\Admin\Controllers\Post->delete');
        $f3->route('GET /admin/post/@id/delete', '\Blog\Admin\Controllers\Post->delete');
        
        $f3->route('GET /admin/categories [ajax]','\Blog\Admin\Controllers\Categories->getDatatable');
        $f3->route('GET /admin/categories/all [ajax]','\Blog\Admin\Controllers\Categories->getAll');
        $f3->route('GET|POST /admin/categories/checkboxes [ajax]','\Blog\Admin\Controllers\Categories->getCheckboxes');
        $f3->route('GET|POST /admin/categories', '\Blog\Admin\Controllers\Categories->display');
        $f3->route('GET|POST /admin/categories/@page', '\Blog\Admin\Controllers\Categories->display');
        $f3->route('GET|POST /admin/categories/delete', '\Blog\Admin\Controllers\Categories->delete');
        $f3->route('GET /admin/category', '\Blog\Admin\Controllers\Category->create');
        $f3->route('POST /admin/category', '\Blog\Admin\Controllers\Category->add');
        $f3->route('GET /admin/category/@id', '\Blog\Admin\Controllers\Category->read');
        $f3->route('GET /admin/category/@id/edit', '\Blog\Admin\Controllers\Category->edit');
        $f3->route('POST /admin/category/@id', '\Blog\Admin\Controllers\Category->update');
        $f3->route('DELETE /admin/category/@id', '\Blog\Admin\Controllers\Category->delete');
        $f3->route('GET /admin/category/@id/delete', '\Blog\Admin\Controllers\Category->delete');
        
        // append this app's UI folder to the path, e.g. UI=../apps/blog/admin/views/
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "vendor/dioscouri/f3-blog/src/Blog/Admin/Views/";
        $f3->set('UI', $ui);
        
        // TODO set some app-specific settings, if desired
                
        break;
    case "site":
        // TODO register all the routes
        
        // append this app's UI folder to the path, e.g. UI=../apps/blog/site/views/
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "vendor/dioscouri/f3-blog/src/Blog/Site/Views/";
        $f3->set('UI', $ui);
                
        // TODO set some app-specific settings, if desired
        break;
}
?>