<?php 
namespace Blog\Models;

class Categories extends \Dsc\Mongo\Collections\Categories 
{
    protected $__type = 'blog.categories';

    protected function fetchFilters()
    {
        $this->filters = parent::fetchFilters();
    
        $this->filters['type'] = $this->type;
    
        return $this->filters;
    }
}