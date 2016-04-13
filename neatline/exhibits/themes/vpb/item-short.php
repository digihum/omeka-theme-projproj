<p>Hello! lets do something different here try</p>
<?php 
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $params = $request->getParams();


	# $comments = Zend_View_Helper_Abstract::getComments(array('threaded'=> get_option('commenting_threaded'), 'approved'=>true),$item['id'],$item['item_type_id']); 
?>
<?= print_r($params); ?>

<p>no?</p>

<?php CommentingPlugin::showComments(); ?>
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
