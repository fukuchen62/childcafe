<?php get_header(); ?>


<?php
	$args = array(
		'post_type' => 'interview',
		'posts_per_page' => 6,
        'orderby' => 'date',
        //ランダムにすると、ページを進めた時に再度ランダムになってしまう
        // 'orderby' => 'rand',
        'order' => 'ASC',
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
	);
	$the_query = new WP_Query($args);



    // いいねが押されている記事を取得し、いいね順にソート
// $like_posts = wp_ulike_get_popular_items_ids(
//             array(
//                 'type'       => 'post',
//                 'rel_type'   => 'interview',
//                 'status'     => 'like',
//                 'period'     => 'all',
//                 "is_popular" => true,
//                 )
//     );

// $like_posts = array(
//                         'type'       => 'post',
//                         'rel_type'   => 'interview',
//                         'period'     => 'all',
//                         'meta_query' => array(
//                             // 'relation' => 'OR',
//                                 array(
//                                     'key' => 'like_status',
//                                     'value' => 'like',
//                                     'compare' => '=',
//                                 )));

// いいねが押されていない記事をランダムに取得
// $not_like_posts =  array(
//         'post_type'      => 'interview', // カスタム投稿名
//         'posts_per_page' => -1,
//         'post__not_in'   => $like_posts, // いいねされている記事のIDを除外
//         'orderby'        => 'rand',
// );
// $the_query = new WP_Query($like_posts);

// いいねが押されている記事といいねが押されていない記事を順番を保ったままマージ
// $merged_posts = array_merge( $like_posts, wp_list_pluck( $not_like_posts, 'ID' ) );
// クエリを作成し、記事を取得
// $args = array(
//     'post_type'      => 'interview',
//     // 'post__in'       => $merged_posts,
//     'post__in'       => $like_posts,
//     'posts_per_page' => 6,
//     'orderby'        => 'post__in',
//     'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
// );

// $the_query = new WP_Query($args);

    // カスタムクエリを追加する前に、元のクエリを保存しておく
    // $original_query = $wp_query;

    // クエリを実行
    // $wp_query = new WP_Query($args);


?>
<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="pickup_title">
            <h2 class="title">
                特集記事 <br />
                Pick upインタビュー　一覧
            </h2>
            <div class="text">
                <div class="intro">
                    <p class="subtitle left">
                        Pick upインタビューとは
                    </p>
                    <p>
                        Pick up
                        インタビューは、こども食堂を運営している方に、熱い想いや、こども食堂の特色、おすすめポイントなどを取材した特集記事です！ぜひお読みください！
                    </p>
                </div>
            </div>
        </div>
        <div class="pickup_item pickup_flex">
            <?php if ($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
                <div class="item_card">
                    <?php
                        $eye_catching = get_field('eye_catching');
                        $image_id = attachment_url_to_postid( $eye_catching );
                        $image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
                    ?>
                    <?php if(!empty($eye_catching)): ?>
                    <img src="<?php echo $eye_catching; ?>" alt="<?php echo $image_alt; ?>">
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage/logo_eye_catch.png"
                        alt="">
                    <?php endif; ?>
                    <p class="item_card_title">
                        <?php the_field('title'); ?>
                    </p>
                    <p class="item_card_title border">
                        <span class="sp"><?php echo get_field('organizer'); ?></span>
                    </p>
                    <p class="item_card_text">
                        <?php
                        if (!empty(get_field('excerpt'))) {
                            echo get_field('excerpt') . '・・・';
                        }else{
                            echo '';
                        }
                        ?>
                    </p>
                </div>
            </a>
            <?php endwhile; ?>
            <?php endif ?>
            <?php wp_reset_postdata(); ?>
            <?php
            // 元のクエリを復元する
            // $wp_query = $original_query;
            ?>
        </div>
        <div class="page_nav flex">
            <?php original_pagenation(); ?>
        </div>

    </div>
</main>
</div>
<?php get_footer(); ?>