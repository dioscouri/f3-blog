<?php 
$social_buttons = array();
$url =  \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$settings = \Blog\Models\Settings::fetch();
$social_networks = $settings->get( 'post.social_networks' );

if (count( $social_networks ) == 0 ) {
	return;
}

$options = array(
		'post_url' => $url,
		'hashtags' => $item->{'tags'},
		'desc' => $item->{'title'},
		'image' => \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].'/asset/'. $item->{'featured_image.slug'},
		'title' => $item->{'title'},		
	);

foreach( $social_networks as $button ) {
	$social_buttons[] = \Blog\Lib\Social::instance()->getTool( $button, $options );
}
?>
<ul class="share-buttons list-unstyled list-inline">
	<?php foreach( $social_buttons as $button ) { ?>
		<li class="share-button" style="display:table-cell; vertical-align:middle;">
		  <?php echo $button; ?>
		</li>
	<?php } ?>
</ul>