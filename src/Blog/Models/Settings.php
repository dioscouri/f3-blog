<?php
namespace Blog\Models;

class Settings extends \Dsc\Mongo\Collections\Settings
{
    public $home = array(
        'include_categories_widget' => 1
    );
    public $general = array(
        'comments' => null
    );
    public $social = array(
        'facebook' => array(
            "comments" => array(
                "theme" => 'dark',
                "mobile" => "autodetect",
                "num_posts" => 10,
                "order" => "reverse_time"
            ),
            "like" => array(
                "action" => "like",
                "layout" => "button_count",
                "theme" => 'dark',
                "width" => "",
                "show_faces" => "false"
            ),
            "share" => array(
                "layout" => 'standard',
                "width" => ''
            )
        ),
        // see https://developers.google.com/+/web/+1button/
        'google' => array(
            "plus" => array(
                'size' => 'standard',
                'annotation' => 'bubble',
            )
        ),        
        'disqus' => array(
            "comments" => array(
                'shortname' => ''
            )
        ),
        'twitter' => array(
            'tweet' => array(
                'button_text' => 'Tweet',
                'lang' => 'en',
                'via' => 'asingh',
                'tweet' => 'Checkout this ... ',
                'count' => 'horizontal'
            )
        ),
        'pinterest' => array(
            'position' => 'none',
            'color' => 'red',
            'shape' => 'rect',
            'size' => 'Small'
        ),
        'tumblr' => array(
            'share' => array(
                'type' => '4',
                'color' => '',
                'text' => 'Share on Tumblr'
            )
        )
    );
    public $post = array(
        'social_networks' => array(
            'facebook:like',
            'twitter:tweet',
            'google:plus',
            //'pinterest:pinit',
            //'tumblr:share',
        )
    );
    protected $__type = 'blog.settings';
}