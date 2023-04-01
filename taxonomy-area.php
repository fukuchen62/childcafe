<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php
    //開いているページの情報を取得
    $area_slug = get_query_var('area');
    $area = get_term_by('slug', $area_slug, 'area');
    //開いているページの子カテゴリの情報を取得
    // $town_slug = get_query_var('area_child');
    // $town = get_term_by('slug', $town_slug, 'area');


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
            <li class="tab_east tab_js tab-A">
                <a href="<?php echo home_url('/area/east'); ?>">東部</a>
            </li>
            <li class="tab_south tab_js tab-B">
                <a href="<?php echo home_url('/area/south'); ?>">南部</a>
            </li>
            <li class="tab_west tab_js tab-C">
                <a href="<?php echo home_url('/area/west'); ?>">西部</a>
            </li>
        </ul>
        <!-- 市町村別一覧 -->
        <div class="list_area flex">
            <!-- 東部 -->
            <div class="area_list1 panel tab-<?php echo $area->name; ?> is-show">
                <!-- アルファベットではなく、tab_eastのようになると呼び出しがシンプル(echo $area->name;だけ)になるので,
                できれば変更お願いしたい（依頼） -->
                <h2 class="title"><?php echo $area->name; ?>市町村一覧</h2>
                <ul class="area_list_wrap flex">
                    <?php
                        $towns = get_terms(array(
                            'taxonomy' => 'area',
                            'parent' => $area->term_id,
                            //投稿がない場合でも表示させる
                            'hide_empty' => false,
                            'orderby' => 'date',
                            'order' => 'ASC',
                        ));
                        foreach ($towns as $town) {
                            echo '<li>'.$town->name.'（'.$town->count.'）'.'</li>';
                        }
                    ?>
                </ul>
            </div>
            <!-- 地域別食堂一覧 -->
            <div class="result_img">
                <h2 class="title result_title">〇〇市こども食堂一覧</h2>
                <div class="result_img_wrap flex">
                    <article class="result_img_card">
                        <img src="../assets/images/img7.jpg" alt="" />
                        <p>〇〇食堂</p>
                        <p>（〇〇市●●町）</p>
                    </article>
                    <article class="result_img_card">
                        <img src="../assets/images/img7.jpg" alt="" />
                        <p>〇〇食堂</p>
                        <p>（〇〇市●●町）</p>
                    </article>
                    <article class="result_img_card">
                        <img src="../assets/images/img7.jpg" alt="" />
                        <p>〇〇食堂</p>
                        <p>（〇〇市●●町）</p>
                    </article>
                    <article class="result_img_card">
                        <img src="../assets/images/img7.jpg" alt="" />
                        <p>〇〇食堂</p>
                        <p>（〇〇市●●町）</p>
                    </article>
                    <article class="result_img_card">
                        <img src="../assets/images/img7.jpg" alt="" />
                        <p>〇〇食堂</p>
                        <p>（〇〇市●●町）</p>
                    </article>
                    <article class="result_img_card">
                        <img src="../assets/images/img7.jpg" alt="" />
                        <p>〇〇食堂</p>
                        <p>（〇〇市●●町）</p>
                    </article>
                    <article class="result_img_card">
                        <img src="../assets/images/img7.jpg" alt="" />
                        <p>〇〇食堂</p>
                        <p>（〇〇市●●町）</p>
                    </article>
                </div>
            </div>
        </div>
        <!-- ページナビ -->
        <div class="page_nav flex">
            <div class="page_triangle_left"></div>
            <div class="page_number">1</div>
            <div class="page_number">2</div>
            <div class="page_number">3</div>
            <div class="page_triangle_right"></div>
        </div>
    </div>
</main>


<!-- <main class="main">
    <section class="sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4"> -->
<a href="<?php echo home_url('/area/east'); ?>" class="btn btn-default">東部<i class="fas fa-angle-right"></i></a>
</div>
<div class="col-md-4">
    <a href="<?php echo home_url('/area/south'); ?>" class="btn btn-default">南部<i class="fas fa-angle-right"></i></a>
</div>
<div class="col-md-4">
    <a href="<?php echo home_url('/area/west'); ?>" class="btn btn-default">西部<i class="fas fa-angle-right"></i></a>
</div>
</div>
</div>
</section>


<h2 class="pageTitle"><?php echo $area->name; ?>市町村一覧</h2>
<div class="faq_wrap">
    <?php
        $towns = get_terms(array(
            'taxonomy' => 'area',
            'parent' => $area->term_id,
        ));
            foreach ($towns as $town) {
                echo '<a href="'.get_term_link($town).'"><h3 class="title">'.$town->name.'</h3></a>';
            }
        ?>
</div>


<section class="sec">
    <div class="container">

        <div class="row">

            <?php if ($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <div class="col-md-4">
                <?php get_template_part('template-parts/loop', 'cafeinfo'); ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

        </div>

        <?php if (function_exists('wp_pagenavi')) {
						wp_pagenavi();
					} ?>
    </div>
</section>
</main>

<?php get_footer(); ?>