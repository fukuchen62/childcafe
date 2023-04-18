<?php get_header(); ?>
<?php
// $eye_catching = get_post_meta($post->ID, 'eye_catching', true);
// $eye_catching = get_field('eye_catching');


if (isset($_GET['s'])) {
$keywords = $_GET['s'];
}

$eventbase = array(
    'post_type' => 'event',
    'fields' => 'ids',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'class',
            'value' => 1,
            // 'compare' => '=',
        ),
    )
);

$eventbase_query = new WP_Query($eventbase);

$eventbase_ids = array(); // IDを格納する配列を用意する

if ($eventbase_query->have_posts()) {
    $event_ids = $eventbase_query->posts; // $postsプロパティからIDを取得して配列に格納する
}

$post__not_in = $event_ids;
$post__not_in[] = 771;
$post__not_in[] = 774;


$args = array(
'post_type' => array('page','cafeinfo','interview','event') ,
'posts_per_page' => 6,
'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
'post_status' => 'publish', // 公開された投稿を指定
's' => $keywords,
'post__not_in' => array(771,774,$event_ids),
'post__not_in' =>  $post__not_in,
    // 'relation' => 'OR',
    //     array(
            // 'post_type' => 'cafeinfo' ,
            // 'tax_query' => array(
            //     // 'relation' => 'AND',
            //         array(
            //             'taxonomy' => 'area',           //タクソノミー：『エリア』
            //             'field' => 'name',
            //             'terms' => $keywords,
            //             // 'include_children' => true,
            //             'operator' => 'LIKE',
            //         ),
            //     )
                    // )

);

// $taxquerysp = ['relation' => 'OR'];

// $taxquerysp[] = [
//         'taxonomy' => 'area',           //タクソノミー：『エリア』
//         'field' => 'name',
//         'terms' => $keywords,
//         // 'compare' => 'LIKE',
// ];


    // $args['tax_query'] = $taxquerysp;

$wp_query = new WP_Query($args);

// $query = $wp_query;

// $args = $wp_query->query_vars;
// $wp_query->query_vars['posts_per_page'] = 6;
// $wp_query->tax_query->queries = array(
// 'taxonomy' => 'area',
// 'field' => 'name',
// 'terms' => get_search_query(),
// 'compare' => 'LIKE',
// );

// $wp_query-> WP_Tax_Query Object['tax_query'] = [['taxonomy' => 'area']];
// 'taxonomy' => 'area'
// $wp_query['tax_query'] = [['taxonomy' => 'area']];

new WP_Query($wp_query);

?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="search_inner">
            <?php //print_r($args) ;?>
            <?php //print_r( $eventbase) ;?>

            <h2 class="title"><?php echo '「'. $keywords . '」の検索結果一覧'; ?></h2>
            <!-- <h2 class="title"><?php //echo '「'. get_search_query() . '」の検索結果一覧'; ?></h2> -->
            <div class="search_item search_flex">
                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : ?>
                <?php the_post(); ?>

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
                            <?php the_title(); ?>
                        </p>
                        <p class="item_card_title border">
                            <?php $this_terms = get_the_terms($post->ID,'area');?>
                            <?php if(!empty($this_terms)): ?>
                            <?php echo $this_terms[1]->name; ?>
                            <?php else: ?>
                            <?php echo ' '; ?>
                            <?php endif; ?>
                        </p>
                        <p class="item_card_text">
                            <?php if (get_post_type()=='page' || get_post_type()=='post'):?>
                            <?php
                                $content = get_the_content();
                                //「改行」を削除するコード
                                // $content = str_replace("¥n", "", $content);
                                // $content = str_replace("\r\n", '', $content);
                                // $content = str_replace(array("\r\n", "\r", "\n"), '', $content);
                                // $content = str_replace(array("\r", "\n"), '', $content);
                                // $content = str_replace("<br>", "", $content);
                                $content = strip_tags($content);
                                //40文字にする
                                if(mb_strlen($content) > 40) {
                                    $content = mb_substr($content,0,40);
                                    echo $content . '・・・' ;
                                } else {
                                    echo $content;
                                }
                                ?>
                            <?php elseif (get_post_type() =='cafeinfo'): ?>
                            <?php $features = get_field('features');
                                //40文字にする
                                if(mb_strlen($features) > 40) {
                                    $features = mb_substr($features,0,40);
                                    echo $features . '・・・' ;
                                } else {
                                    echo $features;
                                }
                            ?>
                            <?php elseif (get_post_type() =='interview'): ?>
                            <?php $excerpt = get_field('excerpt');
                                //40文字にする
                                if(mb_strlen($excerpt) > 40) {
                                    $excerpt = mb_substr($excerpt,0,40);
                                    echo $excerpt . '・・・' ;
                                } else {
                                    echo $excerpt;
                                }
                            ?>
                            <?php elseif (get_post_type() =='event'): ?>
                            <?php
                            if (!empty(get_field('appeal'))) {
                                $appeal = get_field('appeal');
                                //40文字にする
                                if(mb_strlen($appeal) > 40) {
                                    $appeal = mb_substr($appeal,0,40);
                                    echo $appeal . '・・・' ;
                                } else {
                                    echo $appeal;
                                }
                            }else{
                                $features = get_field('features',get_field('id'));
                                //40文字にする
                                if(mb_strlen($features) > 40) {
                                    $features = mb_substr($features,0,40);
                                    echo $features . '・・・' ;
                                } else {
                                    echo $features;
                                }
                            }

                            ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </a>
                <?php endwhile; ?>
                <?php else: ?>
                <div class="not_found_inner">
                    <p>申し訳ありません。</p>
                    <p>キーワードに一致するページが見つかりませんでした。</p>
                    <p class="not_found">
                        お手数ですが<a href="<?php echo home_url('/area/east'); ?>">【エリアからさがす】</a>や<a
                            href="<?php echo home_url('/find'); ?>">【条件からさがす】</a>より再度お求めのページをお探しください。
                    </p>
                    <img class="not_found_img"
                        src="<?php echo get_template_directory_uri();?>/assets/images/index/notfind.png" alt="404画像"
                        class="not_found sp" />
                </div>
                <?php endif; ?>

            </div>
            <div class="page_nav flex">
                <?php original_pagenation(); ?>
            </div>
        </div>
    </div>
</main>
</div>



<?php get_footer(); ?>