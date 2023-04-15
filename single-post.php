<?php get_header(); ?>
<?php
$cat = get_the_category();
$cat = $cat[0];
?>
<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="news_title">
            <h2 class="title mb0"><?php the_title(); ?></h2>
            <div class="tag_box">
                <p class="category_tag"><?php echo $cat->cat_name; ?></p>
            </div>
        </div>
        <div class="s-p_between">
            <div class="text">
                <?php the_content(); ?>
            </div>
            <div class="s-p_column pc_none">
                <a href="<?php echo home_url('/post'); ?>" class="btn_item">おしらせ一覧</a>
            </div>
            <?php get_sidebar('categories'); ?>
        </div>
        <div class="s-p_column sp_none">
            <a href="<?php echo home_url('/post'); ?>" class="btn_item">おしらせ一覧</a>
        </div>
    </div>
</main>
</div>

<?php get_footer(); ?>