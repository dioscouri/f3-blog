<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "admin":
        // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Blog\Listener::instance());
        
    	// register all the routes
    	\Dsc\System::instance()->get('router')->mount( new \Blog\Admin\Routes, 'blog' );
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
    	\Dsc\System::instance()->get('router')->mount( new \Blog\Site\Routes, 'blog' );
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