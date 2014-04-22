<?php
$settings = \Blog\Models\Settings::fetch()->populateState()->getItem();
if( ( $type = $settings->get( "general.comments" ) ) != 'null' ) {

	$url =  \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$options = array();
	switch( $type ){
		case 'facebook' :
			$options = array(
			'mobile' => $settings->get( 'social.facebook.mobile' ),
			'num_posts' => $settings->get( 'social.facebook.num_posts' ),
			'theme' => $settings->get( 'social.facebook.theme' ),
			'order' => $settings->get( 'social.facebook.order' ),
			'post_url' => $url,
			);
			break;

		case 'disqus':
			$options = array(
			'shortname' => $settings->get( 'social.disqus.shortname' ),
			'title' => $item->{'title'},
			'id' => $item->{'id'},
			'post_url' => $url,
			);
			break;
	}

	$num_comments = \Blog\Lib\Social::instance()->getTool( $type.':count_comments', $options );
	$comments = \Blog\Lib\Social::instance()->getTool( $type.':comments', $options );;
?>

<div class="blog-comments main-widget">
	<div class="widget-title">
		<h2>Comments (<?php echo $num_comments?>)</h2>
	</div>
	<div class="widget-content">
		<?php echo $comments; ?>
	</div>
</div>	
<?php
	}
	