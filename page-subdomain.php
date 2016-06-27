<?php
/*
 * Template Name: Subdomain Home
 */
?>
<?php get_header('subdomain'); ?>
<!---- Slider ----->
 
<!---- Slider ----->
<!----- Body Close  ------->
<!----------  Banner Open --------->
<section class="banner-area">
     <?php the_post_thumbnail('home-banner',array('class'=>'img-responsive'));?>
    <div class="caption-area">
        <h1><?php echo nl2br(get_post_meta(get_the_ID(),'_university_banner_text',true));?></h1>
    </div>  
</section>
<!----------  Banner Close --------->

<?php the_post(); the_content(); ?>
<?php get_footer(); ?>