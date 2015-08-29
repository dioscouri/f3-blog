<div class="widget widget-category">
	<div class="widget-title">
		<h2>Categories</h2>
	</div>
	<div class="widget-content">
		<div class="accordion">
			<div class="panel-group">
				<div class="panel-body">
					<ul>
			<?php
			
			$tree = \Blog\Modules\Categories\Module::generateTree( $categories );
			$c = count( $categories );
			
			if( $c == 0 ){ ?>
				<li>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="#">
									No Categories
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
							</div>
						</div>
					</div>
				</li>

			<?php			
			} else {
				$selected_categories = \DscArrayHelper::getColumn( $selected_categories, 'id' );
				
				$keys = array_keys( $tree->nodes );
				$c_n = count( $tree->nodes );
				for( $i = 0; $i < $c_n; $i++ ){
					\Dsc\Request::internal( '\Blog\Modules\Categories\Module->displayCategoryNode', array( $tree->nodes[$keys[$i]], $selected_categories ) );
				}
			}
				?>
				
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>