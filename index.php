<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$args = array(
		'post_type' => 'event',
        'meta_key' => 'class',
        //不定期のもの
        'meta_value' => 2,
		'posts_per_page' => -1,
        'paged' => get_query_var('paged') //何ページ目の情報を表示すれば良いか
	);
$the_query = new WP_Query($args);

$event_fields = get_field_objects();
$events = $event_fields;
unset($events['class'],$events['title'],$events['place_map'],$events['service'],$events['pic1'],$events['pic2'],$events['pic3'],$events['pic4'],$events['pic5'],$events['pic6'],$events['pic7'],$events['pic8'],$events['pic9'],$events['pic10'],$events['eye_catching'],$events['id'],$events['appeal'],$events['license']);

?>
<main>
    <div class="main_inner">
        <?php if ($the_query->have_posts()) : ?>
        <?php while($the_query->have_posts()) : ?>
        <?php $the_query->the_post(); ?>
        <div class="ivent_title">
            <h2 class="title"><?php the_field('title'); ?></h2>
            <?php if(! empty(get_field('eye_catching'))): ?>
            <img src="<?php the_field('eye_catching'); ?>" alt="" class="main_visual" />
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
            <?php endif; ?>
        </div>
        <div class="ivent_appeal">
            <p class="ivent_appeal_text">食堂から一言</p>
            <p><?php the_field('appeal'); ?></p>
        </div>
        <table class="ivent_table">
            <?php foreach( $events as $event): ?>
            <tr>
                <?php if (! empty($event['value'])) : ?>
                <td class="ivent_table_tdtitle">
                    <?php echo $event['label']; ?>
                </td>
                <?php if (! is_array($event['value'])) : ?>
                <td class="ivent_table_tdtext">
                    <?php echo $event['value']; ?>
                </td>
                <?php else: ?>
                <?php foreach( $event['value'] as $value ): ?>
                <td class="ivent_table_tdtext">
                    <?php echo $value; ?>
                </td>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="ivent_map">
            <?php the_field('place_map'); ?>
        </div>
        <?php get_sidebar('categories'); ?>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</main>
<?php get_footer(); ?>