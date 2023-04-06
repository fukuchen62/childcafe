<?php get_header(); ?>

<main>
    <div class="main_inner">
        <h2 class="title404">404 NOT FOUND</h2>
        <h3 class="text404">
            お探しのページが見つかりませんでした。
        </h3>
        <span class="sp">申し訳ありません。</span>
        <span class="sp">お探しのページが見つかりませんでした。</span>
        <p>
            お手数ですが<a href="<?php echo home_url(); ?>">こちら</a>より再度お求めのページをお探しください。
        </p>
        <img src="<?php echo get_template_directory_uri();?>/assets/images/index/notfind.png" alt="404画像" />
    </div>
</main>

<?php get_footer(); ?>