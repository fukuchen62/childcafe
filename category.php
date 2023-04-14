<?php get_header(); ?>
<?php
$cat = get_the_category();
$cat = $cat[0];
?>

<main>
    <div class="main_inner relative">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">
            <?php echo $cat->cat_name .'記事一覧'; ?>
        </h2>
        <div class="news_flex">
            <div class="tcenter column">
                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : ?>
                <?php the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="news_title">
                    <?php the_title(); ?>
                </a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            ?>
            <div class="page_nav flex pc_none">
                <?php
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                $paginate_format = '';
                $paginate_base = add_query_arg('paged','%#%');
                }else{
                $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                user_trailingslashit('page/%#%/','paged');
                $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $wp_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<div class="page_triangle_left"></div>',
                'next_text' => '<div class="page_triangle_right"></div>',
                ));
            ?>
            </div>
            <?php get_sidebar('categories'); ?>
        </div>
        <!-- ページナビ -->
        <?php //original_pagenation(); ?>
        <div class="page_nav flex sp_none">
            <?php
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                $paginate_format = '';
                $paginate_base = add_query_arg('paged','%#%');
                }else{
                $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                user_trailingslashit('page/%#%/','paged');
                $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $wp_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<div class="page_triangle_left"></div>',
                'next_text' => '<div class="page_triangle_right"></div>',
                ));
            ?>
        </div>
    </div>
    </div>
</main>
</div>
<?php get_footer(); ?>