<?php get_header(); ?>
<?php
    //開いているページの情報を取得
    $link_slug = get_query_var('link');
    $link = get_term_by('slug', $link_slug, 'link');

    $args = array(
        'post_type' => 'links',
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
        'orderby' => 'menu_order',
        'order' => ' ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'link',
                'field' => 'term_id',
                'terms' => $link->term_id,
            ),
        ),
    );
    $the_query = new WP_Query($args);

?>

<!-- リンクエリア -->
<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">リンク集</h2>
        <!-- 項目タブ -->
        <ul class="tab flex">
            <li class="tab_1 tab_js childcafe"><a class="tab_hover01"
                    href="<?php echo home_url('/link/cafe'); ?>">こども食堂関連</a></li>
            <li class="tab_2  tab_js childsupport"><a class="tab_hover02"
                    href="<?php echo home_url('/link/care'); ?>">子育て支援関連</a></li>
            <li class="tab_3  tab_js childplace"><a class="tab_hover03"
                    href="<?php echo home_url('/link/third'); ?>">こども居場所関連</a></li>
        </ul>
        <!-- 関連リンク -->
        <section class="link_<?php echo $link->slug; ?>" panel is-show>
            <h3 class="link_title link_title_<?php echo $link->slug; ?>"><?php echo $link->name; ?></h3>
            <div class="link_wrap">
                <?php if ($the_query->have_posts()) : ?>
                <?php while($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <a class="link_a" href="<?php the_field('l_url'); ?>">
                    <div class="link_item">
                        <p class="link_item_name">
                            <?php the_field('l_name'); ?>
                        </p>
                        <p>
                            <?php the_field('l_desc'); ?>
                        </p>
                    </div>
                </a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php if ($link->slug == 'cafe') : ?>
            <img class="apple" src="<?php echo get_template_directory_uri(); ?>/assets/images/link/apple.png"
                alt="背景画像りんご" />
            <?php elseif($link->slug == 'care') : ?>
            <img class="girl" src="<?php echo get_template_directory_uri(); ?>/assets/images/link/girl.png"
                alt="背景女の子" />
            <?php elseif($link->slug == 'third') : ?>
            <img class="veg" src="<?php echo get_template_directory_uri(); ?>/assets/images/link/veg.png" alt="背景野菜" />
            <?php endif; ?>
            <!-- ページナビ -->
            <?php original_pagenation(); ?>
        </section>
    </div>
</main>
</div>
<!-- リンクエリア終了 -->

<?php get_footer(); ?>