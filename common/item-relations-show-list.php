
<?php
  $provideRelationComments = get_option('item_relations_provide_relation_comments');
  $thisItemId = $item->id;
  $lastVocab = -1;
  foreach ($allRelations as $relation) {
    if ($lastVocab != $relation["vocabulary_id"]) {
      if ($lastVocab != -1) { echo "</p>"; }
     echo "<p>";
      $lastVocab = $relation["vocabulary_id"];
    }
    if ($relation['relation_text'] == "Has Part") {
      echo "Is part of ";   
    }
    
    echo ( $relation['subject_item_id']==$thisItemId ? __('This Item')
            : "<a href='".url('items/show/' . $relation['subject_item_id'])."'>".
                $relation['subject_item_title'] . "</a>"
          );
    if (!$relation['relation_text'] == "Has Part") {
      
    echo ( $relation['object_item_id']==$thisItemId ? __('This Item')
    : "<a href='".url('items/show/' . $relation['object_item_id'])."'>".
        $relation['object_item_title'] . "</a>"
  );
          }
    if ( ($provideRelationComments) and ($relation['relation_comment']) ) {
      echo " (".$relation['relation_comment'].")";
    }
  } # foreach


?>
