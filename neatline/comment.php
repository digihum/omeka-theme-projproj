    <?php
        if(!empty($comment->author_name)) {
            if(empty($comment->author_url)) {
                $authorText = $comment->author_name;
            } else {
                $authorText = "<a href='{$comment->author_url}' class='media-left'>{$comment->author_name}</a>";
            }
        } else {
            $authorText = __("Anonymous");
        }
    ?>
    <p class='comment-author-name media-left'>
    <?php
        $hash = md5(strtolower(trim($comment->author_email)));
        $url = "//www.gravatar.com/avatar/$hash";
        echo "<img class='media-object img-circle' src='$url' />";
    ?>
    <?php echo $authorText?></p>
  <div class="media-body">
  <div>
    <?php echo $comment->body; ?>
  </div>
<?php if(is_allowed('Commenting_Comment', 'unflag')): ?>
    <div class="comment-buttons-bar">
        <p class='comment-flag btn btn-xs btn-warning' <?php if($comment->flagged): ?> style='display:none;'<?php endif;?> ><em class="glyphicon glyphicon-flag"></em> <?php echo __("Flag inappropriate"); ?></p>
        <p class='comment-unflag btn btn-xs btn-success' <?php if(!$comment->flagged): ?>style='display:none;'<?php endif;?> ><em class="glyphicon glyphicon-flag"></em> <?php echo __("Unflag inappropriate"); ?></p>
        <?php endif; ?>
        <p class='comment-reply btn btn-xs btn-primary'><em class="glyphicon glyphicon-share-alt"></em> <?php echo __("Reply"); ?></p>
    </div>