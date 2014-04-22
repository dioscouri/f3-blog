<?php 
$social_buttons = array();
$url =  \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$settings = \Blog\Models\Settings::fetch()->populateState()->getItem();

$options = array(
		'action' => $settings->get( 'social.facebook.like.action' ),
		'theme' => $settings->get( 'social.facebook.like.theme' ),
		'layout' => $settings->get( 'social.facebook.like.layout' ),
		'show_faces' => $settings->get( 'social.facebook.like.show_faces' ),
		'width' => $settings->get( 'social.facebook.like.width' ),
		'post_url' => $url,
);
$social_buttons []= \Blog\Lib\Social::instance()->getTool( 'facebook:like', $options );;


$options = array(
		'layout' => $settings->get( 'social.facebook.share.layout' ),
		'width' => $settings->get( 'social.facebook.share.width' ),
		'post_url' => $url,
);
$social_buttons []= \Blog\Lib\Social::instance()->getTool( 'facebook:share', $options );;


$options = array(
		'button_text' => $settings->get( 'social.twitter.tweet.button_text' ),
		'lang' => $settings->get( 'social.twitter.tweet.lang' ),
		'via' => $settings->get( 'social.twitter.tweet.via' ),
		'post_url' => $url,
		'text' => $settings->get( 'social.twitter.tweet.tweet' ),
		'count_box' => $settings->get( 'social.twitter.tweet.count' ),
		'hashtags' => array( 'a', 'b'),
);
$social_buttons []= \Blog\Lib\Social::instance()->getTool( 'twitter:tweet', $options );;

foreach( $social_buttons as $social ){
	echo $social;
}
?>