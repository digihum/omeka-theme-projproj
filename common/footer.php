      </div>
    </main>
    <footer role="contentinfo" class="container footer ">
        
    <div class="col-sm-2">
        <nav>
            <h4>
                About
            </h4>
            <ul>
                <li><a href="/about">About the Project</a></li>
                <li><a href="/advisory-board">Advisory Board</a></li>
                <li><a href="/project-team">Project Team</a></li>
                <li><a href="/project-partners">Project Partners</a></li>
            </ul>   
        </nav>
    </div>
    <div class="col-sm-2">
        <nav>
            <h4>
                The Collections
            </h4>
            <ul>
                <li><a href="/exhibits">Browse Themes</a></li>
                <li><a href="/neatline/fullscreen/projection-box">Virtual Projection Box</a></li>
                <li><a href="http://theprojectionists.co.uk">The Projectionists Gallery</a></li>
                <!--<li><a href="#">Site Statistics</a></li>-->
            </ul>   
        </nav>
    </div>
    <div class="col-sm-2">
        <nav>
            <h4>
                Current Activity
            </h4>
            <ul>
                <li><a href="/news_and_events">News & Events</a></li>
                <li><a href="/contact-us">Contact University</a></li>
                <!--<li><a href="">In the Media</a></li>-->
                <li><a href="https://twitter.com/ProjProject">Twitter</a></li>
            </ul>   
        </nav>
    </div>
    <div class="col-sm-4 partners">
        <h4>Partners</h4>
        <div class="row">
        <a href="http://flatpackfestival.org.uk" target="_blank" class="partner col-xs-4"><img src="/themes/projproj/images/partners/flatpack_square.png" /></a>
        <a href="http://www.ahrc.ac.uk" target="_blank" class="partner col-xs-4"><img src="/themes/projproj/images/partners/ahrc_square.png" /></a>
        <a href="http://bfi.org.uk" target="_blank" class="partner col-xs-4"><img src="/themes/projproj/images/partners/bfi_square.png" /></a>
    </div>
    </div>
    <div class="col-sm-2 ">
        <svg viewBox="0 0 17.9 8.8249998" id="warwick_w">
        <g
     transform="translate(0,-288.175)"
     id="layer1">
    <g
       style="fill:#ffffff"
       transform="matrix(0.35277777,0,0,-0.35277777,0,288.17491)"
       id="g4742">
      <path
         id="path4744"
         style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"
         d="M 0,0 14.221,-25.016 25.379,-5.287 36.593,-25.016 50.741,0 Z" />
    </g>
  </g>
</svg>
    </div>
    <div class="col-sm-12">




        <div>
            <p id="statement">
                <?php echo __('Copyright &copy; ') . date('Y') . ' ' . link_to_home_page() . ', University of Warwick, All Rights Reserved. | <a href="/terms">Terms</a> | <a href="cookies">Cookies</a>'; ?> | <?php echo __('Powered by <a href="http://omeka.org">Omeka</a>.'); ?>

            </p>
        </div>
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </div>
    </footer>
    <div class="id7-right-border"></div>
</body>
</html>
