<h3 class="">General Settings</h3>
	<p class="help-block">
		This part sets up general settings for this application.
	</p>
<hr/>
                    
<div class="form-group">
	<label class="control-label col-md-3">Comments in Blog Posts</label>
	                        
	<div class="col-md-7">
		<select name="general[comments]" class="form-control">
			<option value="null" <?php if (!$flash->old('general.comments')) { echo "selected"; } ?>>Disabled</option>
			<option value="facebook" <?php if ($flash->old('general.comments') == 'facebook') { echo "selected"; } ?>>Facebook</option>
			<option value="disqus" <?php if ($flash->old('general.comments') == 'disqus' ) { echo "selected"; } ?>>Disqus</option>
		</select>
	</div>
</div>