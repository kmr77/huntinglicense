<?php
function hunting_licence_theme_setup() {
    add_theme_support('title-tag'); // タイトルタグの自動生成
    add_theme_support('post-thumbnails'); // アイキャッチ画像のサポート
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'hunting_licence_theme_setup');

function hunting_licence_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'hunting_licence_enqueue_styles');

add_theme_support( 'title-tag' );
?>
