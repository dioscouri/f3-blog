<?php
	$safemode_enabled = \Base::instance()->get('safemode.enabled');
    $safemode_user = \Base::instance()->get('safemode.username');

	if (!empty($this->paginated->items)) { ?>    
    <?php foreach($this->paginated->items as $item) { 
    	$display_author = !( $safemode_enabled && ($safemode_user == $item->{'author.username'} ) );
        $item->_url = './blog/post/' . $item->slug; 
    ?>
    <article id="post-<?php echo $item->id; ?>" class="post-<?php echo $item->id; ?>">

        <div class="entry-header">
            <h2 class="entry-title">
                <a href="<?php echo $item->_url; ?>">
                <?php echo $item->{'title'}; ?>
                </a>
            </h2>
            
            <?php if ($item->{'featured_image.slug'}) { ?>
            <p>
                <a href="<?php echo $item->_url; ?>">
                    <img style="width:100%;" class="entry-featured img-responsive" width="100%" src="./asset/<?php echo $item->{'featured_image.slug'} ?>">
                </a>
            </p>
            <?php } ?>
        
        </div>
        
        <div class="row">
            <div class="col-md-2">
                <div class="byline">
                    <div class="publication-date"><p><?php echo date( 'd F Y', $item->{'publication.start.time'} ); ?></p></div>                            
				<?php if( $display_author ) { ?>
                    <div class="author"><p>by <a href="./blog/author/<?php echo $item->{'author.username'}; ?>"><?php echo $item->{'author.name'}; ?></a></p></div>
                <?php } ?>
                </div>
                
                <div class="entry-meta">
                
					<?php if(!empty( $item->{'tags'} ) ) { ?>
                        <p class="tags"> 
                            <?php foreach ( $item->{'tags'} as $tag ) { ?>
                        		<a class="label label-primary" href="./blog/tag/<?php echo $tag; ?>"><?php echo $tag; ?></a>
                            <?php } ?>
                        </p>
                    <?php } ?>                        
                    
                    <?php if (!empty($item->{'categories'})) { ?>
                    <p class="categories"> 
                        <?php foreach ($item->{'categories'} as $category) { ?>
                        <a class="label label-info" href="./blog/category/<?php echo $category['slug']; ?>"
                            title="View all posts in <?php echo $category['title']; ?>" rel="category tag"><?php echo $category['title']; ?></a>
                        <?php } ?>
                    </p>
                    <?php } ?>
    
                </div>
                        
           	</div>
           	
            <div class="col-md-10">                        
                <div class="copy-wrapper">
                    <?php echo $item->getAbstract(); ?>
                </div>
                
                <a href="<?php echo $item->_url; ?>" class="pull-right btn btn-link">Read More <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>    
        
        <hr />
        
    </article>
    <?php } ?>
    
    <div class="pagination-wrapper">
        <div class="row">
            <div class="col-sm-10">
                <?php if (!empty($this->paginated->total_pages) && $this->paginated->total_pages > 1) { ?>
                    <?php echo $this->paginated->serve(); ?>
                <?php } ?>
            </div>
            <div class="col-sm-2">
                <div class="pagination-count pull-right">
                    <span class="pagination">
                        <?php echo (!empty($this->paginated->total_pages)) ? $this->paginated->getResultsCounter() : null; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>        

<?php } else { ?>
    
        <p>No posts found.</p>
    
<?php } ?>

<script>
jQuery(document).ready(function(){
	jQuery('.copy-wrapper').find('img').each(function(){
		var img = jQuery(this);
		if (!img.hasClass('img-responsive')) {
			img.addClass('img-responsive');
	    }
	});
});
</script>