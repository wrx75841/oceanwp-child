<?php
/**
 * Fanclub Jadzi - functions.php (child theme OceanWP)
 */

function fanclub_jadzi_enqueue_styles() {
    // NIE rejestrujemy tutaj sami stylu 'oceanwp-style' - robi to sam
    // rodzic (OceanWP) we wlasnym functions.php. Dziecko laduje sie
    // PRZED rodzicem, wiec gdybysmy sami zarejestrowali ten uchwyt
    // (nawet niekompletnie, np. wskazujac tylko na root style.css),
    // "zajelibysmy" te nazwe pierwsi i prawdziwa, pelna rejestracja
    // OceanWP zostalaby po cichu zignorowana (WordPress nie nadpisuje
    // juz zarejestrowanego uchwytu) - co realnie sie zdarzylo. Sami
    // deklarujemy tylko zaleznosc od 'oceanwp-style' - to bezpieczny,
    // oficjalny wzorzec z github.com/oceanwp/oceanwp-child-theme.
    $parent_theme = wp_get_theme( 'OceanWP' );

    wp_enqueue_style(
        'fanclub-jadzi-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'oceanwp-style' ),
        $parent_theme->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'fanclub_jadzi_enqueue_styles' );

function fanclub_jadzi_enqueue_script() {
    wp_enqueue_script(
        'fanclub-jadzi-script',
        get_stylesheet_directory_uri() . '/script.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'fanclub_jadzi_enqueue_script' );

function fanclub_jadzi_theme_support() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'fanclub_jadzi_theme_support' );

/**
 * Jednorazowa konfiguracja przy pierwszym zaladowaniu panelu admina po
 * wdrozeniu tego motywu - zamiast wymagac recznego klikania w Dostosuj/Menu.
 * Zabezpieczone flaga w opcjach, zeby nie nadpisywac pozniejszych, recznych
 * zmian uzytkownika przy kazdym przeladowaniu strony.
 */
function fanclub_jadzi_theme_setup_once() {
    if ( get_option( 'fanclub_jadzi_setup_done' ) ) {
        return;
    }

    // 1) Wylacz globalny pasek tytulu strony (Page Title) - u nas i tak kazda
    // strona ma wlasny naglowek (hero / section-heading), wiec pasek OceanWP
    // jest zbedny. Klucz potwierdzony w zrodle OceanWP:
    // inc/customizer/options/page-settings.php ('ocean_page_title_display').
    set_theme_mod( 'ocean_page_title_display', false );

    // 1b) Domyslny uklad zwyklych stron w OceanWP to "right-sidebar" -
    // rezerwuje puste miejsce po prawej, nawet bez zadnych widzetow w
    // sidebarze. Nasze strony nigdy nie uzywaja sidebara, wiec ustawiamy
    // globalny domyslny uklad na pelna szerokosc. Klucz potwierdzony w
    // zrodle OceanWP: inc/helpers.php -> oceanwp_post_layout()
    // ( get_theme_mod( 'ocean_page_single_layout', 'right-sidebar' ) ).
    set_theme_mod( 'ocean_page_single_layout', 'full-width' );

    // 2) Utworz menu z 4 pozycjami i przypisz je do lokalizacji "main_menu"
    // (klucz potwierdzony w zrodle OceanWP: functions.php -> register_nav_menus()).
    $menu_name = 'Menu glowne Fanclubu';
    $menu      = wp_get_nav_menu_object( $menu_name );
    $menu_id   = $menu ? $menu->term_id : wp_create_nav_menu( $menu_name );

    if ( ! is_wp_error( $menu_id ) && $menu_id ) {
        $home = home_url( '/' );

        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'  => 'O Jadzi',
            'menu-item-url'    => $home . '#o-jadzi',
            'menu-item-status' => 'publish',
        ) );

        $galeria = get_page_by_path( 'galeria' );
        if ( $galeria ) {
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'     => 'Galeria',
                'menu-item-object-id' => $galeria->ID,
                'menu-item-object'    => 'page',
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ) );
        }

        $sklep = get_page_by_path( 'sklep' );
        if ( $sklep ) {
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'     => 'Sklep',
                'menu-item-object-id' => $sklep->ID,
                'menu-item-object'    => 'page',
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ) );
        }

        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'  => 'Dolacz',
            'menu-item-url'    => $home . '#dolacz',
            'menu-item-status' => 'publish',
        ) );

        $locations                = get_theme_mod( 'nav_menu_locations', array() );
        $locations['main_menu']   = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    update_option( 'fanclub_jadzi_setup_done', 1 );
}
add_action( 'admin_init', 'fanclub_jadzi_theme_setup_once' );
