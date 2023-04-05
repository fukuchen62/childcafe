<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php
    //開いているページの情報を取得
    $area_slug = get_query_var('area');
    $area = get_term_by('slug', $area_slug, 'area');
    //開いているページの子カテゴリの情報を取得
    // $town_slug = get_query_var('area_child');
    // $town = get_term_by('slug', $town_slug, 'area')

    $args = array(
        'post_type' => 'cafeinfo',
        'tax_query' => array(
            array(
                'taxonomy' => 'area',
                'field' => 'term_id',
                'terms' => $area->term_id,
                'include_children' => true,
            ),
        ),
    );
    $the_query = new WP_Query($args);

?>

<main>
    <div class="main_inner">
        <!-- 地域別タブ -->
        <ul class="tab flex">
            <li class="tab_east tab_js east"><a href="<?php echo home_url('/area/east'); ?>">東部</a></li>
            <li class="tab_south tab_js south"><a href="<?php echo home_url('/area/south'); ?>">南部</a></li>
            <li class="tab_west tab_js west"><a href="<?php echo home_url('/area/west'); ?>">西部</a></li>
        </ul>
        <!-- 市町村別一覧 -->
        <div class="list_area flex">
            <!-- 東部 -->
            <div class="area_<?php echo $area->slug; ?> panel east is-show">
                <h2 class="title"><?php echo $area->name; ?>東部市町村一覧</h2>
                <ul class="area_list_wrap flex">
                    <?php
                        $towns = get_terms(array(
                            'taxonomy' => 'area',
                            'parent' => $area->term_id,
                            //投稿がない場合でも表示させる
                            'hide_empty' => false,
                            'orderby' => 'modified',
                            'order' => 'ASC',
                        ));
                        foreach ($towns as $town) {
                            echo '<li><a href="'.get_term_link($town).'">'.$town->name.'（'.$town->count.'）'.'</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <!-- 地域別食堂一覧 -->
            <section class="result_img">
                <h2 class="title result_title">
                    <!-- 市町村名が選択された時は市町村名にするようにする -->
                    <?php echo $area->name; ?>こども食堂一覧
                </h2>
                <?php if ($the_query->have_posts()) : ?>
                <?php while($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <?php get_template_part('template-parts/loop', 'cafeinfo'); ?>

                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </section>
        </div>
        <!-- ページナビ -->
        <?php
            //自作検討する（仮で常時表示中）
            if (function_exists('wp_pagenavi')) {
                wp_pagenavi();
            }
        ?>
    </div>
</main>

<?php get_footer(); ?>