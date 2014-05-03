<?php $aside = false;
// are there tags?  // are there categories? // TODO: is a module published in the blog-post-aside position? 
if ($tags = \Blog\Models\Posts::distinctTags() || $cats = \Blog\Models\Categories::find()) {
	$aside = true;
}
?>

<div class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-<?php echo !empty($aside) ? '8' : '12'; ?>">
                <article class="blog-article">
                    <h2><a href="<?php echo $item->_url; ?>"><?php echo $item->{'title'}; ?></a></h2>
                    
                    <div class="share-wrapper">
                        <?php echo $this->renderLayout('Blog/Site/Views::posts/view_social.php'); ?>
                    </div>                        
                    
                    <?php if ($item->{'featured_image.slug'}) { ?>
                    <figure>
                        <img style="width:100%;" class="entry-featured img-responsive" src="./asset/<?php echo $item->{'featured_image.slug'} ?>">
                    </figure>
                    <?php } ?>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="byline">
                                <div class="publication-date"><?php echo date( 'd F Y', $item->{'publication.start.time'} ); ?></div>                            
                                <div class="author">by <a href="./blog/author/<?php echo $item->{'author.username'}; ?>"><?php echo $item->{'author.name'}; ?></a></div>
                            </div>
                            
							<?php if(!empty( $item->{'tags'} ) ) { ?>
                                <div class="small-text">tags: 
	                                <?php 
                                	for( $i = 0, $c = count( $item->{'tags'} ); $i < $c; $i++  ) {
										$tag = $item->{'tags.'.$i};
                            	   	?>
                                		<a class="tag" href="./blog/tag/<?php echo $tag; ?>"><?php echo $tag; ?></a><?php 
                    						if( $i != $c -1 ){
												echo ', ';
											}
                    					}
                    				?>
	                            </div>
                            <?php } ?>
                       	</div>
                       	
                        <div class="col-md-10">                        
                            <div class="copy-wrapper">
                                <?php echo $item->{'copy'}; ?>
                            </div>
                        </div>
                    </div>
                </article>
                
                <?php if( !empty( $author ) ) { ?>
                <div class="author-box">
                    <div class="name-box">
                        <h3><a href="./blog/author/<?php echo $author->{'username'}; ?>"><?php echo $item->{'author.name'}; ?></a></h3>
                        <ul class="social-href">
                        
                        <?php if( strlen( $author->{'social.facebook.profile.profileURL'} ) ) { ?>
                            <li><a href="<?php echo $author->{'social.facebook.profile.profileURL'}; ?>" target="_blank">Facebook</a></li>
                        <?php 
							}
							if( strlen( $author->{'social.twitter.profile.profileURL'} ) ) {
                        ?>
                            <li><a href="<?php echo $author->{'social.twitter.profile.profileURL'}; ?>" target="_blank">Twitter</a></li>
                        <?php 
							}
							if( strlen( $author->{'social.google.profile.profileURL'} ) ) {
                        ?>
                            <li><a href="<?php echo $author->{'social.google.profile.profileURL'} ?>" target="_blank">Google +</a></li>
                        <?php 
							}
							if( strlen( $author->{'email'} ) ) {
                        ?>
                            <li><a href="mailto:<?php echo $author->{'email'}?>">E-mail</a></li>
                        <?php } ?>
                    </ul>
                    </div>
                    <figure>
                    	<?php 
                    		$img = $author->getProfilePicture(); 
                    		if( $img == '' ){
								$img = './minify/Users/Assets/images/empty_profile.png';
							}
                    	?>
                    	<a href="./blog/author/<?php echo $author->{'username'}; ?>">
							<img src="<?php echo $img; ?>" alt="<?php echo $item->{'author.name'}; ?>" class="img-rounded">
						</a>
                    </figure>
                    <div class="text">
                        <h4>About the author</h4>
                        <p>
                        	<strong><?php echo $item->{'author.name'}; ?></strong> /
                        	<?php echo $author->{'blog.bio.short'}?>
                        </p>
                    </div>
                </div>
                <?php }?>
                
                <?php if( !empty( $related ) ) { ?>
                <div class="related-posts main-widget">
                
                    <div class="widget-title">
                        <h2>Related Posts</h2>

                        <div class="slider-controls related-post-controls">
                            <button class="prev"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button class="next"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        </div>

                    </div>
                    <div class="widget-content">
                        <div class="flexslider related-posts-slider">
                            <ul class="slides">
                                <li>
                                    <div class="row">
                                <?php
                                	$i = 0;
                                	foreach( $related as $post ) {
                                		if( $i  % 3 == 0 && $i ){ ?>
                                			</div>
                                		</li>		
                                        <li>
                                        	<div class="row">
                                        <?php } ?>
                                			<div class="col-sm-4">
                                				<figure>
                                					<a href="./blog/post/<?php echo $post->{'slug'}; ?>">
                                						<img src="./asset/thumb/<?php echo $post->{'featured_image.slug'}; ?>" alt="<?php echo $post->{'title'}; ?>"/>
                                					</a>
                                				</figure>
                                				<h2 class="text-center"><a href="./blog/post/<?php echo $post->{'slug'}; ?>"><?php echo $post->{'title'}; ?></a></h2>
                                			</div>
                                	<?php
                                	$i++;
                                	}
                                		if( $i %3 != 0 ) { ?>
                                		</div>
                                	</li>
                                <?php	} ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                
                <div>
                <?php echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayComments', array( 'slug' => $item->{'slug'} ) ); ?>
                </div>
            </div>
            
            <?php // TODO Determine if this should be displayed ?>
            <?php if (!empty($aside)) { ?>
            <aside class="col-sm-4">
            	<?php 
            		$categories = (new \Blog\Models\Categories)->getItems();
					$selected_categories = \Joomla\Utilities\ArrayHelper::getColumn( $item->get( "categories" ), 'id' );
            		echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayCategories', array( $categories, $selected_categories ) );
            		echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayTagCloud' );
            	?>
            </aside>
            <?php } ?>
        </div>
    </div>
</div>