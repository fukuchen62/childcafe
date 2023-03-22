<a href="<?php the_permalink(); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class('news') ?>>
        <div class="faq_wrap">
            <div class="news_pic">
                <?php if(has_post_thumbnail()): ?>
                <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>
            </div>
            <div class="news_meta">
                <h2 class="news_title"><?php the_title(); ?></h2>
            </div>
        </div>
    </article>
</a>