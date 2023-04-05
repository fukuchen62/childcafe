<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php

$args = array(
		'post_type' => 'event',
        'meta_key' => 'class',
        //不定期のもの
        'meta_value' => 2,
		'posts_per_page' => -1,
        'paged' => get_query_var('paged') //何ページ目の情報を表示すれば良いか
	);
$the_query = new WP_Query($args);
?>

<main>
    <div class="main_inner">
        <h2 class="title">開催情報一覧</h2>
        <div class="ivent_item ivent_flex">
            <?php if ($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <div class="ivent_item_card">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_field('eye_catching'); ?>" alt="pickup画像" />
                    <p>3月1日　徳島市（現在静的）</p>
                    <p><?php the_field('name',324); ?>　開催のお知らせ</p>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php
            if (function_exists('wp_pagenavi')) {
                wp_pagenavi();
                }
            ?>
        <?php get_sidebar('categories'); ?>
    </div>
</main>

<?php get_footer(); ?>