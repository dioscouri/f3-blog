<?php
class BlogBootstrap extends \Dsc\Bootstrap
{
    protected $dir = __DIR__;
    protected $namespace = 'Blog';
    
    protected function preSite()
    {
        \Search\Factory::registerSource( new \Search\Models\Source( array(
            'id'=>'blog.posts', 'title'=>'Blog Posts', 'class'=>'\Blog\Models\Posts'
        ) ) );
    }
}
$app = new BlogBootstrap();