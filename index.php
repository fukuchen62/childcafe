<?php
$event_fields = get_field_objects();
$test = $event_fields;

// unset($events['place_map']);

$cafeinfo_id = get_field('id');

//date_default_timezone_set('Asia/Tokyo');

$datetime = date_i18n(get_field('datetime'));

//日付だけを取得
$date = date('Y/m/d', strtotime($datetime));

//時刻だけを取得
$starttime = date('G:i', strtotime($datetime));

//曜日だけを取得
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

$event_datetime = $date . '(' . $weekday . ')　'.$starttime. '〜';


if (!empty(get_field('datetime_end'))) {
    $endtime = date_i18n(get_field('datetime_end'));
    $endtime = date('G:i', strtotime($endtime));

    $event_datetime = $date . ' (' . $weekday . ')　'.$starttime. '〜'. $endtime;

}


$events = array(
'開催日時' => $event_datetime,
'開催住所' => ['〒'. get_field('postcode'),get_field('address')],
'会場' => get_field('place_name'),
'参加条件' => get_field('conditions'),
// '参加料金' => 'こども '.$child_price,
);

$child_price = get_field('child_price');
if ($child_price == '0') {
    $child_price = '無料';
} else{
    $child_price = $child_price.'円';
}

if (!empty(get_field('child_price_info'))) {
    $child_price = $child_price.' ('.get_field('child_price_info').')';
}

$price = array('こども '.$child_price);


if (!empty(get_field('adult_price'))) {
    $adult_price = get_field('adult_price');
    if ($adult_price == '0') {
    $adult_price = '無料';
    } else{
        $adult_price = $adult_price.'円';
    }
    if (!empty(get_field('adult_price_info'))) {
    $adult_price = $adult_price.' ('.get_field('adult_price_info').')';
    }
    $price[] = 'おとな '.$adult_price;
}

if (!empty(get_field('any'))) {
    $any = '募金制';
    if (!empty(get_field('any_info'))) {
    $any = $any.' ('.get_field('any_info').')';
    $price = $any;
}
}

$events['参加料金'] = $price;


if (!empty(get_field('person'))) {
    $person = get_field('person');
    foreach ($person as $value) {

        // $person_info[] = '';

        if ($value == '誰でも行ける') {
            if (!empty(get_field('everyone'))) {
                $value = $value. ' (' . get_field('everyone'). ')';
            }
            $person_info[] = $value;
        }elseif ($value == 'こどもは保護者同伴') {
            if (!empty(get_field('accompanied'))) {
                $value = $value. ' (' . get_field('accompanied'). ')';
            }
            $person_info[] = $value;
        }elseif ($value == 'こどもだけで行ける') {
            if (!empty(get_field('child_only'))) {
                $value = $value. ' (' . get_field('child_only'). ')';
            }
            $person_info[] = $value;
        }elseif ($value == '大人だけで行ける') {
            if (!empty(get_field('adult_only'))) {
                $value = $value. ' (' . get_field('adult_only'). ')';
            }
            $person_info[] = $value;
        }elseif ($value == '大人は保護者だけ') {
            if (!empty(get_field('guardian_only'))) {
                $value = $value. ' (' . get_field('guardian_only'). ')';
            }
            $person_info[] = $value;
        }elseif ($value == '地域の方だけ') {
            if (!empty(get_field('local_only'))) {
                $value = $value. ' (' . get_field('local_only'). ')';
            }
            $person_info[] = $value;
        }elseif ($value == '会員登録制') {
            if (!empty(get_field('member'))) {
                $value = $value. ' (' . get_field('member'). ')';
            }
            $person_info[] = $value;
        }
    }
    $events['参加対象'] = $person_info;
}

if (!empty(get_field('main_age'))) {
    $main_age =get_field('main_age');
    $events['参加者の主な年代'] = $main_age;
}

if (!empty(get_field('scale'))) {
    $scale =get_field('scale');
    $events['開催規模'] = $scale;
}

if (!empty(get_field('offer'))) {
    $offer = get_field('offer');
    $events['食事スタイル'] = $offer;
}

if (!empty(get_field('reserve'))) {
$reserve = get_field('reserve');
if ($reserve == '1') {
    $reserve = '必要あり';
} else{
    $reserve = '必要なし';
}

if (!empty(get_field('reserve_info'))) {
$reserve = $reserve. ' (' . get_field('reserve_info'). ')';
}

$events['事前予約'] = $reserve;
}

if (!empty(get_field('parking'))) {
$parking = get_field('parking')[0];
if ($parking == '有り') {
    $parking = 'あり';
} else{
    $parking = 'なし';
}

if (!empty(get_field('parking_info'))) {
$parking = $parking. ' (' . get_field('parking_info'). ')';
}

$events['駐車場'] = $parking;
}


$service_array = get_field('service');

?>


<?php get_header(); ?>
<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <?php if (have_posts()) : ?>
        <?php while(have_posts()) : ?>
        <?php the_post(); ?>
        <h2 class="title"><?php the_field('title'); ?></h2>
        <section class="event_img">
            <?php if(! empty(get_field('eye_catching'))): ?>
            <img src="<?php the_field('eye_catching'); ?>" alt="" class="main_visual" />
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
            <?php endif; ?>
        </section>
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

        <div class="bgcolor_flex">
            <div class="others">
                <h3 class="subtitle others_subtitle">
                    取り扱いのあるもの
                </h3>
                <div class="others_item">
                    <?php foreach($service_array as $service): ?>
                    <?php if ($service == 'その他資格者') : ?>
                    <?php if (!empty($license[0])): ?>
                    <?php foreach( $license as $value): ?>
                    <p>
                                <?php echo $value; ?>
                            </p>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <p>
                                <?php echo $service; ?>
                            </p>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="addressmap">
                <h3 class="subtitle others_subtitle">アクセス</h3>
                <?php the_field('place_map'); ?>
            </div>
        </div>
        <div class="btn_item">
            <a href="<?php echo home_url('/cafeinfo/' . get_field('id')); ?>"> こども食堂紹介へ</a>
        </div>
        <div class="btn_item btn_event">
            <a href="<?php echo home_url('/event'); ?>"> 開催情報一覧へ</a>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</main>
</div>
<?php get_footer(); ?>