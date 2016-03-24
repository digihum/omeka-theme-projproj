<div class="row">
<div class='comment-section col-xs-12'>
    <?php $label = get_option('commenting_comments_label'); ?>
    <?php if ($label == ''):?>
        <h2><?php echo sizeof($comments) . " " . ((sizeof($comments) == 1) ? __('Comment' ): __('Comments' )) ; ?></h2>
    <?php else: ?>
        <h2><?php echo $label; ?></h2>
    <?php endif; ?>
    <div id='comments-flash'><?php echo flash(true); ?></div>
    <?php echo fire_plugin_hook('commenting_prepend_to_comments', array('comments' =>$comments)); ?>

    <ul class="media-list">
        <?php if($threaded) :?>
            <li id="comment-<?php echo $comment->id; ?>" class='media <?php if($comment->flagged):?>comment-flagged<?php endif;?>'>
            <?php echo $this->partial('threaded-comments.php', array('comments' => $comments, 'parent_id'=>null)); ?>
            </li>
        <?php else: ?>
            <?php foreach($comments as $comment): ?>
            <li id="comment-<?php echo $comment->id; ?>" class='media<?php if($comment->flagged):?>comment-flagged<?php endif;?> '>
                <?php echo $this->partial('comment.php', array('comment' => $comment)); ?>
            </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
</div>
