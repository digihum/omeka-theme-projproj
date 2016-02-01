<?php
    queue_css_file('tags');
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>
<div class="row">
    <div class="col-xs-12">
    <h1><?php echo $pageTitle; ?></h1>
    </div>
    <div class="col-md-6">
    <?php $subnav = public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
    </div>
</div>
<hr/>
<div class="row">
	<div class="col-xs-12">
		<p><span class="popular key"><span>standard</span></span><span class="v-popular key"><span>popular</span></span><span class="vv-popular key"><span>very popular</span></span></p>
	</div>
	<div class="col-xs-12">
	    <?php echo tag_cloud($tags, 'items/browse', 3,true,after); ?>
	</div>
</div>
<?php echo foot(); ?>
