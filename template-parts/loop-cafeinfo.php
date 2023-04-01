<a href="<?php the_permalink(); ?>">
    <?php if(has_post_thumbnail()): ?>
    <?php the_post_thumbnail('medium'); ?>
    <?php else: ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
    <?php endif; ?>

    <p>
        <?php the_title(); ?>
    </p>
</a>