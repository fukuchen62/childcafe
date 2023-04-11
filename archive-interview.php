<?php get_header(); ?>
<?php
	$args = array(
		'post_type' => 'interview',
		'posts_per_page' => 6, //全件表示
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
	);
	$the_query = new WP_Query($args);

    // カスタムクエリを追加する前に、元のクエリを保存しておく
    $original_query = $wp_query;

    // クエリを実行
    $wp_query = new WP_Query($args);
?>
<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="pickup_title">
            <h2 class="title">特集記事　一覧</h2>
            <div class="text">
                <div class="intro">
                    <p class="subtitle left">特集記事とは</p>
                    <p>
                        Pick up
                        インタビューは、こども食堂を運営している方に、熱い想いや、こども食堂の特色、おすすめポイントなどを取材した特集記事です！ぜひお読みください！
                    </p>
                </div>
            </div>
        </div>
        <div class="pickup_item pickup_flex">
            <?php if ($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <div class="pickup_item_card">
                <a href="<?php the_permalink(); ?>">
                    <?php $eye_catching = get_field('eye_catching');?>
                    <?php if(!empty($eye_catching)): ?>
                    <img src="<?php the_field('eye_catching'); ?>" alt="">
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
                    <?php endif; ?>
                    <p><?php the_field('title'); ?>　<?php echo get_field('name') . 'さん'; ?></p>
                    <p>
                        <?php
                        if (!empty(get_field('excerpt'))) {
                            echo get_field('excerpt') . '・・・';
                        }else{
                            echo '';
                        }
                        ?>
                    </p>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif ?>
            <?php wp_reset_postdata(); ?>
            <?php
            // 元のクエリを復元する
            $wp_query = $original_query;
            ?>
        </div>

        <?php
            // if(function_exists('wp_paginate')) { wp_paginate(); }
        ?>

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