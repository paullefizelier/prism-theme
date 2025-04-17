<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="py-6 text-center bg-secondary">
    <div class="container">
        <div class="row pt-5">
            <h1 class="text-white">Blog de Prism Surfboards</h1>
        </div>
    </div>
</section>

<section class="album py-5 ">
    <div class="container">
        <div class="row">
            <?php 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                
              get_template_part('loops/cards');
                
            endwhile;
        else :
            _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
        endif;
        ?>
        </div>

        <div class="row">
            <div class="col lead text-center w-100">
                <div class="d-inline-block"><?php picostrap_pagination() ?></div>
            </div><!-- /col -->
        </div> <!-- /row -->
    </div>
</section>

<?php get_footer();