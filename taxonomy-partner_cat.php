<?php
  /*
 * Template Name: partners page
 */
?>
<?php get_header(); ?>
<!----- Body Open  ------->
 <section class="inner-area">
    <div class="container">
    <?php $term=$wp_query->queried_object; ?>
        <h2><?php echo $term->name ?></h2>
        <div class="row">
            <div class="col-sm-3">
                <div class="sidebar-area">
                    <ul>
                      <?php   $cat=get_terms('partner_cat','orderby=count&hide_empty=1');  ?>
                     <?php foreach($cat as $c){?>
                     <li><a href="<?php echo get_term_link($c); ?>"><?php echo ($c->name); ?></a></li>
                     <?php }?> 
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                
               <?php  $paged=get_query_var('paged'); ?>   
            <?php $args = array(
    'post_type' => 'ourpartners',
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'partner_cat',
            'field' => 'slug',
            'terms' =>$term->slug
        )
    )
);

$your_query = query_posts( $args );
            while(have_posts()){ the_post(); ?> 
               
                <div class="partner-con">
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="im-div">
                                 <?php echo the_post_thumbnail('partners-image'); ?>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <?php global $more;    // Declare global $more (before the loop).
                                              $more = 0;     //s Set (inside the loop) to display content above the more tag.
                                    the_content('<div class="readmore">
                                        Read more
                                    </div>', TRUE); ?>
                            
                        </div>
                    </div>
                </div>
                <?php } ?>
                 <div class="pagination-area"> 
               <?php if(function_exists('wp_pagenavi')) wp_pagenavi(); ?>       </div>   
            </div>
            </div>
        </div>
    </div>
</section>
<!----- Body Close  ------->
<?php get_footer();
