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
        <div class="search_inner">
            <h2 class="title"><?php echo '「'. get_search_query() . '」の検索結果一覧'; ?></h2>
            <div class="search_item search_flex">
                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : ?>
                <?php the_post(); ?>

                <a href="<?php the_permalink(); ?>">
                    <div class="search_item_card">
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
                        <p class="search_item_card_title">
                            <?php the_title(); ?>
                        </p>
                        <p class="search_item_card_title border">
                            <?php $this_terms = get_the_terms($post->ID,'area');?>
                            <?php if(!empty($this_terms)): ?>
                            <?php echo $this_terms[1]->name; ?>
                            <?php else: ?>
                            <?php echo ' '; ?>
                            <?php endif; ?>
                        </p>
                        <p class="search_text">
                            <?php if (is_search()):?>
                                <?php the_post();?>
                            <?php //the_content();?>
                            <?php elseif (is_post_type_archive('cafeinfo')): ?>
                            <?php $features = get_field('features');
                                //40文字にする
                                if(mb_strlen($features) > 40) {
                                    $features = mb_substr($features,0,40);
                                    echo $features . '・・・' ;
                                } else {
                                    echo $features;
                                } ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </a>
                <?php endwhile; ?>
                <?php else: ?>
                <h3>（仮表示）結果に一致するものはありませんでした</h3>
                <?php endif; ?>

            </div>
        </div>
</main>



<?php get_footer(); ?>