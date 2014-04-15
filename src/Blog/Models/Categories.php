<?php 
namespace Blog\Models;

class Categories extends \Dsc\Mongo\Collections\Categories 
{
    protected $__type = 'blog.categories';

    protected function fetchConditions()
    {
        parent::fetchConditions();
        
        $this->setCondition( 'type', $this->__type );
        
        return $this;
    }
}