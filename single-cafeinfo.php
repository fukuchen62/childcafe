<?php get_header(); ?>


<?php get_template_part('template-parts/breadcrumb'); ?>

<main>
    <div class="main_inner">
        <!-- ページトップ -->
        <?php if (have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/loop', 'cafeinfo'); ?>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>