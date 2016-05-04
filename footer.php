<!----- Footer Open  ------->
<footer class="foter-m-sec">
    <div class="container">
        <div class="col-sm-12 ">
            <div class="cpysec clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="fotli">
                            <?php
                            wp_nav_menu( array(
                                'container'       => 'ul',
                                'menu_class'      => '',
                                'menu_id'         => '',
                                'depth'           => 0,
                                'theme_location' => 'footer_menu',
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p class="alnr"><?=get_option("ata_footer_text")?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!----- Footer Close  ------->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work proporly -->
<?php echo stripslashes(get_option('university_ga_code')); ?>
</body>
</html>