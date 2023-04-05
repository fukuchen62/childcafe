<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main>
                <div class="main_inner">
                    <h2 class="title">支援したい方へ</h2>
                    <!-- 項目タブ -->
                    <ul class="tab flex">
                        <li class="tab_1 tab_js tab-a">物資</li>
                        <li class="tab_2 tab_js tab-b">お金</li>
                        <li class="tab_3 tab_js tab-c">手伝い</li>
                    </ul>
                    <div class="support_content">
                        <div class="support_supplies panel tab-a is-show">
                            <h3 class="subtitle support_subtitle">
                                物資について
                            </h3>
                            <p>
                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                            </p>
                        </div>
                        <div class="support_money tab-b panel">
                            <h3 class="subtitle support_subtitle">
                                寄付について
                            </h3>
                            <p>
                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                            </p>
                        </div>
                        <div class="support_help tab-c panel">
                            <h3 class="subtitle support_subtitle">
                                お手伝いについて
                            </h3>
                            <p>
                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                            </p>
                        </div>
                    </div>
                    <a href="<?php echo home_url('/contact'); ?>"><div class="btn support_btn">
                            お問い合わせはこちら
                        </div></a
                    >
                </div>
            </main>

<?php get_footer(); ?>
