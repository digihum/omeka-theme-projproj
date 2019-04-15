<!-- record metadata template -->
<div class="element-set">
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>

    <?php if ($showElementSetHeadings): ?>
    <h2>
        <?php echo html_escape(__($setName)); ?>
    </h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>

        

    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <? echo $elementName ?> 
        <? if ($elementName="Embed Code"): ?>
            <?php foreach ($elementInfo['texts'] as $text): ?>
                Embed Code: <div class="element-text"><?php echo $text; ?></div>
            <?php endforeach; ?>
        <? else:   ?>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
        <? endif; ?>
        
        </div><!-- end element -->
    <?php endforeach; ?>

<?php endforeach; ?>
</div>
