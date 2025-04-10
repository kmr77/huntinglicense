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
//投稿ページのタイトルにテキスト追記
function modify_aioseo_title_with_acf( $title ) {
    if ( is_singular('post') ) {
        // 現在の投稿IDを取得
        $post_id = get_queried_object_id();
        
        // ACFからnoフィールドを取得
        $no = get_field('no', $post_id);
        
        // ACFフィールド 'no' が存在すればタイトルを変更
        if ( $no ) {
            // 投稿の元のタイトルを取得
            $original_title = get_the_title($post_id);
            // 新しいタイトルを作成
            $title = '問題番号' . $no . '：' . $original_title;
        }
    }
    return $title; // 変更されたタイトルを返す
}
add_filter( 'aioseop_title', 'modify_aioseo_title_with_acf' );




?>
