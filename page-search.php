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

$reserve ='';
if (isset($_GET['reserve'])) {
$reserve = $_GET['reserve']; //searchform.phpの<input>のname属性の値と合わせる
}

// クエリ作成
$args = [
    'post_type' => 'cafeinfo',
    'posts_per_page' => -1,
];
$querysp = ['relation' => 'AND'];

// 選択していない場合も考慮して条件で絞り込む。
if (!empty($area_slug)) {
    $querysp[] = [
        'taxonomy' => 'area',           //タクソノミー：『エリア』
        'terms' => $area_slug,          //スラッグ名
        'field' => 'slug',              //スラッグ指定
    ];
    $args['tax_query'] = $querysp;       // 絞り込んだ情報を $args に代入する。
}

// 選択していない場合も考慮して条件で絞り込む。
if (!empty($volunteer)) {
    $querysp[] = [
        'key' => 'recruitment',
        'value' => $volunteer,
        'compare' => '='
    ];
    $args['meta_query'] = $querysp;       // 絞り込んだ情報を $args に代入する。
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
    ]
];

$event_query = new WP_Query($hoge);

if ($event_query->have_posts()) {
while ($event_query->have_posts()) {
$event_query->the_post(); {
    $cafeinfo_ids[] = get_field('id');
}
}
wp_reset_postdata(); }

if (!empty($reserve)) {
$querysp = [
    'post__in' => $cafeinfo_ids,
];
$args[] = $querysp;
}

$the_query = new WP_Query($args);






?>
<main>
    <div class="main_inner">
        <h2 class="title">詳細検索</h2>
        <!-- タブ -->
        <ul class="tab flex">
            <li class="tab_1 tab_js info">基本情報</li>
            <li class="tab_2 tab_js daytime">日時</li>
            <li class="tab_3 tab_js favorite">こだわり</li>
        </ul>
        <form action="<?php echo home_url('/search')?>" method="get">

            <!--隠しフィールドとして記述する（これがないとフォームがうまく動作しません）-->
            <input type="hidden" name="s" value="">

            <!-- タブ１項目 -->
            <section class="form1 panel info is-show">
                <h3 class="subtitle">子供食堂をしらべる</h3>
                <?php echo $volunteer.'は'; ?>
                <?php print_r($args); ?>
                <?php echo $area_slug; ?>
                <?php echo $starttime .'は';?>
                <?php print_r($cafeinfo_ids); ?>
                <div class="form_wrap">
                    <!-- エリア検索欄 -->
                    <div class="form_item">
                        <h3 class="item_title">地域</h3>
                        <!-- 東部 -->
                        <div class="item_wrap">
                            <div class="ac_label">東部</div>
                            <ul class="ac_list">
                                <li>
                                    <input type="checkbox" id="tokushima" name="area" value="tokushima"><label for="tokushima">徳島市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="naruto" name="area" value="naruto" /><label for="naruto">鳴門市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="matushige" /><label for="matushige">松茂町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kitajima" /><label for="kitajima">北島町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="aizumi" /><label for="aizumi">藍住町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="itano" /><label for="itano">板野町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="ishii" /><label for="ishii">石井町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kamiyama" /><label for="kamiyama">神山町</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="awa" /><label for="awa">阿波市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kamiita" /><label for="kamiita">上板町</label>
                                </li>
                            </ul>
                        </div>
                        <!-- 西部 -->
                        <div class="item_wrap">
                            <div class="ac_label">西部</div>
                            <ul class="ac_list">
                                <li>
                                    <input type="checkbox" id="miyoshi" /><label for="miyoshi">三好市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="higashimiyoshi" /><label for="higashimiyoshi">東みよし市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mima" /><label for="mima">美馬市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="yoshinogawa" /><label for="yoshinogawa">吉野川市</label>
                                </li>
                            </ul>
                        </div>

                        <!-- 南部 -->
                        <div class="item_wrap">
                            <div class="ac_label">南部</div>
                            <ul class="ac_list">
                                <li>
                                    <input type="checkbox" id="komatushima" /><label for="komatushima">小松島市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="anann" /><label for="anann">阿南市</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="kaiyou" /><label for="kaiyou">海陽町</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- エリア検索欄終了 -->

                    <!-- 料金検索 -->
                    <div class="form_item">
                        <h3 class="item_title">料金</h3>
                        <!-- こども料金 -->
                        <div class="item_wrap">
                            <label for="child" class="checklist">こども：</label>
                            <select class="select" name="child_money" size="1" id="child">
                                <option value="" selected hidden disabled>料金を選択</option>
                                <option value="完全無料">
                                    完全無料
                                </option>
                                <option value="募金制">
                                    募金制
                                </option>
                                <option value="～３００円">
                                    ～３００円
                                </option>
                                <option value="５００円">
                                    ５００円
                                </option>
                                <option value="５００円以上">
                                    ５００円以上
                                </option>
                            </select>
                        </div>
                        <!-- 大人料金 -->
                        <div class="item_wrap">
                            <label for="adult" class="checklist">おとな：</label>
                            <select class="select" name="adult_money" size="1" id="adult">
                                <option value="" selected hidden disabled>料金を選択</option>
                                <option value="完全無料">
                                    完全無料
                                </option>
                                <option value="募金制">
                                    募金制
                                </option>
                                <option value="～３００円">
                                    ～３００円
                                </option>
                                <option value="５００円">
                                    ５００円
                                </option>
                                <option value="５００円以上">
                                    ５００円以上
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- 開催日時検索 -->
                    <div class="form_item">
                        <h3 class="item_title">開催日時</h3>
                        <div class="item_wrap">
                            <div class="ac_label">曜日</div>
                            <ul class="ac_list">
                                <li>
                                    <input type="checkbox" id="monday" /><label for="monday">月曜日</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="tuesday" /><label for="tuesday">火曜日</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="wednesday" /><label for="wednesday">水曜日</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="thursday" /><label for="thursday">木曜日</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="friday" /><label for="friday">金曜日</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="saturday" /><label for="saturday">土曜日</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="sunday" /><label for="sunday">日曜日</label>
                                </li>
                            </ul>
                        </div>
                        <div class="item_wrap flex">
                            <label for="min_time" class="checklist">時間：</label>
                            <div class="time_wrap flex">
                                <input id="min_time" type="time" name="starttime" step="3600" min="07:00:00" max="22:00:00" list="data-list" selected />
                                <p>～</p>
                                <input id="max_time" type="time" name="time" step="3600" min="07:00:00" max="22:00:00" list="data-list" selected disabled />
                            </div>
                            <!-- 時間間隔設定 -->
                            <datalist id="data-list">
                                <option value="07:00"></option>
                                <option value="08:00"></option>
                                <option value="09:00"></option>
                                <option value="10:00"></option>
                                <option value="11:00"></option>
                                <option value="12:00"></option>
                                <option value="13:00"></option>
                                <option value="14:00"></option>
                                <option value="18:00"></option>
                                <option value="19:00"></option>
                                <option value="20:00"></option>
                                <option value="21:00"></option>
                                <option value="22:00"></option>
                            </datalist>
                        </div>
                        <!-- 開催日時検索 終了-->

                        <!-- 事前予約の有無 -->
                        <div class="form_item">
                            <h3 class="item_title">事前予約</h3>
                            <div class="radiobtn flex">
                                <label>
                                    <input type="radio" name="reserve" value="1" />
                                    有
                                </label>
                                <label>
                                    <input type="radio" name="reserve" />
                                    無
                                </label>
                            </div>
                        </div>
                        <!-- 事前予約の有無 終了-->

                        <!-- 駐車場の有無 -->
                        <div class="form_item">
                            <h3 class="item_title">駐車場</h3>
                            <div class="radiobtn flex">
                                <label>
                                    <input type="radio" name="parking" />
                                    有
                                </label>
                                <label>
                                    <input type="radio" name="parking" />
                                    無
                                </label>
                            </div>
                        </div>
                        <!-- 駐車場の有無 終了-->
                    </div>
                </div>
            </section>
            <!-- タブ１項目 終了-->

            <!-- タブ２項目 -->
            <section class="form2 daytime panel">
                <h3 class="subtitle">子供食堂をしらべる</h3>
                <div class="form_wrap">
                    <!-- 参加対象 -->
                    <div class="form_item">
                        <h3 class="item_title">参加対象</h3>
                        <br />
                        <select class="select" name="subject" size="1">
                            <option value="" selected hidden disabled>対象を選択</option>
                            <option value="誰でも（こどもは保護者同伴）
">
                                誰でも（こどもは保護者同伴）
                            </option>
                            <option value="大人だけで行ける">
                                大人だけで行ける
                            </option>
                            <option value="大人は保護者だけ">
                                大人は保護者だけ
                            </option>
                            <option value="地域の方だけ">
                                地域の方だけ
                            </option>
                            <option value="会員登録制">
                                会員登録制
                            </option>
                        </select>
                    </div>
                    <!-- 参加対象 終了-->

                    <!-- 対象年齢 -->
                    <div class="form_item">
                        <h3 class="item_title">対象年齢</h3>
                        <div class="age_select flex">
                            <select class="select" name="age" size="1">
                                <option value="" selected hidden disabled>選択</option>
                                <option value="制限なし">
                                    制限なし
                                </option>
                                <option value="未就学児">
                                    未就学児
                                </option>
                                <option value="小学生">
                                    小学生
                                </option>
                                <option value="中学生">
                                    中学生
                                </option>
                                <option value="高校生">
                                    高校生
                                </option>
                                <option value="大学生">
                                    大学生
                                </option>
                            </select>
                            <div class="select_p">～</div>
                            <select class="select" name="age" size="1">
                                <option value="" selected hidden disabled>選択</option>
                                <option value="制限なし">
                                    制限なし
                                </option>
                                <option value="未就学児">
                                    未就学児
                                </option>
                                <option value="小学生">
                                    小学生
                                </option>
                                <option value="中学生">
                                    中学生
                                </option>
                                <option value="高校生">
                                    高校生
                                </option>
                                <option value="大学生">
                                    大学生
                                </option>
                            </select>
                        </div>
                    </div>
                    <!-- 対象年齢 終了-->

                    <!-- 食事提供方式 -->
                    <div class="form_item">
                        <h3 class="item_title">食事提供方式</h3>
                        <br />
                        <select class="select" name="age" size="1">
                            <option value="" selected hidden disabled>希望を選択</option>
                            <option value="いっしょに作って食べる">
                                いっしょに作って食べる
                            </option>
                            <option value="作ったものを提供">
                                作ったものを提供
                            </option>
                            <option value="持ち帰り(弁当)
">
                                持ち帰り(弁当)
                            </option>
                        </select>
                    </div>
                    <!-- 食事提供方式 終了-->

                    <!-- ボランティア募集の有無 -->
                    <div class="form_item">
                        <h3 class="item_title">ボランティア募集</h3>
                        <div class="radiobtn flex">
                            <label>
                                <input type="radio" name="volunteer" value="1">
                                有
                            </label>
                            <label>
                                <input type="radio" name="volunteer" value="">
                                無
                            </label>
                        </div>
                    </div>
                    <!-- ボランティア募集の有無 終了-->
                </div>
            </section>
            <!-- タブ２項目 終了-->

            <!-- タブ３項目 -->
            <section class="form3 favorite panel">
                <h3 class="subtitle">子供食堂をしらべる</h3>
                <div class="form_wrap">
                    <div class="checkbox-001">
                        <label>
                            <input type="checkbox" name="checkbox-001" />おもちゃ
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />絵本
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />外遊び
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />遊具
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />授乳スペース
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />オムツ交換スペース
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />学習支援
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />アレルギー対応
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />フードパントリー<br />(食材の配布)あり
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />季節のイベント
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />調理師
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />栄養士
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />食品衛生責任者
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />教師
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />保育士
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />助産師
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox-001" />看護師
                        </label>
                    </div>
                </div>
            </section>
            <!-- タブ３項目 終了-->
            <!-- ボタン -->
            <div class="form_btns flex">
                <input class="btn submit_btn" type="submit" value="しらべる" />
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
                        <?php the_field('recruitment'); ?>
                        <?php echo get_the_terms($post->ID, 'area')[0]->name; ?>
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
                        <p><?php the_field('starttime') ?></p>
                        <p><?php the_field('reserve') ?></p>
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