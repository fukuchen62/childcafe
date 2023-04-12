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
                    <div class="event_item_card">
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
                            <?php else : ?>
                            <?php echo get_field('features',$cafeinfo_id) ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

            <div class="page_nav flex pc_none">
                <?php
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                $paginate_format = '';
                $paginate_base = add_query_arg('paged','%#%');
                }else{
                $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                user_trailingslashit('page/%#%/','paged');
                $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $the_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<div class="page_triangle_left"></div>',
                'next_text' => '<div class="page_triangle_right"></div>',
                ));
            ?>

                <?php get_sidebar('categories'); ?>
            </div>
            <div class="page_nav flex sp_none">
                <?php
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                $paginate_format = '';
                $paginate_base = add_query_arg('paged','%#%');
                }else{
                $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                user_trailingslashit('page/%#%/','paged');
                $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $the_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<div class="page_triangle_left"></div>',
                'next_text' => '<div class="page_triangle_right"></div>',
                ));
            ?>
            </div>
</main>
</div>

<?php get_footer(); ?>