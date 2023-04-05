<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<h2 class="pageTitle">お問い合わせ</h2>

<main class="main">
    <div class="container">
        <div class="content">
            <h3>各こども食堂へのお問い合わせについて</h3>
            <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
            <div class="sec_btn">
                <a href="<?php echo home_url('/cafeinfo'); ?>" class="btn btn-default">各食堂一覧<i class="fas fa-angle-right"></i></a>
            </div>
            <h3>全体へのお問い合わせはこちら</h3>
            <p>
                <?php echo do_shortcode('[contact-form-7 id="323" title="contact"]'); ?>
            </p>
        </div>

    </div>
</main>

<?php get_footer(); ?>
