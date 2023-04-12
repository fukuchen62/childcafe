<?php get_header(); ?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">支援したい方へ</h2>
        <!-- 項目タブ -->
        <ul class="tab flex">
            <li class="tab_1 tab_js tab-a">物資</li>
            <li class="tab_2 tab_js tab-b">寄付</li>
            <li class="tab_3 tab_js tab-c">手伝い</li>
        </ul>
        <div class="support_content">
            <div class="support_supplies panel tab-a is-show">
                <h3 class="subtitle support_subtitle">
                    物資を支援する
                </h3>
                <p>
                    徳島県のこども食堂全体の活動を支援したい場合は、徳島こども食堂ネットワークへお問い合わせください。
                    支援したいと思うこども食堂が決まっている方は、各こども食堂へ直接お問い合わせください。
                    Amazonみんなで応援プログラムに登録している食堂はこちら!
                </p>
                <div class="font_awsome">
                    <i class="fa-solid fa-circle-arrow-down fa-bounce fa-lg" style="color: #94aff7"></i>
                </div>
                <a href="<?php echo home_url('programlist'); ?>" class="btn_item">Amazon登録食堂一覧</a>
            </div>
            <div class="support_money tab-b panel">
                <h3 class="subtitle support_subtitle">
                    金銭的に支援する
                </h3>
                <p>
                    徳島県のこども食堂全体の活動を支援したい場合は、徳島こども食堂ネットワークへお問い合わせください。
                    支援したいと思うこども食堂が決まっている方は、各こども食堂へ直接お問い合わせください。
                </p>
                <div class="font_awsome">
                    <i class="fa-solid fa-circle-arrow-down fa-bounce fa-lg" style="color: #94aff7"></i>
                </div>
                <a href="<?php echo home_url('area/east'); ?>" class="btn_item">子ども食堂詳細</a>
            </div>
            <div class="support_help tab-c panel">
                <h3 class="subtitle support_subtitle">
                    こども食堂のボランティアスタッフとして手伝う
                </h3>
                <p>
                    スタッフを募集している食堂は条件検索ページから検索できます！
                </p>
                <div class="font_awsome">
                    <i class="fa-solid fa-circle-arrow-down fa-bounce fa-lg" style="color: #94aff7"></i>
                </div>
                <a href="<?php echo home_url('find'); ?>" class="btn_item">条件検索へ</a>
            </div>
        </div>
        <a href="<?php echo home_url('contact'); ?>">
            <div class="btn support_btn">
                お問い合わせはこちら
            </div>
        </a>
    </div>
</main>
</div>

<?php get_footer(); ?>