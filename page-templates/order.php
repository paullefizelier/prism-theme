<?php
/**
 * Template Name:  Order Pages
 
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('order');
?>

<div id="container-content-page" class="container">
    <div class="row">
        <div class="col-md-12 py-5">
            <a class="nav-link d-flex align-items-center" href="/surfshop">
                <small class="d-flex"><span class=" material-symbols-outlined pb-0
            me-2">arrow_back</span> Retour à la
                    boutique</small></a>
            <?php 

            if ( have_posts() ) : 
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            else :
                _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
            endif;
            ?>
        </div>
    </div>
</div>


<?php get_footer();