<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>



<?php the_content(); 
$repeater_video = get_field('video');
if ($repeater_video) :

?>
<div class="row mt-5">
    <h2 class="mb-4">
        <?php the_title() ?> en vidéo
    </h2>
    <?php 
            foreach ($repeater_video as $row) :
                $video_link = $row['video_link'];
    ?>
    <div class="col mb-3">
        <div class="ratio ratio-16x9">
            <iframe src="<?php echo esc_attr($video_link); ?>" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen class="w-100"></iframe>
            <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/K3mYOQIpHEM?si=WweKz2UGgOTeDPdY"
            title="YouTube video player"></iframe> -->
        </div>
    </div>
    <?php 
        endforeach;
        ?>
</div>
<?php 
    endif;
    ?>