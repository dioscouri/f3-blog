<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "admin":
        // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Blog\Listener::instance());
        
        $namespace = "\Blog\Admin\Controllers\\";
        $base = 'admin/blog';
        $f3->set('blog_base', $base);
        
        //no action calls diplay function, this should be plural
        $f3->route("GET|POST /{$base}/@resource", "{$namespace}@resource->display");
        $f3->route("GET|POST /{$base}/@resource/paginate/@page", "{$namespace}@resource->display");  
        $f3->route("GET|POST /{$base}/@resource/@action", "{$namespace}@resource->@action");
        $f3->route("GET|POST /{$base}/@resource/@action/@id", "{$namespace}@resource->@action");
        $f3->route("GET|POST /{$base}/@resource/page/@page", "{$namespace}@resource->display");
        $f3->route("GET|POST /{$base}/@resource/@action/page/@page", "{$namespace}@resource->@action");
        //$f3->route("DELETE  /{$base}/@resource/@id", "{$namespace}@resource->delete");
        $f3->route('GET /admin/blog/categories [ajax]','\Blog\Admin\Controllers\Categories->getDatatable');
        $f3->route('GET /admin/blog/categories/all [ajax]','\Blog\Admin\Controllers\Categories->getAll');
        
        // register all the routes
       /* $f3->route('GET|POST /admin/blog/posts', '\Blog\Admin\Controllers\Posts->display');
        $f3->route('GET|POST /admin/blog/posts/@page', '\Blog\Admin\Controllers\Posts->display');
        $f3->route('GET|POST /admin/blog/posts/delete', '\Blog\Admin\Controllers\Posts->delete');
        $f3->route('GET /admin/blog/post', '\Blog\Admin\Controllers\Post->create');
        $f3->route('POST /admin/blog/post', '\Blog\Admin\Controllers\Post->add');
        $f3->route('GET /admin/blog/post/@id', '\Blog\Admin\Controllers\Post->read');
        $f3->route('GET /admin/blog/post/@id/edit', '\Blog\Admin\Controllers\Post->edit');
        $f3->route('POST /admin/blog/post/@id', '\Blog\Admin\Controllers\Post->update');
        $f3->route('DELETE /admin/blog/post/@id', '\Blog\Admin\Controllers\Post->delete');
        $f3->route('GET /admin/blog/post/@id/delete', '\Blog\Admin\Controllers\Post->delete');
        $f3->route('GET /admin/blog/categories [ajax]','\Blog\Admin\Controllers\Categories->getDatatable');
        $f3->route('GET /admin/blog/categories/all [ajax]','\Blog\Admin\Controllers\Categories->getAll');
        $f3->route('GET|POST /admin/blog/categories/checkboxes [ajax]','\Blog\Admin\Controllers\Categories->getCheckboxes');
        $f3->route('GET|POST /admin/blog/categories', '\Blog\Admin\Controllers\Categories->display');
        $f3->route('GET|POST /admin/blog/categories/@page', '\Blog\Admin\Controllers\Categories->display');
        $f3->route('GET|POST /admin/blog/categories/delete', '\Blog\Admin\Controllers\Categories->delete');
        $f3->route('GET /admin/blog/category', '\Blog\Admin\Controllers\Category->create');
        $f3->route('POST /admin/blog/category', '\Blog\Admin\Controllers\Category->add');
        $f3->route('GET /admin/blog/category/@id', '\Blog\Admin\Controllers\Category->read');
        $f3->route('GET /admin/blog/category/@id/edit', '\Blog\Admin\Controllers\Category->edit');
        $f3->route('POST /admin/blog/category/@id', '\Blog\Admin\Controllers\Category->update');
        $f3->route('DELETE /admin/blog/category/@id', '\Blog\Admin\Controllers\Category->delete');
        $f3->route('GET /admin/blog/category/@id/delete', '\Blog\Admin\Controllers\Category->delete');
        */

        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "vendor/dioscouri/f3-blog/src/Blog/Admin/Views/";
        $f3->set('UI', $ui);
        
        // TODO set some app-specific settings, if desired
                
        break;
    case "site":
        // TODO register all the routes
        $f3->route('GET /blog/post/@slug', '\Blog\Site\Controllers\Post->read');
        $f3->route('GET /blog/post/@slug/@page', '\Blog\Site\Controllers\Post->read');                
        $f3->route('GET /blog/category/@slug', '\Blog\Site\Controllers\Category->index');
        $f3->route('GET /blog/category/@slug/@page', '\Blog\Site\Controllers\Category->index');
        $f3->route('GET /blog/tag/@tag', '\Blog\Site\Controllers\Tag->index');
        $f3->route('GET /blog/tag/@tag/@page', '\Blog\Site\Controllers\Tag->index');
        $f3->route('GET /blog/author/@id', '\Blog\Site\Controllers\Author->index');
        $f3->route('GET /blog/author/@id/@page', '\Blog\Site\Controllers\Author->index');
        
        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "vendor/dioscouri/f3-blog/src/Blog/Site/Views/";
        $f3->set('UI', $ui);
                
        // TODO set some app-specific settings, if desired
        break;
}
?>