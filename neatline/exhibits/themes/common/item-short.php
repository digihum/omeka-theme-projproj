<?php if (metadata('item',array('Dublin Core','Description'))): ?>
    <div id="description" class="element">
        <p><?php echo metadata('item',array('Dublin Core','Description')); ?></p>
    </div>
<?php endif; ?>

<?php if (metadata('item', 'has files')): ?>
  <h3><?php echo __('Content'); ?></h3>
  <?php echo files_for_item(); ?>
<?php endif; ?>

<!-- Link. -->
<div class="more-link">
<?php echo link_to(
  get_current_record('item'), 'show', 'Technical Details', ['class' => 'btn btn-warning btn-block']
); ?>
</div>

<script>
Neatline.module('Presenter.StaticBubble', function(StaticBubble) {

	StaticBubble.View.extend({

	   events: {
	      'click .close': 'onCloseMedia'
	    },

	    onCloseMedia: function() {

			$('audio').each(function(){
		        	this.pause(); // Stop playing
			});
			$("#static-bubble iframe").attr("src", $("#static-bubble iframe").attr("src"));	
		});
	});
});
</script>
