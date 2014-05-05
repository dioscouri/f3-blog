<?php $aside = false;
// are there tags?  // are there categories? // TODO: is a module published in the blog-tag-aside position? 
if ($tags = \Blog\Models\Posts::distinctTags() || $cats = \Blog\Models\Categories::find()) {
	$aside = true;
}
?>

<div id="blog-tag" class="blog-posts">
    <div class="container">    
        <div class="row">
            <div class="col-sm-<?php echo !empty($aside) ? '9' : '12'; ?>">    
            
            <?php $this->paginated = $paginated; echo $this->renderView('Blog/Site/Views::posts/index.php'); ?>
            
            </div>
            
            <?php if (!empty($aside)) { ?>
            <aside class="col-sm-3">
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