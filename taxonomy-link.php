<?php get_header(); ?>
<?php
    //開いているページの情報を取得
    $link_slug = get_query_var('link');
    $link = get_term_by('slug', $link_slug, 'link');

    // $args = array(
    //     'post_type' => 'links',
    //     'tax_query' => array(
    //         array(
    //             'taxonomy' => 'link',
    //             'field' => 'term_id',
    //             'terms' => $link->term_id,
    //         ),
    //     ),
    // );
    // $the_query = new WP_Query($args);

?>

<!-- リンクエリア -->
<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <!-- 項目タブ -->
        <ul class="tab flex">
            <li class="tab_1 tab_js childcafe"><a href="<?php echo home_url('/link/cafe'); ?>">こども食堂関連</a></li>
            <li class="tab_2  tab_js childsupport"><a href="<?php echo home_url('/link/care'); ?>">子育て支援関連</a></li>
            <li class="tab_3  tab_js childplace"><a href="<?php echo home_url('/link/third'); ?>">こども居場所関連</a></li>
        </ul>
        <!-- 関連リンク -->
        <section class="link_<?php echo $link->slug; ?>" panel is-show >
            <h2 class="title"><?php echo $link->name; ?></h2>
            <div class="link_wrap">
                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : ?>
                <?php the_post(); ?>
                <div class="link">
                    <a href="<?php the_field('l_url'); ?>">
                        <?php the_field('l_name'); ?>
                    </a>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php if ($link->slug == 'cafe') : ?>
            <img class="apple" src="<?php echo get_template_directory_uri(); ?>/assets/images/link/apple.png" alt="背景画像りんご" />
            <?php elseif($link->slug == 'care') : ?>
            <img class="girl" src="<?php echo get_template_directory_uri(); ?>/assets/images/link/girl.png" alt="背景女の子" />
            <?php elseif($link->slug == 'third') : ?>
            <img class="veg" src="<?php echo get_template_directory_uri(); ?>/assets/images/link/veg.png" alt="背景野菜" />
            <?php endif; ?>
        </section>
    </div>
</main>
</div>
<!-- リンクエリア終了 -->

<?php get_footer(); ?>
