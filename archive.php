<?php
  /*
 * Template Name: Default Blog
 */
?>
<?php get_header(); ?>
 <!---------- Content Open ----------->
  <section class="inner-area">
    <div class="container">
        <h2>    <?php if ( is_day() ) : /* if the daily archive is loaded */ ?>
      <?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
    <?php elseif ( is_month() ) : /* if the montly archive is loaded */ ?>
      <?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
    <?php elseif ( is_year() ) : /* if the yearly archive is loaded */ ?>
      <?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
    <?php else : /* if anything else is loaded, ex. if the tags or categories template is missing this page will load */ ?>
      Blog Archives
    <?php endif; ?></h2>
        <div class="row">
            <div class="col-sm-9">
                
                <?php  while(have_posts()){ the_post(); ?>
                
                 <div class="blog-con">
                    <div class="row clearfix">
                    <?php if(has_post_thumbnail(get_the_ID())){ ?>
                        <div class="col-sm-3">
                            <div class="im-div">
                                  <?php the_post_thumbnail('blog-image',array('class'=>'img-responsive')); ?>
                            </div>
                        </div>
                        <?php }?>
                        <div class="<?php echo $class=has_post_thumbnail(get_the_ID())? 'col-sm-9':'col-sm-12'; ?>">
                            <h5><?php the_title();?></h5>
                            <p>Posted on <a href="#"><?php the_time('F jS, Y') ?></a> by <a href="#"><?php the_author_posts_link() ?> </p>
                             <?php global $more;    // Declare global $more (before the loop).
                                              $more = 0;  
                                                $more = 0;     //s Set (inside the loop) to display content above the more tag.
                                    the_content(''); 
                                              ?>
                           <p>Posted in <a href="#"><?php the_category(', ');?></a> | <a href="<?php the_permalink(); ?>#comment-section">Leave Reply</a></p> 
                            <div class="readmore">
                                <a href="<?php the_permalink(); ?>">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>  
               <?php wp_pagenavi(); ?>          
            </div>
          <?php get_sidebar('blog'); ?>
        </div>   
    </div> 
</section>
 

<!---------- Content Close ----------->
<?php get_footer(); ?>