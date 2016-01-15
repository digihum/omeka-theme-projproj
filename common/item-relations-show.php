<?php $provideRelationComments = get_option('item_relations_provide_relation_comments'); ?>

<p></p>
<div id="item-relations-display-item-relations">
    <h3><?php echo __('Related'); ?></h3>
    <?php if (!$subjectRelations && !$objectRelations): ?><!-- may at some point want to introduce some ordering here -->
    <p><?php echo __('This item has no relations.'); ?></p>
    <?php else: ?>
        <?php if ($subjectRelations): ?>
            <p><?php echo __('Has these parts:'); ?></p>
            <ul>
                <?php foreach ($subjectRelations as $subjectRelation): ?>
                    <li>
                    <a href="<?php echo url('items/show/' . $subjectRelation['object_item_id']); ?>"><?php echo $subjectRelation['object_item_title']; ?></a>
                    <?php if ($provideRelationComments): ?>
                    <?php if (($subjectRelation['relation_comment'])) { echo "(".$subjectRelation['relation_comment'].")"; } ?>
                    <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <ul>
          <?php foreach ($objectRelations as $objectRelation): ?>
            <li>
            Is part of: <a href="<?php echo url('items/show/' . $objectRelation['subject_item_id']); ?>"><?php echo $objectRelation['subject_item_title']; ?></a>
            <?php if ($provideRelationComments): ?>
            <?php if ($objectRelation['relation_comment']) { echo "(".$objectRelation['relation_comment'].")"; } ?>
            <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
