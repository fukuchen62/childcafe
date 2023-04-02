<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php

$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
        'paged' => get_query_var('paged') //何ページ目の情報を表示すれば良いか
	);
$the_query = new WP_Query($args);
?>

<main>
    <div class="main_inner relative">
        <h2 class="title">最新記事一覧</h2>
        <div class="news_flex">
            <div class="tcenter column">
                <?php if ($the_query->have_posts()) : ?>
                <?php while($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php get_sidebar('categories'); ?>
        </div>
    </div>
    <?php
    if (function_exists('wp_pagenavi')) {
						wp_pagenavi();
        }
    ?>
</main>
<?php get_footer(); ?>