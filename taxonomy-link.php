<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
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
        <!-- 項目タブ -->
        <ul class="tab flex">
            <li class="tab_1 tab_js childcafe"><a href="<?php echo home_url('/link/cafe'); ?>">こども食堂関連</a></li>
            <li class="tab_2  tab_js childsupport"><a href="<?php echo home_url('/link/care'); ?>">子育て支援関連</a></li>
            <li class="tab_3  tab_js childplace"><a href="<?php echo home_url('/link/third'); ?>">こども居場所関連</a></li>
        </ul>
        <!-- 関連リンク -->
        <section class="link_<?php echo $link->slug; ?>">
            <h2 class="title"><?php echo $link->name; ?>関連</h2>
            <div class="link_wrap">
                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : ?>
                <?php the_post(); ?>
                <div class="link">
                    <a href="<?php the_field('l_url'); ?>">
                        <img src="<?php the_field('l_img'); ?>" alt="リンク先バナー画像">
                    </a>
                    <p>
                        <?php the_field('l_desc'); ?>
                    </p>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>
</div>
<!-- リンクエリア終了 -->

<?php get_footer(); ?>