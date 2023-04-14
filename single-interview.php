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
                    <?php
                        $eye_catching = get_field('eye_catching');
                        $image_id = attachment_url_to_postid( $eye_catching );
                        $image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
                    ?>
                    <?php if(!empty($eye_catching)): ?>
                    <img src="<?php echo $eye_catching; ?>" alt="<?php echo $image_alt; ?>">
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage/logo_eye_catch.png" alt="">
                    <?php endif; ?>
                </div>
                <div class="underimg text cafeinfo_flex flex">
                    <span class="address">
                        <?php echo $this_terms[1]->name; ?>
                    </span>
                    <span>
                        <?php echo do_shortcode('[wp_ulike]'); ?>
                    </span>
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