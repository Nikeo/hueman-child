<?php
/* ------------------------------------------------------------------------- *
 *  Custom functions
/* ------------------------------------------------------------------------- */

    // Add your custom functions here, or overwrite existing ones. Read more how to use:
    // http://codex.wordpress.org/Child_Themes

/**
 * Localisation trick that fixes the language switch issue. Found on:
 * http://tweetpressfr.github.io/blog/codewp/astuces-child-themes.html
 */

add_filter( 'locale', 'hueman_localized' );

function hueman_localized($locale) {
    if (isset($_GET['lang'])) {
        return $_GET['lang'];
    }
    return $locale;
}

add_action( 'after_setup_theme', 'hueman_child_theme_setup' );

function hueman_child_theme_setup(){
    load_child_theme_textdomain( 'hueman', get_stylesheet_directory() . '/languages' );
}

/**
 * Speed up trick for parent style.css import. Found on:
 * http://kovshenin.com/2014/child-themes-import/
 */

add_action( 'wp_enqueue_scripts', 'hueman_child_theme_scripts' );

function hueman_child_theme_scripts() {
    wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}
