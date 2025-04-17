<?php if ( !isset($_COOKIE['visited']) ) : ?>

<div class="modal fade" id="firstVisitModal" tabindex="-1" role="dialog" aria-labelledby="firstVisitModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="firstVisitModalLabel">Découvrez nos bons plans !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Prism Surfboards, c'est des bons plans toute l'année et pour tous les niveaux ! Profitez de la
                    qualité au meilleur prix !</p>
            </div>
            <div class="modal-footer">
                <a href="/surfshop" class="btn btn-secondary" data-dismiss="modal">Toutes nos planches</a>
                <a href="/bons-plans" class="btn btn-primary">Nos bons plans</a>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
</main>
<?php 

    // Custom filter to check if footer elements should be displayed. To disable, use: add_filter('picostrap_enable_footer_elements', '__return_false');
    if (apply_filters('picostrap_enable_footer_elements', true)):
    
        //check if LC option is set to "Handle Footer"   
        if (!function_exists("lc_custom_footer")) {
            
            //use the built-in theme footer elements 
            get_template_part( 'partials/footer', 'elements' );
            
        } 
        
    endif;
    ?>

<?php wp_footer(); ?>

</body>

</html>