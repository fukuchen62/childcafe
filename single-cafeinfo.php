<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$this_terms = get_the_terms($post->ID,'area');

$event_id = get_field('event_id');
$service_array = get_field('service', $event_id);
$event_fields = get_field_objects($event_id);
$events = $event_fields;
unset($events['class'],$events['title'],$events['place_map'],$events['service'],$events['pic1'],$events['pic2'],$events['pic3'],$events['pic4'],$events['pic5'],$events['pic6'],$events['pic7'],$events['pic8'],$events['pic9'],$events['pic10'],$events['eye_catching'],$events['id'],$events['appeal'],$events['license']);

$infos = array();
// $contact = array('電話番号:'. get_field('tel'),'メールアドレス:'.get_field('email'),'LINE:'.get_field('line_id'));


$infos = array(
    '担当者名'=>[get_field('staff')],
    '連絡先'=> ['電話番号:'=> get_field('tel'),'メールアドレス:'=>get_field('email'),'LINE:'=>get_field('line_id')],
    'LINE QRコード'=>[get_field('line_qr'), get_field('line_url')],
    'SNS'=>['instagram:'=> get_field('instagram'),'twitter:'=> get_field('twitter'),'facebook:'=> get_field('twitter')],
    '公式WEBサイト'=>[get_field('site_url')],
    'Amazonみんなで応援プログラム'=>[get_field('amapro')]
    );

$pics = array(get_field(''));

?>

<main>
    <div class="main_inner">
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
                                <?php
                                echo $this_terms[1]->name;
                                ?>
                            </p>
                            <div class="good cafeinfo_flex flex">
                                <p><?php echo do_shortcode('[wp_ulike]'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="pc_w320">
                        <h3 class="subtitle"><?php echo get_field_object('features')['label']; ?></h3>
                        <p class="text">
                            <?php the_field('features'); ?>
                        </p>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#f7dd94" fill-opacity="1" d="M0,224L80,240C160,256,320,288,480,261.3C640,235,800,149,960,144C1120,139,1280,213,1360,250.7L1440,288L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
            </svg>
        </div>
        <div class="beige color">
            <div class="beige_inner m1024">
                <?php foreach( $events as $event): ?>
                <div class="detail_item">
                    <?php if (! empty($event['value'])) : ?>
                    <h3 class="subtitle">
                        <?php echo $event['label']; ?>
                    </h3>
                    <?php if (! is_array($event['value'])) : ?>
                    <p>
                        <?php echo $event['value']; ?>
                    </p>
                    <?php else: ?>
                    <?php foreach( $event['value'] as $value ): ?>
                    <p>
                        <?php echo $value; ?>
                    </p>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#d7f794" fill-opacity="1" d="M0,256L60,224C120,192,240,128,360,96C480,64,600,64,720,96C840,128,960,192,1080,208C1200,224,1320,192,1380,176L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>
        <div class="green color">
            <div class="green_inner m1024">

                <?php foreach( $infos as $label => $info): ?>
                <?php $show_label = true; ?>
                <?php foreach($info as $key => $value): ?>
                <?php if (!empty($value)) : ?>

                <?php //$info = array_filter($info); // 空の要素を削除する ?>
                <?php //foreach($info as $key => $value): ?>
                <?php if ($show_label): ?>
                <?php //if (!empty($value)) : ?>
                <div class="detail_item">
                    <h3 class="subtitle">
                        <?php echo $label; ?>
                    </h3>
                    <div>
                        <?php $show_label = false; ?>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>

                        <?php foreach($info as $key => $value): ?>
                        <?php if (!empty($value)) : ?>
                        <?php if (@exif_imagetype($value) == true) : ?>
                        <img src="<?php echo $value ?>" alt="LINEQRコード">
                        <?php elseif(filter_var($value, FILTER_VALIDATE_URL )): ?>
                        <a href="<?php echo $value ?>"><?php echo $value ?></a>
                        <?php else: ?>
                        <p>
                        <?php echo $key . $value; ?>
                        </p>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(get_field('recruitment')=== true) :?>
                <p class="volunteer">ボランティア募集中</p>
                <?php endif;?>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff8e6" fill-opacity="1" d="M0,128L60,149.3C120,171,240,213,360,208C480,203,600,149,720,144C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>
        <div class="bgcolor color">
            <div class="bgcolor_inner m1024">
                <div class="bgcolor_flex">
                    <div class="others">
                        <h3 class="subtitle">取り扱いのあるもの</h3>
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
                <h3 class="subtitle_ulineorange">活動の様子</h3>
                <ul class="ac_slide">

                    <li>
                        <img src="../assets/images/delete/kv1_kari.jpg" alt="#" />
                    </li>
                </ul>
            </div>
        </div>
        <!-- メインインナー終わり -->
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>