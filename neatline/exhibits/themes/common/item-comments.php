<?php // Tag a neatline record with 'custom' to show the body of this file in that record's presenter ?>
<?php if (metadata('item',array('Dublin Core','Description'))): ?>
    <div id="description" class="element">
        <p><?php echo metadata('item',array('Dublin Core','Description')); ?></p>
    </div>
<?php endif; ?>

<?php if (metadata('item', 'has files')): ?>
  <h3><?php echo __('Clip'); ?></h3>
  <?php echo files_for_item(); ?>
<?php endif; ?>

<?php echo get_specific_plugin_hook_output('ItemRelations','public_items_show', array('view' => $this, 'item' => $item)); ?>    
<!-- Link. -->
<div class="more-link">
<?php echo link_to(
  get_current_record('item'), 'show', 'More detail on this clip', ['class' => 'btn btn-warning btn-block']
); ?>

<?php CommentingPlugin::showComments(); ?>
</div>
