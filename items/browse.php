<?php
queue_js_file('lib/shuffle');
queue_js_file('js_utilities');
queue_js_file('lozad');
$pageTitle = __('Archive'); 
echo head(array('title' => $pageTitle, 'bodyid'=>'items','bodyclass' => 'items browse'));

?>
<script type="text/javascript">
    debugger;
    if(detectIE())
    {   
       document.write('<script type="text/javascript" src="/themes/projproj/javascripts/polyfill.min.js"><\/script>');
    }
</script>

<!-- item/browse.php -->
<div class="row">
   <div class="page-header">
    <div class="col-xs-12">
	    <h1><?php echo $pageTitle." ";?>(<span id="total_items"></span>)
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
 Filter by Collection:
<div id="filter-array-collections" class="filter-array">
   <span id="col_span_all" class="filter-active" data-tag-collections="all">All</span>
   <?php 
$collections = get_records('Collection',[], 1000);
set_loop_records('collections', $collections);
foreach (loop('collections') as $collection)
{
    $collection_name = metadata($collection, array('Dublin Core', 'Title'));
    echo "<span id='col_span_" .$collection["id"]."' class='filter' data-tag-collections='" . $collection["id"] . "' >" . $collection_name . "</span>";   
}
?>
</div>
<hr/>
Filter by Decade:
<div class="item hentry" >
<div id="filter-array-decades" class="filter-array">

   <span id="decade_span_all" class="filter-active" data-tag-decades="all">All</span>
   <?php 
       $allTags = array_map(function($tag) { return $tag['name']; }, get_records('Tag', [], 0));
       $dateTags = preg_grep("/^[0-9]{4}s$/", $allTags);
       array_push($dateTags, "1910s and 1920s");
       sort($dateTags);
       foreach ($dateTags as $dateTag) {
           echo "<span id='decade_span_".$dateTag."' class='filter' data-tag-decades='" . $dateTag . "' >" . $dateTag . "</span>";
       }
   ?>

</div>
<hr/>
    <div class="row" id="nothing-to-see" style="visibility: hidden;">There are no items that match your filters.</div>
     <div class="row masonry-layout">
    <?php foreach (loop('items') as $item): 
        if(!($item["collection_id"])) continue;
        ?>
        <?php $tags = array_map(function($tag) { return '"' . $tag['name'] . '"'; }, $item->Tags);?>
       <div class="masonry-item" data-decades='[<?php echo implode(', ', $tags); ?>]' data-collections='["<?php echo $item["collection_id"]; ?>"]' style="min-height:200px">

        <?php if (metadata('item', 'has thumbnail')): ?>
        <div class="item-img">
        <?php 
            $files = $item->Files;
            echo "<a href='/items/show/".$item["id"]."'>";
            echo "<img src='/themes/projproj/images/holder.png' class='lozad'  width='200px' alt='".metadata($files[0], 'display_title')."' ";
            echo "title='".metadata($files[0], 'display_title')."' data-src='". metadata($files[0], 'square_thumbnail_uri')."'>"; 
            echo "</a>" ;
            echo "<noscript>" . link_to_item(item_image('square_thumbnail')) . "</noscript>";
          ?>
        </div>
        <br />
        <?php else: ?>
            <div class="item-img">
            <?php 
                echo "<a href='/items/show/".$item["id"]."'>";
                echo "<img src='/themes/projproj/images/holder.png' class='lozad'  width='200px' alt='".metadata($files[0], 'display_title')."' ";
                echo "title='".metadata($files[0], 'display_title')."' data-src='/themes/projproj/images/reel.svg' width='200px'>"; 
                echo "</a>" ; 
                echo "<noscript>" . link_to_item("<img src='/themes/projproj/images/reel.svg' width='200px' />") . "</noscript>";
            ?>
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
var visible_items = 0;
var visible_items_text = "";
var shuffleInstance = new Shuffle(element, {
  itemSelector: '.masonry-item',
 supported: false
});

var current_decade_filter = "all";
if(getCookie("decade_filter")) {current_decade_filter = getCookie("decade_filter");}

var current_collection_filter = "all";
if(getCookie("collection_filter")) {current_collection_filter = getCookie("collection_filter");}

if (current_decade_filter != "all" || current_collection_filter != "all") {shuffle(current_decade_filter,current_collection_filter);}
else {document.getElementById("total_items").innerHTML = document.getElementsByClassName('shuffle-item--visible').length + " total";}

//Add event listeners to filter buttons.
var elements = document.querySelectorAll('.filter, .filter-active')
elements = [].slice.call(elements);
elements.forEach(function(element) {
    element.addEventListener('click', function(){ 
    //debugger;
    if(element.attributes.getNamedItem("data-tag-decades") != null) 
        {current_decade_filter = element.attributes.getNamedItem("data-tag-decades").value;}
    else
    {current_collection_filter = element.attributes.getNamedItem("data-tag-collections").value;}
    //Store current filter selections then shuffle.
    setCookie('decade_filter', current_decade_filter, 4);
    setCookie('collection_filter', current_collection_filter, 4);
    shuffle(current_decade_filter,current_collection_filter);
    });
});

//Function to shuffle filtered items and set UI text.
function shuffle (current_decade_filter, current_collection_filter)
{
    //Activate the actual shuffleJS shuffle.
    shuffleInstance.filter([current_decade_filter,current_collection_filter]); 
    //Display number of items visible at the top of the page.
    visible_items = document.getElementsByClassName('shuffle-item--visible').length
    if(current_decade_filter == "all" && current_collection_filter == "all") {visible_items_text = " total";}
    else {visible_items_text = " filtered";}
    document.getElementById("total_items").innerHTML = visible_items + visible_items_text;

    //Display "no items" message if applicable.
    if(document.getElementsByClassName('shuffle-item--visible').length == 0) 
        {document.getElementById('nothing-to-see').style.visibility = "visible";}
    else 
        {document.getElementById('nothing-to-see').style.visibility = "hidden";}

    //Highlight the currently selected filter buttons.
    var active_filters = document.getElementById("filter-array-decades").getElementsByClassName('filter-active');
    for(var i = 0; i < active_filters.length; i++) {active_filters.item(i).className = "filter";}
    document.getElementById("decade_span_" + current_decade_filter).className = "filter-active";
    var active_filters = document.getElementById("filter-array-collections").getElementsByClassName('filter-active');
    for(var i = 0; i < active_filters.length; i++) {active_filters.item(i).className = "filter";}
    document.getElementById("col_span_" + current_collection_filter).className = "filter-active";
}

const observer = lozad(); // lazy loads elements with default selector as ".lozad"
observer.observe();
</script>
<?php echo foot(); ?>
