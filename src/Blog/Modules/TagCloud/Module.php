<?php 
namespace Blog\Modules\TagCloud;

class Module extends \Modules\Abstracts\Module 
{
    public $tags = array(); // unprocessed list of menu items, typically straight from the data source
    
    public function __construct($options=array()) 
    {
        if (!empty($options['tags'])) {
            $this->tags = $options['tags'];
            unset($options['tags']);
        }
                
        parent::__construct($options);
    }
    
    public function html()
    {
        $f3 = \Base::instance();

        \Dsc\System::instance()->get('theme')->registerViewPath( __dir__ . '/Views/', 'Blog/Modules/TagCloud/Views' );
        $string = \Dsc\System::instance()->get('theme')->renderLayout('Blog/Modules/TagCloud/Views::default.php');
        
        return $string;
    }
}