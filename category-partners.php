
<?php get_header();?>>
<section class="inner-area">
    <div class="container">
        <h2><?php echo single_cat_title( '', true ); ?></h2>        
   
        <div class="row">
            <div class="col-sm-3">
                <div class="sidebar-area">
                    <ul>
                         <?php
wp_reset_query();

$this_cat =  get_cat_ID( 'partners' );
wp_list_categories('child_of=' . $this_cat . '&title_li='); 
?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
           <?php while ( have_posts() ) : the_post();?>
                <div class="partner-con">
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="im-div">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('partners-image'); ?></a>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
