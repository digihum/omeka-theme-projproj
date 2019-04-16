<?php
  $subjectRelations = $objectRelations = $allRelations = false;
  $mode = get_option('item_relations_public_display_mode') ?: 'table';
  if ($mode == "list-by-item-type") {
    $subjectRelations = ItemRelationsPlugin::prepareSubjectRelations($item);
    $objectRelations = ItemRelationsPlugin::prepareObjectRelations($item);
  }
  else {
    $allRelations = ItemRelationsPlugin::prepareAllRelations($item);
  }
  $noRelations = ( !$subjectRelations && !$objectRelations && !$allRelations );
?>
<div id="item-relations-display-item-relations">
    <?php if ($noRelations): ?>
    <?php else:
        echo common('item-relations-show-' . $mode, array(
            'item' => $item,
            'subjectRelations' => $subjectRelations,
            'objectRelations' => $objectRelations,
            'allRelations' => $allRelations,
        ));
    endif; ?>
</div>
