<?php get_header(); ?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "<?php echo get_option('university_sharethis_id') ?>", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<!----------  Containt Area Open --------->
<section class="inner-area">
    <div class="container">
        <h2><?php the_post(); the_title(); ?></h2>
        <p>Posted on <a href="#"><?php the_time('F jS, Y') ?></a> by <a href="#"><?php the_author_posts_link() ?> </a></p>
        <div class="row">
            <div class="col-sm-9">
            <?php if(get_option('university_display_image')==true){?>
               <?php if(has_post_thumbnail){the_post_thumbnail('full',array('class'=>'img-responsive aligncenter'));}?> 
               <?php }?>
                <?php the_content(); ?>
                <div class="so-link"><span class='st_sharethis_large' displayText='ShareThis'></span>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span></div>
               <div id="comment-section" class="discus-sec"><h2><?php _e('LEAVE REPLY');?> </h2> <?php comments_template(); ?></div>
            </div>
          <?php get_sidebar('blog'); ?>
        </div> 
    </div>   
</section>
<!----------  Containt Area Close --------->
  

<?php get_footer(); 