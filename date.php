<?php get_header(); ?>
    <section class="head-en tppp-flt-dv">
        <div class="container">
            <?php
            $year     = !empty(get_query_var('year')) ? get_query_var('year'):null;
            $monthnum = !empty(get_query_var('monthnum')) ? get_query_var('monthnum') : null;
            $day      = !empty(get_query_var('day')) ? get_query_var('day') :null ?>
            <h1><?php printf( __( 'Date Archives: %s','ata' ), '<span>' .$day.' '. $GLOBALS['wp_locale']->get_month($monthnum).' '.$year . '</span>' ); ?></h1>
            <hr class="bdr1"/>
        </div>
    </section>
    <section class="bdy-m-sec">
        <script type="text/javascript">
            var datePage=true,
                dateArray=<?=json_encode(array("year"=>$year,"month"=>$monthnum,"day"=>$day))?>;
        </script>
        <div class="container">
            <div class="grid" id="ata_main_content">

            </div>
            <div class="text-center"><div class="ext-btn mrr" style="display: none"><a href="#" id="ata_load_more_button"><?=__("More","ata")?></a></div></div>
        </div>
    </section>
<?php get_footer(); ?>