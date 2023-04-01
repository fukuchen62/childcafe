<?php get_header(); ?>
<?php
// $custom_query = new WP_Query(
//     array(
//         $post__in = wp_ulike_get_popular_items_ids(array(
//             'type'       => 'post',
//             'rel_type'   => 'interview',
//             'status'     => 'like',
//             'period'     => 'all',
//         )),
//         'posts_per_page' => -1, // 全件表示
//         'post__in' => $post__in,
//         'post_type' => 'interview', // カスタム投稿名
//         'orderby' => 'post__in',
//         'order' => 'DESC' // いいねの降順
//     )
// );

    // $post__in = array(
    //                     'type'       => 'post',
    //                     'rel_type'   => 'interview',
    //                     'period'     => 'all',
    //                     'meta_query' => array(
    //                         'relation' => 'OR',
    //                             array(
    //                                 'key' => 'like_status',
    //                                 'value' => 'like',
    //                                 'compare' => '=',
    //                             ),
    //                             array(
    //                                 'relation' => 'AND',
    //                                 array(
    //                                     'key' => 'like_status',
    //                                     'value' => '',
    //                                     'compare' => '=',
    //                                 ),
    //                                 array(
    //                                     'key' => 'like_count',
    //                                     'value' => '0',
    //                                     'compare' => '=',
    //                                 ),
    //                                 'orderby' => 'rand'
    //                             )
    //                         ));

//     //いいねされている記事を取得
//     $like_posts = wp_ulike_get_popular_items_ids(
//     array(
//         'type'       => 'post',
//         'rel_type'   => 'interview',
//         'status'     => 'like',
//         'period'     => 'all',
//     )
// );

// // いいねが設定されていない記事を取得
// $not_like_posts = array(
//     'post_type'      => 'interview', // カスタム投稿名
//     'meta_query'     => array(
//         'relation' => 'OR',
//         array(
//             'key'     => 'like_status',
//             'compare' => 'NOT EXISTS',
//         ),
//         array(
//             'relation' => 'AND',
//             array(
//                 'key'     => 'like_status',
//                 'value'   => '',
//                 'compare' => '!=',
//             ),
//             array(
//                 'key'     => 'like_count',
//                 'value'   => '0',
//                 'compare' => '>',
//                 'type'    => 'NUMERIC',
//             ),
//         ),
//     ),
//     'post__not_in' => $like_posts,
//     'orderby'      => 'rand'
// );

// // 2つの配列をマージ
// $post__in = array_merge( $like_posts, $not_like_posts );

//     $hoge = array(
//         'posts_per_page' => -1, // 全件表示
//         'post__in' => $post__in,
//         'post_type' => 'interview', // カスタム投稿名
//         'orderby' => 'post__in',
//         'order' => 'DESC' // いいねの降順
//     );
//     $custom_query = new WP_Query($hoge);




// いいねが押されている記事を取得し、いいね順にソート
$like_posts = wp_ulike_get_popular_items_ids(
    array(
        'type'       => 'post',
        'rel_type'   => 'interview',
        'status'     => 'like',
        'period'     => 'all',
    )
);
// いいねが押されていない記事をランダムに取得
$not_like_posts = get_posts(
    array(
        'post_type'      => 'interview', // カスタム投稿名
        'posts_per_page' => -1,
        'post__not_in'   => $like_posts, // いいねされている記事のIDを除外
        'orderby'        => 'rand',
    )
);
// いいねが押されている記事といいねが押されていない記事を順番を保ったままマージ
$merged_posts = array_merge( $like_posts, wp_list_pluck( $not_like_posts, 'ID' ) );
// クエリを作成し、記事を取得
$custom_query = new WP_Query( array(
    'post_type'      => 'interview',
    'post__in'       => $merged_posts,
    'orderby'        => 'post__in',
    'posts_per_page' => -1,
) );























	// $hoge = array(
	// 	'post_type' => 'interview',
	// 	'posts_per_page' => -1, //全件表示
    //     'orderby' => 'rand',
	// );
	// $custom_query = new WP_Query($hoge);
?>

<main class="main_index">
    <div class="main_inner">
        <!-- headerがposition fixedなのでheader分の余白調整のためblock -->
        <div class="block"></div>
        <!-- キービジュアル -->
        <section>
            <form class="hbg_search_pc" action="<?php echo home_url('/'); ?>" method="get">
                <input type="hidden" name="search_type" value="keywords" />
                <input class="hbg_form" size="25" type="search" name="s" value="<?php the_search_query(); ?>" name="search" placeholder="キーワードを入力" id="clearbutton7" />
                <input class="hbg_submit fas" type="submit" value="   " />
            </form>
            <ul class="kv_slider">
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv1_kari.jpg" alt="KV画像"></li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv2_kari.jpg" alt="KV画像"></li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv3_kari.jpg" alt="KV画像"></li>
            </ul>
        </section>
        <!-- このサイトについて -->
        <section class="about">
            <div class="section_inner niji_re">
                <div class="title">
                    <h2>このサイトについて</h2>
                </div>
                <div class="text niji">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/20220819_2_虹_01_1.png" alt="虹" class="rainbow">
                    <p>
                        テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                    </p>
                    <a href="#" class="btn_item">もっと見る</a>
                </div>
            </div>
            <div class="wave_mobile">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#fff8e6" fill-opacity="1" d="M0,192L48,170.7C96,149,192,107,288,106.7C384,107,480,149,576,181.3C672,213,768,235,864,218.7C960,203,1056,149,1152,122.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
        </section>
        <!-- 今月の開催一覧 -->
        <section class="info">
            <div class="section_inner">
                <div class="title">
                    <h2>開催情報</h2>
                </div>
                <div class="text_box">
                    <a href="#">3/1　テキストテキスト</a><br>
                    <a href="#">3/2　テキストテキスト</a>
                </div>

                <a href="<?php echo home_url('event'); ?>" class="btn_item">もっと見る</a>

            </div>
        </section>

        <!-- Pick Upインタビュー一覧 -->
        <section class="interviews">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff8e6" fill-opacity="1" d="M0,160L60,170.7C120,181,240,203,360,197.3C480,192,600,160,720,138.7C840,117,960,107,1080,112C1200,117,1320,139,1380,149.3L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
            </svg>
            <div class="section_inner">
                <div class="title">
                    <h2>Pick Upインタビュー一覧</h2>
                </div>
                <div class="pickup_slide">
                    <ul class="pickup_slider flex">
                        <?php if ($custom_query->have_posts()) : ?>
                        <?php while($custom_query->have_posts()) : ?>
                        <?php $custom_query->the_post(); ?>
                        <?php get_template_part('template-parts/loop', 'interview'); ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
                <a href="<?php echo home_url('/interview'); ?>" class="btn_item">もっと見る</a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff8e6" fill-opacity="1" d="M0,160L60,170.7C120,181,240,203,360,197.3C480,192,600,160,720,138.7C840,117,960,107,1080,112C1200,117,1320,139,1380,149.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </section>

        <section class="sec">
            <div class="container">
                <header class="sec_header">
                    <h2 class="title">エリアから探す</h2>
                </header>

                <div class="row">
                    <div class="col-md-4">
                        <a href="<?php echo home_url('/area/east'); ?>" class="btn btn-default">東部<i class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo home_url('/area/south'); ?>" class="btn btn-default">南部<i class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo home_url('/area/west'); ?>" class="btn btn-default">西部<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="sec">
            <div class="container">
                <header class="sec_header">
                    <h2 class="title">こども食堂とは</h2>
                </header>

                <div class="row">
                    <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
                </div>

                <p class="sec_btn">
            <a href="<?php echo home_url('/concept'); ?>" class="btn btn-default">もっとみる<i class="fas fa-angle-right"></i></a>
        </p>

            </div>
        </section>

        <section class="sec">
            <div class="container">
                <header class="sec_header">
                    <h2 class="title">支援者の方へ</h2>
                </header>

                <div class="row">
                    <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
                </div>

                <p class="sec_btn">
            <a href="<?php echo home_url('/support'); ?>" class="btn btn-default">もっとみる<i class="fas fa-angle-right"></i></a>
        </p>

            </div>
        </section>

        <!-- 活動風景 -->
        <section class="activity">
            <div class="title">
                <h2>活動の様子</h2>
            </div>

            <!-- 活動風景スライド -->
            <div class="activity_slide">
                <div class="activity_slider">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv1_kari.jpg" alt="">
                </div>
                <div class="activity_slider">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv2_kari.jpg" alt="">
                </div>
                <div class="activity_slider">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv3_kari.jpg" alt="">
                </div>
                <div class="activity_slider">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/slide4_kari.jpg" alt="">
                </div>
                <div class="activity_slider">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv1_kari.jpg" alt="">
                </div>
                <div class="activity_slider">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv2_kari.jpg" alt="">
                </div>
                <div class="activity_slider">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv3_kari.jpg" alt="">
                </div>
                <div class="activity_slider">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/slide4_kari.jpg" alt="">
                </div>
            </div>
        </section>

        <section class="sec">
            <div class="container">
                <header class="sec_header">
                    <h2 class="title">リンク集</h2>
                </header>

                <div class="row">
                    <div class="col-md-4">
                        <a href="<?php echo home_url('/links/cafe'); ?>" class="btn btn-default">こども食堂関連<i class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo home_url('/links/care'); ?>" class="btn btn-default">子育て支援関連<i class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo home_url('/links/third'); ?>" class="btn btn-default">第三の居場所関連<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>



        <?php get_footer(); ?>