<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="body_inner">
        <?php wp_body_open(); ?>
        <header class="header">
            <div class="header_inner flex">
                <div class="header_logo">
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ロゴ（仮）.png" alt="ホームボタン"></a>
                </div>

                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- hamburger箱end -->
                <nav class="menu_pc">
                    <?php
                        $args = array(
                        'menu' => 'global-navigation',  //管理画面で作成したメニューの名前
                        'menu_class' => 'menu_pc_ul flex', //メニューを構成するulタグのクラス名
                        'container' => false, //<ul>タグを囲んでいる<div>タグを削除
                        );
                        wp_nav_menu($args);
                        ?>
                </nav>
            </div>
            <nav class="menu">
                <ul>
                    <li>
                        <a class="a_menu" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ロゴ（仮）.png" alt="ホームボタン" /></a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('concept'); ?>">こども食堂とは</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('support'); ?>">支援したい方へ</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('interview'); ?>">特集記事</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('area/east'); ?>">エリアからさがす</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('search'); ?>">条件からさがす</a>
                    </li>
                    <li class="btn_header">
                        <a href="<?php echo home_url('event'); ?>">今月の開催情報</a>
                    </li>
                    <!-- 検索機能 -->
                    <li class="btn_header menu_search">
                        <?php get_search_form(); ?>
                    </li>
                    <!-- 検索機能end -->
                </ul>
            </nav>
            <!-- hamburger中身end -->
        </header>