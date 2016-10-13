
    <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
    <div class="row">
                <div class="col-sm-12">


            <!-- The following returns all of the files associated with an item. -->
        <?php if (metadata('item', 'has files')): ?>
            <div id="itemfiles" class="pull-right">
                <div class="element-text"><?php echo files_for_item(); ?></div>
            </div>
        <?php endif; ?> 

        <?php if (metadata('item', array('Item Type Metadata', 'Text'))): ?>
            <div id="text" class="element">
                <p><?php echo metadata('item', array('Item Type Metadata', 'Text')); ?></p>
            </div>
        <?php endif; ?>

            <!-- The following prints a list of all tags associated with the item -->
            <?php if (metadata('item', 'has tags')): ?>
            <div id="item-tags" class="element">
                <h3><?php echo __('Tags'); ?></h3>
                <div class="element-text"><?php echo tag_string('item'); ?></div>
            </div>
        <?php endif;?>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
	       <?php CommentingPlugin::showComments(); ?>
           </div>
	   </div>
    </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <ul class="pager">
                <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
                <li class="next"><?php echo link_to_next_item_show(); ?></li>
            </ul>
        </div>
    </div>

    </div>