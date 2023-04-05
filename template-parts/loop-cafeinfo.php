<a href="<?php the_permalink(); ?>">
    <article class="result_img_card">
        <?php $eye_catching = get_field('eye_catching');?>
        <?php if(!empty($eye_catching)): ?>
        <img src="<?php the_field('eye_catching'); ?>" alt="">
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
        <?php endif; ?>
        <p>
            <?php the_field('name'); ?></p>
        <p>
            <?php
                    $this_terms = get_the_terms($post->ID,'area');
                    echo $this_terms[1]->name;
                ?>
        </p>
    </article>
</a>