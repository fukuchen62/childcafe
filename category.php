<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$categories = get_categories();
?>

<main>
    <div class="main_inner relative">
        <h2 class="title"><?php the_category(); ?>記事一覧</h2>
        <div class="news_flex">
            <div class="tcenter column">
                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : ?>
                <?php the_post(); ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="category_list">
                <h2 class="category_title">カテゴリー一覧</h2>
                <div class="bgcnone column">
                    <?php
                    foreach ($categories as $category) {
                    echo '<a href="'.get_category_link($category->term_id).'" class="category_item">'.$category->name
                    .'</a>';
                    }
                    ?>
                    <a href="<?php echo home_url('/event'); ?>" class="category_item">次回開催</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (function_exists('wp_pagenavi')) {
						wp_pagenavi();
        }
    ?>
</main>
<?php get_footer(); ?>