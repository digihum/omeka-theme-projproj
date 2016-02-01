<?php if ($this->pageCount > 1): ?>
<nav>
<ul class="pagination">
    
    <?php if ($this->first != $this->current): ?>
    <!-- First page link --> 
    <li>
    <a href="<?php echo html_escape($this->url(array('page' => $this->first), null, $_GET)); ?>"><?php echo __('&laquo; First'); ?></a>
    </li>
    <?php endif; ?>
        
    <!-- Numbered page links -->
    <?php foreach ($this->pagesInRange as $page): ?> 
    <?php if ($page != $this->current): ?>
    <li><a href="<?php echo html_escape($this->url(array('page' => $page), null, $_GET)); ?>"><?php echo $page; ?></a></li>
    <?php else: ?>
    <li class="active"><a href="#"><?php echo $page; ?></a></li>
    <?php endif; ?>
    <?php endforeach; ?>
    
    <?php if ($this->last != $this->current): ?>
    <!-- Last page link --> 
    <li>
    <a href="<?php echo html_escape($this->url(array('page' => $this->last), null, $_GET)); ?>"><?php echo __('Last &raquo;'); ?></a>
    </li>
    <?php endif; ?>
</ul>
</nav>
<?php endif; ?>