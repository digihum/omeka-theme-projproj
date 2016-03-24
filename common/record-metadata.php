<!-- record metadata template -->
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div>
    <?php if ($showElementSetHeadings): ?>
    <?php echo html_escape(__($setName)); ?></h4></div>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="row">
        <div class="col-xs-12 col-sm-4"><h4><?php echo html_escape(__($elementName)); ?></h4></div>
        <div class="col-xs-12 col-sm-8">
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
        </div>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach; ?>
