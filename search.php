<?php get_header(); ?>
    <!------ Body-Lower Open ---------->
    
       <section>
    
        <div class="container">
        
            <div  class="row">
            
                            <h2><span>Search results for : "<?php the_search_query(); ?>"</span></h2>
                            <?php if (have_posts()) : while (have_posts()) : the_post();  $count_posts = $wp_query->post_count;?>
                             <?php  $i=0; ?>
                                      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                        <div class="post-meta">
                                          
                                          <div class="col-xs-3">   
                                        <?php if ( has_post_thumbnail()) { ?>
                                          <a href="<?php the_permalink() ?>" class="img-wrap"><strong class="img-border"></strong><?php the_post_thumbnail(); ?></a>
                                      <?php } ?>
                                         </div>
                                        
                                        <div class="post-content">
                                          <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,40);?></div>
                                          <div class="pagi">
                                             <ul class="pager">
                                             <li class="previous"><a href="<?php the_permalink(); ?>" class="button">more <span>&rsaquo;&rsaquo;</span></a></li>
                                             </ul>
                                         </div>
                                          
                                        </div>
                                      </article><?php if($wp_query->current_post+1!==$count_posts) { ?> <hr><?php } ?>
                                    <?php endwhile; else: ?>
                                      <div class="no-results">
                                        <p><strong>oops! There is Nothing Matched for You...</strong></p>
                                        <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
                                        
                                      </div><!--noResults-->
                                    <?php endif; ?>
                                    
                                    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                                      <div class="pagi">
                                      <ul class="pager">
                                      <li class="previous"><?php next_posts_link('&larr; Older Entries') ?></li>
                                      <li class="next"><?php previous_posts_link('Newer Entries &rarr;') ?></li>
                                      </ul>
                                      </div>
                                    <?php endif; ?>
                               </div>
                       </div>
                    <div class="clearfix"></div>
                </div>
            </div>
           </div> 
        </section>
    
    <!------ Body-Lower Close ---------->
    
<?php get_footer(); ?>