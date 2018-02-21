<?php 
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));


// If there is a file that matches the slug of this page, display that as the template
// Otherwise, use the template below on show.php
$fname = dirname(__FILE__) . '/' . strtolower(metadata('item', 'item_type_name')) . '.php';
if (is_file( $fname )):
    include( $fname );
else :

?>
    <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
    <div class="row">
    <div class="col-sm-8">
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab" data-toggle="tab">Main</a></li>
                <li role="presentation"><a href="#academic" aria-controls="academic" role="tab" data-toggle="tab">Detail</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="main">

                        <?php if (metadata('item',array('Item Type Metadata','Interviewee'))): ?>
                            <div class="element-text">
                                <p><?php echo metadata('item', array('Item Type Metadata','Interviewee')); ?> interviewed by <?php echo metadata('item', array('Item Type Metadata','Interviewer')); ?></p> 
                            </div>
                        <?php endif; ?>

                        <?php if (metadata('item',array('Dublin Core','Description'))): ?>
                            <div id="description" class="element">
                                <p><?php echo metadata('item',array('Dublin Core','Description')); ?></p>
                            </div>
                        <?php endif; ?>


                        <!-- The following returns all of the files associated with an item. -->
                    <?php if (metadata('item', 'has files')): ?>
                        <div id="itemfiles" class="element">
                            <h3><?php echo __('Clip'); ?></h3>
                            <div class="element-text"><?php echo files_for_item(); ?></div>
                        </div>
                    <?php endif; ?> 

                                            <!-- The following returns all of the files associated with an item. -->
                    <?php if (metadata('item', array('Item Type Metadata','Transcription'))): ?>
                        <div id="itemTranscript" class="element">
                            <a class="btn btn-success btn-xs" data-toggle="collapse" data-target="#showTranscript"><?php echo __('Show Transcript'); ?></a>
                            <div id="showTranscript" class="element-text collapse"><?php echo metadata('item', array('Item Type Metadata','Transcription')); ?></div>
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

                <div role="tabpanel" class="tab-pane" id="academic">
                    <?php echo all_element_texts('item'); ?>
                

                    
                    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
                    <?php if (metadata('item', 'Collection Name')): ?>
                        <div id="collection" class="element">
                            <h3><?php echo __('Collection'); ?></h3>
                            <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
                        </div>
                    <?php endif; ?>
                    

                    
                    <!-- The following prints a citation for this item. -->
                    <div id="item-citation" class="element">
                        <h3><?php echo __('Citation'); ?></h3>
                        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
                    </div>
                    
                    <div id="item-output-formats" class="element">
                        <h3><?php echo __('Output Formats'); ?></h3>
                        <div class="element-text"><?php echo output_format_list(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
	<?php CommentingPlugin::showComments(); ?>
	</div>
      </div>
    </div>
    <div class="col-sm-4">

                    <?php echo get_specific_plugin_hook_output('ItemRelations','public_items_show', array('view' => $this, 'item' => $item)); ?>    

    </div>
    <div class="">
        <div class="col-sm-12">
            <ul class="pager">
                <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
                <li class="next"><?php echo link_to_next_item_show(); ?></li>
            </ul>
        </div>
    </div>

    </div>
<?php 

endif;

echo foot(); ?>
