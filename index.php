<?php echo head(array('bodyid'=>'home')); ?>

<section id="archives">
    <div class="featured-images">
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/original/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div>
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/original/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div>
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/original/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div>
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/original/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div> 
    </div>
    <div>
        <h2>ARCHIVES</h2>
        <p>A multimedia library of resources documenting the working lives of cinema projectionists in Britain
from the 1890s to 2010s. Browse first hand audio accounts of professional practices and experiences,
videos, photographs, documents, specialist magazine articles, and more</p>
    <a href='#'>Explore our archives >></a>
</div>
</section>

<h1>Hello!</h1>
<?php echo get_theme_option('Homepage About'); ?>
<div class="row">
    <div class="col-sm-4">
        <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
            <h2><?php echo __('Featured Item'); ?></h2>
            <?php echo random_featured_items(1); ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-4">
        <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
            <h2><?php echo __('Featured Collection'); ?></h2>
            <?php echo random_featured_collection(); ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-4">
        <?php if ((get_theme_option('Display Featured Exhibit') !== '0') && plugin_is_active('ExhibitBuilder') && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
            <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
        <?php endif; ?>
    </div>
</div>    
<div class="row">
    <div class="col-sm-12">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php echo recent_items(3); ?>
        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>
    
    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
</div>

<?php echo foot(); ?>
