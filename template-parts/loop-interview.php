<li>
    <a href="<?php the_permalink(); ?>">
        <?php $eye_catching = get_field('eye_catching');?>
        <?php if(!empty($eye_catching)): ?>
        <img src="<?php the_field('eye_catching'); ?>" alt="">
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
        <?php endif; ?>
        <p>
            <?php the_field('title'); ?>
        </p>
        <p>
            <?php echo get_field('name') . 'さん'; ?>
        </p>
        <p>
            <?php
                if (!empty(get_field('excerpt'))) {
                    echo get_field('excerpt') . '・・・';
                }else{
                    echo '';
                }
            ?>
        </p>
    </a>
</li>