<?php
queue_js_file('lib/shuffle');
queue_js_file('items-browse');
$pageTitle = __('Archive'); 
echo head(array('title' => $pageTitle, 'bodyid'=>'items','bodyclass' => 'items browse'));

?>

<!-- item/browse.php -->

<div class="row">
   <div class="page-header">
    <div class="col-xs-12">
	    <h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>
    </div>
    <nav class="col-md-6">
        <div class="items-nav navigation" id="secondary-nav">
            <?php $subnav = public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
	    </div>
	</nav>
    <div class="col-md-6">
		<?php echo item_search_filters(); ?>
    	<div id="pagination-top"><?php echo pagination_links(); ?></div>
    </div>
   </div>
 </div><hr/>
    <div class="item hentry" >
<div class="filter-array">
   <span class="filter" data-tag="all">All</span>
   <?php 
       $allTags = array_map(function($tag) { return $tag['name']; }, get_records('Tag', [], 0));
       $dateTags = preg_grep("/^[0-9]{4}s$/", $allTags);
       sort($dateTags);
       foreach ($dateTags as $dateTag) {
           echo "<span class='filter' data-tag='" . $dateTag . "' >" . $dateTag . "</span>";
       }
   ?>
</div>
     <div class="row masonry-layout">
    <?php foreach (loop('items') as $item): ?>
        <?php $tags = array_map(function($tag) { return '"' . $tag['name'] . '"'; }, $item->Tags);?>
       <div class="masonry-item" data-groups='[<?php echo implode(', ', $tags); ?>]' style="min-height:200px">

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
        <div class="sizer-element"></div>
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

<script>
var Shuffle = window.Shuffle;
var element = document.querySelector('.masonry-layout');
var sizer = element.querySelector('.sizer-element');

var shuffleInstance = new Shuffle(element, {
  itemSelector: '.masonry-item',
 supported: false
});

document.querySelectorAll('.filter').forEach((f) => {
  f.addEventListener('click', (e) => {
    shuffleInstance.filter(f.attributes.getNamedItem("data-tag").value);
    // clear active class on all
    document.querySelectorAll('.filter').forEach((g) => {
        g.classList.remove('active');
    });
    // add active class
    e.target.classList.add('active');
    
  });
});


</script>


<?php echo foot(); ?>
