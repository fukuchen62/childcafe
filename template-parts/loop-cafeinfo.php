<div class="result_img_wrap flex">
    <a href="<?php the_permalink(); ?>">
        <article class="result_img_card">
            <img src="<?php the_field('eye_catching'); ?>" alt="">
            <p><?php the_field('name'); ?></p>
            <p>
                <?php
                    $this_terms = get_the_terms($post->ID,'area');
                    echo $this_terms[1]->name;
                ?>
            </p>
        </article>
    </a>
</div>