<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php

// $tokushima = $_GET['tokushima'];
// $volunteer = $_GET['volunteer'];
// $volunteer = filter_var($volunteer, FILTER_VALIDATE_BOOLEAN);

// エリア（タクソノミーに存在）を取得
$area_slug = get_query_var('area');


$volunteer ='';
if (isset($_GET['volunteer'])) {
$volunteer = $_GET['volunteer']; //searchform.phpの<input>のname属性の値と合わせる
}

// $starttime ='';
// if (isset($_GET['starttime'])) {
// $starttime = $_GET['starttime']; //searchform.phpの<input>のname属性の値と合わせる
// }

// $subject ='';
// if (isset($_GET['subject'])) {
// $subject = $_GET['subject']; //searchform.phpの<input>のname属性の値と合わせる
// }

$event_metaquerysp = ['relation' => 'AND'];

$reserve ='';
if (isset($_GET['reserve'])) {
$reserve = $_GET['reserve']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'reserve',
        'value' => $reserve,
        'compare' => '='
    ];
}

$hoge = [
    'post_type' => 'event',
    'posts_per_page' => -1,
    'meta_query' => [
        [
        'key' => 'reserve',
        'value' => $reserve,
        'compare' => '='
        ]
    ],
];

// $hoge['meta_query'] = $event_metaquerysp;


$cafeinfo_ids = [];

$event_query = new WP_Query($hoge);

if ($event_query->have_posts()) {
while ($event_query->have_posts()) {
$event_query->the_post(); {
    $cafeinfo_ids = get_field('id');
}
}
wp_reset_postdata(); }


// クエリ作成
$args = [
    'post_type' => 'cafeinfo',
    'posts_per_page' => -1,
    //該当イベント記事の親食堂ID
    'post__in' => $cafeinfo_ids,
];

// if (!empty($reserve)) {
// $querysp[] = [
//     'post__in' => $cafeinfo_ids,
// ];
// $args[] = $querysp;
// // }


$args[] = ['relation' => 'AND'];


// 選択していない場合も考慮して条件で絞り込む。
if (!empty($area_slug)) {
    $taxquerysp[] = [
        'taxonomy' => 'area',           //タクソノミー：『エリア』
        'terms' => $area_slug,          //スラッグ名
        'field' => 'slug',              //スラッグ指定
    ];
    $args['tax_query'] = $taxquerysp;       // 絞り込んだ情報を $args に代入する。
}

// 選択していない場合も考慮して条件で絞り込む。
if (!empty($volunteer)) {
    $metaquerysp[] = [
        'key' => 'recruitment',
        'value' => $volunteer,
        'compare' => '='
    ];
    $args['meta_query'] = $metaquerysp;       // 絞り込んだ情報を $args に代入する。
}




$the_query = new WP_Query($args);






?>
<main>
    <div class="main_inner">
        <h2 class="title">詳細検索</h2>
        <?php echo $volunteer; ?>
        <?php print_r($args); ?>
        <form action="#" method="get">
            <section class="form">
                <h3 class="subtitle">子供食堂をさがす</h3>
                <div class="form_wrap">
                    <!-- エリア検索欄 -->
                    <div class="form_item">
                        <h3 class="item_title">地域</h3>
                        <!-- 東部 -->
                        <div class="item_wrap">
                            <div class="ac_label">東部</div>
                            <ul class="ac_list">
                                <li>
                                    <input type="checkbox" id="east_all" name="area[]" value="tokushima" /><label for="east_all">東部</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="tokushima" name="area[]" value="tokushima" /><label for="tokushima">徳島市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="naruto" name="area[]" value="tokushima" /><label for="naruto">鳴門市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="komatushima" name="area[]" value="tokushima" /><label for="komatushima">小松島市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="yoshinogawa" name="area[]" value="tokushima" /><label for="yoshinogawa">吉野川市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="awa" name="area[]" value="tokushima" /><label for="awa">阿波市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="ishii" name="area[]" value="tokushima" /><label for="ishii">石井町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kamiyama" name="area[]" value="tokushima" /><label for="kamiyama">神山町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="matushige" name="area[]" value="tokushima" /><label for="matushige">松茂町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kitajima" name="area[]" value="tokushima" /><label for="kitajima">北島町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="aizumi" name="area[]" value="tokushima" /><label for="aizumi">藍住町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="itano" name="area[]" value="tokushima" /><label for="itano">板野町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kamiita" name="area[]" value="tokushima" /><label for="kamiita">上板町</label>
                                </li>
                            </ul>
                        </div>
                        <!-- 西部 -->
                        <div class="item_wrap">
                            <div class="ac_label">西部</div>
                            <ul class="ac_list">
                                <li>
                                    <input type="checkbox" id="west_all" name="area[]" value="tokushima" /><label for="west_all">西部</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="miyoshi" name="area[]" value="tokushima" /><label for="miyoshi">三好市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="higashimiyoshi" name="area[]" value="tokushima" /><label for="higashimiyoshi">東みよし市</label>
                                </li>
                            </ul>
                        </div>
                        <!-- 南部 -->
                        <div class="item_wrap">
                            <div class="ac_label">南部</div>
                            <ul class="ac_list">
                                <input type="checkbox" id="south_all" /><label for="south_all">南部</label>
                                <li>
                                    <input type="checkbox" id="anan" name="area[]" value="anan" /><label for="anan">阿南市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="naka" name="area[]" value="naka" /><label for="naka">那賀町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kaiyou" name="area[]" value="tokushima" /><label for="kaiyou">海陽町</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- エリア検索欄終了 -->
                    <!-- チェックボックス欄 -->
                    <div class="form_wrap">
                        <div class="checkbox-001">
                            <label>
                                <input type="checkbox" name="checkbox-001" value="完全無料" />完全無料
                            </label>
                            <label>
                                <input type="checkbox" name="reserve" value="1" />事前予約
                            </label>
                            <label>
                                <input type="checkbox" name="checkbox-001" value="有り" />駐車場
                            </label>
                            <label>
                                <input type="checkbox" name="checkbox-001" value="子供だけでいける" />子供だけでいける
                            </label>
                            <label>
                                <input type="checkbox" name="volunteer" value="1" />ボランティア募集中
                            </label>
                            <label>
                                <input type="checkbox" name="checkbox-001" value="完全無料" />フードパントリー
                            </label>
                            <label>
                                <input type="checkbox" name="checkbox-001" value="完全無料" />学習支援
                            </label>
                        </div>
                    </div>
                    <!--チェックボックス欄  終了-->
                </div>
            </section>
            <!-- ボタン -->
            <div class="form_btns flex">
                <input class="btn submit_btn" type="submit" value="さがす" />
                <input class="btn reset_btn" type="reset" value="リセット" />
            </div>
        </form>


        <!-- 検索結果表示 -->
        <div class="result_img">
            <h2 class="title">検索結果一覧</h2>
            <div class="result_img_wrap flex">
                <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <a href="<?php the_permalink() ?>">
                    <div class="result_img_card">
                        <img src="<?php the_field('eye_catching'); ?>" alt="" />
                        <p><?php the_field('name') ?></p>
                        <?php 'ボランティアは'.the_field('recruitment'); ?>
                        <?php echo get_the_terms($post->ID, 'area')[1]->name; ?>
                    </div>
                </a>
                <?php endwhile; ?>
                <?php endif;?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
        <!-- 検索結果表示 終了-->
        <!-- 検索結果表示 -->
        <div class="result_img">
            <h2 class="title">検証用イベント一覧</h2>
            <div class="result_img_wrap flex">
                <?php if ($event_query->have_posts()) : ?>
                <?php while ($event_query->have_posts()) : ?>
                <?php $event_query->the_post(); ?>
                <a href="<?php the_permalink() ?>">
                    <div class="result_img_card">
                        <img src="<?php the_field('eye_catching'); ?>" alt="" />
                        <p><?php the_field('title') ?></p>
                        <p><?php '予約必要性は'.the_field('reserve') ?></p>
                        <?php //print_r(get_field_object('starttime')); ?>
                    </div>
                </a>
                <?php endwhile; ?>
                <?php endif;?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
        <!-- 検索結果表示 終了-->

    </div>
</main>


<?php get_footer(); ?>