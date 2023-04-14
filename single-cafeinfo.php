<?php get_header(); ?>
<?php
$this_terms = get_the_terms($post->ID,'area');

$event_id = get_field('event_id');
$cafeinfo_id = get_field('id', $event_id);

$service_array = get_field('service', $event_id);

$events = array(
'開催住所' => ['〒'. get_field('postcode',$event_id),get_field('address',$event_id)],
'会場' => get_field('place_name',$event_id),
'参加条件' => get_field('conditions',$event_id),
);

if (!empty(get_field('date',$event_id))) {
    $date = get_field('date',$event_id);
    $event_day[] = $date;
}

if (!empty(get_field('time',$event_id))) {
    $time = get_field('time',$event_id);
    $event_day[] = $time;
}

if (!empty($event_day)) {
    $time = get_field('time',$event_id);
    $events['開催日時・頻度'] = $event_day;
}


$child_price = get_field('child_price',$event_id);
if ($child_price == '0') {
    $child_price = '無料';
} else{
    $child_price = $child_price.'円';
}

if (!empty(get_field('child_price_info',$event_id))) {
    $child_price = $child_price.' ('.get_field('child_price_info',$event_id).')';
}

$price = array('こども '.$child_price);


if (!empty(get_field('adult_price',$event_id))) {
    $adult_price = get_field('adult_price',$event_id);
    if ($adult_price == '0') {
    $adult_price = '無料';
    } else{
        $adult_price = $adult_price.'円';
    }
    if (!empty(get_field('adult_price_info',$event_id))) {
    $adult_price = $adult_price.' ('.get_field('adult_price_info',$event_id).')';
    }
    $price[] = 'おとな '.$adult_price;
}

if (!empty(get_field('any',$event_id))) {
    $any = '募金制';
    if (!empty(get_field('any_info',$event_id))) {
    $any = $any.' ('.get_field('any_info',$event_id).')';
    $price = $any;
}
}

$events['参加料金'] = $price;


if (!empty(get_field('person',$event_id))) {
    $person = get_field('person',$event_id);
    foreach ($person as $value) {


        if ($value == '誰でも行ける') {
            if (!empty(get_field('everyone',$event_id))) {
                $value = $value. ' (' . get_field('everyone',$event_id). ')';
            }
            $person_info[] = $value;
        }elseif ($value == 'こどもは保護者同伴') {
            if (!empty(get_field('accompanied',$event_id))) {
                $value = $value. ' (' . get_field('accompanied',$event_id). ')';
            }
            $person_info[] = $value;
        }elseif ($value == 'こどもだけで行ける') {
            if (!empty(get_field('child_only',$event_id))) {
                $value = $value. ' (' . get_field('child_only',$event_id). ')';
            }
            $person_info[] = $value;
        }elseif ($value == '大人だけで行ける') {
            if (!empty(get_field('adult_only',$event_id))) {
                $value = $value. ' (' . get_field('adult_only',$event_id). ')';
            }
            $person_info[] = $value;
        }elseif ($value == '大人は保護者だけ') {
            if (!empty(get_field('guardian_only',$event_id))) {
                $value = $value. ' (' . get_field('guardian_only',$event_id). ')';
            }
            $person_info[] = $value;
        }elseif ($value == '地域の方だけ') {
            if (!empty(get_field('local_only',$event_id))) {
                $value = $value. ' (' . get_field('local_only',$event_id). ')';
            }
            $person_info[] = $value;
        }elseif ($value == '会員登録制') {
            if (!empty(get_field('member',$event_id))) {
                $value = $value. ' (' . get_field('member',$event_id). ')';
            }
            $person_info[] = $value;
        }
    }
    $events['参加対象'] = $person_info;
}

if (!empty(get_field('main_age',$event_id))) {
    $main_age =get_field('main_age',$event_id);
    $events['参加者の主な年代'] = $main_age;
}

if (!empty(get_field('scale',$event_id))) {
    $scale =get_field('scale',$event_id);
    $events['開催規模'] = $scale;
}

if (!empty(get_field('offer',$event_id))) {
    $offer = get_field('offer',$event_id);
    $events['食事スタイル'] = $offer;
}

if (!empty(get_field('reserve',$event_id))) {
$reserve = get_field('reserve',$event_id);
if ($reserve == '1') {
    $reserve = '必要あり';
} else{
    $reserve = '必要なし';
}

if (!empty(get_field('reserve_info',$event_id))) {
$reserve = $reserve. ' (' . get_field('reserve_info',$event_id). ')';
}

$events['事前予約'] = $reserve;
}

if (!empty(get_field('parking',$event_id))) {
$parking = get_field('parking',$event_id)[0];
if ($parking == '有り') {
    $parking = 'あり';
} else{
    $parking = 'なし';
}

if (!empty(get_field('parking_info',$event_id))) {
$parking = $parking. ' (' . get_field('parking_info',$event_id). ')';
}

$events['駐車場'] = $parking;
}


//連絡先・SNSなど
$infos = array();

if (!empty(get_field('staff'))) {
    $infos['担当者'] = get_field('staff');
}

if (!empty(get_field('tel'))) {
    $contact[] = '電話番号:'.get_field('tel');
}

if (!empty(get_field('email'))) {
    $contact[] = 'メールアドレス:'.get_field('email');
}

if (!empty(get_field('line_id'))) {
    $contact[] = 'LINE:'.get_field('line_id');
}

if (!empty($contact)) {
    $infos['連絡先'] = $contact;
}

if (!empty(get_field('line_qr'))) {
    $line[] = get_field('line_qr');
}

if (!empty(get_field('line_url'))) {
    $line[] = get_field('line_url');
}

if (!empty($line)) {
    $infos['LINE QRコード'] = $line;
}

if (!empty(get_field('instagram'))) {
    $sns[] = 'instagram:'.get_field('instagram');
}

if (!empty(get_field('facebook'))) {
    $sns[] = 'facebook:'.get_field('facebook');
}

if (!empty($sns)) {
    $infos['SNS'] = $sns;
}

if (!empty(get_field('site_url'))) {
    $infos['公式WEBサイト'] = get_field('site_url');
}

if (!empty(get_field('amapro'))) {
    $infos['Amazonみんなで応援プログラム'] = get_field('amapro');
}

if (get_field('recruitment')=== true) {
    $volunteer[]= '現在、募集中！';
    if (!empty(get_field('recruitment_info'))) {
        $volunteer[] = get_field('recruitment_info') ;
    }
    $infos['ボランティア募集'] = $volunteer;
}


$pics = array(get_field('pic1'),get_field('pic2'),get_field('pic3'),get_field('pic4'),get_field('pic5'),get_field('pic6'),get_field('pic7'),get_field('pic8'),get_field('pic9'),get_field('pic10'));

$license = get_field('license',$event_id);
$license = explode(",", $license);

$args = array(
		'post_type' => 'event',
        'posts_per_page' => 3,
        'post_status' => 'publish', // 公開された投稿を指定
        'meta_query' => array(
            'relation' => 'AND',
        array(
        'key' => 'class',
        'value' => 2,
        'compare' => '='
        ),
        array(
        'key' => 'id',
        'value' => $cafeinfo_id,
        'compare' => '='
        )
        ),
	);
$the_query = new WP_Query($args);

?>

<main>
    <div class="main_inner">
        <!-- ページトップ -->
        <?php if (have_posts()) : ?>
        <?php while(have_posts()) : ?>
        <?php the_post(); ?>
        <div class="yellow color">
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <?php print_r($infos); ?>
            <div class="yellow_inner m1024">

                <h2 class="title"><?php the_field('name'); ?></h2>
                <div class="pc_flex">
                    <div>
                        <?php
                        $eye_catching = get_field('eye_catching');
                        $image_id = attachment_url_to_postid( $eye_catching );
                        $image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
                    ?>
                        <?php if(!empty($eye_catching)): ?>
                        <img src="<?php echo $eye_catching; ?>" alt="<?php echo $image_alt; ?>">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage/logo_eye_catch.png" alt="">
                        <?php endif; ?>
                        <div class="underimg text cafeinfo_flex flex">
                            <p class="address">
                                <?php echo $this_terms[1]->name; ?>
                            </p>
                            <div class="good cafeinfo_flex flex">
                                <p><?php echo do_shortcode('[wp_ulike]'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="pc_w320">
                                <h3 class="subtitle">
                                    <?php echo get_field_object('features')['label']; ?>
                                </h3>
                                <p class="text">
                                    <?php the_field('features'); ?>
                                </p>
                            </div>
                        </div>
                        <?php if (!empty(get_field('id'))) : ?>
                        <div class="pc_pickup">
                            <a class="btn_item" href="<?php echo home_url('/interview/' . get_field('id')); ?>"><?php echo get_field('name').'の特集記事はこちら'; ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- スクロール -->
            <div class="scroll"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shabondama01.png" alt="シャボン玉" class="shingle-cafeinfo_img shabondama01" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shabondama02.png" alt="シャボン玉" class="shingle-cafeinfo_img shabondama02" />
        </div>
        <div class="beige color">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/beigetop.png" alt="波" class="wave_img btop" />
            <div class="beige_inner m1024">
                <h3 class="beige_categorytitle beige_basic">
                    基本情報
                </h3>
                <?php foreach( $events as $key => $event): ?>
                <?php if (!empty($event)) : ?>
                <div class="detail_item">
                    <h4 class="subtitle">
                        <?php echo $key; ?>
                    </h4>
                    <?php if (!is_array($event)) : ?>
                    <p>
                        <?php echo $event; ?>
                    </p>
                    <?php else: ?>
                    <div>
                        <?php foreach( $event as $value): ?>
                        <p>
                        <?php echo $value; ?>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/beigebottom.png" alt="波" class="wave_img bbottom" />
        </div>
        <div class="green color">
            <div class="green_inner m1024">
                <h3 class="beige_categorytitle beige_access">
                    連絡先・SNSなど
                </h3>
                <?php foreach( $infos as $key => $info): ?>
                <?php if (!empty($info)) : ?>
                <div class="detail_item">
                    <h4 class="subtitle">
                        <?php echo $key; ?>
                    </h4>
                    <?php if (!is_array($info)) : ?>
                    <?php if (!@exif_imagetype($value) == true) : ?>
                    <?php if(filter_var($value, FILTER_VALIDATE_URL )): ?>
                    <a href="<?php echo $value ?>"><?php echo $value ?></a>
                    <?php else: ?>
                    <p>
                        <?php echo $info; ?>
                    </p>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <div>
                        <?php foreach( $info as $value): ?>
                        <?php if (@exif_imagetype($value) == true) : ?>
                        <img src="<?php echo $value ?>" alt="LINEQRコード">
                        <?php else: ?>
                        <p>
                        <?php echo $value; ?>
                        </p>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php if(get_field('recruitment')=== true) :?>
                <p class="volunteer">ボランティア募集中</p>
                <?php endif;?>
            </div>
            <!-- スクロール -->
            <div class="scroll"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/greenbottmo.png" alt="波" class="wave_img gbottom" />
        </div>
        <div class="bgcolor color">
            <div class="bgcolor_inner m1024">
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
                        <h3 class="subtitle">アクセス</h3>
                        <?php the_field('place_map',$event_id); ?>
                    </div>
                </div>
                <h3 class="subtitle_ulineorange">開催情報</h3>
                <div class="bgcolor_news">
                    <div class="text_box">
                        <?php if ($the_query->have_posts()) : ?>
                        <?php while($the_query->have_posts()) : ?>
                        <?php $the_query->the_post(); ?>
                        <p>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </p>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <p>
                            （仮表示中）直近の開催情報は、各食堂のSNS等をご覧ください。
                        </p>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php if (!empty($pic)) :?>
                <h3 class="subtitle_ulineorange">活動の様子</h3>
                <ul class="ac_slide">
                    <?php foreach( $pics as $pic): ?>
                    <li>
                        <img src="<?php echo  $pic; ?>" alt="#" />
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
        <!-- メインインナー終わり -->
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
    </div>
</main>
</div>
<?php get_footer(); ?>