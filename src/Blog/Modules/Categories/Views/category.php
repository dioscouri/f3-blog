<?php 
	$highlight = in_array( (string)$node->element->{'id'}, $selected_categories ) === false ? '' : " highlight";
	$c_n = count( $node->nodes );
	
	if( $c_n == 0 ) { // only leaf ?>
	
		<li><a href="/blog/category<?php echo $node->element->{"path"};?>" class="<?php echo $highlight; ?>"><?php echo $node->element->{'title'};?></a></li>
	
	<?php
	} else { // this is any node (not a leaf) so render it	
//	$parent_panel_id = $node->parent_id == '' ? 'accordion' : 'collapse-'.$node->parent_id ;
	$parent_panel_id = '';
	$act_panel_id = 'collapse-'.(string)($node->element->{'id'});
?>
	<li>
		<div class="panel panel-default" id="<?php echo (string)$node->element->{'id'}?>">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a  data-parent="#<?php echo $parent_panel_id;?>" class="accordion-toggle" data-toggle="collapse" data-target="#<?php echo $act_panel_id;?>">
						<?php echo $node->element->{'title'}; ?>
					</a>
				</h4>
			</div>
			<div id="<?php echo $act_panel_id; ?>" class="panel-collapse collapse">
				<div class="panel-body">
					<ul>
<?php 
	$keys = array_keys( $node->nodes );
	for( $i = 0; $i < $c_n; $i++ ){
		\Dsc\Request::internal( '\Blog\Modules\Categories\Module->displayCategoryNode', array( $node->nodes[$keys[$i]], $selected_categories ) );
	}
?>
					</ul>
				</div>
			</div>
		</div>
	</li>
<?php } ?>