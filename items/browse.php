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
 Filter by Decade:
<div class="item hentry" >
<div id="filter-array-decades" class="filter-array">

   <span class="filter-active" data-tag-decades="all">All</span>
   <?php 
       $allTags = array_map(function($tag) { return $tag['name']; }, get_records('Tag', [], 0));
       $dateTags = preg_grep("/^[0-9]{4}s$/", $allTags);
       sort($dateTags);
       foreach ($dateTags as $dateTag) {
           echo "<span class='filter' data-tag-decades='" . $dateTag . "' >" . $dateTag . "</span>";
       }
   ?>
</div>
<hr/>
Filter by Collection:
<div id="filter-array-collections" class="filter-array">
   <span class="filter-active" data-tag-collections="all">All</span>
   <?php 
$collections = get_records('Collection',[], 1000);
set_loop_records('collections', $collections);
foreach (loop('collections') as $collection)
{
    $collection_name = metadata($collection, array('Dublin Core', 'Title'));
    echo "<span class='filter' data-tag-collections='" . $collection[id] . "' >" . $collection_name . "</span>";   
}
?>

</div>
<hr/>
    <div class"row" id="nothing-to-see" style="visibility: hidden;">There are no items that match your filters.</div>
     <div class="row masonry-layout">
    <?php foreach (loop('items') as $item): ?>
        <?php $tags = array_map(function($tag) { return '"' . $tag['name'] . '"'; }, $item->Tags);?>
       <div class="masonry-item" data-decades='[<?php echo implode(', ', $tags); ?>]' data-collections='["<?php echo $item[collection_id]; ?>"]' style="min-height:200px">

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
var current_decade_filter = "all";
var current_collection_filter = "all";

var shuffleInstance = new Shuffle(element, {
  itemSelector: '.masonry-item',
 supported: false
});

document.querySelectorAll('.filter, .filter-active').forEach((f) => { 
  f.addEventListener('click', (e) => {  
    if(f.attributes.getNamedItem("data-tag-decades") != null) 
    {
        current_decade_filter = f.attributes.getNamedItem("data-tag-decades").value;
        var active_filters = document.getElementById("filter-array-decades").getElementsByClassName('filter-active');
        for(var i = 0; i < active_filters.length; i++) {active_filters.item(i).className = "filter";}
        f.className = "filter-active";
    }
    else 
    {
        current_collection_filter = f.attributes.getNamedItem("data-tag-collections").value;
        var active_filters = document.getElementById("filter-array-collections").getElementsByClassName('filter-active');
        for(var i = 0; i < active_filters.length; i++) {active_filters.item(i).className = "filter";}
        f.className = "filter-active";
    }
    shuffleInstance.filter([current_decade_filter,current_collection_filter]); 


    if(document.getElementsByClassName('shuffle-item--visible').length == 0) 
    {
        document.getElementById('nothing-to-see').style.visibility = "visible";
    }
    else 
    {
        document.getElementById('nothing-to-see').style.visibility = "hidden";
    }
  });
});
</script>
<?php echo foot(); ?>
