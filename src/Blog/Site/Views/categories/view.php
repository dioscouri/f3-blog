<div class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
            	<h1>Category <em>"<?php echo $category->{'title'}; ?>"</em></h1>
            
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
                                    <!--  <div class="separator-icon photo"></div>  -->
                                </div>
                                <span class="small-text">by <a href="./blog/author/<?php echo $item->{'metadata.creator.username'}; ?>"><?php echo $item->{'metadata.creator.name'}; ?></a></span>
                                <?php if(!empty( $item->{'tags'} ) ) { ?>
                                <span class="small-text">tags: 
	                                <?php 
	                                	for( $i = 0, $c = count( $item->{'tags'} ); $i < $c; $i++  ) {
											$tag = $item->{'tags.'.$i};
	                               	?>
                                		<a href="./blog/tag/<?php echo $tag; ?>"><?php echo $tag; ?></a><?php 
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
                                        <!--  <span><i class="glyphicon glyphicon-heart"></i> 87 </span>  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    
                <?php }
					} else { ?>
                    
                        <div class="">No items found.</div>
                    
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
            	<?php 
            		$categories = (new \Blog\Models\Categories)->getItems();
            		echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayCategories', array( $categories, array( $category->id ) ) );
            		echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayTagCloud' );
            	?>
            </aside>
        </div>
    </div>
</div>