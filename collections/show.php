<?php

    #This version has been adapted to show differently when browsing the audio archives (collection 3)  
    
    $collectionId = $this->collection->id;
    
    if ($collectionId==3) : 
        
        queue_js_file('lib/shuffle');
        queue_js_file('items-browse');
        $pageTitle = __('Archive'); 
        
     endif;
?>
<?php
echo head(array('title' => $pageTitle, 'bodyid'=>'items','bodyclass' => 'items browse'));
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));

?>

<div class="row">
   <div class="page-header">
   <nav class="col-md-6">
        <div class="items-nav navigation" id="secondary-nav">
        
            <ul class="nav nav-pills">
    <li>
        <a href="/collections/browse">Browse All Collections</a>
    </li>
    <li>
        <a href="/items/search?collection=<?php echo $collectionId ?>">Search Items in this collection</a>
    </li>
</ul>	    
<hr/>
<?php if ($collectionId==3) : ?>

	    </div>
	</nav>
    <div class="col-xs-12">
        
    <h1><?php echo $collectionTitle; ?></h1>
    <p class="lead"><?php echo metadata('collection', array('Dublin Core', 'Description')) ?></p>

    </div>
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

<?php else: ?>

<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>
    <h1><?php echo $collectionTitle; ?></h1>
    <p class="lead"><?php echo metadata('collection', array('Dublin Core', 'Description')) ?></p>

    <div id="collection-items">

    <?php 
    if (metadata('collection',array('Dublin Core','Title'))=="News and Events") : # only show twitter feed on news page?> 
        <div class="col-xs-12 col-md-8">
    <?php 
    # Sort by Added column descending
    public_array_sort_by_column($items, 'added',SORT_DESC);
    endif; ?>

                <?php if (metadata('collection', 'total_items') > 0): ?>
                    <?php foreach (loop('items', $items) as $item): ?>
                        <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
                    
            
                    <div class="row">
                        <div>
                            <h3><?php echo $itemTitle; ?></h3>
                            <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'))): ?>
                                <div class="item-description">
                                    <p><?php echo $text; ?></p>
                                </div>
                            <?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                                <div class="item-description">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                            <?php if (metadata('item', 'has thumbnail')): ?>
                                <div class="col-xs-12 col-md-4">
                                    <?php echo link_to_item(item_image('fullsize', array('alt' => $itemTitle,'class' => 'full-width'))); ?>
                                </div>
                            <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
    <?php endif; ?>
    <?php if (metadata('collection',array('Dublin Core','Title'))=="News and Events") : ?>
        </div>
        <div class="col-xs-12 col-md-4"><a class="twitter-timeline" href="https://twitter.com/ProjProject" data-widget-id="712951474884636672" data-height='1000'>Tweets by @ProjProject</a>
        <script type="text/javascript">// <![CDATA[
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
// ]]></script>

        </div>

        <?php endif; ?>
    </div><!-- end collection-items -->
<?php endif; ?>
<?php echo foot(); ?>
