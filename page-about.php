<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>


<!-- url先まだ入れてないです -->
<main>
    <div class="main_inner">
        <h2 class="title">このサイトについて</h2>
        <h3 class="subtitle">このサイトの使い方</h3>
        <div class="text">
            <p class="text_title">開催情報について</p>
            <p>
                今後の開催日が決まっている食堂の情報は、<a href="<?php echo home_url(''); ?>">【開催情報】</a>からご覧いただけます。 不定期開催の食堂も多いので、
                <a href="<?php echo home_url(''); ?>">【MAPからさがす】</a>
                でお近くの食堂を探してみてください。
            </p>
            <a href="<?php echo home_url(''); ?>">【条件からさがす】</a>
        </div>
        <div class="text">
            <p class="text_title">特集記事について</p>
            <p>
                <a href="<?php echo home_url(''); ?>">【Pick up
                    インタビュー】</a>と題して、こども食堂を運営している人に熱い思いや、こだわり、おすすめポイント、参加者の声などを取材し、記事にしました。
                素敵な記事がたくさんあります。
                こども食堂へ行ってみたい人・手伝いたい人・支援したい人へのメッセージもあります。ぜひ読んでみてください。
            </p>
        </div>
        <div class="text">
            <p class="text_title">こども食堂のさがしかた</p>
            <p>
                <a href="<?php echo home_url(''); ?>">【MAPからさがす】</a>を使うと、地図からお近くのこども食堂をさがす事ができます。
                <a href="<?php echo home_url(''); ?>">【条件からさがす】</a>を使うと、いろいろなこだわり条件で絞り込めます。
            </p>
        </div>
        <div class="text">
            <p class="text_title">支援したい方へ</p>
            <p>
                徳島県のこども食堂を支援したい方に向けて幾つかの支援の方法を紹介しています。
                詳しくは<a href="<?php echo home_url(''); ?>">【支援したい方へ】</a>のページをご覧ください。
            </p>
        </div>
        <div class="text">
            <p class="text_title">お問い合わせ</p>
            <p>
                徳島県のこども食堂についてやこのサイトに関するお問い合わせは<a href="<?php echo home_url(''); ?>">【コチラ！】</a>
            </p>
        </div>
        <div class="text">
            <p class="text_title">リンク集</p>
            <p>こども食堂以外のお役立ち情報をまとめてあります。</p>
            <p><a href="<?php echo home_url(''); ?>">【子育て支援関連】</a></p>
            <p><a href="<?php echo home_url(''); ?>">【こどもの居場所関連】</a></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/onigiri.png" alt="背景のおにぎり"
            class="about_img onigiri" />
    </div>
</main>

<?php get_footer(); ?>