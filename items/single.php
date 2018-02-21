<div class="item record">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
       $tweet = metadata($item, array('Item Type Metadata', 'Embed Code'), array('no_escape' => true));
    ?>
    <?php if ($title!="[Untitled]"): ?>
    <h3><?php echo link_to($item, 'show', strip_formatting($title)); ?></h3>
    <?php endif; ?>
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image('square_thumbnail', array(), 0, $item), 
            array('class' => 'image'), 'show', $item
        );
    }
    ?>
    <?php if ($tweet): ?>
        <p class="item-tweet"><?php echo $tweet; ?></p>
    <?php endif; ?>
    
    <?php if ($description): ?>
        <p class="item-description"><?php echo $description; ?><?php echo link_to($item, 'show', ' More >'); ?></p>
    <?php endif; ?>
</div>
