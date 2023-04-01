<?php get_header(); ?>


<?php get_template_part('template-parts/breadcrumb'); ?>

<main>
    <div class="main_inner">
        <!-- ページトップ -->
        <?php if (have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
        <div class="yellow color">
            <div class="yellow_inner m1024">
                <h2 class="title"><?php the_field('name'); ?></h2>
                <div class="pc_flex">
                    <div>
                        <img src="<?php the_field('eye_catching'); ?>" alt="" class="main_visual" />
                        <div class="underimg text flex">
                            <p class="address">
                                <?php
                                $this_terms = get_the_terms($post->ID,'area');
                                echo $this_terms[1]->name;
                                ?>
                            </p>
                            <div class="good flex">
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
                <div class="detail_item">
                    <h3 class="subtitle"><?php echo get_field_object('place')['label']; ?></h3>
                    <p><?php the_field('place'); ?></p>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">担当者</h3>
                    <p>山田　花子</p>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">開催日時・頻度</h3>
                    <p>第第2、第3月曜日　午後5時30分~</p>
                    <p></p>
                </div>
                <div class="detail_item">
                    <div>
                        <h3 class="subtitle">参加料金</h3>
                        <p>子ども:○○円</p>
                        <p>大人:○○円</p>
                    </div>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">駐車場</h3>
                    <p>敷地内5台あり</p>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">参加条件</h3>
                    <p>
                                    子どもだけでもOK<br />
                                    対象年齢 5歳<br />
                                    その他
                                </p>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">事前予約</h3>
                    <p>
                                    必要あり<br />
                                    ※電話にて事前に連絡お願いします
                                </p>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">食事スタイル</h3>
                    <p>参加者と料理を作ってその場で食べる</p>
                </div>
                <div class="detail_item">
                    <h3 class="subtitle">参加者の主な年代</h3>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#d7f794" fill-opacity="1" d="M0,256L60,224C120,192,240,128,360,96C480,64,600,64,720,96C840,128,960,192,1080,208C1200,224,1320,192,1380,176L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>
        <div class="green color">
            <div class="green_inner m1024">
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
                <p class="volunteer">ボランティア募集中</p>
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
                            <p>おもちゃ</p>
                            <p>おむつ交換スペース</p>
                        </div>
                    </div>
                    <div class="addressmap">
                        <h3 class="subtitle">アクセス</h3>
                        <?php the_field('place_map'); ?>
                    </div>
                </div>
                <h3 class="subtitle_ulineorange">活動の様子</h3>
                <ul class="ac_slide">
                    <li>
                        <img src="../assets/images/text_kakko_kari.png" alt="#" />
                    </li>
                    <li>
                        <img src="../assets/images/text_kakko_kari.png" alt="#" />
                    </li>
                    <li>
                        <img src="../assets/images/text_kakko_kari.png" alt="#" />
                    </li>
                </ul>
                <h3 class="subtitle_ulineorange">過去のメニュー</h3>
                <ul class="past_slide">
                    <li>
                        <img src="../assets/images/text_kakko_kari.png" alt="#" />
                    </li>
                    <li>
                        <img src="../assets/images/text_kakko_kari.png" alt="#" />
                    </li>
                    <li>
                        <img src="../assets/images/text_kakko_kari.png" alt="#" />
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