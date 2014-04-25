<?php 
$social_buttons = array();
$url =  \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$settings = \Blog\Models\Settings::fetch()->populateState()->getItem();
$social_networks = $settings->get( 'post.social_networks' );

if( count( $social_networks ) == 0 ){
	return;
}

foreach( $social_networks as $button ) {
	$options = array();
	switch( $button ){
		case 'facebook:like':
			{
				$options = array(
						'action' => $settings->get( 'social.facebook.like.action' ),
						'theme' => $settings->get( 'social.facebook.like.theme' ),
						'layout' => $settings->get( 'social.facebook.like.layout' ),
						'show_faces' => $settings->get( 'social.facebook.like.show_faces' ),
						'width' => $settings->get( 'social.facebook.like.width' ),
						'post_url' => $url,
				);
				break;
			}
		case 'facebook:share':
			{
				$options = array(
						'layout' => $settings->get( 'social.facebook.share.layout' ),
						'width' => $settings->get( 'social.facebook.share.width' ),
						'post_url' => $url,
				);
				break;
			}
		case 'twitter:tweet':
			{
				$options = array(
						'button_text' => $settings->get( 'social.twitter.tweet.button_text' ),
						'lang' => $settings->get( 'social.twitter.tweet.lang' ),
						'via' => $settings->get( 'social.twitter.tweet.via' ),
						'post_url' => $url,
						'text' => $settings->get( 'social.twitter.tweet.tweet' ),
						'count_box' => $settings->get( 'social.twitter.tweet.count' ),
						'hashtags' => $item->{'tags'},
				);
				break;
			}
		case 'pinterest:pinit':
			{
				$options = array(
						'type' => $settings->get( 'social.pinterest.type' ),
						'position' => $settings->get( 'social.pinterest.position' ),
						'color' => $settings->get( 'social.pinterest.color' ),
						'shape' => $settings->get( 'social.pinterest.shape' ),
						'size' => $settings->get( 'social.pinterest.size' ),
						'desc' => $item->{'title'},
						'post_url' => $url,
						'image' => \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].'/~lpolak/tienda/public/asset/'. $item->{'featured_image.slug'},
				);
				break;
			}
		case 'tumblr:share':
			{
				$options = array(
					'type' => $settings->get( 'social.tumblr.share.type' ),
					'color' => $settings->get( 'social.tumblr.share.color' ),
					'text' => $settings->get( 'social.pinterest.text' ),
					'title' => $item->{'title'},
					'post_url' => $url,
				);
				break;
			}
	}
	$social_buttons []= \Blog\Lib\Social::instance()->getTool( $button, $options );;
}
?>
<div class="widget widget-share">
	<div class="widget-content">
		<ul class='social-share'>
            <?php foreach( $social_buttons as $button ) { ?>
				<li><?php echo $button; ?></li>
			<?php } ?>
		</ul>
	</div>
</div>