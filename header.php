<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
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
            <form action="<?php echo home_url('/'); ?>" method="get" class="header_search">
                <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="キーワードを入力">
                <i class="fas fa-search"></i>
            </form>

        </div>


    </header>