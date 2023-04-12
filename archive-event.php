<?php get_header(); ?>
<?php

$args = array(
		'post_type' => 'event',
        'meta_key' => 'class',
        //不定期のもの
        'meta_value' => 2,
		'posts_per_page' => -1,
        'paged' => get_query_var('paged') //何ページ目の情報を表示すれば良いか
	);
$the_query = new WP_Query($args);

$cafeinfo_id = get_field('id');
$this_terms = get_the_terms($cafeinfo_id,'area');

?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">開催情報一覧</h2>
        <div class="event_flex">
            <?php if ($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <?php
            $cafeinfo_id = get_field('id');
            $this_terms = get_the_terms($cafeinfo_id,'area');
            ?>
            <div class="event_item">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_field('eye_catching'); ?>" alt="pickup画像" />
                    <p class="event_item_card_title">
                        <!-- 日付表示加工予定 ◯月◯日-->
                        <?php echo get_field('datetime').'　'.$this_terms[1]->name; ?>
                    </p>
                    <p class="event_item_card_title border">
                        <?php echo get_field('name',$cafeinfo_id); ?>
                    </p>
                    <p class="event_text">
                        <?php if (!empty(get_field('appeal'))): ?>
                        <?php echo get_field('appeal'); ?>
                        <?php endif; ?>
                    </p>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <!-- ページナビ -->
        <div class="page_nav flex">
            <?php original_pagenation(); ?>
        </div>
        <style>
        .page-numbers {
            width: 37px;
            height: 37px;
            padding-top: 3px;
            background-color: #f7dd94;
            border-radius: 50px;
            text-align: center;
        }
        </style>
        <?php get_sidebar('categories'); ?>
    </div>
</main>
</div>

<?php get_footer(); ?>