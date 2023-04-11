<?php get_header(); ?>
<?php
$cat = get_the_category();
$cat = $cat[0];
?>

<main>
    <div class="main_inner relative">
        <?php get_template_part('template-parts/breadcrumb'); ?>
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