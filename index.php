<?php
/**
 * Ogolny fallback (wymagany przez WordPressa w kazdym motywie).
 * Wlasciwa strona glowna renderowana jest przez front-page.php - ten
 * plik obsluguje jedynie przypadki, ktorych zaden bardziej specyficzny
 * szablon nie przechwycil.
 */
get_header();
?>

<div id="content-wrap" class="container clr">
    <div id="primary" class="content-area clr">
        <div id="content" class="site-content clr">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <?php the_title( '<h1>', '</h1>' ); ?>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php esc_html_e( 'Brak tresci do wyswietlenia.', 'fanclub-jadzi' ); ?></p>
            <?php endif; ?>

        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #content-wrap -->

<?php get_footer(); ?>
