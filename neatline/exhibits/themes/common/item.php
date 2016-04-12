
<?php echo metadata('item',array('Dublin Core','Title')); ?>

<?php echo all_element_texts('item', array('show_element_sets' => array('Item Type Elements'))); ?>
<!-- Files. -->
<?php if (metadata('item', 'has files')): ?>
  <h3><?php echo __('Files'); ?></h3>
  <?php echo files_for_item(); ?>
<?php endif; ?>

<?php echo get_specific_plugin_hook_output('ItemRelations','public_items_show', array('view' => $this, 'item' => $item)); ?>    

<hr />

<!-- Link. -->
<div class="more-link">
<?php echo link_to(
  get_current_record('item'), 'show', 'More detail on this clip', array('class' => 'btn btn-warning btn-block')
); ?>
</div>
