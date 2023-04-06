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
    wp_enqueue_script('slick-min-js',get_template_directory_uri().'/assets/slick/js/slick.min.js',array('jquery'),'1.0',true);
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

    //index.phpに適用
    wp_enqueue_style('single-event-css', get_template_directory_uri() . '/assets/css/single-event.css', array('common-css')
        );

    //TOPページのみ出力
    if (is_front_page()) {
        wp_enqueue_style('index-css',get_template_directory_uri() . '/assets/css/index.css',array('common-css')
        );
        //index.jsの読み込み
        wp_enqueue_script('index-js',get_template_directory_uri().'/assets/js/index.js',array('header-js'),'1.0',true);
    }

    //taxonomy-areaページのみ出力
    if (is_tax('area')) {
        wp_enqueue_style('taxonomy-area-css',get_template_directory_uri() . '/assets/css/taxonomy-area.css',array('common-css')
        );
    }

    //taxonomy-linkページのみ出力
    if (is_tax('link')) {
        wp_enqueue_style('taxonomy-link-css',get_template_directory_uri() . '/assets/css/page-links.css',array('common-css')
        );
        //tab.jsの読み込み
        wp_enqueue_script('tab-js',get_template_directory_uri().'/assets/js/tab.js',array('header-js'),'1.0',true);
    }




    //single-cafeinfoページのみ出力
    if (is_singular('cafeinfo')) {
        wp_enqueue_style('single-cafeinfo-css',get_template_directory_uri() . '/assets/css/single-cafeinfo.css',array('common-css')
        );
        //single-cafeinfo.jsの読み込み
        wp_enqueue_script('single-cafeinfo-js',get_template_directory_uri().'/assets/js/single-cafeinfo.js',array('header-js'),'1.0',true);
    }

    //single-interviewページのみ出力
    if (is_singular('interview')) {
        wp_enqueue_style('single-interview-css',get_template_directory_uri() . '/assets/css/single-interview.css',array('common-css')
        );
    }

    //記事一覧ページのみ出力
    if (is_page('post') || is_category()) {
        wp_enqueue_style('page-post-css',get_template_directory_uri() . '/assets/css/page-post.css',array('common-css')
        );
    }

    //記事詳細ページのみ出力
    if (is_single()) {
        wp_enqueue_style('single-post-css',get_template_directory_uri() . '/assets/css/single-post.css',array('common-css')
        );
    }

    // page-contactのみ出力
    if (is_page('contact')) {
        wp_enqueue_style('page-contact-css', get_template_directory_uri() . '/assets/css/page-contact.css', array('common-css')
        );
    }

    // page-conceptのみ出力
    if (is_page('concept')) {
        wp_enqueue_style('page-concept-css', get_template_directory_uri() . '/assets/css/page-concept.css', array('common-css')
        );
    }

    // page-supportのみ出力
    if (is_page('support')) {
        wp_enqueue_style('page-support-css', get_template_directory_uri() . '/assets/css/page-support.css', array('common-css')
        );
    }

    // page-supportのみ出力
    if (is_page('about')) {
        wp_enqueue_style('page-about-css', get_template_directory_uri() . '/assets/css/page-about.css', array('common-css')
        );
    }

    // page-faqのみ出力
    if (is_page('faq')) {
        wp_enqueue_style('page-faq-css', get_template_directory_uri() . '/assets/css/page-faq.css', array('common-css')
        );
    }

    // page-praivacy_policyのみ出力
    if (is_page('praivacy_policy')) {
        wp_enqueue_style('page-praivacy_policy-css', get_template_directory_uri() . '/assets/css/page-praivacy_policy.css', array('common-css')
        );
    }

    // 404のみ出力
    if (is_404()) {
        wp_enqueue_style('404-css', get_template_directory_uri() . '/assets/css/404.css', array('common-css')
        );
    }

    // 詳細検索ページのみ出力
    if (is_page('search')) {
        wp_enqueue_style('page-search-css', get_template_directory_uri() . '/assets/css/page-search.css', array('common-css')
        );
        //tab.jsの読み込み
        wp_enqueue_script('tab-js',get_template_directory_uri().'/assets/js/tab.js',array('header-js'),'1.0',true);
        //age-search.jsの読み込み
        wp_enqueue_script('page-search-js',get_template_directory_uri().'/assets/js/page-search.js',array('tab-js'),'1.0',true);
    }

    // event一覧のみ出力
    if (is_post_type_archive('event')) {
        wp_enqueue_style('archive-event-css', get_template_directory_uri() . '/assets/css/archive-event.css', array('common-css')
        );
    }

        // event一覧のみ出力
    if (is_post_type_archive('interview')) {
        wp_enqueue_style('archive-interview-css', get_template_directory_uri() . '/assets/css/archive-interview.css', array('common-css')
        );
    }



}

add_action('wp_enqueue_scripts' ,'add_my_files');

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}


//投稿表示件数を変更する
function my_pre_get_posts($query) {
    //管理画面、メインクエリには設定しない(サブクエリに設定する)
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // //トップページの場合
    // if ($query->is_front_page()) {
    //     $query->set('posts_per_page', 2);
    //     return;
    // }

    // 固定ページの場合
    if ($query->is_page('post')) {
        $query->set('posts_per_page',5);
        $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
        return;
    }

    // インタビュー一覧ページの場合
    if ($query->is_post_type_archive('interview')) {
        $query->set('posts_per_page', 6);
        $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
        return;
    }
}
add_action('pre_get_posts', 'my_pre_get_posts');