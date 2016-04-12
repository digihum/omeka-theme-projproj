<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>
    <h1><?php echo $collectionTitle; ?></h1>
    <p class="lead"><?php echo metadata('collection', array('Dublin Core', 'Description')) ?></p>

    <div id="collection-items">

                <?php if (metadata('collection', 'total_items') > 0): ?>
            <?php foreach (loop('items') as $item): ?>
                            <hr/>
                <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>

                <h3><?php echo $itemTitle; ?></h3>
    
            <div class="row">
                <div class="col-xs-12 col-md-8">

                <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'))): ?>
                    <div class="item-description">
                        <p><?php echo $text; ?></p>
                    </div>
                <?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                    <div class="item-description">
                        <?php echo $description; ?>
                    </div>
                    <div class="news-footer">
                        <p>Posted on <?= metadata('item', array('Dublin Core', 'Date')) ?>, by <?= metadata('item', array('Dublin Core', 'Publisher')) ?>.</p>
                    </div>
                <?php endif; ?>

                <?php if (metadata('item', 'has thumbnail')): ?>
                    <div class="col-xs-12 col-md-4">
                        <?php echo link_to_item(item_image('fullsize', array('alt' => $itemTitle,'class' => 'full-width'))); ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p><?php echo __("There are currently no items within this collection."); ?></p>
        <?php endif; ?>
    </div><!-- end collection-items -->

<?php echo foot(); ?>
