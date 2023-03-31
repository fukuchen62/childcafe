<li>
    <a href="<?php the_permalink(); ?>">
        <?php if(has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium'); ?>
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
        <?php endif; ?>

        <p>
        <?php the_title(); ?>
        </p>
        <p>
        <?php
                //カスタムフィールドから主催者名を取得
                echo get_post_meta( get_the_ID(), 'organizer', true ). 'さん';
                ?>
        </p>
        <p>
        <?php
                //カスタムフィールドから概要を取得
                echo get_post_meta( get_the_ID(), 'excerpt', true );
        ?>
        </p>
    </a>
</li>