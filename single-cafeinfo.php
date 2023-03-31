<?php get_header(); ?>


<?php get_template_part('template-parts/breadcrumb'); ?>

<main class="main">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <?php if (is_month()): ?>
                <h2 class="main_title"><?php the_time('Y年m月'); ?></h2>
                <?php else: ?>
                <h2 class="main_title"><?php wp_title(''); ?></h2>
                <?php endif; ?>

                <div class="row">

                    <?php if (have_posts()) : ?>
                    <?php while(have_posts()) : the_post(); ?>
                    <div class="col-md-4">
                        <?php get_template_part('template-parts/loop', 'cafeinfo'); ?>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>

                <?php if (function_exists('wp_pagenavi')) {
						wp_pagenavi();
					} ?>

            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>