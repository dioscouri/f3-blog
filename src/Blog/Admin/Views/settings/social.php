<h2 class="">Social Mediad Settings</h2>
<hr/>

<h3 class="text-primary">Facebook</h3>
<h4 class="text-danger">Facebook Comments</h4>
<hr/>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label class="control-label">Theme</label>
			
			<select name="social[facebook][comments][theme]" class="form-control">
			<?php 
				$opts = array( 'dark', 'light' );
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.facebook.comments.theme') );
			?>
			</select>
		</div>
		
		<div class="col-md-4">
			<label class="control-label">Number of posts</label>
			<input type="text" name="social[facebook][comments][num_posts]" class="form-control" value="<?php echo $flash->old('social.facebook.comments.num_posts'); ?>" placeholder="Number of posts" >
		</div>
		<div class="col-md-4">
			<label class="control-label">Order By</label>

			<select name="social[facebook][comments][order]" class="form-control">
			<?php 
				$opts = array( 
					array( 'value' => 'social', 'text' => "Social" ),
					array( 'value' => 'time', 'text' => "Time" ),
					array( 'value' => 'reverse_time', 'text' => "Reverse Time" ),
					);
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.facebook.comments.order') );
			?>
			</select>
		</div>
</div>

</div>

<div class="form-group">
	<div class="row">
		
		<div class="col-md-4">
			<label class="control-label">Comments in Mobila Version</label>
			                        
			<select name="social[facebook][comments][mobile]" class="form-control">
			<?php 
				$opts = array( 
					array( 'value' => 'detect', 'text' => "Auto-detect" ),
					array( 'value' => '1', 'text' => "Enabled" ),
					array( 'value' => '0', 'text' => "Disabled" ),
					);
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.facebook.comments.mobile') );
			?>
			</select>
		</div>
		
		<dic class="col-md-8">
			<div class="alert alert-info">
            	<strong>Facebook Ordering</strong>
            	<ul>
            		<li><em>Social</em> - Social plugin uses algorithm to place the most relevant comments at the top</li>
            		<li><em>Time</em> - The oldest comments will be at the top</li>
            		<li><em>Time Reverse</em> - The newest comments will be at the top</li>
            	</ul>
            </div>
		</dic>
	</div>
</div>


<h4 class="text-danger">Facebook Like</h4>
<hr/>
<div class="form-group">
	<div class="row">
		<div class="col-md-3">
			<label class="control-label">Theme</label>
			
			<select name="social[facebook][like][theme]" class="form-control">
			<?php 
				$opts = array( 'dark', 'light' );
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.facebook.like.theme') );
			?>
			</select>
		</div>

		<div class="col-md-3">
			<label class="control-label">Action</label>
			<select name="social[facebook][like][action]" class="form-control">
			<?php 
				$opts = array( 'like', 'recommend' );
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.facebook.like.action') );
			?>
			</select>
		</div>

		<div class="col-md-6">
			<label class="control-label">Layout</label>

			<select name="social[facebook][like][layout]" class="form-control">
			<?php 
				$opts = array( 
					array( 'value' => 'standard', 'text' => "Standard" ),
					array( 'value' => 'button', 'text' => "Button" ),
					array( 'value' => 'button_count', 'text' => "Button with Count" ),
					array( 'value' => 'box_count', 'text' => "Box with Count" ),
					);
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.facebook.like.layout') );
			?>
			</select>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		
		<div class="col-md-4">
			<label class="control-label">Show Profile Photos</label>
			                        
			<select name="social[facebook][like][show_faces]" class="form-control">
			<?php 
				$opts = array( 
					array( 'value' => 'true', 'text' => "Yes" ),
					array( 'value' => 'false', 'text' => "No" ),
					);
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.facebook.like.show_faces') );
			?>
			</select>
		</div>
		
		<div class="col-md-8">
			<label class="control-label">Width of Widget</label>
			                        
			<input type="text" name="social[facebook][like][width]" class="form-control" value="<?php echo $flash->old('social.facebook.like.width'); ?>" placeholder="Width of this widget (Empty means auto)" >
		</div>
	</div>
</div>


<h4 class="text-danger">Facebook Share</h4>
<hr />
<div class="form-group">
	<div class="row">
	                        
		<div class="col-md-6">
			<label class="control-label">Layout</label>
			<select name="social[facebook][share][layout]" class="form-control">
			<?php 
				$opts = array( 
					array( 'value' => 'standard', 'text' => "Standard" ),
					array( 'value' => 'button', 'text' => "Button" ),
					array( 'value' => 'button_count', 'text' => "Button with Count" ),
					array( 'value' => 'box_count', 'text' => "Box with Count" ),
					);
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.facebook.share.layout') );
			?>
			</select>
		</div>
	
		<div class="col-md-6">
			<label class="control-label">Width of Widget</label>
			                        
			<input type="text" name="social[facebook][share][width]" class="form-control" value="<?php echo $flash->old('social.facebook.share.width'); ?>" placeholder="Width of this widget (Empty means auto)" >
		</div>
	</div>
</div>

<h3 class="text-primary">Twitter</h3>
<hr/>

<h4 class="text-danger">Twitter Tweet Button</h4>

<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			<label class="control-label">Twitter Username</label>
			<input type="text" name="social[twitter][tweet][via]" class="form-control" value="<?php echo $flash->old('social.twitter.tweet.via'); ?>" placeholder="Your Twitter Username" >
		</div>
		<div class="col-md-6">
			<label class="control-label">Tweet Text</label>
			<input type="text" name="social[twitter][tweet][tweet]" class="form-control" value="<?php echo $flash->old('social.twitter.tweet.tweet'); ?>" placeholder="Tweet Text" >
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label class="control-label">Text on Tweet Button</label>
			<input type="text" name="social[twitter][tweet][button_text]" class="form-control" value="<?php echo $flash->old('social.twitter.tweet.button_text'); ?>" placeholder="Text on Tweet Button" >
		</div>
		<div class="col-md-4">
			<label class="control-label">Language of widget</label>
			
			<input type="text" name="social[twitter][tweet][lang]" class="form-control" value="<?php echo $flash->old('social.twitter.tweet.lang'); ?>" placeholder="Language of widget" >
		</div>
		<div class="col-md-4">
			<label class="control-label">Position of Tweet Count Box</label>
			                        
			<select name="social[twitter][tweet][count]" class="form-control">
			<?php 
				$opts = array( 'horizontal', 'vertical', 'none' );
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.twitter.tweet.count') );
			?>
			</select>
		</div>
	</div>
</div>

<h3 class="text-primary">Pinterest</h3>
<hr/>

<h4 class="text-danger">Pin it! Button</h4>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			<label class="control-label">Shape of Button</label>
			<select name="social[pinterest][shape]" class="form-control">
			<?php 
				$opts = array( 
					array( 'value' => 'rect', 'text' => "Rectangle" ),
					array( 'value' => 'round', 'text' => "Circle" ),
					);
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.pinterest.shape') );
			?>
			</select>
		</div>
		<div class="col-md-6">
			<label class="control-label">Size of Button</label>
	                        
			<select name="social[pinterest][size]" class="form-control">
			<?php 
				$opts = array( 'small', 'large' );
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.pinterest.size') );
			?>
			</select>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			<label class="control-label">Color of Button</label>
			
			<select name="social[pinterest][color]" class="form-control">
			<?php 
				$opts = array( 'red', 'white', 'gray' );
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.pinterest.color') );
			?>
			</select>
		</div>

		<div class="col-md-6">
			<label class="control-label">Position of Count</label>
			<select name="social[pinterest][position]" class="form-control">
				<option value="beside" <?php if ($flash->old('social.pinterest.position') == 'beside') { echo "selected"; } ?>>Beside the Button</option>
				<option value="above" <?php if ($flash->old('social.pinterest.position') == 'above' ) { echo "selected"; } ?>>Above the Button</option>
				<option value="none" <?php if ($flash->old('social.pinterest.position') == 'none' ) { echo "selected"; } ?>>Hide</option>
			</select>
		</div>
	</div>
</div>

<h3 class="text-primary">Tumblr</h3>
<hr/>

<h4 class="text-danger">Share Link Button</h4>

<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label class="control-label">Type of Button</label>
			<select name="social[tumblr][share][type]" class="form-control">
			<?php 
				$opts = array( 
					array( 'value' => '1', 'text' => "tumblr +" ),
					array( 'value' => '2', 'text' => "tumblr" ),
					array( 'value' => '3', 'text' => "t + text" ),
					array( 'value' => '4', 'text' => "t" ),
					);
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.tumblr.share.type') );
			?>
			</select>
		</div>	
		<div class="col-md-4">
			<label class="control-label">Color of Button</label>
	
			<select name="social[tumblr][share][color]" class="form-control">
			<?php 
				$opts = array( 
					array( 'value' => '', 'text' => "Colorful" ),
					array( 'value' => 'T', 'text' => "Grayscale" ),
					);
				echo \Dsc\Html\Select::options( $opts, $flash->old('social.tumblr.share.color') );
			?>
			</select>
		</div>	
		<div class="col-md-4">
			<label class="control-label">Button Text</label>
			
			<input type="text" name="social[tumblr][share][text]" class="form-control" value="<?php echo $flash->old('social.tumblr.share.text'); ?>" placeholder="Button Text" >
		</div>
	</div>
</div>

<h3 class="text-primary">Disqus</h3>
<hr/>

<h4 class="text-danger">Comments Plugin</h4>

<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label class="control-label">Shortname</label>
			
			<input type="text" name="social[disqus][comments][shortname]" class="form-control" value="<?php echo $flash->old('social.disqus.commnents.shortname'); ?>" placeholder="Your Disqus Shortname" >
		</div>
	</div>
</div>
