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
     
    <?php if (metadata('item', 'Collection Name')): ?>
        <div id="collection" class="element">
            <div class="element-text"><p><em>Part of: <?php echo link_to_collection_for_item(); ?></em></p></div>
        </div>
    <?php endif; ?>

    <?php if (metadata('item', 'has tags')): ?>
        <div id="item-tags" class="element">
            <div class="element-text"><?php echo tag_string('item', 'items/browse', ''); ?></div>
        </div>
    <?php endif;?>
       
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
            <div class="element-text"><?php echo files_for_item(['imageSize' => 'fullsize']); ?></div>
        </div>
    <?php endif; ?> 

                            <!-- The following returns all of the files associated with an item. -->
    <?php if (metadata('item', array('Item Type Metadata','Transcription'))): ?>
        <div id="itemTranscript" class="element">
            <input name="show-transcript-checkbox" id="toggle-transcript-checkbox" type="checkbox" class="transcript-toggle" />
            <label for="toggle-transcript-checkbox" ><?php echo __('Show Transcript'); ?></label>
            <div id="show-transcript" class="element-text"><?php echo metadata('item', array('Item Type Metadata','Transcription')); ?></div>
        </div>
    <?php endif; ?> 

    <!-- The following prints a list of all tags associated with the item -->

    <div class="element-texts">
        <?php echo all_element_texts('item'); ?>
    </div>                


    <?php echo get_specific_plugin_hook_output('ItemRelations','public_items_show', array('view' => $this, 'item' => $item)); ?>  
                 
    <div class="outputs">
        <div id="item-citation" class="element">
            <h3><?php echo __('Citation'); ?></h3>
            <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
        </div>
        
        <div id="item-output-formats" class="element">
            <h3><?php echo __('Output Formats'); ?></h3>
            <div class="element-text"><?php echo output_format_list(); ?></div>
        </div>
    </div>
              
	<!-- <?php CommentingPlugin::showComments(); ?> -->

  

<?php 

endif;

echo foot(); ?>
