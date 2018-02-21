<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
        ##queue_css_file('lib/bootstrap.min');
        // queue_css_file('bootstrap-custom');
        // queue_css_file('style');
        queue_css_file('app');
        queue_css_file('header');
        queue_css_file('footer');
        queue_css_file('frontpage-vpb');

        echo head_css();
    ?>

    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('globals');
        echo head_js();
    ?>
  
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php 

echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass));
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '' || $path === '/') {
    include_once('header-homepage.php');
} else {
    include_once('header-subpage.php');
}
