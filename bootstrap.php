<?php
class BlogBootstrap extends \Dsc\Bootstrap
{

    protected $dir = __DIR__;

    protected $namespace = 'Blog';

    protected function preSite()
    {
        if (class_exists('\Search\Factory'))
        {
            \Search\Factory::registerSource(new \Search\Models\Source(array(
                'id' => 'blog.posts',
                'title' => 'Blog Posts',
                'class' => '\Blog\Models\Posts'
            )));
        }
        
        if (class_exists('\Modules\Factory'))
        {
            \Modules\Factory::registerPositions(array(
                'blog-tag-cloud'
            ));
        }
    }

    protected function preAdmin()
    {
        if (class_exists('\Modules\Factory'))
        {
            \Modules\Factory::registerPositions(array(
                'blog-tag-cloud'
            ));
        }
        
        if (class_exists('\Search\Factory'))
        {
            \Search\Factory::registerSource(new \Search\Models\Source(array(
                'id' => 'blog.posts',
                'title' => 'Blog Posts',
                'class' => '\Blog\Models\Posts'
            )));
        }
    }
}
$app = new BlogBootstrap();