        <!---------- Banner Open ---------->
        <?php
        global $post; 
        $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),"full" );
        ?>
        <section>
            <div class="banner-inner" style="background-image:url(<?php echo $url[0]; ?>);">
                <h2><?php the_title(); ?></h2>
            </div>
        </section>
        <!---------- Banner Close ---------->