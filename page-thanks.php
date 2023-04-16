<?php get_header(); ?>


<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">お問い合わせ</h2>

        <!-- 全体への問い合わせ -->
        <?php echo do_shortcode('[contact-form-7 id="780" title="送信完了用"]'); ?>
        <!-- 全体への問い合わせ 終了-->
    </div>
</main>
</div>

<?php get_footer(); ?>