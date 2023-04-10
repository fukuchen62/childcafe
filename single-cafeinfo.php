<?php get_header(); ?>
<?php
$this_terms = get_the_terms($post->ID,'area');

$event_id = get_field('event_id');
$service_array = get_field('service', $event_id);

$child_price = get_field('child_price',$event_id);
if ($child_price == '0') {
    $child_price = '無料';
} else{
    $child_price = $child_price.'円';
}

$adult_price= get_field('adult_price',$event_id);
if ($adult_price == '0') {
    $adult_price = '無料';
} else{
    $adult_price = $adult_price.'円';
}

$parking = get_field('parking',$event_id);
if ($parking == '無し') {
    $parking = 'なし';
} else{
    $parking = 'あり';
}

$reserve = get_field('reserve',$event_id);
if ($reserve == '1') {
    $reserve = '必要あり';
} else{
    $reserve = '必要なし';
}

$person = get_field('person',$event_id);

$offer= get_field('offer',$event_id);


$event_fields = get_field_objects($event_id);
$events = $event_fields;
// unset($events['class'],$events['title'],$events['place_map'],$events['service'],$events['pic1'],$events['pic2'],$events['pic3'],$events['pic4'],$events['pic5'],$events['pic6'],$events['pic7'],$events['pic8'],$events['pic9'],$events['pic10'],$events['eye_catching'],$events['id'],$events['appeal'],$events['license']);

// $infos = array();
// $contact = array('電話番号:'. get_field('tel'),'メールアドレス:'.get_field('email'),'LINE:'.get_field('line_id'));


// $infos = array(
//     '担当者名'=>[get_field('staff')],
//     '連絡先'=> ['電話番号:'=> get_field('tel'),'メールアドレス:'=>get_field('email'),'LINE:'=>get_field('line_id')],
//     'LINE QRコード'=>[get_field('line_qr'), get_field('line_url')],
//     'SNS'=>['instagram:'=> get_field('instagram'),'twitter:'=> get_field('twitter'),'facebook:'=> get_field('twitter')],
//     '公式WEBサイト'=>[get_field('site_url')],
//     'Amazonみんなで応援プログラム'=>[get_field('amapro')]
//     );

$pics = array(get_field(''));

?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <!-- ページトップ -->
        <?php if (have_posts()) : ?>
        <?php while(have_posts()) : ?>
        <?php the_post(); ?>
        <div class="yellow color">
            <div class="yellow_inner m1024">
                <h2 class="title"><?php the_field('name'); ?></h2>
                <div class="pc_flex">
                    <div>
                        <?php if(! empty(get_field('eye_catching'))): ?>
                        <img src="<?php the_field('eye_catching'); ?>" alt="" class="main_visual" />
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
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
                            <div class="pc_pickup">
                                <a class="btn_item" href="<?php echo home_url('/interview/' . get_field('id')); ?>"><?php echo get_field('name').'の特集記事はこちら'; ?></a>
                            </div>
                        </div>
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
                <div class="detail_item">
                    <h3 class="subtitle">住所</h3>
                    <div>
                        <p><?php echo '〒'.get_field('postcode',$event_id); ?></p>
                        <p><?php the_field('address',$event_id); ?></p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">開催日時・頻度</h3>
                    <div>
                        <p><?php the_field('date',$event_id); ?></p>
                        <p><?php the_field('time',$event_id); ?></p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">開催規模</h3>
                    <div>
                        <p><?php the_field('scale',$event_id); ?></p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">参加対象</h3>
                    <div>
                        <?php foreach( $person as $subject): ?>
                        <p><?php echo  $subject; ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">
                        参加対象について
                    </h3>
                    <div>
                        <p><?php the_field('everyone',$event_id); ?></p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">参加料金</h3>
                    <div>
                        <p><?php echo 'こども：'.$child_price; ?></p>
                        <p><?php echo 'おとな：'.$adult_price; ?></p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">参加条件</h3>
                    <div>
                        <p><?php the_field('conditions',$event_id); ?></p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">事前予約</h3>
                    <div>
                        <p><?php echo $reserve; ?></p>
                        <p><?php the_field('reserve_info',$event_id); ?></p>
                    </div>
                </div>

                <div class="detail_item">
                    <h3 class="subtitle">駐車場</h3>
                    <div>
                        <p><?php echo $parking; ?></p>
                        <p><?php the_field('parking_info',$event_id); ?></p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">食事スタイル</h3>
                    <div>
                        <?php foreach( $offer as $subject): ?>
                        <p><?php echo  $subject; ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">参加者の主な年代</h3>
                    <p><?php the_field('main_age',$event_id); ?></p>
                </div>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/beigebottom.png" alt="波" class="wave_img bbottom" />
        </div>
        <div class="green color">
            <div class="green_inner m1024">
                <div class="detail_item">
                    <h3 class="subtitle">担当者</h3>
                    <p><?php the_field('staff'); ?></p>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">連絡先</h3>
                    <div>
                        <p>電話番号:000-000-0000</p>
                        <p>メールアドレス:sample@sample.com</p>
                        <p>LINE:shokudou@LINE</p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">LINE QRコード</h3>
                    <img src="#" alt="LINEQRコード" />
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">SNS</h3>
                    <div>
                        <p>instagram:インスタアカウント</p>
                        <p>twitter:ツイッターアカウント</p>
                        <p>facebook:フェイスブックアカウント</p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">公式WEBサイト</h3>
                    <p>http/example</p>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">
                                        Amazonみんなで応援プログラム
                                    </h3>
                    <p>Amazon/url/urlurl</p>
                </div>
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
                            <p>
                                <?php
                                if ($service == 'その他資格者') {
                                    the_field('license',$event_id);
                                } else {
                                    echo $service;
                                }
                                ?>
                            </p>
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
                        <p>
                                            <a href="#"
                                                >3/1　徳島市　山田花子食堂　開催情報</a
                                            >
                                        </p>
                        <p>
                                            <a href="#"
                                                >3/2　小松島市　山田花子食堂　開催情報</a
                                            >
                                        </p>
                        <p>
                                            <a href="#"
                                                >3/3　北島町　山田花子食堂　開催情報</a
                                            >
                                        </p>
                    </div>
                </div>

                <h3 class="subtitle_ulineorange">活動の様子</h3>
                <ul class="ac_slide">
                    <li>
                        <img src="../assets/images/delete/kv1_kari.jpg" alt="#" />
                    </li>
                    <li>
                        <img src="../assets/images/delete/kv2_kari.jpg" alt="#" />
                    </li>
                    <li>
                        <img src="../assets/images/delete/kv3_kari.jpg" alt="#" />
                    </li>
                </ul>
            </div>
        </div>
        <!-- メインインナー終わり -->
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</main>
</div>
<?php get_footer(); ?>