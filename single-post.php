<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$cat = get_the_category();
$cat = $cat[0];

$categories = get_categories();
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
        <div class="s-p_column">
            <!-- ページ分割の必要 -->
            <a href="#" class="btn">もっと見る</a>
            <a href="<?php echo home_url('/post'); ?>" class="news_btn">NEWS一覧</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>