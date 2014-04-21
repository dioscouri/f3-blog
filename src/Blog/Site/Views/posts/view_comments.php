<?php
	$settings = \Blog\Models\Settings::fetch()->populateState()->getItem();
	if( ( $type = $settings->get( "general.comments" ) ) != 'null' ) {
		?>

<div class="blog-comments main-widget">
	<div class="widget-title">
		<h2>Comments (4)</h2>
	</div>
	<div class="widget-content">

<?php
		switch( $type ){
			case 'facebook' :
				$mobile = $settings->get( 'social.facebook.mobile' );
				$num_posts = $settings->get( 'social.facebook.num_posts' );
				$theme = $settings->get( 'social.facebook.theme' );
				$order = $settings->get( 'social.facebook.order' );
				$url =  \Base::instance()->get('SCHEME').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			?>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
			
				<div class="fb-comments" data-href="<?php echo $url;?>" data-numposts="<?php echo $num_posts?>" data-colorscheme="<?php echo $theme;?>" data-order-by="<?php echo $order;?>" data-mobile="<?php echo $mobile;?>"></div>
			<?php
				break;
				
			case 'disqus':
				$shortname = $settings->get( 'social.disqus.shortname' );
				?>
			<div id="disqus_thread"></div>
		    <script type="text/javascript">
		        var disqus_shortname = 'polakluk';
		
		        (function() {
		            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
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
?>
<!--	original design
				<div class="blog-comments main-widget">
                    <div class="widget-title">
                        <h2>Comments (4)</h2>
                    </div>
                    <div class="widget-content">
                        <ul class='comment-wrap'>
                            <li>
                                <div class="comment">
                                    <div class="user">
                                        <figure>
                                            <img src="img/user01.jpg" alt=""/>
                                        </figure>
                                        <span class="name">Anna Praesent</span>
                                        <span class="date">12.04.2013</span>
                                    </div>
                                    <div class="text">
                                        <div class="comment-style">
                                            <h3>Mauris mattis molestie <a href="#" class="reply pull-right">Reply</a></h3>
                                            <div class="text-wrap">
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque ac urna sed commodo. Mauris quis arcu a neque. Morbi eu adipiscing velit, eget consectetur diam. Praesent tincidunt lectus libero.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <div class="user">
                                                <figure>
                                                    <img src="img/user02.jpg" alt=""/>
                                                </figure>
                                                <span class="name">Antuan Doe</span>
                                                <span class="date">18.06.2013</span>
                                            </div>
                                            <div class="text">
                                                <div class="comment-style">
                                                    <h3>Aliquam in dolor pretium <a href="#" class="reply pull-right">Reply</a></h3>
                                                    <div class="text-wrap">
                                                        <p>
                                                            Aenean a molestie sem. Aliquam in dolor pretium, tincidunt lectus non,commodo eros. Nunc vestibulum orci lorem, in dictum diam venenatis id. Maecenas porttitor mi lacus, sed molestie sem adipiscing at.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="comment">
                                                    <div class="user">
                                                        <figure>
                                                            <img src="img/user03.jpg" alt=""/>
                                                        </figure>
                                                        <span class="name">Loren Posuere </span>
                                                        <span class="date">22.06.2013</span>
                                                    </div>
                                                    <div class="text">
                                                        <div class="comment-style">
                                                            <h3>porttitor nunc condimentum <a href="#" class="reply pull-right">Reply</a></h3>
                                                            <div class="text-wrap">
                                                                <p>
                                                                    Donec ultrices varius nisi, sed imperdiet velit molestie quis.Morbi vel sagittis elit. Vivamus in iaculis tellus. Aenean condimentum sed purus id lobortis. Suspendisse malesuadaporttitor nisl, vel condimentum dolor dapibus placerat.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="comment">
                                    <div class="user">
                                        <figure>
                                            <img src="img/user04.jpg" alt=""/>
                                        </figure>
                                        <span class="name">Pol Tincidunt </span>
                                        <span class="date">03.07.2013</span>
                                    </div>
                                    <div class="text">
                                        <div class="comment-style">
                                            <h3>nulla tristique adipiscing <a href="#" class="reply pull-right">Reply</a></h3>
                                            <div class="text-wrap">
                                                <p>
                                                    Sed blandit tempus nibh. In lacinia viverra magna, sed vestibulum urna facilisis ac. Etiam at accumsan nisl, ac consequat leo. Sed id neque diam. Fusce posuere velit nec laoreet aliquet. Vestibulum ante ipsum primis in faucibus orci.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contact-form">
                            <h2>Leave a comment</h2>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" placeholder="Enter Your Name*" />
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Enter Your E-mail*" />
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                <input type="text" class="form-control" placeholder="Enter Your Subject" />
                            </div>
                            <p class="info">Your email address will not be published. Required fields are marked <span class="required">*</span></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact-form">
                            <textarea class="form-control" rows="5" placeholder="Enter your message"></textarea>
                            <div class="row">
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="Enter the code">
                                </div>
                                <div class="col-sm-5">
                                    <div class="captcha-wrap">
                                        <img src="img/captcha.png" alt=""/>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class='btn btn-default custom-button' value="Post Comment"/>
                        </div>
                    </div>
                </div>
 -->