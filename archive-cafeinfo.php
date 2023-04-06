<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php
$args = array(
        'post_type' => 'cafeinfo',
        // 'tax_query' => array(
        //     array(
        //         'taxonomy' => 'area',
        //         'field' => 'term_id',
        //         'terms' => $area->term_id,
        //         'include_children' => true,
        //     ),
        // ),
        // orderby => ,
    );
    $the_query = new WP_Query($args);

$terms = get_terms(array('taxonomy' => 'area', 'hide_empty' => false));
?>

<main>
    <div class="main_inner">
        <h2 class="title">こども食堂一覧</h2>

        <?php foreach ($terms as $term); ?>
        <div class="cafeinfo_tab orange">
            <?php echo $term -> name; ?>
        </div>
        <?php if ($the_query->have_posts()) : ?>
        <?php while($the_query->have_posts()) : ?>
        <?php $the_query->the_post(); ?>
        <div class="cafeinfo_section">
            <div class="cafeinfo">
                <div class="cafeinfo_subtitle">〇〇市</div>
                <p><a href="<?php the_permalink(); ?>">●●食堂</a></p>
            </div>

        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</main>

<?php get_footer(); ?>
