<?php
  /*
 * Template Name: Default Blog
 */
?>
<?php get_header();  ?>
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
<section class="container_12">
    <section id="content" class="whitebg">
    <div class="grid_8">
        <h2><?php the_title(); ?></h2>
        <?php query_posts("post_status=publish&paged=".$paged.'&showposts=3');   
        while (have_posts()) : the_post(); ?>
          <div class="articles">
            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
           <?php the_content('Read More'); ?>
           
        </div> 
        
         
        <?php endwhile;
       
       
         ?> 
          <div class="testimonials-pagination">
          
           <?php if(function_exists('wp_pagenavi'))wp_pagenavi();
            wp_reset_query(); 
            ?>
        </div>
        </div> 
        <?php get_sidebar(); ?>             
<div class="clearfix"></div>
    </section>
</section>    

<!---------- Content Close ----------->
<?php get_footer(); ?>