<script type="text/javascript">
jQuery(function(jQuery) { 
	jQuery("select[data-select]").select2().on('change', function(){
		jQuery(this).closest('form').submit();
	});
});

</script>

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-table fa-fw "></i> Posts <span> > List </span>
        </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks" class="list-actions list-unstyled list-inline">
            <li>
                <a class="btn btn-default" href="./admin/blog/post/create">Add New</a>
            </li>
        </ul>
    </div>
</div>

<form class="searchForm" method="post">

    <div class="no-padding">

        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                
                <ul class="list-filters list-unstyled list-inline">
                    <li class="col-md-3">
						<select name="filter[category][slug]" data-select='1'>
                            <?php 
                            	echo \Dsc\Html\Select::options($categories, $state->get('filter.category.slug'));
                            ?>
						</select>
                    </li>
                    <li class="col-md-3">
						<select name="filter[tags]" data-select='1'>
                            <?php 
                            	echo \Dsc\Html\Select::options($all_tags, $state->get('filter.tags'));
                            ?>
						</select>
                    </li>
                </ul>    
                        
            </div>
            
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="text" name="filter[keyword]" placeholder="Search..." maxlength="200" value="<?php echo $state->get('filter.keyword'); ?>"> <span class="input-group-btn"> <input class="btn btn-primary" type="submit"
                            onclick="this.form.submit();" value="Search"
                        />
                            <button class="btn btn-danger" type="button" onclick="Dsc.resetFormFilters(this.form);">Reset</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <ul class="list-filters list-unstyled list-inline">
                    <li>
                        <select name="list[order]" class="form-control" onchange="this.form.submit();">
                            <option value="title" <?php if ($state->get('list.order') == 'title') { echo "selected='selected'"; } ?>>Title</option>
                        	<option value="publication.start_date" <?php if ($state->get('list.order') == 'publication.start_date') { echo "selected='selected'"; } ?>>Publication Date</option>
                        </select>
                    </li>
                    <li>
                        <select name="list[direction]" class="form-control" onchange="this.form.submit();">
                            <option value="1" <?php if ($state->get('list.direction') == '1') { echo "selected='selected'"; } ?>>ASC</option>
                            <option value="-1" <?php if ($state->get('list.direction') == '-1') { echo "selected='selected'"; } ?>>DESC</option>
                        </select>                        
                    </li>
                </ul>            
            </div>
            
            <div class="col-xs-12 col-sm-6">
                <div class="text-align-right">
                <ul class="list-filters list-unstyled list-inline">
                    <li>
                        <?php if (!empty($paginated->items)) { ?>
                        <?php echo $paginated->getLimitBox( $state->get('list.limit') ); ?>
                        <?php } ?>
                    </li>                
                </ul>    
                </div>
            </div>
        </div>
        
        <div class="widget-body-toolbar">    
    
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <span class="pagination">
                    <div class="input-group">
                        <select id="bulk-actions" name="bulk_action" class="form-control">
                            <option value="null">-Bulk Actions-</option>
                                <option value="delete" data-action="./admin/blog/posts/delete">Delete</option>
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default bulk-actions" type="button" data-target="bulk-actions">Apply</button>
                        </span>
                    </div>
                    </span>
                </div>    
                <div class="col-xs-12 col-sm-6 col-lg-6 col-lg-offset-3">
                    <div class="text-align-right">
                        <?php if (!empty($paginated->total_pages) && $paginated->total_pages > 1) { ?>
                            <?php echo $paginated->serve(); ?>
                        <?php } ?>
                    </div>            
                </div>
            </div>
        
        </div>
        <!-- /.widget-body-toolbar -->        

        <?php if (!empty($paginated->items)) { ?>
        <?php foreach($paginated->items as $item) { ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="checkbox-column col-xs-1 col-sm-1 col-md-1">
							<input type="checkbox" class="icheck-input" name="ids[]" value="<?php echo $item->id; ?>">
                        </div>
                    
                        <div class="col-xs-11 col-sm-11 col-md-11">
                        	<div class="row">
                        		<div class="hidden-xs hidden-sm col-md-3 col-lg-3">
								<?php if( !empty( $item->{'featured_image.slug'} ) ) { ?>
                        			<a href="./admin/blog/post/edit/<?php echo $item->id; ?>" title="<?php echo $item->title; ?>">
                        			<img class="img-responsive" src="./asset/thumb/<?php echo $item->{'featured_image.slug'}; ?>" alt="<?php echo $item->title; ?>" />
                        			</a>
                        		<?php } else { ?>
                        			&nbsp;
                        		<?php } ?>
                        		</div>
                        		
                        		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        			<div class="row">
		                        		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        					<legend><a href="./admin/blog/post/edit/<?php echo $item->id; ?>"><?php echo $item->title; ?></a></legend>
		                        		</div>
                        			</div>
                        			<div class="row">
		                        		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		                        			<div><h5>Basic</h5></div>
		                        			<div>
		                        				<label>/<?php echo $item->slug; ?></label>
		                        			</div>
		                        			<div>
		                        				<label>Author:</label> <a href="./admin/user/edit/<?php echo $item->{'author.id'}?>" title="<?php echo $item->{'author.name'}; ?>"><?php echo $item->{'author.name'}; ?></a>
		                        			</div>
		                        			<div>
			                        			<?php $categories = \Joomla\Utilities\ArrayHelper::getColumn( (array) $item->categories, 'title' ); ?>
		                        				<label>Categories:</label>
												<span class='label label-warning'><?php echo implode("</span> <span class='label label-warning'>", (array) $categories ); ?></span>
		                        			</div>
		                        			<div>
		                        				<label>Tags:</label>
												<span class='label label-success'><?php echo implode("</span> <span class='label label-success'>", (array) $item->tags); ?></span>
		                        			</div>
		                        		</div>
		                        		
		                        		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		                        			<h5>Publication</h5>
				                            <div>
				                            	<label>Status:</label> <?php echo ucwords( $item->{'publication.status'} ); ?>
				                            </div>
				                            <?php if ($item->{'publication.start_date'}) { ?>
				                            <div>
				                            	<label>Up:</label> <?php echo $item->{'publication.start_date'}; ?>
				                            </div>
				                            <?php } ?>
				                            <?php if ($item->{'publication.end_date'}) { ?>
				                            <div>
				                            	<label>Down:</label> <?php echo $item->{'publication.end_date'}; ?>
				                            </div>
				                            <?php } ?>
				                            <div>
				                            	<label>By</label> <a href="./admin/user/edit/<?php echo $item->{'author.id'}; ?>" alt="<?php echo $item->{'author.name'}; ?>" ><?php echo $item->{'author.name'}; ?></a>
				                            </div>
		                        		</div>
		                        		
	                            	</div>
                        		</div>

		                        <div class="hidden-xs hidden-sm col-md-1 col-lg-1">
			                        <a class="btn btn-xs btn-danger" data-bootbox="confirm" href="./admin/blog/post/delete/<?php echo $item->id; ?>">
			                            <i class="fa fa-times"></i>
			                        </a>
		                    	</div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
            
        <?php } else { ?>
           <div class="">No items found.</div>
        <?php } ?>
                
        <div class="dt-row dt-bottom-row">
            <div class="row">
                <div class="col-sm-10">
                    <?php if (!empty($paginated->total_pages) && $paginated->total_pages > 1) { ?>
                        <?php echo $paginated->serve(); ?>
                    <?php } ?>
                </div>
                <div class="col-sm-2">
                    <div class="datatable-results-count pull-right">
                        <span class="pagination">
                            <?php echo (!empty($paginated->total_pages)) ? $paginated->getResultsCounter() : null; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</form>