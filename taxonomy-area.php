<?php get_header(); ?>

<?php
    //開いているページの情報を取得
    $area_slug = get_query_var('area');
    $area = get_term_by('slug', $area_slug, 'area');
    //開いているページの子カテゴリの情報を取得
    // $town_slug = get_query_var('area_child');
    // $town = get_term_by('slug', $town_slug, 'area')

    //市町村名が選択された場合は、親カテゴリーのエリアのIDを取得
    $parent_id = $area->parent != 0 ? $area->parent : $area->term_id;
    $parent_term = get_term($parent_id, 'area');

    $args = array(
        'post_type' => 'cafeinfo',
        'posts_per_page' => 9, //全件表示
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
        'tax_query' => array(
            array(
                'taxonomy' => 'area',
                'field' => 'term_id',
                'terms' => $area->term_id,
                'include_children' => true,
            ),
        ),
        // orderby => ,
    );

    // カスタムクエリを追加する前に、元のクエリを保存しておく
    $original_query = $wp_query;

    $the_query = new WP_Query($args);

    //市町村一覧
    $towns = get_terms(array(
    'taxonomy' => 'area',
    'parent' => $parent_term->term_id,
    //投稿がない場合でも表示させる
    // 'hide_empty' => false,
    // 'orderby' => 'modified',
    // 'order' => 'ASC',
));


?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>

        <!-- 地域別タブ -->
        <ul class="tab flex">
            <li class="tab_east tab_js east"><a href="<?php echo home_url('/area/east'); ?>">東部</a></li>
            <li class="tab_south tab_js south"><a href="<?php echo home_url('/area/south'); ?>">南部</a></li>
            <li class="tab_west tab_js west"><a href="<?php echo home_url('/area/west'); ?>">西部</a></li>
        </ul>
        <!-- 市町村別一覧 -->
        <div class="list_area flex">
            <div class="area_<?php echo $parent_term->slug; ?> panel east is-show">
                <h2 class="title"><?php echo $parent_term->name.'市町村一覧'; ?></h2>
                <ul class="area_list_wrap flex">
                    <?php foreach ($towns as $town) :  ?>
                    <li>
                        <?php if(! $town->count == 0) :?>
                        <a href="<?php echo get_term_link($town); ?>">
                            <?php echo $town->name.'（'.$town->count.'）'; ?>
                        </a>
                        <?php else: ?>
                        <?php echo $town->name.'（'.$town->count.'）'?>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- 地域別食堂一覧 -->
            <section class="result_img">
                <h2 class="title result_title">
                    <!-- 市町村名が選択された時は市町村名にするようにする -->
                    <?php echo $area->name; ?>こども食堂一覧
                </h2>
                <div class="result_img_wrap flex">
                    <?php if ($the_query->have_posts()) : ?>
                    <?php while($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <?php get_template_part('template-parts/loop', 'cafeinfo'); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php
                        // 元のクエリを復元する
                        $wp_query = $original_query;
                    ?>
                </div>
            </section>
        </div>
        <!-- ページナビ -->
        <div class="page_nav flex">
            <?php original_pagenation(); ?>
        </div>
        <style>
        .page-numbers {
            width: 37px;
            height: 37px;
            padding-top: 3px;
            background-color: #f7dd94;
            border-radius: 50px;
            text-align: center;
        }
        </style>
    </div>
</main>
</div>

<?php get_footer(); ?>