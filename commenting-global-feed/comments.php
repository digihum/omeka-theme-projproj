<div class="row">
<div class='comment-section col-xs-12'>
        <h3>Recent Comments</h3>
    <ul class="media-list">

            <?php foreach($comments as $comment):
            ?>
            <?php $item = get_record_by_id('item', $comment['record_id']);
?>
            <h4><a href='/items/show/<?php echo $comment['record_id']; ?>'>Posted in <?php echo metadata($item,array('Dublin Core','Title')) ?></a> at <?php echo date("G:i D j M Y ",strtotime($comment['added'])); ?></h4>    

            <li id="comment-<?php echo $comment->id; ?>" class='media<?php if($comment->flagged):?>comment-flagged<?php endif;?> '>
                <?php echo $this->partial('commenting/comment.php', array('comment' => $comment)); ?>
            </li>
            <?php endforeach; ?>

    </ul>
</div>
</div>
