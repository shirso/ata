<?php
if (!defined('ABSPATH')) exit;
if (!class_exists('ATA_Custom_Metabox')) {
    class ATA_Custom_Metabox{
        public function __construct()
        {
            add_meta_box('ata_regional_points', __('Region Points', 'ata'), array(&$this, 'ata_add_metaboxes'), 'regions', 'normal', 'high');
            add_action('save_post',array(&$this,'ata_save_positions'));
        }
        public function ata_add_metaboxes(){
            global $post;
            $positions=(get_post_meta($post->ID,"_ata_positions",true)) ? get_post_meta($post->ID,"_ata_positions",true) : array("x"=>10,"y"=>10);
            $all_posts=get_posts(
                array(
                    'posts_per_page'   => -1,
                    'post_type'        => 'regions',
                    'post_status'      => 'publish',
                )
            );
            $all_positions=array();
            if(!empty($all_posts)){
                foreach($all_posts as $region){
                  if($region->ID !=$post->ID){
                  $region_position=get_post_meta($region->ID,"_ata_positions",true);
                    array_push($all_positions,$region_position);
                }}
            }
            ?>
            <script type="application/javascript">
                var regionPage=true,
                    regionMapImage="<?=get_option('ata_region_map')?>",
                    pinImage="<?=get_bloginfo('template_url')?>/img/pin.png",
                    ata_positions=<?=json_encode($positions);?>,
                    ata_all_positions=<?=json_encode($all_positions);?>,
                    pointImage="<?=get_bloginfo('template_url')?>/img/small-right.png";
            </script>
            <div id="ata_images_div" style="display: none;">
                <img src="<?=get_option('ata_region_map')?>" id="ata_regionMapImage">
                <img src="<?= get_bloginfo('template_url')?>/assets/img/pin.png" id="ata_pinImage">
                <img src="<?= get_bloginfo('template_url')?>/assets/img/dot.png" id="ata_dotImage">
            </div>
            <h2><?=__("Move pin on appropriate position","ata")?></h2>
            <div id="ata_region_points" style="width: 400px">
                <canvas></canvas>
            </div>
            <input type="hidden" id="ata_pos_x" value="<?=$positions["x"]?>" name="ata_positions[x]">
            <input type="hidden" id="ata_pos_y" value="<?=$positions["y"]?>" name="ata_positions[y]">
       <?php }
        public function ata_save_positions($post_id){
            if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
            if(isset($_POST['ata_positions'])){
                update_post_meta( $post_id, '_ata_positions', $_POST['ata_positions'] );
            }
        }
    }
    new ATA_Custom_Metabox();
}