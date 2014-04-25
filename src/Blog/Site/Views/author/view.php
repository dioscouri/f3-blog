<div class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
            
                <?php if (!empty($paginated->items)) { ?>
            
                <?php foreach ($paginated->items as $item) { 
                    $url = './blog/post/' . $item->{'slug'};
                    ?>
                
                    <article id="post-<?php echo $item->id; ?>" class="blog-article">
                    
                        <h2><a href="<?php echo $url; ?>"><?php echo $item->{'title'}; ?></a></h2>
                        
                        <?php if ($item->{'featured_image.slug'}) { ?>
                        <figure class="flexslider photo-gallery">
                            <ul class="slides">
                                <li>
                                    <img class="entry-featured img-responsive" width="100%" src="./asset/thumb/<?php echo $item->{'featured_image.slug'} ?>">
                                </li>
                            </ul>
                        </figure>
                        <?php } ?>
                        
                        <div class="text">
                            <div class="left-info">
                                <span class="bold-text"><?php echo date( 'd F Y', $item->{'publication.start.time'} ); ?></span>
                                <div class="info-separator">
                                    <div class="separator-icon photo"></div>
                                </div>
                                <span class="small-text">by <a href="./blog/author/<?php echo $author->{'username'}; ?>"><?php echo $item->{'metadata.creator.name'}; ?></a></span>
                                <?php if(!empty( $item->{'tags'} ) ) { ?>
                                <span class="small-text">tags: 
	                                <?php for( $i = 0, $c = count( $item->{'tags'} ); $i < $c; $i++  ) { ?>
                                		<a href="./blog/tag/<?php echo $item->{'tags.'.$i}; ?>"><?php echo $item->{'tags.'.$i}; ?></a><?php 
                    						if( $i != $c -1 ){
												echo ', ';
											}
                    					}
                    				?>
	                            </span>
                                <?php } ?>
                            </div>
                            <div class="right">
                                <div class="excerpt">
                                    <?php echo $item->getExtract(); ?>
                                </div>
                                <div class="bottom-line">
                                    <a href="<?php echo $url; ?>" class="read-more">Read More &gt;</a>
                                    <div class="blog-stats">
                                        <span><i class="glyphicon glyphicon-eye-open"></i> <?php echo (int)$item->{'views'}; ?> </span>
                                        <span><i class="glyphicon glyphicon-heart"></i> 87 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    
                <?php } ?>
                
                <?php } else { ?>
                    
                        <div class="">No posts found.</div>
                    
                <?php } ?>
                
                <div class="main-bottom">
                
                    <div class="row datatable-footer">
                        <div class="col-sm-2">
                            <div class="page-counter">
                            <?php echo (!empty($paginated->total_pages)) ? $paginated->getResultsCounter() : null; ?>
                            </div>
                        </div>
                    
                        <?php if (!empty($paginated->total_pages) && $paginated->total_pages > 1) { ?>
                        <div class="col-sm-10">
                            <div class="pull-right">
                            <?php echo $paginated->serve(); ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                                    
                </div>
                
            </div>
            <aside class="col-sm-4">
                <div class="widget">
                    <div class="widget-title">
                        <h2><?php echo $author->fullName(); ?></h2>
                    </div>
                    <div class="widget-content text-right">
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
	                    <div class="social-box">
	                        <ul class="social-href">
	                        
	                        <?php if( strlen( $author->{'social.facebook.profile.profileURL'} ) ) { ?>
	                            <li>
	                            	<h4 class="social-network">Facebook</h4>
	                            	<a href="<?php echo $author->{'social.facebook.profile.profileURL'}; ?>" target="_blank"><?php echo $author->{'social.facebook.profile.username'}; ?></a>
	                            </li>
	                        <?php 
								}
								if( strlen( $author->{'social.twitter.profile.profileURL'} ) ) {
	                        ?>
	                            <li>
	                            	<h4 class="social-network">Twitter</h4>
	                            	<a href="<?php echo $author->{'social.twitter.profile.profileURL'}; ?>" target="_blank"><?php echo $author->{'social.facebook.twitter.displayName'}; ?></a>
	                            </li>
	                        <?php 
								}
								if( strlen( $author->{'social.google.profile.profileURL'} ) ) {
	                        ?>
	                            <li>
	                            	<h4 class="social-network">Google +</h4>
	                            	<a href="<?php echo $author->{'social.google.profile.profileURL'} ?>" target="_blank"><?php echo $author->{'social.google.profile.displayName'} ?></a>
	                            </li>
	                        <?php 
								}
								if( strlen( $author->{'email'} ) ) {
	                        ?>
	                            <li>
	                              	<h4 class="social-network">Email</h4>
	                            	<a href="mailto:<?php echo $author->{'email'}?>"><?php echo $author->{'email'}?></a>
	                            </li>
	                        <?php } ?>
	                    </ul>
	                    </div>
	                    <div class="text">
	                        <h3>About the author</h3>
                        	<?php echo $author->{'blog.bio.full'}; ?>
	                    </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>