<h2 class="">Social Mediad Settings</h2>
<p class="help-block">
	This part sets up integration with social medias.
</p>
<hr/>

<h3 class="text-primary">Facebook</h3>
<p class="help-block">
	This part contains all settings for a correct integration with Facebook.
</p>
<hr/>
<h4 class="">Facebook Comments</h4>
<div class="form-group">
	<label class="control-label col-md-3">Theme</label>
	
	<div class="col-md-7">
		<select name="social[facebook][comments][theme]" class="form-control">
			<option value="dark" <?php if ($flash->old('social.facebook.comments.theme') == 'dark') { echo "selected"; } ?>>Dark</option>
			<option value="light" <?php if ($flash->old('social.facebook.comments.theme') == 'light' ) { echo "selected"; } ?>>Light</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Order By</label>
	                        
	<div class="col-md-7">
		<select name="social[facebook][comments][order]" class="form-control">
			<option value="social" <?php if ($flash->old('social.facebook.comments.order') == 'social') { echo "selected"; } ?>>Social</option>
			<option value="time" <?php if ($flash->old('social.facebook.comments.order') == 'time') { echo "selected"; } ?>>Time</option>
			<option value="reverse_time" <?php if ($flash->old('social.facebook.comments.order') == 'reverse_time' ) { echo "selected"; } ?>>Reverse Time</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Comments in Mobila Version</label>
	                        
	<div class="col-md-7">
		<select name="social[facebook][comments][mobile]" class="form-control">
			<option value="detect" <?php if ($flash->old('social.facebook.comments.mobile') == 'detect') { echo "selected"; } ?>>Auto-detect</option>
			<option value="1" <?php if ($flash->old('social.facebook.comments.mobile') == '1') { echo "selected"; } ?>>Enabled</option>
			<option value="0" <?php if ($flash->old('social.facebook.comments.mobile') == '0' ) { echo "selected"; } ?>>Disabled</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Number of posts</label>
	                        
	<div class="col-md-7">
		<input type="text" name="social[facebook][comments][num_posts]" class="form-control" value="<?php echo $flash->old('social.facebook.comments.num_posts'); ?>" placeholder="Number of posts" >
	</div>
</div>
<h4 class="">Facebook Like</h4>
<div class="form-group">
	<label class="control-label col-md-3">Action</label>
	                        
	<div class="col-md-7">
		<select name="social[facebook][like][action]" class="form-control">
			<option value="like" <?php if ($flash->old('social.facebook.like.action') == 'like') { echo "selected"; } ?>>Like</option>
			<option value="recommend" <?php if ($flash->old('social.facebook.like.action') == 'recommend') { echo "selected"; } ?>>Recommended</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Theme</label>
	
	<div class="col-md-7">
		<select name="social[facebook][like][theme]" class="form-control">
			<option value="dark" <?php if ($flash->old('social.facebook.like.theme') == 'dark') { echo "selected"; } ?>>Dark</option>
			<option value="light" <?php if ($flash->old('social.facebook.like.theme') == 'light' ) { echo "selected"; } ?>>Light</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Layout</label>
	                        
	<div class="col-md-7">
		<select name="social[facebook][like][layout]" class="form-control">
			<option value="standard" <?php if ($flash->old('social.facebook.like.layout') == 'standard') { echo "selected"; } ?>>Standard</option>
			<option value="button" <?php if ($flash->old('social.facebook.like.layout') == 'button' ) { echo "selected"; } ?>>Button</option>
			<option value="button_count" <?php if ($flash->old('social.facebook.like.layout') == 'button_count' ) { echo "selected"; } ?>>Button with count</option>
			<option value="box_count" <?php if ($flash->old('social.facebook.like.layout') == 'box_count' ) { echo "selected"; } ?>>Box with count</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Show Profile Photos</label>
	                        
	<div class="col-md-7">
		<select name="social[facebook][like][show_faces]" class="form-control">
			<option value="false" <?php if ($flash->old('social.facebook.like.show_faces') == 'false' ) { echo "selected"; } ?>>No</option>
			<option value="true" <?php if ($flash->old('social.facebook.like.show_faces') == 'true') { echo "selected"; } ?>>Yes</option>
			</select>
		</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3">Width of Widget</label>
	                        
	<div class="col-md-7">
		<input type="text" name="social[facebook][like][width]" class="form-control" value="<?php echo $flash->old('social.facebook.like.width'); ?>" placeholder="Width of this widget" >
	</div>
</div>


<h3 class="text-primary">Disqus</h3>
<p class="help-block">
	This part contains all settings for a correct integration with Disqus.
</p>
<h4>Disqus Comments</h4>
<div class="form-group">
	<label class="control-label col-md-3">Disqus Shortname</label>
	                        
	<div class="col-md-7">
		<input type="text" name="social[disqus][comments][shortname]" class="form-control" value="<?php echo $flash->old('social.disqus.comments.shortname'); ?>" placeholder="Your Disqus shortname" >
	</div>
</div>

<hr/>
