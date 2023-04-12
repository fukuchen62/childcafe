<?php get_header(); ?>


<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">お問い合わせ</h2>
        <!-- 各子供食堂 -->
        <section class="contact1">
            <h3 class="subtitle">
                各こども食堂へのお問い合わせについて
            </h3>
            <div class="text">
                <p class="contact1_text_p1">
                    こども食堂に関する詳細な情報や
                    問い合わせについては、各こども食堂に直接お問い合わせください。
                </p>
                <p class="contact1_text_p2">
                    問い合わせ(例) <br />
                    ・こども食堂についての詳細な情報が知りたい。<br />
                    ・こども食堂でのボランティア活動に参加したい場合、どのように申し込めば良いか。<br />
                    ・こども食堂の運営に対する寄付をしたい場合、どのように手続きをすれば良いか。<br />
                    ・その他、こども食堂に関する疑問点や問題がある場合、解決方法を知りたい。<br />
                    なお、各こども食堂の開催日時等の運営状況や人員の都合により、返信までに時間がかかる場合があります。予めご了承ください。
                </p>
            </div>
            <a class="btn_item" href="<?php echo home_url('/cafeinfo'); ?>">各こども食堂一覧</a>
        </section>
        <!-- 各子供食堂 終了-->

        <!-- 全体への問い合わせ -->
        <?php echo do_shortcode('[contact-form-7 id="323" title="contact"]'); ?>
        <!-- 全体への問い合わせ 終了-->
    </div>
</main>
</div>

<?php get_footer(); ?>