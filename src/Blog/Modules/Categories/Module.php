<?php 
namespace Blog\Modules\Categories;

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

        \Dsc\System::instance()->get('theme')->registerViewPath( __dir__ . '/Views/', 'Blog/Modules/Categories/Views' );
        $string = \Dsc\System::instance()->get('theme')->renderLayout('Blog/Modules/Categories/Views::default.php');
    	        
        return $string;
    }


    /**
     * This method will generate category tree which can be later used to render category widget
     *
     * @param unknown $categories
     */
    public static function generateTree($categories ){
    	$root = new \stdclass();
    	$root->nodes = array();
    	$root->element = null;
    	$root->parent_id = '';
    	 
    	$c = count( $categories );
    	for( $i = 0; $i < $c; $i++ ){
    		$pieces = explode( '/', $categories[$i]->{'path'} );
    
    
    		$idx = 1;
    		$act_piece = $pieces[$idx];
    		$c_p = count( $pieces );
    		$act_node = & $root;
    		while( !empty( $act_piece ) ){
    			if( !isset( $act_node->nodes[$act_piece] ) ) {
    				$act_node->nodes[$act_piece] = new \stdclass();
    				$act_node->nodes[$act_piece]->nodes = array();
    				$act_node->nodes[$act_piece]->element = null;
    				$act_node->nodes[$act_piece]->parent_id = $act_node->parent_id;
    			}
    			 
    			$idx ++;
    			$act_node = & $act_node->nodes[$act_piece];
    
    			if( $idx < $c_p ){
    				$act_piece = $pieces[$idx];
    			} else { // we're done with travesing
    				$act_node->element = $categories[$i];
    				$act_piece = '';
    			}
    		}
    	}
    	 
    	return $root;
    }
    
    public function displayCategoryNode( $node, $selected_categories ){
    	$orig_node = \Base::instance()->get('node' );
    	\Base::instance()->set('node', $node );
    	\Base::instance()->set('selected_categories', $selected_categories );
    
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->renderLayout('Blog/Modules/Categories/Views::category.php');
    	 
    	\Base::instance()->set('node', $orig_node );
    }
}