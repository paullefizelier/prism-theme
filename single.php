<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();




if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    
?>
<header class="pt-7 pb-5 bg-secondary">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-7">
                <?php 
                //CATS
                if (!get_theme_mod("singlepost_disable_entry_cats") &&  has_category() ) {
                        ?>
                <div class="entry-categories">
                    <span class="screen-reader-text text-light"><?php _e( 'Categories', 'picostrap5' ); ?></span>
                    <div class="entry-categories-inner text-light">
                        <?php the_category( ' ' ); ?>
                    </div><!-- .entry-categories-inner -->
                </div><!-- .entry-categories -->
                <?php
                }
                ?>
                <h1 class="text-white"><?php the_title(); ?></h1>
                <?php if (!get_theme_mod("singlepost_disable_date") OR !get_theme_mod("singlepost_disable_author")  ): ?>
                <div class="post-meta" id="single-post-meta">
                    <p class="lead text-light">

                        <?php if (!get_theme_mod("singlepost_disable_date") ): ?>
                        <span class="post-date"><?php the_date(); ?> </span>
                        <?php endif; ?>

                        <?php if (!get_theme_mod("singlepost_disable_author") ): ?>
                        <span class="text-light post-author"> <?php _e( 'by', 'picostrap5' ) ?>
                            <?php the_author(); ?></span>
                        <?php endif; ?>
                    </p>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-5">
                <?php
            if (get_the_post_thumbnail_url()){
                echo get_the_post_thumbnail();
        } ?>
            </div>
        </div>
    </div>
</header>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center position-relative">
            <div class="post-side sticky w-auto">
                <div class="sticky">
                    <div class="share-button">
                        <p class="lead mb-0 d-block d-md-none">Partager sur :</p>
                    </div>
                    <div class="share-button h4 mb-0 mb-md-3 text-secondary">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank"
                            class="text-secondary">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                    <div class="share-button h4 mb-0 mb-md-3 text-secondary">
                        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank"
                            class="text-secondary">
                            <i class=" fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                    <div class="share-button h4 mb-0 mb-md-3 text-secondary">
                        <a class="text-secondary" href="mailto:?body=Regarde ça : <?php the_permalink() ?>">
                            <i class="fa-regular fa-envelope"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-md-8">

                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<?php
endwhile;
else :
_e( 'Sorry, no posts matched your criteria.', 'picostrap5' );
endif;
?>




<?php get_footer();