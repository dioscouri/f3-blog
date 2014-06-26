<?php
namespace Blog\Models;

class Posts extends \Dsc\Mongo\Collections\Content
{
    use\Search\Traits\SearchItem;

    public $categories = array();

    public $featured_image = array();

    protected $__config = array(
        'default_sort' => array(
            'publication.start.time' => -1
        )
    );

    protected $__type = 'blog.posts';

    protected function fetchConditions()
    {
        parent::fetchConditions();
        
        $this->setCondition('type', $this->__type);
        
        $filter_category_slug = trim($this->getState('filter.category.slug'));
        if (strlen($filter_category_slug))
        {
            if ($filter_category_slug == '--')
            {
                $this->setCondition('categories', array(
                    '$size' => 0
                ));
            }
            else
            {
                $this->setCondition('categories.slug', $filter_category_slug);
            }
        }
        
        $filter_category_id = $this->getState('filter.category.id');
        if (strlen($filter_category_id))
        {
            $this->setCondition('categories.id', new \MongoId((string) $filter_category_id));
        }
        
        $filter_author_id = $this->getState('filter.author.id');
        if (strlen($filter_author_id))
        {
            $this->setCondition('author.id', new \MongoId((string) $filter_author_id));
        }
        
        $filter_author_username = $this->getState('filter.author.username');
        if (strlen($filter_author_username))
        {
            $this->setCondition('author.username', (string) $filter_author_username);
        }
        return $this;
    }

    protected function beforeValidate()
    {
        $result = parent::beforeValidate();
        
        // add username for blog posts so we dont have to look up their usernames all the time
        if (!$this->get('author'))
        {
            $this->{'author.id'} = $this->{'metadata.creator.id'};
            $this->{'author.name'} = $this->{'metadata.creator.name'};
            $user = (new \Users\Models\Users())->populateState()
                ->setState('filter.id', $this->{'metadata.creator.id'})
                ->getItem();
            if (empty($user))
            {
                $act_user = \Dsc\System::instance()->get('auth')->getIdentity();
                $this->{'author.username'} = $act_user->username;
                $this->{'author.name'} = $act_user->fullName();
                $this->{'author.id'} = $act_user->id;
            }
            else
            {
                $this->{'author.username'} = $user->{'username'};
            }
        }
        else
        {
            if ($this->get('author.id'))
            {
                $user = (new \Users\Models\Users())->populateState()
                    ->setState('filter.id', $this->get('author.id'))
                    ->getItem();
                if (!empty($user->id))
                {
                    $this->{'author.name'} = $user->fullName();
                    $this->{'author.username'} = $user->username;
                }
            }
            else
            {
                $this->setError("Author is required");
            }
        }
        
        if (!empty($this->category_ids))
        {
            $category_ids = $this->category_ids;
            unset($this->category_ids);
            
            $categories = array();
            if ($list = (new \Blog\Models\Categories())->setState('select.fields', array(
                'title',
                'slug'
            ))
                ->setState('filter.ids', $category_ids)
                ->getList())
            {
                foreach ($list as $list_item)
                {
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
        
        return $this->checkErrors();
    }

    public function validate()
    {
        if (empty($this->copy))
        {
            $this->setError('Body copy is required');
        }
        
        return parent::validate();
    }

    public function generateSlug($unique = true)
    {
        if (empty($this->title))
        {
            $this->setError('A title is required for generating the slug');
            return $this->checkErrors();
        }
        
        $created = date('Y-m-d');
        if (!empty($this->{'created.time'}))
        {
            $created = date('Y-m-d', $this->{'created.time'});
        }
        
        $slug = \Web::instance()->slug($created . '-' . $this->title);
        
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

    public function getRelatedPosts($limit = 12)
    {
        $model = new static;
        $model->setState('filter.published_today', true)->setState('filter.publication_status', 'published');
        $conditions = $model->conditions(); // convert the set states to conditions
                    
        $model->setCondition('_id', array(
                '$ne' => new \MongoId((string) $this->id)
            ))
            ->setParam('limit', $limit);
        
        $categories = array();
        if (!empty($this->{'categories'}))
        {
            $categories = \Joomla\Utilities\ArrayHelper::getColumn((array) $this->{'categories'}, 'id');
        }
        
        if (!empty($categories)) 
        {
            $model->setCondition('categories', array(
                '$elemMatch' => array(
                    'id' => array(
                        '$in' => $categories
                    )
                )
            ));
        }
        
        return $model->getItems();
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
            'summary' => $this->getAbstract(),
            'datetime' => $this->{'publication.start.local'}
        ));
        
        return $item;
    }

    /**
     * This method update number of views for this post
     */
    public function hit()
    {
        $this->views = (int) $this->views + 1;
        return $this->save();
    }
}