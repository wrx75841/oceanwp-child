<?php
/*
Template Name: Sklep
 *
 * Osobna strona "Sklep dla zwierzat". Dziala automatycznie dla strony
 * WordPressa o adresie /sklep/ (konwencja page-{slug}.php), a
 * dodatkowo mozna ja recznie wybrac w Atrybutach strony jako szablon
 * "Sklep" (naglowek Template Name powyzej).
 */
$shop_url = ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) > 0 )
    ? get_permalink( wc_get_page_id( 'shop' ) )
    : '#';

get_header();
?>

<div id="content-wrap" class="container clr">
    <div id="primary" class="content-area clr">
        <div id="content" class="site-content clr">

            <header class="hero">
                <div class="wrap">
                <div class="section-heading">
                    <span class="badge">🛍️ Poleca Jadzia</span>
                    <h2>Sklep dla zwierzat</h2>
                    <p>Rzeczy, ktore Jadzia osobiscie przetestowala i zatwierdzila (glownie zebami).</p>
                </div>
                </div>
            </header>

            <div class="wrap">
                <div class="facts">

                    <a class="fact-card" href="<?php echo esc_url( $shop_url ); ?>">
                        <svg width="36" height="36" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <circle cx="24" cy="24" r="16" fill="none" stroke="var(--accent)" stroke-width="3" />
                            <path d="M10,16 Q24,24 10,32" stroke="var(--accent-2)" stroke-width="2" fill="none" />
                            <path d="M38,16 Q24,24 38,32" stroke="var(--accent-2)" stroke-width="2" fill="none" />
                        </svg>
                        <h3>Zabawki</h3>
                        <p>Piszczace pilki, liny, gryzaki.</p>
                    </a>

                    <a class="fact-card" href="<?php echo esc_url( $shop_url ); ?>">
                        <svg width="36" height="36" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M12,20 a6,6 0 1,1 8,8 L30,36 a6,6 0 1,1 8,8 a6,6 0 1,1 -8,-8 L20,28 a6,6 0 1,1 -8,-8 a6,6 0 1,1 8,-8 z" fill="none" stroke="var(--accent)" stroke-width="3" stroke-linejoin="round" />
                        </svg>
                        <h3>Przysmaki</h3>
                        <p>Kruche, chrupiace, znikaja w 3 sekundy.</p>
                    </a>

                    <a class="fact-card" href="<?php echo esc_url( $shop_url ); ?>">
                        <svg width="36" height="36" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <rect x="6" y="24" width="36" height="14" rx="6" fill="none" stroke="var(--accent)" stroke-width="3" />
                            <path d="M10,24 V18 a6,6 0 0 1 12,0 v6" fill="none" stroke="var(--accent)" stroke-width="3" />
                            <path d="M26,24 V18 a6,6 0 0 1 12,0 v6" fill="none" stroke="var(--accent)" stroke-width="3" />
                        </svg>
                        <h3>Legowiska</h3>
                        <p>Miekkie, cieple, idealne na 18 godzin spania.</p>
                    </a>

                    <a class="fact-card" href="<?php echo esc_url( $shop_url ); ?>">
                        <svg width="36" height="36" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <circle cx="24" cy="24" r="17" fill="none" stroke="var(--accent)" stroke-width="4" />
                            <circle cx="24" cy="7" r="3.5" style="fill:var(--accent-2)" />
                        </svg>
                        <h3>Obroze i smycze</h3>
                        <p>Wygodne, kolorowe, na kazda okazje.</p>
                    </a>

                </div>
            </div>

            <div class="wrap" id="produkty">
                <div class="section-heading">
                    <h2>Nasze produkty</h2>
                    <p>To, co akurat mamy w ofercie - dodawane na biezaco.</p>
                </div>
                <?php
                if ( function_exists( 'wc_get_products' ) ) {
                    echo do_shortcode( '[products limit="12" columns="4"]' );
                } else {
                    echo '<p style="text-align:center;color:var(--text-muted);">Sklep jeszcze sie budzi - wroc za chwile.</p>';
                }
                ?>
            </div>

        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #content-wrap -->

<?php get_footer(); ?>
