<?php get_header(); ?>
<?php
// $eye_catching = get_post_meta($post->ID, 'eye_catching', true);
// $eye_catching = get_field('eye_catching');

$args = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
    'post_status' => 'publish', // 公開された投稿を指定
    // 'post__in' => $post__in,
];

// $the_query = new WP_Query($args);

// $query = $wp_query;

// $args = $wp_query->query_vars;
$wp_query->query_vars['posts_per_page'] = 6;
$wp_query->tax_query->queries = array(
    'taxonomy' => 'area',
    'field'    => 'name',
    'terms'    => get_search_query(),
    'compare' => 'LIKE',
);

// $wp_query-> WP_Tax_Query Object['tax_query'] = [['taxonomy' => 'area']];
// 'taxonomy' => 'area'
// $wp_query['tax_query'] = [['taxonomy' => 'area']];

new WP_Query($wp_query);

?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="result_img">
            <h2 class="title">
                <?php echo '「'. get_search_query() . '」の検索結果一覧'; ?>
            </h2>
            <?php
            echo '<pre>';
            print_r($wp_query);
            echo '</pre>';
            ?>
            <div class="result_img_wrap flex">
                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : ?>
                <?php the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <article class="result_img_card">
                        <?php if(! empty(get_field('eye_catching'))): ?>
                        <img src="<?php the_field('eye_catching'); ?>" alt="">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
                        <?php endif; ?>
                        <p><?php the_title(); ?></p>
                        <p>（〇〇市●●町）</p>
                    </article>
                </a>
                <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
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

    </div>
</main>



<?php get_footer(); ?>