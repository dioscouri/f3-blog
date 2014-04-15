<div class="well">
<form id="settings-form" role="form" method="post" class="form-horizontal clearfix">

    <div class="clearfix">
        <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
    </div>
    
    <hr/>

    <div class="row">
        <div class="col-md-3 col-sm-4">
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="#tab-general" data-toggle="tab"> General Settings </a>
                </li>
            	<li>
                    <a href="#tab-home" data-toggle="tab"> Home View </a>
                </li>
                <li>
                    <a href="#tab-social" data-toggle="tab"> Social Media </a>
                </li>
                <?php if (!empty($this->event)) { foreach ((array) $this->event->getArgument('tabs') as $key => $title ) { ?>
                <li>
                    <a href="#tab-<?php echo $key; ?>" data-toggle="tab"> <?php echo $title; ?> </a>
                </li>
                <?php } } ?>                
            </ul>
        </div>

        <div class="col-md-9 col-sm-8">

            <div class="tab-content stacked-content">

                <div class="tab-pane fade in active" id="tab-general">
	                <?php echo $this->renderLayout('Blog/Admin/Views::settings/general.php'); ?>
                </div>
            
            	<div class="tab-pane fade in" id="tab-home">
	                <?php echo $this->renderLayout('Blog/Admin/Views::settings/home.php'); ?>
                </div>
                
                <div class="tab-pane fade in" id="tab-social">
	                <?php echo $this->renderLayout('Blog/Admin/Views::settings/social.php'); ?>
                </div>
                
                <?php /* ?>
                <div class="tab-pane fade in" id="tab-general">
                    <h3 class="">General Settings</h3>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec.</p>
                </div>
                */ ?>
                
                <?php if (!empty($this->event)) { foreach ((array) $this->event->getArgument('content') as $key => $content ) { ?>
                <div class="tab-pane fade in" id="tab-<?php echo $key; ?>">
                    <?php echo $content; ?>
                </div>
                <?php } } ?>

            </div>

        </div>
    </div>

</form>
</div>