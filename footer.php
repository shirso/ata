<footer class="foter-m-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-push-6">
                <?php if ( ! dynamic_sidebar( 'footer_sidebar1' )) :
                endif; ?>
            </div>
            <div class="col-sm-6 col-sm-pull-6">
                <?php if ( ! dynamic_sidebar( 'footer_sidebar2' )) :
                endif; ?>
                <?php if ( ! dynamic_sidebar( 'footer_sidebar3' )) :
                endif; ?>
            </div>
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
    </div>
</footer>
<section class="totop-btn"><i class="fa fa-angle-up" aria-hidden="true"></i></section>
<?php wp_footer(); ?>
<?php echo stripslashes(get_option('ata_ga_code')); ?>
</body>
</html>