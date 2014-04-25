<div class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <article class="blog-article">
                    <h2><a href="<?php echo $item->_url; ?>"><?php echo $item->{'title'}; ?></a></h2>

                    <?php if ($item->{'featured_image.slug'}) { ?>
                    <a href="<?php echo $item->_url; ?>">
                    <figure class="flexslider photo-gallery">
                        <ul class="slides">
                            <li>
                                <img class="entry-featured img-responsive" width="100%" src="./asset/thumb/<?php echo $item->{'featured_image.slug'} ?>">
                            </li>
                        </ul>
                    </figure>
                    </a>
                    <?php } ?>
                    
                    <div class="text">
                        <div class="left-info">
                            <span class="bold-text"><?php echo date( 'd F Y', $item->{'publication.start.time'} ); ?></span>
                            <?php /*?><span class="bold-text"><a href="#">7 Comment(s)</a></span>*/ ?>
                            
                            <div class="info-separator">
                                <!--  <div class="separator-icon photo"></div>  -->
                            </div>
                            <?php /* ?>
                            <span class="small-text">by <a href="./blog/author/<?php echo $item->{'metadata.creator.id'}; ?>"><?php echo $item->{'metadata.creator.name'}; ?></a></span>
                            */ ?>

                            <div class="blog-stats">
                                <span><i class="glyphicon glyphicon-eye-open"></i> <?php echo (int)$item->{'views'}; ?> </span>
                             <!-- <span><i class="glyphicon glyphicon-heart"></i> 87 </span>  -->
                            </div>
                        </div>
                        <div class="right">
                            <div class="text-editor">
                                <?php echo $item->{'copy'}; ?>
                            </div>
                            <div class="share-line">
                                <?php echo $this->renderLayout('Blog/Site/Views::posts/view_social.php'); ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php if( !empty( $author ) ) { ?>
                <div class="author-box">
                    <div class="name-box">
                        <h3><a href="./blog/author/<?php echo $author->{'username'}; ?>"><?php echo $item->{'metadata.creator.name'}; ?></a></h3>
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
								$img = './dsc/images/empty_profile.png';
							}
                    	?>
                    	<a href="./blog/author/<?php echo $author->{'username'}; ?>">
							<img src="<?php echo $img; ?>" alt="<?php echo $item->{'metadata.creator.name'}; ?>" class="img-rounded">
						</a>
                    </figure>
                    <div class="text">
                        <h4>About the author</h4>
                        <p>
                        	<strong><?php echo $item->{'metadata.creator.name'}; ?></strong> /
                        	<?php echo $author->{'blog.bio.short'}?>
                        </p>
                    </div>
                </div>
                <?php }?>
                <div class="related-posts main-widget">
                
                    <div class="widget-title">
                        <h2>Related Posts</h2>
<?php if( !empty( $related ) ) { ?>
                        <div class="slider-controls related-post-controls">
                            <button class="prev"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button class="next"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        </div>
<?php } ?>
                    </div>
                    <div class="widget-content">
<?php if( empty( $related ) ) { ?>
                    
                    <h3>No related posts ...</h3>

<?php } else { ?>
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
<?php } ?>
                    </div>
                </div>
            <?php 
            	echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayComments', array( 'slug' => $item->{'slug'} ) );
            ?>
            </div>
            <aside class="col-sm-4">
            	<?php 
            		$categories = (new \Blog\Models\Categories)->getItems();
					$selected_categories = \Joomla\Utilities\ArrayHelper::getColumn( $item->get( "categories" ), 'id' );
            		echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayCategories', array( $categories, $selected_categories ) );
            		echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayTagCloud' );
            	?>
            </aside>
        </div>
    </div>
</div>