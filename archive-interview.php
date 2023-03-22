<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
function my_archive_pre_get_posts($query) {
    if ($query->is_archive('interview')) {
        echo $query->get('posts_per_page');
    }
}
add_action('pre_get_posts', 'my_archive_pre_get_posts');
?>

<?php
	$args = array(
		'post_type' => 'interview',
		'post_per_page' => -1, //全件表示
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => get_query_var('paged') //何ページ目の情報を表示すれば良いか
	);
	$the_query = new WP_Query($args);

    // カスタムクエリを追加する前に、元のクエリを保存しておく
    $original_query = $wp_query;

    // クエリを実行
    $wp_query = new WP_Query($args);
?>
<h2 class="pageTitle">インタビュー一覧</h2>
<main class="main">
    <div class="container">


        <div class="row">

            <?php if ($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <div class="col-md-4">
                <?php get_template_part('template-parts/loop', 'interview'); ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php
            // 元のクエリを復元する
            $wp_query = $original_query;
            ?>


        </div>

        <?php if (function_exists('wp_pagenavi')) {
						wp_pagenavi();
					} ?>


    </div>
</main>

<?php get_footer(); ?>