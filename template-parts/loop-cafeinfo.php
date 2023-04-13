<?php
$this_terms = get_the_terms($post->ID,'area');
?>

<a href="<?php the_permalink(); ?>">
    <article class="area_item_card">
        <?php $eye_catching = get_field('eye_catching');?>
        <?php if(!empty($eye_catching)): ?>
        <img src="<?php the_field('eye_catching'); ?>" alt="">
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
        <?php endif; ?>
        <p class="area_item_card_title">
            <?php the_field('name'); ?></p>
        <p class="area_item_card_title border">
            <?php
                echo $this_terms[1]->name;
            ?>
        </p>
        <p class="area_text">
            <?php
            //整形したい文字列
            if (!empty(get_field('features'))) {
                $features = get_field('features');
                //40文字にする
                if(mb_strlen($features) > 40) {
                    $features = mb_substr($features,0,40);
                    echo $features . '・・・' ;
                } else {
                    echo $features;
                }
            }
            ?>
        </p>
    </article>
</a>