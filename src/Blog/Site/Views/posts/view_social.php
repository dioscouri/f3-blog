<span class="title">Share</span>
<?php 
$social_buttons = array();
$url =  \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$settings = \Blog\Models\Settings::fetch()->populateState()->getItem();
$social_networks = $settings->get( 'post.social_networks' );

if( count( $social_networks ) == 0 ){
	return;
}

$options = array(
		'post_url' => $url,
		'hashtags' => $item->{'tags'},
		'desc' => $item->{'title'},
		'image' => \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].'/~lpolak/tienda/public/asset/'. $item->{'featured_image.slug'},
		'title' => $item->{'title'},		
	);

foreach( $social_networks as $button ) {
	$social_buttons []= \Blog\Lib\Social::instance()->getTool( $button, $options );;
}
?>
<div class="widget widget-share">
	<div class="widget-content">
		<?php foreach( $social_buttons as $button ) { ?>
			<div class="share-button pull-left"><?php echo $button; ?></div>
		<?php } ?>
	</div>
</div>