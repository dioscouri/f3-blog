<?php 
namespace Blog\Models;

class Posts extends \Dsc\Mongo\Collections\Content 
{
    use \Search\Traits\SearchItem;
    
    public $categories = array();
    public $featured_image = array();
    
    protected $__type = 'blog.posts';
    
    protected function fetchConditions()
    {
        parent::fetchConditions();
        
        $this->setCondition('type', $this->__type );
        
        $filter_category_slug = $this->getState('filter.category.slug');
        if (strlen($filter_category_slug))
        {
            $this->setCondition('categories.slug', $filter_category_slug );
        }
        
        $filter_category_id = $this->getState('filter.category.id');
        if (strlen($filter_category_id))
        {
            $this->setCondition('categories.id', new \MongoId( (string) $filter_category_id ) );
        }

        return $this;
    }
    
    protected function beforeValidate()
    {
        if (!empty($this->category_ids))
        {
            $category_ids = $this->category_ids;
            unset($this->category_ids);
        
            $categories = array();
            if ($list = (new \Blog\Models\Categories)->setState('select.fields', array('title', 'slug'))->setState('filter.ids', $category_ids)->getList()) 
            {
                foreach ($list as $list_item) {
                    $cat = array(
                        'id' => $list_item->id,
                        'title' => $list_item->title,
                        'slug' => $list_item->slug
                    );
                    $categories[] = $cat;
                }
            }
            $this->categories = $categories;
        }
        
        unset($this->parent);
        unset($this->new_category_title);

        return parent::beforeValidate();
    }
    
    public function validate()
    {
        if (empty($this->copy)) {
            $this->setError('Body copy is required');
        }
        
        return parent::validate();
    }
    
    public function generateSlug( $unique=true )
    {
        if (empty($this->title)) {
            $this->setError('A title is required for generating the slug');
            return $this->checkErrors();
        }        
        
        $created = date('Y-m-d');
        if (!empty($this->{'created.time'})) {
            $created = date('Y-m-d', $this->{'created.time'});
        }

        $slug = \Web::instance()->slug( $created . '-' . $this->title );
        
        if ($unique) 
        {
            $base_slug = $slug;
            $n = 1;
            while ($this->slugExists($slug))
            {
                $slug = $base_slug . '-' . $n;
                $n++;
            }
        }
    
        return $slug;
    }
    
    /**
     * Converts this to a search item, used in the search template when displaying each search result
     */
    public function toSearchItem()
    {
        $image = (!empty($this->{'featured_image.slug'})) ? './asset/thumb/' . $this->{'featured_image.slug'} : null;
    
        $item = new \Search\Models\Item(array(
            'url' => './blog/post/' . $this->slug,
            'title' => $this->title,
            'subtitle' => '',
            'image' => $image,
            'summary' => substr( $this->copy, 0, 250 ),
            'datetime' => $this->{'publication.start.local'},
        ));
    
        return $item;
    }
    
    
    /**
     * This method update number of views for this post
     */
    public function updateViews($item = '') {
    	$model = $this;
    	if( is_object( $item ) &&  $item instanceof \Blog\Models\Posts ){
    		$model->bind( $item );
    	} else if( is_string( $item ) ) {
    		if( !empty( $id ) ) {
    			$model->emptyState()->populateState()->setState( 'filter.id', $id );
    			$item = $model->getItem();
    			$model->bind( $item );
    		}
    	}
    	
    	if( isset( $model->views ) ){
    		$model->views = (int)($model->views) + 1;
    	} else {
    		$model->views = 1;
    	}
    	
    	$model->save();
    	return $model;
    }
}