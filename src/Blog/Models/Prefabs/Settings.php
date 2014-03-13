<?php 
namespace Blog\Models\Prefabs;

class Settings extends \Dsc\Prefabs
{
    /**
     * Default document structure
     * @var array
     */
    protected $document = array(
        'home'=>array(
            'include_categories_widget' => '0'
        )
    );
}