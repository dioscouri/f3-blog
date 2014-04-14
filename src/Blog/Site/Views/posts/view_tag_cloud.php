<div class="widget">
	<div class="widget-title">
		<h2>Tag Cloud</h2>
	</div>
	<div class="widget-content">
		<ul class='tag-cloud'>
		<?php
			if( count( $tags ) > 0 ){
				foreach( $tags as $tag ) { ?>
				<li><a href="./tag/<?php echo $tag; ?>" class="btn btn-default"><?php echo $tag;?></a></li>
				<?php
				}
			}
			?>
		</ul>
	</div>
</div>
