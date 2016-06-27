<?php
  /*
 * Template Name: Pricing Page 
 */
?>
<?php get_header(); ?>
<?php
 global $more;   
?>
<!----- Body Open  ------->
<section class="inner-area">
    <div class="container">
        <h2><?php the_post(); the_title(); ?></h2>
        <div class="row">
            <div class="col-sm-8">
                <?php the_content(); ?>
            </div>
            <div class="col-sm-4">
                <div class="sidebar-area">
                <?php query_posts("post_type=rates&showposts=-1&post_status=publish");?>
                <?php while(have_posts()):the_post(); ?>
                    <div class="side-table">
                        <h3><?php echo get_the_title(get_the_ID()); ?></h3>
                        <ul>
                        <?php $entries = get_post_meta( get_the_ID(),  '_university_rate_group_price', true );?>
                        
                        <?php foreach ($entries as $key => $entry ) {  ?>
                            <li><?php echo $entry['title']; ?><span><?php echo $entry['price']; ?></span></li>
                            <?php }?>
                        </ul>
                    </div>
                     <?php endwhile; wp_reset_query() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!----- Body Close  ------->
<?php get_footer();?>