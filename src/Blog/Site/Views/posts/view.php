<?php
$settings = \Blog\Models\Settings::fetch(); 
$aside = false;
// are there tags?  // are there categories? // TODO: is a module published in the blog-post-aside position? 
if ($tags = \Blog\Models\Posts::distinctTags() || $cats = \Blog\Models\Categories::find()) {
	$aside = true;
}
?>

<div class="blog-post">
    <div class="container">
        <div class="row">
            <div class="col-sm-<?php echo !empty($aside) ? '9' : '12'; ?>">
                <article class="blog-article">
                    <h2><?php echo $item->{'title'}; ?></h2>
                    
                    <p class="byline">
                        <span class="publication-date"><?php echo date( 'd F Y', $item->{'publication.start.time'} ); ?></span>                            
                        <span class="author">by <a href="./blog/author/<?php echo $item->{'author.username'}; ?>"><?php echo $item->{'author.name'}; ?></a></span>
                    </p>
                    
                    <div class="share-wrapper">
                        <?php echo $this->renderLayout('Blog/Site/Views::posts/social.php'); ?>
                    </div>                    
                    
                    <?php if ($item->{'featured_image.slug'}) { ?>
                    <figure>
                        <img style="width:100%;" class="entry-featured img-responsive" src="./asset/thumb/<?php echo $item->{'featured_image.slug'} ?>">
                    </figure>
                    <?php } ?>
                    
                    <div class="copy-wrapper">
                        <?php echo $item->{'copy'}; ?>
                    </div>
                    
                </article>
                
                <div class="entry-meta">
                
					<?php if(!empty( $item->{'tags'} ) ) { ?>
                        <p class="tags"> 
                            <?php foreach ( $item->{'tags'} as $tag ) { ?>
                        		<a class="label label-primary tag" href="./blog/tag/<?php echo $tag; ?>"><?php echo $tag; ?></a>
                            <?php } ?>
                        </p>
                    <?php } ?>                        
                    
                    <?php if (!empty($item->{'categories'})) { ?>
                    <p class="categories"> 
                        <?php foreach ($item->{'categories'} as $category) { ?>
                        <a class="label label-info category" href="./blog/category/<?php echo $category['slug']; ?>"
                            title="View all posts in <?php echo $category['title']; ?>" rel="category tag"><?php echo $category['title']; ?></a>
                        <?php } ?>
                    </p>
                    <?php } ?>
    
                </div>
                
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
                        <div>
                        	<strong><?php echo $item->{'author.name'}; ?></strong> /
                        	<?php echo $author->{'blog.bio.short'}?>
                        </div>
                    </div>
                </div>
                <?php }?>
                
                <?php if( !empty( $related ) ) { ?>
                <div class="related-posts main-widget">
                
                    <div class="widget-title">
                        <h4>Related Posts</h4>

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
                                				<h5><a href="./blog/post/<?php echo $post->{'slug'}; ?>"><?php echo $post->{'title'}; ?></a></h5>
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
                
                <?php
                if ( $type = $settings->get( "general.comments" ) ) 
                {
                    ?><hr /><?php
                    // display the comments
                    $this->item = $item;
                    echo $this->renderView('Blog/Site/Views::posts/comments.php');
                }
                ?>
            </div>
            
            <?php if (!empty($aside)) { ?>
            <aside class="col-sm-3">
            	<?php 
            		// display the categories
            		echo $this->renderView('Blog/Site/Views::categories/widget.php');
            		
            		// display the tag cloud
            		echo $this->renderView('Blog/Site/Views::tags/cloud.php');
            	?>
            </aside>
            <?php } ?>
        </div>
    </div>
</div>