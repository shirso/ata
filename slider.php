<!----- Banner Open  ------->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                    <?php query_posts('post_type=slider&order=asc&showposts= -1'); ?>
                    <?php if(have_posts()): ?>
                    <?php while(have_posts()):the_post(); ?>
                        <?php 
                        $slider_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'slider-image'); 
                        $slider_url = $slider_url[0];
                        $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'slider-thumb'); 
                        $thumb_url = $thumb_url[0];
                        ?>
                        <img src="<?php echo $slider_url; ?>" data-thumb="<?php echo $thumb_url; ?>" alt="" /> 
                    <?php endwhile; wp_reset_query();?>
                    <?php else: ?>    
                    <p>No thumbnail here</p>
                    <?php endif; ?>    
                </div>
            </div>
        </div>
    </div>
</section>
<!----- Banner Close  ------->