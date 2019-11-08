<?php echo head(array('bodyid'=>'home')); ?>

<section id="quote">
    <?php echo get_theme_option('homepage_quote'); ?>

</section>

<section id="archives">
    <?php if (get_theme_option('display_featured_item') !== '0'): ?> 
        <div class="featured-images">
            <?php echo random_featured_items(4); ?>
        </div>
    <?php
    // end display_featured_item
    endif; ?>
    <div class="description">
        <h2>ARCHIVES</h2>
        <?php echo get_theme_option('archive_introduction_text'); ?>
        <a href='/items/browse'>Explore our archives >></a>
    </div>
</section>


<div class="reel-container" style="background-position: -20vw 8em;"></div>

<?php if (get_theme_option('display_featured_exhibit') !== '0'): 

    function get_random_featured_exhibits($num = 5, $hasImage = null) {
        return get_records('Exhibit', array('featured' => 1,
                                        'sort_field' => 'random',
                                        'hasImage' => $hasImage), $num);
    }

    $exhibits = get_random_featured_exhibits(3);
    if(count($exhibits) == 1) {
        $exhibits[1] = $exhibits[0];
    }

    if(count($exhibits) == 2) {
        $exhibits[2] = $exhibits[1];
    }
?>

<section id="tours">
    <div class="description">
        <h2>TOURS</h2>
        <?php echo get_theme_option('archive_introduction_text'); ?>

        <a href='/exhibits/'>Take one of our tours >></a>
    </div>

    <div class="featured-images">
            <div class="top">
            <div>
                <?php echo exhibit_builder_link_to_exhibit($exhibits[0], 
                    record_image($exhibits[0], 'square_thumbnail'),
                    array('class' => 'image')); ?>
            </div> 
            <div>
                <?php echo exhibit_builder_link_to_exhibit($exhibits[1], 
                    record_image($exhibits[1], 'square_thumbnail'),
                    array('class' => 'image')); ?>
            </div> 
        </div>
        <div class="bottom">
            <div>
                <?php echo exhibit_builder_link_to_exhibit($exhibits[2], 
                    record_image($exhibits[2], 'fullsize'),
                    array('class' => 'image')); ?>
            </div> 
        </div>
    </div>
</section>
<?php 
// end of display_featured_exhibits
endif; ?>


<div class="reel-container" style="background-position: 70vw 12em;"></div>

<?php if (get_theme_option('display_vpb') !== '0'): ?> 
<section id="vpb">
    <div class="featured-images">
        <div>
            <img src="https://projectionproject.warwick.ac.uk/themes/projproj/images/vpb_frontpage_sm.png" />
        </div>      
    </div>
    <div class="description">
        <h2>VIRTUAL PROJECTION BOX</h2>
        
        <?php echo get_theme_option('vpb_introduction_text'); ?>

        <a href='/neatline/show/projection-box#records/114'>Explore the projection box >></a>
    </div> 
</section>
<?php 
// end of display_vpb
endif; ?>

<?php echo foot(); ?>
