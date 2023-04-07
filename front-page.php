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

//おしらせ一覧のサブクエリ
$args = array(
		'post_type' => 'post',
		'posts_per_page' => 2,
	);
$the_query = new WP_Query($args);


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


$fuga = array(
		'post_type' => 'event',
		'posts_per_page' => 2,
        //非公開のは出さないようにする！！
        'meta_key' => 'class',
        //不定期のもの
        'meta_value' => 2,
	);
$event_query = new WP_Query($fuga);

?>

<main class="main_index">
    <div class="main_inner">
        <!-- headerがposition fixedなのでheader分の余白調整のためblock -->
        <div class="block"></div>
        <!-- キービジュアル -->
        <section>
            <form class="hbg_search_pc" action="<?php echo home_url('/'); ?>" method="get">
                <input type="hidden" name="search_type" value="keywords">
                <input class="hbg_form" size="25" type="search" name="s" value="<?php the_search_query(); ?>" name="search" placeholder="キーワードを入力" id="" />
                <input class="hbg_submit fas" type="submit" value="">
            </form>
            <ul class="kv_slider">
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv_1.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv_2.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/delete/kv_3.jpg" alt="KV画像">
                </li>
            </ul>
        </section>
        <!-- このサイトについて -->
        <section class="about">
            <div class="section_inner niji_re">
                <div class="title">
                    <h2>このサイトについて</h2>
                </div>
                <div class="text niji">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/rainbow.png" alt="虹" class="rainbow">
                    <p>
                        徳島県には、こども食堂がたくさんあります。
                        ”こども食堂って何なの？という人”や、”こども食堂へ行ってみたい人・手伝いたい人・支援したい人”へ分かりやすく情報をお届けする！をスローガンにこのサイトを作りました。ぜひ、自分の家の近くのこども食堂を探して行ってみてください！

                    </p>
                    <a href="<?php echo home_url('/about'); ?>" class="btn_item">もっと見る</a>
                </div>
            </div>
            <div class="wave_mobile">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#fff8e6" fill-opacity="1" d="M0,192L48,170.7C96,149,192,107,288,106.7C384,107,480,149,576,181.3C672,213,768,235,864,218.7C960,203,1056,149,1152,122.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
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
                    <?php if ($event_query->have_posts()) : ?>
                    <?php while($event_query->have_posts()) : ?>
                    <?php $event_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <br>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <a href="<?php echo home_url('/event'); ?>" class="btn_item">もっと見る</a>
            </div>
        </section>
        <!-- Pick Upインタビュー一覧 -->
        <section class="interviews">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff8e6" fill-opacity="1" d="M0,160L60,170.7C120,181,240,203,360,197.3C480,192,600,160,720,138.7C840,117,960,107,1080,112C1200,117,1320,139,1380,149.3L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                </path>
            </svg>
            <div class="section_inner">
                <div class="title">
                    <h2>
                        特集記事 <br>
                        Pick Upインタビュー一覧
                    </h2>
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
                <path fill="#fff8e6" fill-opacity="1" d="M0,160L60,170.7C120,181,240,203,360,197.3C480,192,600,160,720,138.7C840,117,960,107,1080,112C1200,117,1320,139,1380,149.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </section>
        <!-- MAP -->
        <section class="map">
            <div class="section_inner">
                <div class="title">
                    <h2>MAP</h2>
                </div>
                <div class="map_pic">
                    <a href="<?php echo home_url('/area/east'); ?>" class="serch_btn north">東部</a>
                    <!-- クラス名をeastに変更依頼 -->
                    <a href="<?php echo home_url('/area/south'); ?>" class="serch_btn south">南部</a>
                    <a href="<?php echo home_url('/area/west'); ?>" class="serch_btn west">西部</a>
                    <img class="pic" src="<?php echo get_template_directory_uri(); ?>/assets/images/index/tokushima_map.png" alt="地図" />
                </div>

                <a href="<?php echo home_url('/search'); ?>" class="btn_item">条件からさがす</a>
            </div>
        </section>
        <!-- 子ども食堂とは -->
        <section class="childcafe">
            <div class="wave_mobile">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#fff8e6" fill-opacity="1" d="M0,128L60,106.7C120,85,240,43,360,64C480,85,600,171,720,181.3C840,192,960,128,1080,106.7C1200,85,1320,107,1380,117.3L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                    </path>
                </svg>
            </div>
            <div class="section_inner">
                <div class="title">
                    <h2>子ども食堂とは</h2>
                </div>
                <div class="with_onigiri">
                    <div class="text">
                        <p>
                            こども食堂は、子どもたちが安心して食事ができる場所で、食材を提供し、食事を作る場所です。多くは、地域のボランティアや市民団体などが運営しており、家庭の事情によって十分な食事を摂れない子どもたちに、無料または低額で食事を提供しています。
                        </p>
                    </div>
                    <img class="onigiri" src="<?php echo get_template_directory_uri(); ?>/assets/images/index/onigiri.png" alt="おにぎり">
                    <a href="<?php echo home_url('/concept'); ?>" class="btn_item">もっと見る</a>
                </div>
            </div>
            <div class="wave_mobile">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#fff8e6" fill-opacity="1" d="M0,128L60,106.7C120,85,240,43,360,64C480,85,600,171,720,181.3C840,192,960,128,1080,106.7C1200,85,1320,107,1380,117.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>
        <!-- 支援したい方へ -->
        <section class="surporters">
            <div class="section_inner">
                <div class="title">
                    <h2>支援したい方へ</h2>
                </div>
                <div class="shien_box">
                    <div class="text">
                        <p>
                            こども食堂は、ほとんどがボランティアスタッフで運営されています。
                            行政等からの助成金等がもらえる場合もありますが、それでは間に合わない事も多いです。
                            自分にできることから、支援してみませんか？
                            一言に”支援”と言っても、いくつかの方法があります。
                        </p>
                    </div>
                    <img class="mobile_pic" src="<?php echo get_template_directory_uri(); ?>/assets/images/index/yasai_mobile.png" alt="野菜を収穫した人" />
                    <img class="pc_pic" src="<?php echo get_template_directory_uri(); ?>/assets/images/index/yasai_pc.png" alt="野菜を収穫した人">
                </div>
                <a href="<?php echo home_url('/support'); ?>" class="btn_item">もっと見る</a>
            </div>
        </section>
        <!-- リンク集 -->
        <section class="link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff8e6" fill-opacity="1" d="M0,128L60,144C120,160,240,192,360,213.3C480,235,600,245,720,234.7C840,224,960,192,1080,181.3C1200,171,1320,181,1380,186.7L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                </path>
            </svg>
            <div class="section_inner">
                <div class="title">
                    <h2>リンク集</h2>
                </div>
                <div class="link_flex">
                    <a href="<?php echo home_url('/link/cafe'); ?>" class="btn_item">こども食堂関連</a>
                    <a href="<?php echo home_url('/link/care'); ?>" class="btn_item">子育て支援関連</a>
                    <a href="<?php echo home_url('/link/third'); ?>" class="btn_item">こどもの居場所関連</a>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff8e6" fill-opacity="1" d="M0,128L60,144C120,160,240,192,360,213.3C480,235,600,245,720,234.7C840,224,960,192,1080,181.3C1200,171,1320,181,1380,186.7L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </section>
        <!-- おしらせ -->
        <section class="notice">
            <div class="section_inner">
                <div class="title">
                    <h2>おしらせ</h2>
                </div>
                <div class="news">
                    <?php if ($the_query->have_posts()) : ?>
                    <?php while($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <!-- <br>タグは<p>タグでも構わない？ -->
                    <br>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <a href="<?php echo home_url('/post'); ?>" class="btn_item">もっとみる</a>
            </div>
        </section>
        <!-- お問い合わせ -->
        <section class="contact">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff8e6" fill-opacity="1" d="M0,96L60,117.3C120,139,240,181,360,170.7C480,160,600,96,720,80C840,64,960,96,1080,122.7C1200,149,1320,171,1380,181.3L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                </path>
            </svg>
            <div class="section_inner">
                <div class="title">
                    <h2>お問い合わせ</h2>
                </div>
                <a href="<?php echo home_url('/contact'); ?>" class="btn_item">お問い合わせはこちら</a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff8e6" fill-opacity="1" d="M0,96L60,117.3C120,139,240,181,360,170.7C480,160,600,96,720,80C840,64,960,96,1080,122.7C1200,149,1320,171,1380,181.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
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
        <!-- メインインナー終わり -->
    </div>
</main>
</div>
<?php get_footer(); ?>