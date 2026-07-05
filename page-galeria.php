<?php
/*
Template Name: Galeria
 *
 * Osobna strona z galeria zdjec. Dziala automatycznie dla strony
 * WordPressa o adresie /galeria/ (konwencja page-{slug}.php), a
 * dodatkowo mozna ja recznie wybrac w Atrybutach strony jako szablon
 * "Galeria" (naglowek Template Name powyzej).
 */
get_header();
?>

<div id="content-wrap" class="container clr">
    <div id="primary" class="content-area clr">
        <div id="content" class="site-content clr">

            <div class="wrap">
                <div class="section-heading">
                    <h2>Galeria</h2>
                    <p>Bo prawdziwe beagle sa jeszcze slodsze niz rysunki.</p>
                </div>
                <div class="gallery">
                    <img src="https://images.pexels.com/photos/5283623/pexels-photo-5283623.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Beagle lezacy w trawie" loading="lazy" />
                    <img src="https://images.pexels.com/photos/38010/pexels-photo-38010.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Zblizenie na nos beagla" loading="lazy" />
                    <img src="https://images.pexels.com/photos/13031400/pexels-photo-13031400.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Beagle na spacerze" loading="lazy" />
                    <img src="https://images.pexels.com/photos/8593220/pexels-photo-8593220.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Dwa beagle odpoczywajace razem" loading="lazy" />
                </div>
                <p class="photo-credit">Zdjecia: <a href="https://www.pexels.com" target="_blank" rel="noopener">Pexels</a></p>
            </div>

        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #content-wrap -->

<?php get_footer(); ?>
