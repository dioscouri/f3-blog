<?php
	$settings = \Blog\Models\Settings::fetch()->populateState()->getItem();
	if( ( $type = $settings->get( "general.comments" ) ) != 'null' ) {

		
	// get number of comments
	$num_comments = '5';
	$post_url =  \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	switch( $type ) {
		case 'facebook' :
			{
				$num_comments = '<div class="fb-comments-count" data-href="'.$post_url.'">0</div>';
				break;
			}
		case 'disqus':
			{
				$num_comments = '<a href="'.$post_url.'#disqus_thread" data-disqus-identifier="'.$item->{'id'}.'">First article</a>';
				break;
			}
	}
?>

<div class="blog-comments main-widget">
	<div class="widget-title">
		<h2>Comments (<?php echo $num_comments?>)</h2>
	</div>
	<div class="widget-content">

<?php
		switch( $type ){
			case 'facebook' :
				$mobile = $settings->get( 'social.facebook.mobile' );
				$num_posts = $settings->get( 'social.facebook.num_posts' );
				$theme = $settings->get( 'social.facebook.theme' );
				$order = $settings->get( 'social.facebook.order' );
			?>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
			
				<div class="fb-comments" data-href="<?php echo $post_url;?>" data-numposts="<?php echo $num_posts?>" data-colorscheme="<?php echo $theme;?>" data-order-by="<?php echo $order;?>" data-mobile="<?php echo $mobile;?>"></div>
			<?php
				break;
				
			case 'disqus':
				$shortname = $settings->get( 'social.disqus.shortname' );
				$title = $item->{'title'};
				$identifier = $item->{'id'};
				
				?>
				<div id="disqus_thread"></div>
			    <script type="text/javascript">
			        var disqus_shortname = '<?php echo $shortname; ?>'; // required: replace example with your forum shortname
			        var disqus_identifier = '<?php echo $identifier;?>';
			        var disqus_title = '<?php echo $title;?>';
			        			
			        (function() {
			            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);

			            var c = document.createElement('script'); c.async = true;
			            c.type = 'text/javascript';
			            c.src = '//' + disqus_shortname + '.disqus.com/count.js';
			            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(c);
			        })();
			    </script>
			    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				
				<?php
				break;
		} ?>
	</div>
</div>	
<?php
	}
