<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

<h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>
<div class="row">
    <div class="col-sm-8 col-md-9">
        <div id="exhibit-blocks">
        <?php exhibit_builder_render_exhibit_page(); ?>
        </div>
    </div>

    <div class="col-sm-4 col-md-3 sidebar">
        <nav id="exhibit-pages">
            <h4><strong><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></strong></h4>
            <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
        </nav>
    </div>
</div>

<div id="exhibit-page-navigation">
    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
    <div id="exhibit-nav-prev" class="btn btn-primary">
    <?php echo $prevLink; ?>
    </div>
    <?php endif; ?>
    <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
    <div id="exhibit-nav-next" class="btn btn-primary">
    <?php echo $nextLink; ?>
    </div>
    <?php endif; ?>
    <div id="exhibit-nav-up">
    <?php echo exhibit_builder_page_trail(); ?>
    </div>
</div>

<?php echo foot(); ?>
