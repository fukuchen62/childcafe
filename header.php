<?php
if (is_tax('area')) {
    $title_area_slug = get_query_var('area');
    $title_area = get_term_by('slug', $title_area_slug, 'area');
}


?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="徳島,こども食堂,支援,地域コミュニティ,こどもの居場所">
    <!-- 電話番号の自動リンク化を無効 -->
    <meta name="format-detection" content="telephone=no">

    <!--favicon設定-->
    <link rel="icon" type="image/vnd.microsoft.icon" sizes="16x16" href="https://tks-navi.boo.jp/wordpress/wp-content/uploads/2023/04/favicon.ico">

    <!--description設定-->
    <meta name="description" content="徳島県下のこども食堂の情報まとめサイトです。子ども食堂はこどもも大人も誰でも行ける多世代交流拠点です。興味がある人、行ってみたい人、支援したい人に役立つ情報を掲載しています。">

    <?php if (is_tax('area')) :?>
    <title><?php echo 'エリアからさがす '.$title_area->name.' &#8211; 徳島こども食堂ナビ' ?></title>
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="body_inner">
        <!-- トップページへ戻るボタン -->
        <div class="toppage_btn">
            <a href="<?php
            if (is_archive()) {
                $post_type = get_post_type();
                $url = get_post_type_archive_link( $post_type );
            }elseif (is_front_page()) {
                echo home_url('');
            }else{
                echo get_permalink();
            }
            ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/pagetop_btn.png" alt="トップへ戻るボタン" /></a>
        </div>
        <!-- トップページへ戻るボタン 終了-->
        <header class="header">
            <div class="header_inner flex">
                <h1 class="header_logo">
                    <a href="<?php echo home_url(''); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="徳島こども食堂ナビ">
                    </a>
                </h1>

                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- hamburger箱end -->
                <nav class="menu_pc flex">
                    <?php
                        $args = array(
                        'menu' => 'global-navigation',  //管理画面で作成したメニューの名前
                        'menu_class' => 'menu_pc_ul flex', //メニューを構成するulタグのクラス名
                        'container' => false, //<ul>タグを囲んでいる<div>タグを削除
                        );
                        wp_nav_menu($args);
                        ?>
                </nav>
                <!-- PC版キーワード -->
                <form class="btn_header_search_pc" action="<?php echo home_url('/'); ?>" method="get">
                    <input type="hidden" name="search_type" value="keywords" />
                    <input class="hbg_form" size="20" type="search" name="s" maxlength="20" value="<?php the_search_query(); ?>" placeholder="キーワードを入力" id="" />
                    <input class="hbg_submit_pc" type="submit" value="" />
                </form>
            </div>
            <nav class="menu">
                <ul>
                    <li>
                        <a class="a_menu" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="ホームボタン" /></a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('/concept'); ?>">こども食堂とは</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('/area/east'); ?>">エリアからさがす</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('/find'); ?>">条件からさがす</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('/support'); ?>">支援したい方へ</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('/interview'); ?>">特集記事</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('/event'); ?>">開催情報</a>
                    </li>
                    <!-- 検索機能 -->
                    <li class="btn_header menu_search">
                        <form class="hbg_search" action="<?php echo home_url('/'); ?>" method="get">
                            <input type="hidden" name="search_type" value="keywords" />
                            <input class="hbg_form" size="20" type="search" name="s" maxlength="20" value="<?php the_search_query(); ?>" placeholder="キーワードを入力" />
                            <input class="hbg_submit fas" type="submit" value="" />
                        </form>
                    </li>
                    <!-- 検索機能end -->
                </ul>
            </nav>
            <!-- hamburger中身end -->
        </header>