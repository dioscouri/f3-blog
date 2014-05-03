<?php if (!empty($tags)) { ?>
<div class="widget widget-tags">
    <h4 class="widget-title">Tags</h4>
	<div class="widget-content">
	
		<p class='tag-cloud'>
            <?php foreach( $tags as $tag ) { ?>
				<a class="btn btn-default tag" href="./blog/tag/<?php echo $tag; ?>"><?php echo $tag;?></a>
            <?php } ?>
		</p>
		
	</div>
</div>
<?php } ?>