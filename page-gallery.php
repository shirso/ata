<?php
  /*
 * Template Name: Gallery page
 */
?>
<?php get_header(); ?>
<!---------- Content Open ----------->
<section class="inner-area">
    <div class="container">
        <div class="gallery-area">
            <h2><?php the_title(); ?></h2>
            <ul> 
            <?php $paged=get_query_var('paged'); ?>  
            <?php $no = get_option('university_gallery')?>
            <?php $a=query_posts('post_type=imagegallery&order=asc&showposts='.$no.'&paged='.$paged.'');
            while(have_posts()){ the_post(); ?>
                <li>
                    <a href="#">
                        <?php echo the_post_thumbnail('gallery-image',array('class'=>'img-responsive')); ?>
                        <?php the_title();?>
                    </a>  
                </li> 
            <?php }?>    
               
            </ul>
            <div class="pagination-area">
                 
             
                
                <?php if(function_exists('wp_pagenavi')){wp_pagenavi();} ?>

      
              
            </div>
            
        </div>
    </div>
</section>  
<!---------- Content Close -----------> 
<?php get_footer();