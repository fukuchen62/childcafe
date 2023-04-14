<?php get_header(); ?>


<?php
  $taxonomy_slug = 'area'; // タクソノミースラッグを指定
  $post_type_slug = 'cafeinfo'; // ポストタイプの指定
  $parents = get_terms($taxonomy_slug,'parent=0'); // 親のいないタームを取り出します、つまり親
?>


<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">こども食堂一覧</h2>
        <?php
        foreach ( $parents as $parent ) : // 親タームのループを開始 ?>
        <div class="cafeinfo_tab <?php echo $parent->slug; ?>"><?php echo $parent->name; ?></div>
        <div class="cafeinfo_section">
            <div class="cafeinfo">
                <?php $children = get_terms($taxonomy_slug,'hierarchical=0&parent='.$parent->term_id); ?>
                <?php foreach ( $children as $child ) : // 子タームのループを開始 ?>
                <?php if( $child->count != 0 ):?>
                <div class="cafeinfo_subtitle subtitle_<?php echo $parent->slug; ?>"><?php echo $child->name; ?></div>
                <?php $term_slug = $child->slug; // 以下子タームに紐づく一覧のクエリを設定 ?>
                <?php
                $args = array(
                    'post_type' => $post_type_slug,
                    $taxonomy_slug => $term_slug ,
                    'post_status' => 'publish', // 公開された投稿を指定
                    'posts_per_page' => -1 // 条件に当てはまる投稿を全件表示
                );
                $myquery = new WP_Query( $args ); // クエリのセット
                ?>
                <div class="cafeinfo_flex">
                    <?php if ( $myquery->have_posts()): ?>
                    <?php while($myquery->have_posts()): $myquery->the_post(); ?>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</main>
</div>


<?php get_footer(); ?>