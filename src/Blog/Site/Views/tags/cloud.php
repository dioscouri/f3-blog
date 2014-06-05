<?php if ($tags = \Blog\Models\Posts::distinctTags()) { ?>
<div class="widget widget-tags">
    <h4 class="widget-title">Tags</h4>
	<div class="widget-content">
	
		<ul class='tag-cloud'>
            <?php foreach( $tags as $tag ) { ?>
                <li class="tag">
				    <a class="btn btn-default" href="./blog/tag/<?php echo $tag; ?>"><?php echo $tag;?></a>
				</li>
            <?php } ?>
		</ul>
		
	</div>
</div>
<?php } ?>