<?php get_header(); ?>
<?php
$cafeinfo_id = get_field('id');
$this_terms = get_the_terms($cafeinfo_id,'area');
?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="pickup_title_1">
            <span class="pickup_title sp">
                <?php the_field('title'); ?>
            </span>
            <span class="pickup_title sp">
                <?php echo the_field('organizer'); ?>
            </span>
        </h2>
        <div class="pickup_single">
            <div class="pickup_top_img">
                <div class="pickup_single_img">
                    <img src="<?php the_field('eye_catching'); ?>" alt="PickUp画像" />
                </div>
                <div class="underimg text cafeinfo_flex flex">
                    <p class="address">
                        <?php echo $this_terms[1]->name; ?>
                    </p>
                    <p>
                        <?php echo do_shortcode('[wp_ulike]'); ?>
                    </p>
                </div>
            </div>
            <div class="pickup_single">
                <?php the_field('message'); ?>
            </div>
            <div class="btn btn_item">
                <a href="<?php echo home_url('/cafeinfo/' . get_field('id')); ?>">食堂紹介へ</a>
            </div>
        </div>
    </div>
</main>
</div>

<?php get_footer(); ?>