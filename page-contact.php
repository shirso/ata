<?php
  /*
 * Template Name: Contact
 */
?>
<?php get_header(); ?>
<!----- Body Open  ------->
<section class="inner-area">
    <div class="container">
       <?php the_post();the_content();?>
        <div class="row">
            <div class="col-sm-7">
                <div class="blank-white">
                    <p><strong>Please specify a department so we can direct your message accordingly</strong></p>
                    
                        <?php if ( ! dynamic_sidebar( 'Sidebar Contact' )) :  
                     endif; ?>
                </div>
            </div>
            <div class="col-sm-5">
                  
                 <?php if ( ! dynamic_sidebar( 'Sidebar Address ' )) :  
                     endif; ?>
            </div>
        </div>
    </div>
</section>
<!----- Body Close  ------->
<?php get_footer();