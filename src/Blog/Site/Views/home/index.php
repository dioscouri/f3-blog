<?php $aside = false;
// are there tags?  // are there categories? // TODO: is a module published in the blog-home-aside position? 
if ($tags = \Blog\Models\Posts::distinctTags() || $cats = \Blog\Models\Categories::find()) {
	$aside = true;
}
?>

<div id="blog-home" class="blog-posts">
    <div class="container">    
        <div class="row">
            <div class="col-sm-<?php echo !empty($aside) ? '9' : '12'; ?>">    
            
            <?php $this->paginated = $paginated; echo $this->renderView('Blog/Site/Views::posts/index.php'); ?>
            
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