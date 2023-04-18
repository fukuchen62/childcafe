<?php get_header(); ?>
<?php
$cafeinfo_id = get_field('id');
$this_terms = get_the_terms($cafeinfo_id,'area');


// $heading = get_term('heading');

//インタビュー一覧
    $heading = get_terms(array(
    'taxonomy' => 'heading',
    // 投稿がない場合でも表示させる
    'hide_empty' => false,
    // 'orderby' => 'modified',
    // 'order' => 'ASC',
    )
);

?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="pickup_single">
            <h2 class="pickup_title_1 pickup_title">
                <!-- <span class="pickup_title sp">
                <?php //the_field('title'); ?>
            </span>
            <span class="pickup_title sp">
                <?php //echo the_field('organizer'); ?>
            </span> -->
                <!-- <span class="pickup_title sp"> -->
                <nobr>
                    <?php the_field('title'); ?>
                    <wbr>
                    <?php echo the_field('organizer'); ?>
                </nobr>
                <!-- </span> -->
            </h2>
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
            </div>
            <!-- インタビュー項目一覧 -->
            <div class="list_area area_flex">
                <div class="area_east">
                    <h3 class="area_title">インタビュー項目一覧</h3>
                    <ul class="area_list_wrap">
                        <?php foreach ($heading as $inter) :  ?>
                        <li>
                            <a href="<?php echo '#'.$inter->slug;?>">
                                <?php echo $inter->name; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- インタビュー部分 -->
                <div class="pickup_single">
                    <?php the_field('message'); ?>
                </div>
            </div>
            <div class="btn_item">
                <a href="<?php echo home_url('/cafeinfo/' . get_field('id')); ?>">食堂紹介へ</a>
            </div>
        </div>
    </div>
</main>
</div>

<?php get_footer(); ?>