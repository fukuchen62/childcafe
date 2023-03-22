<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php
    //開いているページの情報を取得
    $area_slug = get_query_var('area');
    $area = get_term_by('slug', $area_slug, 'area');
    //開いているページの子カテゴリの情報を取得
    $town_slug = get_query_var('area_child');
    $town = get_term_by('slug', $town_slug, 'area');


    $args = array(
        'post_type' => 'cafeinfo',
        'tax_query' => array(
            array(
                'taxonomy' => 'area',
                'field' => 'term_id',
                'terms' => $area->term_id,
                'include_children' => true,
            ),
        ),
    );
    $the_query = new WP_Query($args);

?>

<main class="main">
    <section class="sec">
        <div class="container">
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


    <h2 class="pageTitle"><?php echo $area->name; ?>市町村一覧</h2>
    <div class="faq_wrap">
        <?php
        $towns = get_terms(array(
            'taxonomy' => 'area',
            'parent' => $area->term_id,
        ));
            foreach ($towns as $town) {
                echo '<a href="'.get_term_link($town).'"><h3 class="title">'.$town->name.'</h3></a>';
            }
        ?>
    </div>


    <section class="sec">
        <div class="container">

            <div class="row">

                <?php if ($the_query->have_posts()) : ?>
                <?php while($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <div class="col-md-4">
                    <?php get_template_part('template-parts/loop', 'cafeinfo'); ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            </div>

            <?php if (function_exists('wp_pagenavi')) {
						wp_pagenavi();
					} ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>