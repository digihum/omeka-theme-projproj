<?php echo head(array('bodyid'=>'home')); ?>

<section id="archives">
    <div class="featured-images">
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/square_thumbnails/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div>
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/square_thumbnails/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div>
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/square_thumbnails/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div>
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/square_thumbnails/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div> 
    </div>
    <div class="description">
        <h2>ARCHIVES</h2>
        <p>A multimedia library of resources documenting the working lives of cinema projectionists in Britain
        from the 1890s to 2010s. Browse first hand audio accounts of professional practices and experiences,
        videos, photographs, documents, specialist magazine articles, and more</p>
        <a href='/items/'>Explore our archives >></a>
    </div>
</section>

<section id="tours">
    <div class="description">
        <h2>TOURS</h2>
        <p>Agnam, am dus vendi de natia voluptio ipsam
        quae pro ium consedFaccabo. Itatur acitium aut
        autem ad untur, untium voluptat.</p>
        <a href='/exhibits/'>Take one of our tours >></a>
        <img src="/themes/projproj/images/reel.svg" style="position: absolute;
    left: -32em;
    top: 4em;"/>
    </div>
    <div class="featured-images">
            <div class="top">
            <div>
                <img src="https://projectionproject.warwick.ac.uk/files/square_thumbnails/cc7382177759b6b1495dba8865665b0e.jpg" />
            </div> 
            <div>
                <img src="https://projectionproject.warwick.ac.uk/files/square_thumbnails/cc7382177759b6b1495dba8865665b0e.jpg" />
            </div> 
        </div>
        <div class="bottom">
            <div>
                <img src="https://projectionproject.warwick.ac.uk/files/square_thumbnails/cc7382177759b6b1495dba8865665b0e.jpg" />
            </div> 
        </div>
    </div>
</section>

<section id="quote">
    <p>When you were about to throw the film onto the screen when it was 35mm, there
    was always that little heart-missing-a-beat moment. You’d think, ‘Is it all going to come
    together? Is it going to be the right way? Is it going to be in rack? Is the sound going
    to be right?’ And then when it’s correct, then you can relax. It was exciting.
    </p>
</section>

<section id="vpb">
    <div class="featured-images">
        <div>
            <img src="https://projectionproject.warwick.ac.uk/files/square_thumbnails/cc7382177759b6b1495dba8865665b0e.jpg" />
        </div>      
    </div>
    <div class="description">
        <h2>VIRTUAL PROJECTION BOX</h2>
        <p>Over 80 audio clips from projectionists and
        commentary from the research team to be
        uncovered as you explore the interactive
        Virtual Projection Box.</p>
        <a href='/neatline/fullscreen/projection-box#records/114'>Explore the projection box >></a>
    </div>
    <img src="/themes/projproj/images/reel.svg" style="position: absolute;
    right: -32em;
    top: 12em;"/>
    </div>
</section>
<!--
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
-->
<?php echo foot(); ?>
