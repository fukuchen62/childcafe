<?php


function remove_cssjs_ver2( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );



//after_setup_themeアクションフックを使用する関数をまとめる
function my_theme_setup() {
    add_theme_support('title-tag'); //<title>タグを出力する
    add_theme_support('post-thumbnails'); //アイキャッチ画像を使用可能にする
    add_theme_support('menus'); //カスタムメニュー機能を使用可能にする
}
add_action('after_setup_theme', 'my_theme_setup');


function add_my_files() {
    //WordPress本体のJQueryを登録解除
    wp_deregister_script('jquery');
    //jquery読み込み
    wp_enqueue_script('jquery',get_template_directory_uri().'/assets/js/jquery-3.6.3.min.js',array(),'3.6.3',true);
    //slick本体読み込み
    wp_enqueue_script('slick-min-js',get_template_directory_uri().'/assets/slick/js/slick.min.js',array('jquery'),true);
    //header.jsの読み込み
    wp_enqueue_script('header-js',get_template_directory_uri().'/assets/js/header.js',array('jquery'),'1.0',true);

    //以下はheaderに出力
    //Google fonts
    wp_enqueue_style('Google-fonts-Kosugi+Maru', 'https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap');
    wp_enqueue_style('Google-fonts-Zen+Maru+Gothic', 'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap');
    wp_enqueue_style('Google-fonts-Noto+Sans', 'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;900&display=swap');
    //リセットCSSの読み込み
	wp_enqueue_style('reset-css', get_template_directory_uri() .'/assets/css/reset.css');
    //common.cssの読み込み
    wp_enqueue_style('common-css', get_template_directory_uri() . '/assets/css/common.css',array('slickーtheme-css'));
    //slickのCSSの読み込み
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/slick/css/slick.css',array('reset-css'));
    wp_enqueue_style('slickーtheme-css', get_template_directory_uri() . '/assets/slick/css/slick-theme.css',array('slick-css'));

    //TOPページのみ出力
    if (is_front_page()) {
        wp_enqueue_style('index-css',get_template_directory_uri() . '/assets/css/index.css',array('common-css')
        );
    }
}
add_action('wp_enqueue_scripts' ,'add_my_files');



//投稿表示件数を変更する
function my_pre_get_posts($query) {
    //管理画面、メインクエリには設定しない(サブクエリに設定する)
    if (is_admin() || $query->is_main_query()) {
        return;
    }

    //トップページの場合
    // if ($query->is_front_page()) {
    //     $query->set('posts_per_page', 3);
    //     return;
    // }

    //インタビュー一覧ページの場合
    // if ($query->is_archive('interview')) {
    //     $query->set('posts_per_page', 9);
    //     return;
    // }
}
add_action('pre_get_posts', 'my_pre_get_posts');