<?php get_header(); ?>
<!----- Body Open  ------->
 <section class="inner-area">
    <div class="container">
            <div class="main-sec">
                <h2>Please Select A Static Home Page!</h2>
                <p>Please click this <a href="<?php echo admin_url('options-reading.php'); ?>">link</a> and choose static front page.</p>
                <p>If you already imported dummy data, then nav items already imported. You need to check appropiate theme location and save again.Please <a href="<?php echo admin_url('nav-menus.php'); ?>">visit</a></p>
                <p>For logo, favicon and header ph no, google analytic, footer copyright text please visit this <a href="<?php echo admin_url('admin.php?page=theme-options.php'); ?>">link</a>  </p>
            </div>
    </div>
</section>
<!----- Body Close  ------->
<?php get_footer();