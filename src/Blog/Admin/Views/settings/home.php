<h3 class="">Home View Settings</h3>
<p class="help-block">
	The home view is the 'landing page' for your blog, available at <a href="/blog" target="_blank">/blog</a>.  It will include the latest posts from all your categories.
</p>
<hr/>
                    
<div class="form-group">
	<label class="control-label col-md-3">Include Categories Widget</label>
	                        
	<div class="col-md-7">
		<label class="radio-inline">
			<input type="radio" name="home[include_categories_widget]" value="0" <?php if (!$flash->old('home.include_categories_widget')) { echo "checked"; } ?>> No
		</label>
		<label class="radio-inline">
			<input type="radio" name="home[include_categories_widget]" value="1" <?php if ($flash->old('home.include_categories_widget')) { echo "checked"; } ?>> Yes
		</label>
	</div>
</div>
