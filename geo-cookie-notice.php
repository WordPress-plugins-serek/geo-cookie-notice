<?php
   /*
   Plugin Name: Geo-aware Cookie Notice
   Plugin URI: https://odd-one-out.serek.eu
   Description: Cookie Notice from https://cookieconsent.insites.com with some preloading of ressources and only showing if required by law in the visiting country. Requires my "Geoip" plugin to prevent showing the cookie notice where not required by law.
   Version: 1.0
   Author: Poul Serek
   Author URI: https://odd-one-out.serek.eu
   License: GPL2
   */

function add_assets_cookie_notice() {
                wp_register_script( 'cookieNoticeCustom-script',  plugin_dir_url( __FILE__ ) . 'assets/cookieNotice.js' );
        	wp_enqueue_script('cookieNoticeCustom-script');
                wp_register_script( 'cookieNotice-script',  '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js' );
        	wp_enqueue_script('cookieNotice-script');
                wp_register_style( 'cookieNotice-style',  '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css' );
        	wp_enqueue_style('cookieNotice-style');
}
add_action('wp_enqueue_scripts', 'add_assets_cookie_notice');

function wpse_436723122_wp_head(){
    ?>
        <link rel="preconnect" href="//cdnjs.cloudflare.com">
        <link rel="preload" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js" as="script">
        <link rel="preload" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" as="style"">
    <?php
}
add_action('wp_head', 'wpse_436723122_wp_head', 0);

?>
