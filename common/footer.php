      </div>
    </main>
    <footer role="contentinfo" class="container">
        <hr>
        <div>
            <p class="text-center">
                <?php echo __('Copyright &copy; ') . date('Y') . ' ' . link_to_home_page() . ', University of Warwick, All Rights Reserved. | <a href="/terms">Terms</a> | <a href="cookies">Cookies</a>'; ?><br>
                <?php echo __('Powered by <a href="http://omeka.org">Omeka</a>.'); ?>
            </p>
        </div>
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
</body>
</html>
