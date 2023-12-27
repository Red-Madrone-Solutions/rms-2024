<?php

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}
require $composer;
TailCraft\Theme\Init::run();

add_filter('body_class', function($classes) {
    if ( $_SERVER['SERVER_NAME'] === 'localhost' ) {
        $classes[]= 'debug-screens';
    }
    return $classes;
});

// Push Yoast SEO metabox to bottom
// Based on: https://gist.github.com/ramseyp/6920038
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

add_action('init', function() {
    register_block_type( __DIR__ . '/blocks/hero' );
    register_block_type( __DIR__ . '/blocks/project' );
});
