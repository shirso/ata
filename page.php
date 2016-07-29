<?php get_header(); ?>
    <section class="head-en tppp-flt-dv">
        <div class="container">
            <h1><?=the_title();?></h1>
            <hr class="bdr1"/>
        </div>
    </section>

<?php the_post();the_content();?>

<?php get_footer();