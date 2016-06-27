<?php get_header(); ?>


<!----------  Containt Area Open --------->

<section class="inner-area">
    <div class="container clearfix">
        <h2>partner</h2>
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
                <div class="im-div alignleft">
                   <?php the_post_thumbnail('partners-detail-image') ?>
                </div>
                 <h5><?php the_title(); ?></h5>
                <?php the_post(); the_content(); ?>
            </div>
        </div> 
    </div>
</section>

<!----------  Containt Area Close --------->


<?php get_footer(); ?>