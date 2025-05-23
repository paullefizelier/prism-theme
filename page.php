<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="py-5 py-xl-6">
    <div class="container text-center">
        <h1><?php the_title(); ?></h1>

    </div>
</div>

<div id="container-content-page" class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 py-5">
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