<?php if (!empty($tags)) { ?>
<div class="widget">
	<div class="widget-title">
		<h4>Tag Cloud</h4>
	</div>
	<div class="widget-content">
		<ul class='tag-cloud'>
            <?php foreach( $tags as $tag ) { ?>
				<li><a href="./blog/tag/<?php echo $tag; ?>" class="btn btn-default" rel="tag"><?php echo $tag;?></a></li>
            <?php } ?>
		</ul>
	</div>
</div>
<?php } ?>