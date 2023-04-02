<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$cat = get_the_category();
$cat = $cat[0];
?>
<main>
    <div class="main_inner">
        <div class="news_title">
            <h2 class="title mb0"><?php the_title(); ?></h2>
            <div class="tag_box">
                <p class="category_tag"><?php echo $cat->cat_name; ?></p>
            </div>
        </div>
        <div class="s-p_between">
            <p class="text mt50">
                <?php the_content(); ?>
            </p>
            <?php get_sidebar('categories'); ?>
        </div>
        <div class="s-p_column">
            <!-- ページ分割の必要 -->
            <a href="#" class="btn">もっと見る</a>
            <a href="<?php echo home_url('/post'); ?>" class="news_btn">NEWS一覧</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>