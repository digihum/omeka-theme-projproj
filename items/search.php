<?php

    $pageTitle = __('Search Items');
    echo head(array('title' => $pageTitle, 'bodyclass' => 'items advanced-search'));
?>

    <h1><?php echo $pageTitle; ?></h1>
    <div class="row">
	    <nav class="col-xs-12">
		    <?php $subnav = public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
	    </nav>
    </div>
    <hr>

    <?php echo $this->partial('items/search-form.php', array('formAttributes' => array('id'=>'advanced-search-form'))); ?>

<?php echo foot(); ?>
