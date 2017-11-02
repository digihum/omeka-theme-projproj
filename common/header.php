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
        queue_css_file('bootstrap-custom');
        queue_css_file('style');
        queue_css_file('header');
        queue_css_file('footer');
        queue_css_file('frontpage-vpb');

        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    <link rel="stylesheet/less" href="/themes/projproj/css/bootstrap-custom.less" type="text/css" />
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('globals');
        echo head_js();
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.js"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-37692171-26', 'auto');
      ga('send', 'pageview');

    </script>
    <div class="id7-left-border"></div>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header role="banner" class="container">
    <div id="masthead" class="transparent">
          <div class="access-info" style="position: absolute; left: -9999em;">
                <a href="#main-content" accesskey="c" title="Skip to content [c]">Skip to content</a>
                <a href="#navigation" accesskey="n" title="Skip to navigation [n]">Skip to navigation</a>
            </div>
            <div id="warwick-logo-container" class="on-hover">
              <a id="warwick-logo-link" href="http://www2.warwick.ac.uk" title="University of Warwick home page"></a>
            </div>
        <div id="utility-container" class="hidden-xs"> 
            <div id="search-container">
                <form class="navbar-form navbar-right" role="search" action="<?php echo public_url(''); ?>search">
                        <?php echo search_form(array('show_advanced' => false)); ?>
                    </form>
              </div>
            </div>
        </div>
        <div class="row" id="header">
            <div class="col-xs-12 col-sm-8">
                <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
                <h1 class="site-title"><?php echo link_to_home_page(theme_logo()); ?>
                </h1>
            </div>
            <div class="col-xs-12 col-sm-4">
                <nav id="top-nav" class="container-fluid">
                    <div class="row">
                    <ul class="nav navbar-nav navbar-right navbar-primary"><li class="nav col-sm-6 col-xs-6"><a href="about">About the Project</a></li><li class="nav col-sm-6 col-xs-6"><a href="news_and_events">News & Events</a></li></ul>
    </div>
                </nav>
            </div>
        </div>
        <div class="row">
	  
          <nav class="navbar navbar-default" role="navigation">
  
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navigation">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand" href="#">Collections</span>
                </div>

                <div class="collapse navbar-collapse" id="primary-navigation">
                    <?php echo public_nav_main_bootstrap(); ?>

                </div>
           </nav> 
         
    </header>
    <main id="content" role="main">
      <div class="container">
          <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
