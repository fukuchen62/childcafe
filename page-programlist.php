<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php
// $args = array(
// 		'post_type' => 'cafeinfo',
//         'meta_type' => 'amapro',
// 		'posts_per_page' => -1,
//         'paged' => get_query_var('paged') //何ページ目の情報を表示すれば良いか
// 	);
// $the_query = new WP_Query($args);
?>

<?php
$args = array(
		'post_type' => 'cafeinfo',
        'posts_per_page' => 6,
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
        'meta_query' => array(
            array(
                'key' => 'amapro',
                'value' => 'http',
                'compare' => 'LIKE',
            )
            )
            );

$the_query = new WP_Query($args);
?>



<!-- 参加食堂一覧 -->
<main>
    <div class="main_inner">

        <h2 class="title">参加こども食堂一覧</h2>
        <div class="amazon_item">
            <?php if ($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>

            <?php //if(! empty(get_field('amapro'))): ?>

            <a href="<?php the_permalink(); ?>">
                <div class="item_card">

                    <?php $eye_catching = get_field('eye_catching');?>
                    <?php if(!empty($eye_catching)): ?>
                    <img src="<?php the_field('eye_catching'); ?>" alt="">
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage/logo_eye_catch.png"
                        alt="">
                    <?php endif; ?>

                    <p class="item_card_title"><?php the_field('name'); ?></p>
                    <?php $this_terms = get_the_terms($post->ID,'area'); ?>
                    <p class="item_card_title border"><?php echo '(' . $this_terms[1]-> name . ')' ; ?></p>
                    <a class="btn_item" href="<?php the_field('amapro'); ?>">Amazon応援プログラム</a>
                    <!-- <p class="amazon_text">
                        <?php
                            //整形したい文字列
                        //     if (!empty(get_field('features'))) {
                        //         $features = get_field('features');
                        //         //40文字にする
                        //         if(mb_strlen($features) > 40) {
                        //             $features = mb_substr($features,0,40);
                        //             echo $features . '・・・' ;
                        //         } else {
                        //             echo $features;
                        //         }
                        //     }
                        // ?>
                    </p> -->
                </div>
            </a>
            <?php //endif ?>


            <?php endwhile; ?>
            <?php endif ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                ?>

        <?php if ($paged != 1): ?>
        <div class="page_nav flex">
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

            <?php //original_pagenation(); ?>

        </div>
        <?php endif ?>

    </div>
</main>
</div>
<!-- 参加食堂一覧 終了-->

<?php get_footer(); ?>