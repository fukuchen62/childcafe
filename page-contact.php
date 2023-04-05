<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main>
                <div class="main_inner">
                    <h2 class="title">お問い合わせ</h2>
                    <!-- 各子供食堂 -->
                    <section class="contact1">
                        <h3 class="subtitle">
                            各子供食堂へのお問い合わせについて
                        </h3>
                        <div class="text">
                            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                        </div>
                        <div class="btn"><a href="<?php echo home_url('/cafeinfo'); ?>">各食堂一覧</a></div>
                    </section>
                    <!-- 各子供食堂 終了-->

                    <!-- 全体への問い合わせ -->
                    <?php echo do_shortcode('[contact-form-7 id="323" title="contact"]'); ?>
                    <!-- 全体への問い合わせ 終了-->
                </div>
            </main>

<?php get_footer(); ?>
