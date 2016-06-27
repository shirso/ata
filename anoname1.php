<!---------- Content Open ----------->
<section class="container">
    <section id="content" class="whitebg">
        <div class="course-detail-one">
            <div class="flowchart">
               <?php 
                  query_posts("post_type=course&showposts=-1&post_status=publish"); 
                  while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile;
                wp_reset_query();
                 ?>
               <div class="clearfix"></div>
            </div> 
        </div> 
    </section>
</section>
<!---------- Content Close ----------->