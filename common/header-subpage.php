<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-37692171-26', 'auto');
      ga('send', 'pageview');

</script>
<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
<header role="banner" class="container">
<div id="masthead" class="transparent">
      <div class="access-info" style="position: absolute; left: -9999em;">
            <a href="#main-content" accesskey="c" title="Skip to content [c]">Skip to content</a>
            <a href="#navigation" accesskey="n" title="Skip to navigation [n]">Skip to navigation</a>
        </div>
        <div id="warwick-logo-container" class="on-hover">
          <a id="warwick-logo-link" href="http://www2.warwick.ac.uk" title="University of Warwick home page"></a>
              <div id="warwick-site-links" style="display: inline-block; opacity: 0;">
                <ul>
                  <li><a href="http://www2.warwick.ac.uk/study">Study</a></li>
                  <li class="spacer">|</li>
                  <li><a href="http://www2.warwick.ac.uk/research">Research</a></li>
                  <li class="spacer">|</li>
                  <li><a href="http://www2.warwick.ac.uk/business">Business</a></li>
                  <li class="spacer">|</li>
                  <li><a href="http://www2.warwick.ac.uk/alumni">Alumni</a></li>
                  <li class="spacer">|</li>
                  <li><a href="http://www2.warwick.ac.uk/newsandevents">News</a></li>
                  <li class="spacer">|</li>
                  <li><a href="http://www2.warwick.ac.uk/about">About</a></li>
                </ul>
              </div>
            
        </div>
    <div id="utility-container"> 
        <div id="search-container">
            <form action="//search.warwick.ac.uk/website"><input type="hidden" name="urlPrefix" value="http://www2.warwick.ac.uk/fac/arts/film/research/current/theprojectionproject/">
                <input autocomplete="off" id="search-box" class="large" placeholder="Search Projection Project" name="q"><input alt="Search" id="search-button" type="image" src="/themes/projproj/images/search-images.png" title="Click here to search">
            </form>
          </div>
        </div>
    </div>
    <div class="row" id="header">
        <div class="col-xs-12">
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            <h1 class="site-title"><?php echo link_to_home_page(theme_logo()); ?></h1>
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
            </div>

            <div class="collapse navbar-collapse" id="primary-navigation">
                

            </div>
        </nav> 
      
</header>
<main id="content" role="main">
  <div class="container">
      <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
