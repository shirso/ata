<?php
  /*
 * Template Name: Page with Sidebar
 */
?>
<?php get_header(); ?>
<?php
 global $more;   
?>
<!----- Body Open  ------->
<section class="inner-area">
    <div class="container">
        <div class="row clearfix">
            <div class="col-sm-9">
                <div class="inner-left">
                    <?php the_post();the_content();?>
                   
                    <!----------  Devider OPEn --------->
                    
                    <!----------  Devider Close --------->
                    <!----------  Team open --------->
                    
                    <!----------  Team Close --------->
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<!----- Body Close  ------->
<?php get_footer();?>