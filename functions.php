<?php
    function wp_adv_theme_support()
    {
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
    }

    add_action('after_setup_theme', 'wp_adv_theme_support');

    function wp_adv_menus(){
        $locations = [
            'primary' => 'Desktop Primary Left Sidebar',
            'footer' => 'Footer Menu Items',
        ];
        register_nav_menus($locations);
    }

    add_action('init', 'wp_adv_menus');

    function wp_adv_register_styles(){
        wp_enqueue_style('wp-adv-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', [], '5.0.2', 'all');
         wp_enqueue_style('wp-adv-style', get_stylesheet_uri(), ['wp-adv-bootstrap'], '1.0', 'all');
          wp_enqueue_style('wp-adv-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css', [], '7.0.1', 'all');
    }
    add_action('wp_enqueue_scripts', 'wp_adv_register_styles');

function wp_adv_register_scripts(){
    wp_enqueue_scripts('wp-adv-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.0.2',true)
    wp_enqueue_scripts('wp-adv-js', get_template_directory_uri(). '/assets/js/main.js', [], '1.0.',true)
}

add_action('wp_enqueue_scripts', 'wp_adv_register_scripts');

function wp_adv_nav_menu_li_class($classes, $items, $args, $depth){
    if (isset($args->menu_class) && strpos($args ->menu_class, 'navbar-nav') !== false) {

        $classes[] = 'nav-item text-decoration-none';

        if(in_array('current-menu-item', $classes) || in_array('current_page_item', $classes)) {
            $classes[] = 'active';
        }
    }
    return $classes;
}