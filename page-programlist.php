<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php
$args = array(
		'post_type' => 'cafeinfo',
        'meta_type' => 'amapro',
		'posts_per_page' => -1,
        'paged' => get_query_var('paged') //何ページ目の情報を表示すれば良いか
	);
$the_query = new WP_Query($args);
?>

<!-- 参加食堂一覧 -->
            <main>
                <div class="main_inner">
                    <div class="result_img">
                        <h2 class="title">参加こども食堂一覧</h2>
                        <div class="result_img_wrap flex">
                            <?php if ($the_query->have_posts()) : ?>
                                <?php while($the_query->have_posts()) : ?>
                                <?php $the_query->the_post(); ?>
                                <?php if(! empty(get_field('amapro'))): ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="result_img_card">

                                <?php $eye_catching = get_field('eye_catching');?>
                                <?php if(!empty($eye_catching)): ?>
        <img src="<?php the_field('eye_catching'); ?>" alt="">
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
        <?php endif; ?>

                                <p><?php the_field('name'); ?></p>
                                <p>（〇〇市●●町）</p>
                            </div>
                            </a>
                            <?php endif ?>
                            <?php endwhile; ?>
                                <?php endif ?>
                                <?php wp_reset_postdata(); ?>


                        </div>
                    </div>
                </div>
            </main>
            <!-- 参加食堂一覧 終了-->

<?php get_footer(); ?>
