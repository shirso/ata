<!----- Footer Open  ------->
<footer class="footer-area">
    <div class="container">
        <div class="row">
             <?php 
                                     wp_nav_menu( array(
                                   'container'       => 'ul', 
                                   'menu_class'      => '', 
                                   'menu_id'         => '',
                                   'depth'           => 0,
                                   'theme_location' => 'footer_menu'
                                   )); 
              ?>
            <p><?php echo get_option('university_footer_text');?></p>
        </div>
    </div>
</footer>

<!----- Footer Close  ------->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work proporly -->
<?php echo stripslashes(get_option('university_ga_code')); ?>
</body>
</html>