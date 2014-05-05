<script src="/ckeditor/ckeditor.js"></script>
<script>
jQuery(document).ready(function(){
    CKEDITOR.replaceAll( 'wysiwyg' );    
});
</script>

<div class="form-group">
	<label>Author Short Bio</label>
	<input type="text" name="blog[bio][short]" class="form-control" value="<?php echo $item->{'blog.bio.short'}; ?>" placeholder="Put your short bio here ..." />
</div>

<div class="form-group">
	<label>Author Full Bio</label>
	<textarea name="blog[bio][full]" class="form-control wysiwyg"><?php echo $item->{'blog.bio.full'}; ?></textarea>
</div>