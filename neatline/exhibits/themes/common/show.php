<?php echo head(array(
  'title' => nl_getExhibitField('title'),
  'bodyclass' => 'neatline show'
)); ?>

<!-- Exhibit title: -->
<h1><?php echo nl_getExhibitField('title'); ?></h1>

<!-- "View Fullscreen" link: -->
<div class="pull-right">
<?php echo nl_getExhibitLink(
  null, 'fullscreen', __('<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>'), array('class' => 'nl-fullscreen ', 'aria-label' => 'Full Screen')
); ?>
</div>
<!-- Exhibit and description : -->

<div style="position:relative">
<?php echo nl_getNarrativeMarkup(); ?>
</div>
<?php echo nl_getExhibitMarkup(); ?>


<?php echo foot(); ?>