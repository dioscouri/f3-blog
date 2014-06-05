<div class="row">
    <div class="col-md-2">
    
        <h3>Details</h3>
        <p class="help-block">Required.  Every blog post needs these.</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">

        <div class="form-group">
            <input type="text" name="title" placeholder="Title" value="<?php echo $flash->old('title'); ?>" class="form-control" />
            <?php if ($flash->old('slug')) { ?>
                <p class="help-block">
                <label>Slug:</label>
                <input type="text" name="slug" value="<?php echo $flash->old('slug'); ?>" class="form-control" />
                </p>
            <?php } ?>
        </div>
        <!-- /.form-group -->
        
        <div class="form-group">
            <textarea name="copy" class="form-control wysiwyg"><?php echo $flash->old('copy'); ?></textarea>
        </div>
        <!-- /.form-group -->
    
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />

<div class="row">
    <div class="col-md-2">
    
        <h3>Abstract</h3>
        <p class="help-block">Optional.  This is a short version of the blog post that will be used in a list views.  If not provided, the first paragraph from the full text version of your post will be used.</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">

        <div class="form-group">
            <label>Short Description</label>
            <textarea name="description" class="form-control wysiwyg"><?php echo $flash->old('description'); ?></textarea>
        </div>
        <!-- /.form-group -->
    
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />

<?php echo $this->renderLayout('Blog/Admin/Views::posts/fields_basics_publication.php'); ?>

<hr />

<?php echo $this->renderLayout('Blog/Admin/Views::posts/fields_basics_categories.php'); ?>

<hr />

<?php echo $this->renderLayout('Blog/Admin/Views::posts/fields_basics_tags.php'); ?>

<hr />

<?php echo $this->renderLayout('Blog/Admin/Views::posts/fields_basics_featuredimage.php'); ?>