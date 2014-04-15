<div class="widget widget-category">
	<div class="widget-title">
		<h2>Categories</h2>
	</div>
	<div class="widget-content">
		<div class="accordion">
			<div class="panel-group" id="accordion">
				<div class="panel-body">
					<ul>
			<?php
			
			$categories = (new \Blog\Models\Categories)->getItems();
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
				$post_categories = $item->get( "categories" );
				$selected_categories = \Joomla\Utilities\ArrayHelper::getColumn( $post_categories, 'id' );
				
				$prev_level = -1;
				$idx = 0;
				
				$act_level = -1;
				$parents = array( 'accordion' );
				for( ; $idx < $c; $idx++ ) {
					$cats = \Blog\Models\Categories::find( array( "_id" => new \MongoId( (string)$categories[$idx]['id'] ) ));
					$cat = $cats[0];
					$highlight = in_array( (string)$cat->get( 'id' ), $selected_categories ) === false ? '' : " highlight";
					if( $act_level == -1 ){
						$act_level = count( explode( "/", $cat->get("path") ) ) - 1;
					}
					if( $idx != ( $c - 1 ) ) {
						$next = \Blog\Models\Categories::find( array( "_id" => new \MongoId( (string)$categories[$idx + 1]['id']) ));
						$item_next = $next[0];
						$next_level = count( explode( "/", $item_next->{"path"} ) ) - 1;
					} else {
						$next_level = 0;
					}
					
					// OK, we're creating nested accordion
					if( $next_level > $act_level ) {
						$parent = array_pop( $parents );
						$parents []= $parent;
						$parents []= "parent-". ((string)$cat->{"id"});
						$this_id = "collapse-". ((string)$cat->{"id"});
					?>
				<li>
				<div class="panel panel-default">
					<div class="panel-heading<?php echo $highlight; ?>">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo $parent;?>" href="#<?php echo $this_id; ?>">
								<?php echo $cat->{"title"}; ?>
							</a>
						</h4>
					</div>
					<div id="<?php echo $this_id;?>" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								
					<?php
					} else {
						// nope, we're just writing line with category
						?>
						<li><a href="./blog/category<?php echo $cat->{"path"};?>" class="<?php echo $highlight; ?>"><?php echo $cat->{'title'};?></a></li>
				<?php
						if( $next_level < $act_level ) { // right, so this is end of this accordion so close it properly
							$diff = $act_level - $next_level;
							while( $diff > 0 ) {
								array_pop( $parents );
							?>
							</ul>
						</div>
					</div>
				</div>
			</li>
							<?php
								$diff--;
							}
						}
					}
					$act_level = $next_level;
				}
			}
				?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>