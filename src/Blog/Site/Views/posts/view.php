<div class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <article class="blog-article">
                    <h2><a href="<?php echo $item->_url; ?>"><?php echo $item->{'metadata.title'}; ?></a></h2>

                    <?php if ($item->{'details.featured_image.slug'}) { ?>
                    <a href="<?php echo $item->_url; ?>">
                    <figure class="flexslider photo-gallery">
                        <ul class="slides">
                            <li>
                                <img class="entry-featured img-responsive" width="100%" src="./asset/thumb/<?php echo $item->{'details.featured_image.slug'} ?>">
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
                                <div class="separator-icon photo"></div>
                            </div>
                            <?php /* ?>
                            <span class="small-text">by <a href="./blog/author/<?php echo $item->{'metadata.creator.id'}; ?>"><?php echo $item->{'metadata.creator.name'}; ?></a></span>
                            */ ?>

                            <div class="blog-stats">
                                <span><i class="glyphicon glyphicon-eye-open"></i> 151 </span>
                                <span><i class="glyphicon glyphicon-heart"></i> 87 </span>
                            </div>
                        </div>
                        <div class="right">
                            <div class="text-editor">
                                <?php echo $item->{'details.copy'}; ?>
                            </div>
                            <div class="share-line">
                                <span class="title">Share: </span>
                                <div class="share-widget">
                                    <img src="img/share-widget.png" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <div class="author-box">
                    <div class="name-box">
                        <h3>Martin Doe</h3>
                        <ul class="social-href">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Dribble</a></li>
                            <li><a href="#">E-mail</a></li>
                        </ul>
                    </div>
                    <figure>
                        <img src="img/author.jpg" alt=""/>
                    </figure>
                    <div class="text">
                        <h4>About the author</h4>
                        <p>
                            Etiam nec mi aliquam, congue nulla ac, dictum nulla. Nunc aliquet egestas ipsum, sit amet tincidunt arcu aliquam nec. Donec eget posuere enim, vel vestibulum est. Nulla quis posuere massa. Etiam laoreet justo vitae magna. Suspen
                            potenti. Morbi nec arcu id nulla tristique.
                        </p>
                    </div>
                </div>
                <div class="related-posts main-widget">
                    <div class="widget-title">
                        <h2>Related Posts</h2>
                        <div class="slider-controls related-post-controls">
                            <button class="next"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button class="prev"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="flexslider related-posts-slider">
                            <ul class="slides">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <figure>
                                                <img src="img/related01.jpg" alt=""/>
                                            </figure>
                                            <h2><a href="#">Pellentesque vehicula urna purus</a></h2>
                                        </div>
                                        <div class="col-sm-4">
                                            <figure>
                                                <img src="img/related02.jpg" alt=""/>
                                            </figure>
                                            <h2><a href="#">Aenean condimentum purus</a></h2>
                                        </div>
                                        <div class="col-sm-4">
                                            <figure>
                                                <img src="img/related03.jpg" alt=""/>
                                            </figure>
                                            <h2><a href="#">tristique nisl turpisconsequat </a></h2>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <figure>
                                                <img src="img/related01.jpg" alt=""/>
                                            </figure>
                                            <h2><a href="#">Pellentesque vehicula urna purus</a></h2>
                                        </div>
                                        <div class="col-sm-4">
                                            <figure>
                                                <img src="img/related02.jpg" alt=""/>
                                            </figure>
                                            <h2><a href="#">Aenean condimentum purus</a></h2>
                                        </div>
                                        <div class="col-sm-4">
                                            <figure>
                                                <img src="img/related03.jpg" alt=""/>
                                            </figure>
                                            <h2><a href="#">tristique nisl turpisconsequat </a></h2>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            	echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayComments', array( 'slug' => $item->{'slug'} ) );
            ?>
            <aside class="col-sm-4">
            	<?php 
            		echo $this->renderLayout('Blog/Site/Views::posts/view_categories.php');
            		echo $this->renderLayout('Blog/Site/Views::posts/view_tag_cloud.php');
            	?>
            </aside>
        </div>
    </div>
</div>