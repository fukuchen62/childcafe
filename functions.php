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


//練習問題2
function add_my_files() {
    //jquery読み込み
    wp_enqueue_script('jquery');
    //以下はheaderに出力
	wp_enqueue_style('font-awsome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css');
    wp_enqueue_style('bistro-calme-styles', get_template_directory_uri() . '/assets/css/styles.min.css');
	wp_enqueue_script('bistro-calme-main', get_template_directory_uri() .'/assets/js/main.js',  array('jquery'));

    //TOPページのみ出力
    if (is_home()) {
        wp_enqueue_style('slick-carousel',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css'
        );
        wp_enqueue_script('slick-carousel',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        array('jquery'),
        '1.8.1',
        true//footerに出力
        );
        wp_enqueue_script('bistro-calme-home', get_template_directory_uri() . '/assets/js/home.js',
        array('jquery'),
        '1.0',
        true//footerに出力
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
    if ($query->is_front_page()) {
        $query->set('posts_per_page', 3);
        return;
    }

    //インタビュー一覧ページの場合
    // if ($query->is_archive('interview')) {
    //     $query->set('posts_per_page', 9);
    //     return;
    // }
}
add_action('pre_get_posts', 'my_pre_get_posts');