<div class="widget widget-categories">
	<h4 class="widget-title">Categories</h4>
	<div class="widget-content">

		<?php
		$tree = \Blog\Site\Controllers\Post::generateCategoryTree( $categories );
		$c = count( $categories );
	
		$keys = array_keys( $tree->nodes );
		$c_n = count( $tree->nodes );
		for( $i = 0; $i < $c_n; $i++ ){
			\Dsc\Request::internal( '\Blog\Site\Controllers\Post->displayCategoryNode', array( $tree->nodes[$keys[$i]] ) );
		}
		?>

	</div>
</div>