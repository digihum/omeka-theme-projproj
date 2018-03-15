<?php $pageTitle = __('Browse Items'); echo head(array('title' => $pageTitle, 'bodyid'=>'items','bodyclass' => 'browse')); ?>

<!-- item/browse.php -->

<div class="row">
   <div class="page-header">
    <div class="col-xs-12">
	    <h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>
    </div>
    <nav class="col-md-6">
        <div class="items-nav navigation" id="secondary-nav">
	        <?php echo public_nav_items(); ?>
	    </div>
	</nav>
    <div class="col-md-6">
		<?php echo item_search_filters(); ?>
    	<div id="pagination-top"><?php echo pagination_links(); ?></div>
    </div>
   </div>
 </div><hr/>
    <div class="item hentry" >
     <div class="row">
    <?php foreach (loop('items') as $item): ?>
       <div class="col-xs-12 col-md-6" style="min-height:200px">

        <?php if (metadata('item', 'has thumbnail')): ?>
        <div class="item-img">
            <?php echo link_to_item(item_image('square_thumbnail')); ?>
        </div>
        <br />
        <?php else: ?>
            <div class="item-img">
                <?php echo link_to_item("<img src='/themes/projproj/images/reel.svg' width='200px' />"); ?>
            </div>
            <br />
            
        <?php endif; ?>

        <div class="item-meta">

        <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>

        <?php echo metadata('item', array('Dublin Core', 'Date')); ?>

        <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
        <div class="item-description">
            <?php echo $description; ?>
        </div>
        <?php endif; ?>


        <?php if (metadata('item', 'has tags')): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo tag_string('items'); ?></p>
        </div>
        <?php endif; ?>

        <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

        </div><!-- end class="item-meta" -->
       </div>

    <?php endforeach; ?>
      </div>
    </div><!-- end class="item hentry" -->
    <hr/>
    <div class="col-md-6">
		<div id="outputs">
		    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
		    <?php echo output_format_list(false, ' | '); ?>
		</div>
	</div>
    <div class="col-md-6">
    	<div id="pagination-bottom"><?php echo pagination_links(); ?></div>
	</div>
</div><!-- end primary -->

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
