<?php get_header(); ?>
<?php
$current_time = date_i18n('Y-m-d');
$args = array(
		'post_type' => 'event',
        'meta_key' => 'class',
        //不定期のもの
        'meta_value' => 2,
		'posts_per_page' => 6,
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
        'meta_query' => array(
		array(
			'key' => 'datetime', // 記事の日付を表すカスタムフィールドのキーを指定
			'value' => $current_time, // 現在の日付以降の記事を表示するために、現在の日付を指定
			'compare' => '>=', // 指定した値以上のものを取得する
			'type' => ' DATETIME', // カスタムフィールドの値が日付形式であることを指定
        )
        )
	);
$the_query = new WP_Query($args);

$cafeinfo_id = get_field('id');
$this_terms = get_the_terms($cafeinfo_id,'area');

?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">開催情報一覧</h2>
        <div class="event_flex">
            <div class="event_item">
                <?php if ($the_query->have_posts()) : ?>
                <?php while($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <?php
                    $cafeinfo_id = get_field('id');
                    $this_terms = get_the_terms($cafeinfo_id,'area');
                    ?>

                <a href="<?php the_permalink(); ?>">
                    <div class="item_card">
                        <?php $eye_catching = get_field('eye_catching');?>
                        <?php if(!empty($eye_catching)): ?>
                        <img src="<?php the_field('eye_catching'); ?>" alt="">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage/logo_eye_catch.png"
                            alt="">
                        <?php endif; ?>
                        <p class="item_card_title">
                            <!-- 日付表示加工予定 ◯月◯日-->
                            <?php echo get_field('datetime').'　'.$this_terms[1]->name; ?>
                        </p>
                        <p class="item_card_title border">
                            <?php echo get_field('name',$cafeinfo_id); ?>
                        </p>
                        <p class="item_card_text">
                            <?php
                            //整形したい文字列
                            if (!empty(get_field('appeal'))) {
                                $appeal = get_field('appeal');
                                //40文字にする
                                if(mb_strlen($appeal) > 40) {
                                    $appeal = mb_substr($appeal,0,40);
                                    echo $appeal . '・・・' ;
                                } else {
                                    echo $appeal;
                                }
                            } else{
                                $features = get_field('features',$cafeinfo_id);
                                //40文字にする
                                if(mb_strlen($features) > 40) {
                                    $features = mb_substr($features,0,40);
                                    echo $features . '・・・' ;
                                } else {
                                    echo $features;
                                }
                            }
                            ?>
                        </p>
                    </div>
                </a>

                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
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
                'total' => $the_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<div class="page_triangle_left"></div>',
                'next_text' => '<div class="page_triangle_right"></div>',
                ));
                ?>
            </div>
            <?php get_sidebar('categories'); ?>
        </div>


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
                'total' => $the_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<div class="page_triangle_left"></div>',
                'next_text' => '<div class="page_triangle_right"></div>',
                ));
            ?>
        </div>
    </div>
</main>
</div>

<?php get_footer(); ?>