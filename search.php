<?php get_header(); ?>
<?php
// $eye_catching = get_post_meta($post->ID, 'eye_catching', true);
// $eye_catching = get_field('eye_catching');
?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="result_img">
            <h2 class="title">「<?php the_search_query(); ?>」検索結果一覧</h2>
            <div class="result_img_wrap flex">
                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : ?>
                <?php the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <article class="result_img_card">
                        <?php if(! empty(get_field('eye_catching'))): ?>
                        <img src="<?php the_field('eye_catching'); ?>" alt="">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
                        <?php endif; ?>
                        <p><?php the_title(); ?></p>
                        <p>（〇〇市●●町）</p>
                    </article>
                </a>
                <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
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



<?php get_footer(); ?>