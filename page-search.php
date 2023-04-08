<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php

//市町村一覧
$east = get_terms(array(
    'taxonomy' => 'area',
    'parent' => get_term_by('slug', 'east', 'area')->term_id
));

$south = get_terms(array(
    'taxonomy' => 'area',
    'parent' => get_term_by('slug', 'south', 'area')->term_id
));

$west = get_terms(array(
    'taxonomy' => 'area',
    'parent' => get_term_by('slug', 'west', 'area')->term_id
));


//エリアとボランティア募集だけ検索の場合
// eventの時点で該当するものがない場合

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

$free ='';
if (isset($_GET['child_price'])) {
$free = $_GET['child_price']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'child_price',
        'value' => $free,
        'compare' => '='
    ];
}

$parking ='';
if (isset($_GET['parking'])) {
$parking = $_GET['parking']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'parking',
        'value' => $parking,
        'compare' => 'LIKE'
    ];
}

$person ='';
if (isset($_GET['person'])) {
$person = $_GET['person']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'person',
        'value' => $person,
        'compare' => 'LIKE'
    ];
}

$learning_support ='';
if (isset($_GET['learning_support'])) {
$learning_support = $_GET['learning_support']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'service',
        'value' => $learning_support,
        'compare' => 'LIKE'
    ];
}



$food_pantry ='';
if (isset($_GET['food_pantry'])) {
$food_pantry = $_GET['food_pantry']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'service',
        'value' => $food_pantry,
        'compare' => 'LIKE'
    ];
}


$hoge = [
    'post_type' => 'event',
    'posts_per_page' => -1,
    // 'meta_query' => [
    //     [
    //     'key' => 'reserve',
    //     'value' => $reserve,
    //     'compare' => '='
    //     ]
    // ],
];

$hoge['meta_query'] = $event_metaquerysp;




$event_query = new WP_Query($hoge);

if ($event_query->have_posts()) {
while ($event_query->have_posts()) {
$event_query->the_post(); {
    $cafeinfo_ids[] = get_field('id');
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
        <?php print_r($learning_support); ?>
        <?php echo $volunteer; ?>
        <?php echo $free; ?>
        <?php print_r($hoge); ?>
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
                                <?php foreach ($east as $town) :  ?>
                                <li>
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]" value="<?php echo $town->slug; ?>" /><label for="<?php echo $town->slug; ?>"><?php echo $town->name; ?></label>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- 西部 -->
                        <div class="item_wrap">
                            <div class="ac_label">西部</div>
                            <ul class="ac_list">
                                <li>
                                    <input type="checkbox" id="west_all" name="area[]" value="tokushima" /><label for="west_all">西部</label>
                                </li>
                                <?php foreach ($west as $town) :  ?>
                                <li>
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]" value="<?php echo $town->slug; ?>" /><label for="<?php echo $town->slug; ?>"><?php echo $town->name; ?></label>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- 南部 -->
                        <div class="item_wrap">
                            <div class="ac_label">南部</div>
                            <ul class="ac_list">
                                <input type="checkbox" id="south_all" /><label for="south_all">南部</label>
                                <?php foreach ($south as $town) :  ?>
                                <li>
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]" value="<?php echo $town->slug; ?>" /><label for="<?php echo $town->slug; ?>"><?php echo $town->name; ?></label>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- エリア検索欄終了 -->
                    <!-- チェックボックス欄 -->
                    <div class="form_wrap">
                        <div class="checkbox-001">
                            <label>
                                <input type="checkbox" name="child_price" value="0" />完全無料
                            </label>
                            <label>
                                <input type="checkbox" name="reserve" value="1" />事前予約
                            </label>
                            <label>
                                <input type="checkbox" name="parking" value="有り" />駐車場
                            </label>
                            <label>
                                <input type="checkbox" name="person" value="こどもだけで行ける" />子供だけでいける
                            </label>
                            <label>
                                <input type="checkbox" name="volunteer" value="1" />ボランティア募集中
                            </label>
                            <label>
                                <input type="checkbox" name="food_pantry" value="フードパントリー" />フードパントリー
                            </label>
                            <label>
                                <input type="checkbox" name="learning_support" value="学習支援" />学習支援
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
                        <p><?php //print_r(get_field('service')) ?></p>
                        <p><?php //print_r(get_field('person')) ?></p>
                        <p><?php echo '予約必要性は'.get_field('reserve') ?></p>
                        <p><?php echo '子ども料金は'.get_field('child_price') ?></p>
                        <p><?php //print_r(get_field('parking')) ?></p>
                        <?php //print_r(get_field_object('parking')); ?>
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