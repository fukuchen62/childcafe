<?php get_header(); ?>
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
// eventの時点で該当するものがない場合 cafeinfo_idsが空になってしまい、エリアとボランティアだけになってしまう

// エリア（タクソノミーに存在）を取得
$area_slug = get_query_var('area');


// $volunteer ='';
if (isset($_GET['volunteer'])) {
$volunteer = $_GET['volunteer']; //searchform.phpの<input>のname属性の値と合わせる
}

$event_metaquerysp = ['relation' => 'AND'];

$adult_price = null;
if (isset($_GET['adult_price'])) {
$adult_price = $_GET['adult_price']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'adult_price',
        'value' => $adult_price,
        'compare' => '='
    ];
}

$child_price = null;
if (isset($_GET['child_price'])) {
$child_price = $_GET['child_price']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'child_price',
        'value' => $child_price,
        'compare' => '='
    ];
}

// $parking ='';
if (isset($_GET['parking'])) {
$parking = $_GET['parking']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'parking',
        'value' => $parking,
        'compare' => 'LIKE'
    ];
}

// $person ='';
if (isset($_GET['person'])) {
$person = $_GET['person']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'person',
        'value' => $person,
        'compare' => 'LIKE'
    ];
}

// $learning_support ='';
if (isset($_GET['learning_support'])) {
$learning_support = $_GET['learning_support']; //searchform.phpの<input>のname属性の値と合わせる
    $event_metaquerysp[] = [
        'key' => 'service',
        'value' => $learning_support,
        'compare' => 'LIKE'
    ];
}



// $food_pantry ='';
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
    'post_status' => 'publish', // 公開された投稿を指定
    // 'meta_query' => [
    //     [
    //     'key' => 'adult_price',
    //     'value' => $adult_price,
    //     'compare' => '='
    //     ]
    // ],
];

$hoge['meta_query'] = $event_metaquerysp;




$event_query = new WP_Query($hoge);

if (!is_null($child_price) || !is_null($adult_price) || !empty($parking) || !empty($person) || !empty($food_pantry) || !empty($learning_support)){

    // $empty_check = 'イベントチェックがされています';

    if ($event_query->have_posts()) {
    while ($event_query->have_posts()) {
    $event_query->the_post(); {
        $cafeinfo_ids[] = get_field('id');
        }
    }
        wp_reset_postdata();

    // if (!empty($cafeinfo_ids)) {
        $post__in = $cafeinfo_ids;
        // $check = 'イベント記事で該当があります！！';
    }else{
        $post__in = [1,2];
        // $check = 'イベント該当記事がありません！！';

    }



        // $post__in = $cafeinfo_ids;
    // クエリ作成
    $args = [
        'post_type' => 'cafeinfo',
        'posts_per_page' => 6,
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
        'post_status' => 'publish', // 公開された投稿を指定
        //該当イベント記事の親食堂ID
        'post__in' => $post__in,
        'orderby' => 'date',
        'order' => 'ASC',
    ];



    //エリアとボランティアだけチェックされたら
} else {
    $args = [
        'post_type' => 'cafeinfo',
        'posts_per_page' => 6,
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
        'post_status' => 'publish', // 公開された投稿を指定
        'orderby' => 'date',
        'order' => 'ASC',
    ];
    // $check = '初期状態です！！';
}




// $post__in = '';
// if ($free || $adult_price || $parking || $person || $food_pantry || $learning_support){
//     if (!$event_query->have_posts()) {

//         $args = [];

//     }
// }


// クエリ作成
// $args = [
//     'post_type' => 'cafeinfo',
//     'posts_per_page' => -1,
//     //該当イベント記事の親食堂ID
//     'post__in' => $post__in,
// ];


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


// カスタムクエリを追加する前に、元のクエリを保存しておく
// $original_query = $wp_query;


$the_query = new WP_Query($args);










?>
<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">条件からさがす</h2>
        <?php //echo $check; ?>
        <?php //echo $empty_check; ?>
        <?php //print_r($learning_support); ?>
        <?php //echo $volunteer; ?>
        <?php //echo $free; ?>
        <?php //print_r($hoge); ?>
        <?php //print_r($args); ?>
        <?php //print_r($cafeinfo_ids); ?>

        <form action="<?php echo home_url('/find'); ?>" method="get" class="search_form">
            <section class="form">
                <h3 class="subtitle">チェックしてさがしてみよう！</h3>
                <div class="form_wrap">
                    <!-- エリア検索欄 -->
                    <div class="form_item">
                        <h3 class="item_title">地域</h3>
                        <!-- 東部 -->
                        <div class="item_wrap">
                            <div class="ac_label">東部</div>
                            <div class="ac_list east_list">
                                <label for="east_all">
                                    <input type="checkbox" id="east_all" />東部全て
                                </label>
                                <?php foreach ($east as $town) :  ?>
                                <label for="<?php echo $town->slug; ?>">
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]"
                                        value="<?php echo $town->slug; ?>"
                                        class="east_list" /><?php echo $town->name; ?>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- 南部 -->
                        <div class="item_wrap">
                            <div class="ac_label south_label">南部</div>
                            <div class="ac_list">
                                <label for="south_all">
                                    <input type="checkbox" id="south_all" />南部全て
                                </label>
                                <?php foreach ($south as $town) :  ?>
                                <label for="<?php echo $town->slug; ?>">
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]"
                                        value="<?php echo $town->slug; ?>"
                                        class="south_list" /><?php echo $town->name; ?>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- 西部 -->
                        <div class="item_wrap">
                            <div class="ac_label west_label">西部</div>
                            <div class="ac_list west_list">
                                <label for="west_all">
                                    <input type="checkbox" id="west_all" />西部全て
                                </label>
                                <?php foreach ($west as $town) :  ?>
                                <label for="<?php echo $town->slug; ?>">
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]"
                                        value="<?php echo $town->slug; ?>"
                                        class="west_list" /><?php echo $town->name; ?>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- エリア検索欄終了 -->
                    <!-- チェックボックス欄 -->
                    <div class="form_item">
                        <h3 class="item_title02">こだわり条件</h3>
                        <div class="checkbox-001">
                            <label>
                                <input type="checkbox" name="child_price" value="0" />こども無料
                            </label>
                            <label>
                                <input type="checkbox" name="adult_price" value="0" />おとな無料
                            </label>
                            <label>
                                <input type="checkbox" name="person" value="こどもだけで行ける" />こどもだけで行ける
                            </label>
                            <label>
                                <input type="checkbox" name="parking" value="有り" />駐車場あり
                            </label>
                            <label>
                                <input type="checkbox" name="food_pantry" value="フードパントリー" />フードパントリーあり
                            </label>
                            <label>
                                <input type="checkbox" name="learning_support" value="学習支援" />学習支援あり
                            </label>
                            <label>
                                <input type="checkbox" name="volunteer" value="1" />ボランティア募集中
                            </label>
                        </div>
                    </div>
                    <!--チェックボックス欄  終了-->
                </div>
                <!-- ボタン -->
                <div class="form_btns flex">
                    <input class="submit_btn" type="submit" value="さがす" />
                    <input class="reset_btn" type="reset" value="リセット" />
                </div>
            </section>
        </form>


        <!-- 検索結果表示 -->
        <div class="searcharea">
            <h2 class="title">検索結果一覧</h2>
            <div class="searcharea_item searcharea_flex">
                <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <a href="<?php the_permalink() ?>">
                    <div class="item_card">
                        <?php $eye_catching = get_field('eye_catching');?>
                        <?php if(!empty($eye_catching)): ?>
                        <img src="<?php the_field('eye_catching'); ?>" alt="">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
                        <?php endif; ?>
                        <p class="item_card_title"><?php the_field('name') ?></p>
                        <?php //'ボランティアは'.the_field('recruitment'); ?>
                        <p class="item_card_title border">
                            <?php echo get_the_terms($post->ID, 'area')[1]->name; ?>
                        </p>
                        <p class="item_card_text">
                            <?php $features = get_field('features');
                                //40文字にする
                                if(mb_strlen($features) > 40) {
                                    $features = mb_substr($features,0,40);
                                    echo $features . '・・・' ;
                                } else {
                                    echo $features;
                                }
                            ?>
                        </p>
                    </div>
                </a>
                <?php endwhile; ?>
                <?php else:?>
                <div class="not_found_inner ">
                    <p>お探しのこども食堂が見つかりませんでした。</p>
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/index/notfind.png" alt=""
                        class="not_found_img" />
                </div>
                <?php endif;?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php
                    // 元のクエリを復元する
                    // $wp_query = $original_query;
                ?>
            <!-- ページナビ -->
            <div class="page_nav flex">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                ?>
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

                <?php //original_pagenation(); ?>

            </div>

        </div>
        <!-- 検索結果表示 終了-->
        <!-- 検索結果表示 -->
        <!-- <div class="result_img">
            <h2 class="title">検証用イベント一覧</h2>
            <div class="result_img_wrap flex">
                <?php //if ($event_query->have_posts()) : ?>
                <?php //while ($event_query->have_posts()) : ?>
                <?php //$event_query->the_post(); ?>
                <a href="<?php //the_permalink() ?>">
                    <div class="result_img_card">
                        <img src="<?php //the_field('eye_catching'); ?>" alt="" />
                        <p><?php //the_field('title') ?></p>
                        <p><?php //print_r(get_field('service')) ?></p>
                        <p><?php //print_r(get_field('person')) ?></p>
                        <p><?php //echo 'おとな料金は'.get_field('adult_price') ?></p>
                        <p><?php //echo 'こども料金は'.get_field('child_price') ?></p>
                        <p><?php //print_r(get_field('parking')) ?></p>
                        <?php //print_r(get_field_object('parking')); ?>
                        <?php //print_r(get_field_object('starttime')); ?>
                    </div>
                </a>
                <?php //endwhile; ?>
                <?php //endif;?>
                <?php //wp_reset_postdata(); ?>
            </div>
        </div> -->
        <!-- 検索結果表示 終了-->

    </div>
</main>
</div>


<?php get_footer(); ?>