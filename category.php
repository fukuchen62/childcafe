<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$cat = get_the_category();
$cat = $cat[0];
?>

<main>
    <div class="main_inner relative">
        <h2 class="title"><?php echo $cat->cat_name; ?>記事一覧</h2>
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