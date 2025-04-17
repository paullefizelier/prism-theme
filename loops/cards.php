<?php 
/*
This loop is used in the Archive and in the Home [.php] templates.
*/
?>
<div class="col-md-4 col-sm-6 mb-4">
    <div class="card mb-4 shadow-sm h-100">
        <?php the_post_thumbnail('medium', ['class' => 'w-100']);    ?>

        <div class="card-body">
            <?php if (!get_theme_mod("singlepost_disable_date") ): ?>
            <small class="text-muted"><?php the_date() ?></small>
            <?php endif; ?>

            <h2><a class="stretched-link h-100 text-decoration-none"
                    href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <p class="card-text"><?php the_excerpt(); ?></p>

            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Lire la suite</button>

                </div>
            </div>

        </div>
    </div>
</div>