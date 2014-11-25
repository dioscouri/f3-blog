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
			
			$posts = (new \Blog\Modules\Posts)->setParam('limit',5)->getList();?>
		
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

				
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>