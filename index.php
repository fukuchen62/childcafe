<?php
// $event_fields = get_field_objects();
// $events = $event_fields;

// unset($events['place_map']);

$cafeinfo_id = get_field('id');

//date_default_timezone_set('Asia/Tokyo');

$datetime = date_i18n(get_field('datetime'));

// 日付だけを取得
$date = date('Y/m/d', strtotime($datetime));

// 時刻だけを取得
$starttime = date('G:i', strtotime($datetime));

$weekday = date('D', strtotime($datetime));

switch ($weekday) {
    case 'Sun':
        $weekday = '日';
        break;
    case 'Mon':
        $weekday = '月';
        break;
    case 'Tue':
        $weekday = '火';
        break;
    case 'Wed':
        $weekday = '水';
        break;
    case 'Thu':
        $weekday = '木';
        break;
    case 'Fri':
        $weekday = '金';
        break;
    case 'Sat':
        $weekday = '土';
        break;
}

$event_datetime = $date . '（' . $weekday . '）'.$starttime. '〜';


if (!empty(get_field('datetime_end'))) {
    $endtime = date_i18n(get_field('datetime_end'));
    $endtime = date('G:i', strtotime($endtime));

    $event_datetime = $date . '（' . $weekday . '）'.$starttime. '〜'. $endtime;

}




$events = array(
'開催日時' => $event_datetime,
'開催住所' => ['〒'. get_field('postcode'),get_field('address')],
'会場' => get_field('place_name'),
);
?>


<?php get_header(); ?>
<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <?php echo $event_datetime;?>
        <?php echo $events; ?>
        <?php if (have_posts()) : ?>
        <?php while(have_posts()) : ?>
        <?php the_post(); ?>
        <div class="event_title">
            <h2 class="title"><?php the_field('title'); ?></h2>
            <?php if(! empty(get_field('eye_catching'))): ?>
            <img src="<?php the_field('eye_catching'); ?>" alt="" class="main_visual" />
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
            <?php endif; ?>
        </div>
        <div class="event_appeal">
            <?php if (!empty(get_field('appeal'))) : ?>
            <p class="event_appeal_text">
                食堂から一言
            </p>
            <p><?php the_field('appeal'); ?></p>
            <?php else: ?>
            <p class="event_appeal_text">
                こども食堂の特色
            </p>
            <p>
                <?php the_field('features',$cafeinfo_id); ?>
            </p>
            <?php endif; ?>
        </div>


        <table class="event_table">
            <?php foreach( $events as $key => $event): ?>
            <tr>
                <?php if (! empty($event)) : ?>
                <td class="event_table_tdtitle">
                    <?php echo $key; ?>
                </td>
                <?php if (! is_array($event)) : ?>
                <td class="event_table_tdtext">
                    <?php echo $event; ?>
                </td>
                <?php else: ?>
                <td class="event_table_tdtext">
                    <?php foreach( $event as $value_key => $value): ?>
                    <p>
                    <?php echo $value; ?>
                    </p>
                    <?php endforeach; ?>
                </td>
                <?php endif; ?>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </table>



        <table class="event_table">
            <?php foreach( $events as $event): ?>
            <tr>
                <?php if (! empty($event['value'])) : ?>
                <td class="event_table_tdtitle">
                    <?php echo $event['label']; ?>
                </td>
                <?php if (! is_array($event['value'])) : ?>
                <td class="event_table_tdtext">
                    <?php echo $event['value']; ?>
                </td>
                <?php else: ?>
                <td class="event_table_tdtext">
                    <?php foreach( $event['value'] as $value ): ?>
                    <p>
                    <?php echo $value; ?>
                    </p>
                    <?php endforeach; ?>
                </td>
                <?php endif; ?>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="event_map">
            <?php the_field('place_map'); ?>
        </div>
        <?php get_sidebar('categories'); ?>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <div class="btn_item">
        <a href="<?php echo home_url('/cafeinfo/' . get_field('id')); ?>">こども食堂紹介へ</a>
    </div>
</main>
</div>
<?php get_footer(); ?>