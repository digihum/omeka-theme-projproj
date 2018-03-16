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

<?php echo foot(); ?>
