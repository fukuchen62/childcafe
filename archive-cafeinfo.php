<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php
$area_slug = get_query_var('area');
$area = get_term_by('slug', $area_slug, 'area');

$parent_term = get_term('parent', 'area');


$args = array(
        'post_type' => 'cafeinfo',
        'posts_per_page' => -1, //全件表示
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

$terms = get_the_terms($post->ID, 'area', array('parent' => 0, 'hide_empty' => false));

$tax_id = get_queried_object_id();
$taxonomy_name = 'area';
// $tax = get_term( $tax_id, $taxonomy_name );
//市町村一覧
    $towns = get_the_terms($post->ID, $taxonomy_name, array(
    // 'taxonomy' => 'area',
    'parent' => $tax_id,
    //投稿がない場合でも表示させる
    'hide_empty' => false,
    // 'orderby' => 'modified',
    // 'order' => 'ASC',
));

?>


<main>
    <div class="main_inner">
        <h2 class="title">こども食堂一覧</h2>

        <?php if ($the_query->have_posts()) : ?>

        <?php $posts = get_posts($terms); ?>
        <?php foreach ($terms as $term): ?>
        <?php if($term->parent == 0): ?>
        <div class="cafeinfo_tab orange">
            <?php echo $term -> name; ?>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

        <div class="cafeinfo_section">
            <div class="cafeinfo">

                <?php $domestic_post = get_posts($args); ?>
                <?php if($domestic_post) :  ?>
                <?php foreach($domestic_post as $post) : ?>
                <?php setup_postdata( $post ); ?>

                <?php $posts = get_posts($towns); ?>
                <?php foreach ($towns as $town): ?>
                <?php if (! $town->count == 0): ?>
                <?php if ($town->parent): ?>

                <div class="cafeinfo_subtitle">
                    <?php echo $town->name; ?>
                </div>
                <?php while($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <p><a href="<?php the_permalink(); ?>">
                    <?php the_field('name'); ?>
                </a></p>

                <?php endwhile; ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endforeach; ?>
                <?php endif; ?>

            </div>

            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>

    </div>

</main>

<?php get_footer(); ?>
