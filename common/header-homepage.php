<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
<header class="hero">
    <div class="topbar">
        <div class="highlight">
            <div>Warwick</div>     
        </div> 
        <div>
           
        </div>
    </div>
    <div class="main">
        <div class="sidebar">
            <nav class="navbar navbar-default" role="navigation">
                <?php echo public_nav_main(array('role' => 'navigation'))->setMaxDepth(0); ?>  
            </nav> 
        </div>
        <div class="title-area">
            <p class="subtitle">EXPLORE THE HISTORY OF CINEMA PROJECTION IN BRITAIN</p>
            <h1>
                <span>
                    <span>THE CINEMA</span><span class="shadow"></span>
                </span><br>
                <span>
                    <span>PROJECTIONIST</span><span class="shadow"></span>
                </span></h1>
        </div>
    </div>
</header>
<div class="hero-image slide-1"></div>
<div class="hero-image slide-2"></div>
<div class="hero-image slide-3"></div>
<div class="hero-image slide-4"></div>

<main id="content" role="main">
    <div class="hero-image-fadeout"></div>
    <div class="container">
    <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
