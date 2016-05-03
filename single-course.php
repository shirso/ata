<?php get_header(); ?>
 <!---------- Slider Open ----------->
<section class="wrapper">
    <div class="bannerinner">
        <div class="container_12">
            <!-------- Welcome Text Open -------->
            <div class="wrapper">
            <?php 
                $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'inner-banner');
            ?> 
                <div class="banner-inner" style="background-image:url('<?php echo $url[0];  ?>') ">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
            <!-------- Welcome Text Close -------->
        </div>
    </div>
</section>
<!---------- Slider Close ----------->
<!---------- Content Open ----------->
<section class="container_8">
    <section id="content" class="whitebg">
      
       <?php
       global $more;    // Declare global $more (before the loop).
       $more = 1; 
       the_post();
       the_content('More',true);
        ?>
    </section>
</section>  

<!---------- Content Close -----------> 
<div class="clearfix"></div>
<?php get_footer();