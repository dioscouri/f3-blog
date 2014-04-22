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
		<input type="text" name="social[facebook][like][width]" class="form-control" value="<?php echo $flash->old('social.facebook.like.width'); ?>" placeholder="Width of this widget (Empty means auto)" >
	</div>
</div>

<h4 class="">Facebook Share</h4>
<div class="form-group">
	<label class="control-label col-md-3">Layout</label>
	                        
	<div class="col-md-7">
		<select name="social[facebook][share][layout]" class="form-control">
			<option value="standard" <?php if ($flash->old('social.facebook.share.layout') == 'standard') { echo "selected"; } ?>>Standard</option>
			<option value="button" <?php if ($flash->old('social.facebook.share.layout') == 'button' ) { echo "selected"; } ?>>Button</option>
			<option value="button_count" <?php if ($flash->old('social.facebook.share.layout') == 'button_count' ) { echo "selected"; } ?>>Button with count</option>
			<option value="box_count" <?php if ($flash->old('social.facebook.share.layout') == 'box_count' ) { echo "selected"; } ?>>Box with count</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3">Width of Widget</label>
	                        
	<div class="col-md-7">
		<input type="text" name="social[facebook][share][width]" class="form-control" value="<?php echo $flash->old('social.facebook.share.width'); ?>" placeholder="Width of this widget (Empty means auto)" >
	</div>
</div>

<h3 class="text-primary">Twitter</h3>
<p class="help-block">
	This part contains all settings for a correct integration with Twitter.
</p>
<hr/>

<h4>Twitter Tweet Button</h4>
<div class="form-group">
	<label class="control-label col-md-3">Text on Tweet Button</label>
	<div class="col-md-7">
		<input type="text" name="social[twitter][tweet][button_text]" class="form-control" value="<?php echo $flash->old('social.twitter.tweet.button_text'); ?>" placeholder="Text on Tweet Button" >
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Twitter Username</label>
	
	<div class="col-md-7">
		<input type="text" name="social[twitter][tweet][via]" class="form-control" value="<?php echo $flash->old('social.twitter.tweet.via'); ?>" placeholder="Your Twitter Username" >
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Tweet Text</label>
	
	<div class="col-md-7">
		<input type="text" name="social[twitter][tweet][tweet]" class="form-control" value="<?php echo $flash->old('social.twitter.tweet.tweet'); ?>" placeholder="Tweet Text" >
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Position of Tweet Count Box</label>
	                        
	<div class="col-md-7">
		<select name="social[twitter][tweet][count]" class="form-control">
			<option value="horizontal" <?php if ($flash->old('social.twitter.tweet.count') == 'horizontal') { echo "selected"; } ?>>Horizontal</option>
			<option value="vertical" <?php if ($flash->old('social.twitter.tweet.count') == 'vertical' ) { echo "selected"; } ?>>Vertical</option>
			<option value="none" <?php if ($flash->old('social.twitter.tweet.count') == 'none' ) { echo "selected"; } ?>>Hide</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Language of widget</label>
	
	<div class="col-md-7">
		<input type="text" name="social[twitter][tweet][lang]" class="form-control" value="<?php echo $flash->old('social.twitter.tweet.lang'); ?>" placeholder="Language of widget" >
	</div>
</div>


<h3 class="text-primary">Pinterest</h3>
<p class="help-block">
	This part contains all settings for a correct integration with Pinterest.
</p>
<hr/>

<h4>Pin it! Button</h4>
<div class="form-group">
	<label class="control-label col-md-3">Shape of Button</label>
	
	<div class="col-md-7">
		<select name="social[pinterest][shape]" class="form-control">
			<option value="rect" <?php if ($flash->old('social.pinterest.shape') == 'rect') { echo "selected"; } ?>>Rectangle</option>
			<option value="round" <?php if ($flash->old('social.pinterest.shape') == 'round' ) { echo "selected"; } ?>>Circle</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Size of Button</label>
	                        
	<div class="col-md-7">
		<select name="social[pinterest][size]" class="form-control">
			<option value="small" <?php if ($flash->old('social.pinterest.size') == 'small') { echo "selected"; } ?>>Small</option>
			<option value="large" <?php if ($flash->old('social.pinterest.size') == 'large' ) { echo "selected"; } ?>>Large</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Position of Count</label>
	<div class="col-md-7">
		<select name="social[pinterest][position]" class="form-control">
			<option value="beside" <?php if ($flash->old('social.pinterest.position') == 'beside') { echo "selected"; } ?>>Beside the Button</option>
			<option value="above" <?php if ($flash->old('social.pinterest.position') == 'above' ) { echo "selected"; } ?>>Above the Button</option>
			<option value="none" <?php if ($flash->old('social.pinterest.position') == 'none' ) { echo "selected"; } ?>>Hide</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3">Color of Button</label>
	
	<div class="col-md-7">
		<select name="social[pinterest][color]" class="form-control">
			<option value="red" <?php if ($flash->old('social.pinterest.color') == 'red') { echo "selected"; } ?>>Red</option>
			<option value="white" <?php if ($flash->old('social.pinterest.color') == 'white' ) { echo "selected"; } ?>>White</option>
			<option value="gray" <?php if ($flash->old('social.pinterest.color') == 'gray' ) { echo "selected"; } ?>>Gray</option>
		</select>
	</div>
</div>


<h3 class="text-primary">Disqus</h3>
<p class="help-block">
	This part contains all settings for a correct integration with Disqus.
</p>
<hr/>

<h4>Disqus Comments</h4>
<div class="form-group">
	<label class="control-label col-md-3">Disqus Shortname</label>
	                        
	<div class="col-md-7">
		<input type="text" name="social[disqus][comments][shortname]" class="form-control" value="<?php echo $flash->old('social.disqus.comments.shortname'); ?>" placeholder="Your Disqus shortname" >
	</div>
</div>