<div class="item record <?php if ($tweet){ echo "col-md-6"; } ?>">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $description = metadata($item, array('Dublin Core', 'Description'));
    $text = metadata($item, array('Item Type Metadata', 'Text'));
    $tweet = metadata($item, array('Item Type Metadata', 'Embed Code'), array('no_escape' => true));
    ?>


    <?php if ($title!="[Untitled]"): ?>
        <h4><?php echo strip_formatting(metadata($item, array('Dublin Core', 'Title'))) ?></h4>
    <?php endif; ?>

    <small>Published <?php echo  metadata($item, array('Dublin Core', 'Date')) ?></small>

    <div class="row">


        <?php if ($text = metadata($item, array('Item Type Metadata', 'Text'))): ?>
            <div class="col-xs-12 col-md-8">
                <div class="item-description">
                    <p><?php echo $text; ?></p>
                </div>
        <?php endif; ?>
        <?php if ($tweet): ?>
            <div class="col-xs-12 col-md-6">
                <p class="item-tweet"><?php echo $tweet; ?></p>
            <?php endif; ?>
            
        </div>
   

  <?php if (metadata($item, 'has files')): ?>
    <div class="col-xs-12 col-md-4">
        <?php
            echo link_to_item(
                item_image('square_thumbnail', array(), 0, $item), 
                array('class' => 'image'), 'show', $item
                ); 
        ?>
    </div>
  <?php endif; ?>

              
    </div>
  
</div>
   <hr>