<h3 class="">Post Page Settings</h3>
	<p class="help-block">
		This part sets up general settings for a post page.
	</p>
<hr/>
                    
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Sharing on Social Networks</label>
		<div class="max-height-200 list-group-item">
		    <div class="checkbox">
		        <label>
		            <input type="checkbox" name="post[social_networks][]" class="icheck-input" value="facebook:like" <?php if (in_array('facebook:like', $flash->old('post.social_networks') )) { echo "checked='checked'"; } ?>>
		            Facebook Like Button
		        </label>
		    </div>
		    <div class="checkbox">
		        <label>
		            <input type="checkbox" name="post[social_networks][]" class="icheck-input" value="facebook:share" <?php if (in_array('facebook:share', $flash->old('post.social_networks') )) { echo "checked='checked'"; } ?>>
		            Facebook Share Button
		        </label>
		    </div>
		    <div class="checkbox">
		        <label>
		            <input type="checkbox" name="post[social_networks][]" class="icheck-input" value="pinterest:pinit" <?php if (in_array('pinterest:pinit', $flash->old('post.social_networks') )) { echo "checked='checked'"; } ?>>
		            Pinterest Pin it! Button
		        </label>
		    </div>
		    <div class="checkbox">
		        <label>
		            <input type="checkbox" name="post[social_networks][]" class="icheck-input" value="tumblr:share" <?php if (in_array('tumblr:share', $flash->old('post.social_networks') )) { echo "checked='checked'"; } ?>>
		            Tumblr Button
		        </label>
		    </div>
		    <div class="checkbox">
		        <label>
		            <input type="checkbox" name="post[social_networks][]" class="icheck-input" value="twitter:tweet" <?php if (in_array('twitter:tweet', $flash->old('post.social_networks') )) { echo "checked='checked'"; } ?>>
		            Twitter Tweet Button
		        </label>
		    </div>
		</div>
	</div>
</div>