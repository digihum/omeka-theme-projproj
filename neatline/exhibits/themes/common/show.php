<?php echo head(array(
  'title' => nl_getExhibitField('title'),
  'bodyclass' => 'neatline show'
)); ?>

<div class="title-row">
<!-- Exhibit title: -->
  <h1><?php echo nl_getExhibitField('title'); ?></h1>

  <!-- "View Fullscreen" link: -->
  <div class="fullscreen-link">
  <?php echo nl_getExhibitLink(
    null, 'fullscreen', __('<span class="fa fa-arrows-alt" aria-hidden="true"></span> Fullscreen'), array('class' => 'nl-fullscreen ', 'aria-label' => 'Close')
  ); ?>
  </div>
<!-- Exhibit and description : -->
</div>

<div style="position:relative">
<?php echo nl_getNarrativeMarkup(); ?>
</div>
<?php echo nl_getExhibitMarkup(); ?>


<?php echo foot(); ?>
