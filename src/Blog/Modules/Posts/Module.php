<?php 
namespace Blog\Modules\Posts;

class Module extends \Modules\Abstracts\Module 
{
    public $list = array(); // unprocessed list of menu items, typically straight from the data source
    public $items = array(); // final, processed list of menu items ready for display
    
    public function __construct($options=array()) 
    {
        if (!empty($options['list'])) {
            $this->list = $options['list'];
            unset($options['list']);
        }
                
        parent::__construct($options);
    }
    
    public function html()
    {
        $f3 = \Base::instance();

        \Dsc\System::instance()->get('theme')->registerViewPath( __dir__ . '/Views/', 'Blog/Modules/Posts/Views' );
        $string = \Dsc\System::instance()->get('theme')->renderLayout('Blog/Modules/Posts/Views::default.php');
    	        
        return $string;
    }


    
}