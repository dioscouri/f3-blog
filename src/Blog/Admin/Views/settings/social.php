<h3 class="">Social Mediad Settings</h3>
<p class="help-block">
	This part sets up integration with social medias.
</p>
<hr/>

<h4 class="">Facebook Settings</h4>
<p class="help-block">
	This part contains all settings for a correct integration with Facebook.
</p>
<hr/>
<div class="form-group">
	<label class="control-label col-md-3">Theme</label>
	
	<div class="col-md-7">
		<select name="social[facebook][theme]" class="form-control">
			<option value="dark" <?php if ($flash->old('social.facebook.theme') == 'dark') { echo "selected"; } ?>>Dark</option>
			<option value="light" <?php if ($flash->old('social.facebook.theme') == 'light' ) { echo "selected"; } ?>>Light</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Order By</label>
	                        
	<div class="col-md-7">
		<select name="social[facebook][order]" class="form-control">
			<option value="social" <?php if ($flash->old('social.facebook.order') == 'social') { echo "selected"; } ?>>Social</option>
			<option value="time" <?php if ($flash->old('social.facebook.order') == 'time') { echo "selected"; } ?>>Time</option>
			<option value="reverse_time" <?php if ($flash->old('social.facebook.order') == 'reverse_time' ) { echo "selected"; } ?>>Reverse Time</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Comments in Mobila Version</label>
	                        
	<div class="col-md-7">
		<select name="social[facebook][mobile]" class="form-control">
			<option value="detect" <?php if ($flash->old('social.facebook.mobile') == 'detect') { echo "selected"; } ?>>Auto-detect</option>
			<option value="1" <?php if ($flash->old('social.facebook.mobile') == '1') { echo "selected"; } ?>>Enabled</option>
			<option value="0" <?php if ($flash->old('social.facebook.mobile') == '0' ) { echo "selected"; } ?>>Disabled</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Number of posts</label>
	                        
	<div class="col-md-7">
		<input type="text" name="social[facebook][num_posts]" class="form-control" value="<?php echo $flash->old('social.facebook.num_posts'); ?>" placeholder="Number of posts" >
	</div>
</div>

<h4 class="">Disqus Settings</h4>
<p class="help-block">
	This part contains all settings for a correct integration with Disqus.
</p>

<div class="form-group">
	<label class="control-label col-md-3">Disqus Shortname</label>
	                        
	<div class="col-md-7">
		<input type="text" name="social[disqus][shortname]" class="form-control" value="<?php echo $flash->old('social.disqus.shortname'); ?>" placeholder="Your Disqus shortname" >
	</div>
</div>

<hr/>
<div class="form-group">
	<label class="control-label col-md-3">Disqus Shortname</label>
	                        
	<div class="col-md-7">
		<input type="text" name="social[disqus][shortname]" class="form-control" value="<?php echo $flash->old('social.disqus.shortname'); ?>" placeholder="Your Disqus shortname" >
	</div>
</div>
