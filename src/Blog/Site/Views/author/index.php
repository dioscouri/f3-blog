<?php $aside = false;
// are there tags?  // are there categories? // TODO: is a module published in the blog-author-aside position? 
if ($tags = \Blog\Models\Posts::distinctTags() || $cats = \Blog\Models\Categories::find()) {
	$aside = true;
}
?>

<div id="blog-author" class="blog-posts">
    <div class="container">    
        <div class="row">
            <div class="col-sm-<?php echo !empty($aside) ? '9' : '12'; ?>">    
            
            <?php $this->paginated = $paginated; echo $this->renderView('Blog/Site/Views::posts/index.php'); ?>
            
            </div>
            
            <?php if (!empty($aside)) { ?>
            <aside class="col-sm-3">
                <div class="widget">
                    <div class="widget-title">
                        <h3><?php echo $author->fullName(); ?></h3>
                    </div>
                    
                    <div class="widget-content">
	                    <figure>
	                    	<?php 
	                    		$img = $author->getProfilePicture(); 
	                    		if( $img == '' ){
									$img = './minify/Users/Assets/images/empty_profile.png';
								}
	                    	?>
	                    	
							<img src="<?php echo $img; ?>" alt="<?php echo $author->{'username'}; ?>" class="img-rounded">
							
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
								/*
								if( strlen( $author->{'email'} ) ) {
	                        ?>
	                            <li>
	                              	<h4 class="social-network">Email</h4>
	                            	<a href="mailto:<?php echo $author->{'email'}?>"><?php echo $author->{'email'}?></a>
	                            </li>
	                        <?php } */ ?>
	                    </ul>
	                    </div>
	                    
	                    <?php if (!empty($author->{'blog.bio.full'})) { ?>
	                    <div class="text">
	                        <h3>About the author</h3>
                        	<?php echo $author->{'blog.bio.full'}; ?>
	                    </div>
	                    <?php } ?>
	                    
                    </div>
                </div>
                            
            	<?php 
            		$categories = (new \Blog\Models\Categories)->getItems();
					//$selected_categories = \Joomla\Utilities\ArrayHelper::getColumn( $item->get( "categories" ), 'id' );
            		$selected_categories = array();
            		echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayCategories', array( $categories, $selected_categories ) );
            		echo \Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayTagCloud' );
            	?>
            </aside>
            <?php } ?>
            
        </div>    
    </div>
</div>