<?php get_header(); ?>
    <!------ Body-Lower Open ---------->
    
        <div class="container">
            <div class="row">
                <div class="body-drop-up">
                    
                </div>
                <div class="body-drop">
                    <div class="col-sm-8">
                        <div class="body-low-left">
                           <h3 class="title">
                                    <?php if ( is_day() ) : /* if the daily archive is loaded */ ?>
                                      <?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
                                    <?php elseif ( is_month() ) : /* if the montly archive is loaded */ ?>
                                      <?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
                                    <?php elseif ( is_year() ) : /* if the yearly archive is loaded */ ?>
                                      <?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
                                    <?php else : /* if anything else is loaded, ex. if the tags or categories template is missing this page will load */ ?>
                                    <h1>Pandit Archives [<?php $term = $wp_query->queried_object;
echo $term->name;?>]</h1>




                                    <?php endif; ?>
                                  </h3>
                           
                           
                            <?php echo category_description(); /* displays the category's description from the Wordpress admin */ ?>
                            <?php if (have_posts()) : while (have_posts()) : the_post();  $count_posts = $wp_query->post_count;?>
                            <?php  $i=0; ?>
                                      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <h3 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                       <div class="col-xs-3">
                                        <?php if ( has_post_thumbnail()) { ?>
                                          <a href="<?php the_permalink() ?>" class="img-wrap"><strong class="img-border"></strong><?php the_post_thumbnail(array(140,180)); ?></a>
                                      <?php } ?>
                                        </div>
                                        <div class="col-xs-9">
                                          <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,40);?></div>
                                          <div class="pagi">
                                             <ul class="pager">
                                             <li class="previous"><a href="<?php the_permalink() ?>" class="">more <span>&rsaquo;&rsaquo;</span></a></li>
                                             </ul>
                                         </div>
                                        </div>
                                       <div class="clearfix"></div> 
                                        
                                      </article><?php if($wp_query->current_post+1!==$count_posts) { ?> <hr><?php } ?>
                                    <?php endwhile; else: ?>
                                      <div class="no-results">
                                        <p><strong>There has been an error.</strong></p>
                                        <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
                                        <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
                                      </div><!--noResults-->
                                    <?php endif; ?>
                                      
                                    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                                      <div class="oldernewer">
                                        <div class="older">
                                        <div class="pagi">
                                             <ul class="pager">
                                             <li class="previous"><?php next_posts_link('&larr; Older Entries') ?></li>
                                             </ul>
                                         </div>
                                          
                                        </div><!--.older-->
                                        <div class="newer">
                                        <div class="pagi">
                                             <ul class="pager">
                                             <li class="next"><?php previous_posts_link('Newer Entries &rarr;') ?></li>
                                             </ul>
                                         </div>
                                          
                                        </div><!--.newer-->
                                        <div class="clearfix"></div>
                                      </div><!--.oldernewer-->
                                    <?php endif; ?>
                               </div>
                    </div>
           <?php get_sidebar(); ?>
           
                           
                            
                        
                    <div class="clearfix"></div>
                </div>
            </div>
            
        </div>
    </div>
    <!------ Body-Lower Close ---------->
  
<?php get_footer(); ?>