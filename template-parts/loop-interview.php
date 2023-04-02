<li>
    <a href="<?php the_permalink(); ?>">
        <?php $eye_catching = get_post_meta($post->ID, 'eye_catching', true);?>
        <?php if(!empty($eye_catching)): ?>
        <img src="<?php the_field('eye_catching'); ?>" alt="">
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
        <?php endif; ?>
        <p>
            <?php the_field('title'); ?>
        </p>
        <p>
            <?php the_field('name'); ?>さん
        </p>
        <p>
            <?php the_field('excerpt'); ?>
        </p>
    </a>
</li>