<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-37692171-26', 'auto');
      ga('send', 'pageview');

</script>
<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
<header role="banner" class="subpage-header">
    <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
    <h1 class="site-title"><a href="/">THE CINEMA<br />PROJECTIONIST</a></h1>
    <nav class="navbar navbar-default horizontal" role="navigation">
       
        <span class='link burger'>
            <label for="burger-check" class="burger"><i class="fa fa-bars fa-2x"></i></label>
            <input class="burger-check" id="burger-check" type="checkbox">
            <div class='navigation'>            
                <?php echo public_nav_main(array('role' => 'navigation'))->setMaxDepth(0); ?>              
            </div>
        </span>

    </nav> 
      
</header>
<main id="content" role="main">
  <div class="container">
      <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
