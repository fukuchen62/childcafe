<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$event_fields = get_field_objects();
$events = $event_fields;
?>
<main>
    <div class="main_inner">
        <?php if (have_posts()) : ?>
        <?php while(have_posts()) : ?>
        <?php the_post(); ?>
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
                <td class="ivent_table_tdtext">
                    <?php foreach( $event['value'] as $value ): ?>
                    <?php echo $value; ?>
                    <?php endforeach; ?>
                </td>
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
    <div class="btn_item">
        <a href="<?php echo home_url('/cafeinfo/' . get_field('id')); ?>">こども食堂詳細へ</a>
    </div>
</main>
<?php get_footer(); ?>