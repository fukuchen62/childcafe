<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$cafeinfo_id = get_field('id');
$this_terms = get_the_terms($cafeinfo_id,'area');
?>

<main>
    <div class="main_inner">
        <div class="pickup_single_title">
            <h2 class="title">
                <?php the_field('title'); ?><br>
                <?php the_field('organizer'); ?>
            </h2>
        </div>
        <div class="pickup_single_img">
            <!-- imgは直接のURLがいいかもしれない？？そうでないと表示されない -->
            <img src="<?php the_field('eye_catching'); ?>" alt="PickUp画像" />
        </div>
        <div class="good flex">
            <p class="address">
            <?php
            echo $this_terms[1]->name;
            ?>
            </p>
            <p><?php echo do_shortcode('[wp_ulike]'); ?></p>
        </div>
        <div class="pickup_single">
            <?php the_field('message'); ?>
        </div>
        <div class="btn btn_pickup_single">
            <a href="<?php echo home_url('/cafeinfo/' . get_field('id')); ?>">食堂詳細へ</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>