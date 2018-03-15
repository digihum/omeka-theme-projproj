<!-- record metadata template -->
<table>
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<tbody>
    <?php if ($showElementSetHeadings): ?>
    <?php echo html_escape(__($setName)); ?></h4></div>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <tr id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="row">
        <td><h4><?php echo html_escape(__($elementName)); ?></h4></td>
        <td>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
        </td>
        
</tr><!-- end element -->
    <?php endforeach; ?>
</tbody>
<?php endforeach; ?>
</table>
