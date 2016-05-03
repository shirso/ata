<?php get_header(); ?>
<!----- Body Open  ------->
 <section class="inner-area">
    <div class="container">
            <div class="main-sec">
                <?php the_post();the_content();?>
            </div>
    </div>
</section>
<!----- Body Close  ------->
<?php get_footer();