<?php get_header(); ?>
<?php if (is_home()):?>
<div class="jumbotron">
    <div class="jumbotron_item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/jumbotron-1@2x.jpg')"></div>
</div>
<?php endif; ?>
<?php
	$hoge = array(
		'post_type' => 'interview',
		'posts_per_page' => 3, //3件のみ表示
        'orderby' => 'rand',
	);
	$custom_query = new WP_Query($hoge);
?>

<section class="sec">
    <div class="container">
        <header class="sec_header">
            <h2 class="title">このサイトについて</h2>
        </header>

        <div class="row">
            <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
        </div>

        <p class="sec_btn">
            <a href="<?php echo home_url('/about'); ?>" class="btn btn-default">もっとみる<i class="fas fa-angle-right"></i></a>
        </p>

    </div>
</section>
<section class="sec">
    <div class="container">
        <header class="sec_header">
            <h2 class="title">Pick up インタビュー一覧</h2>
        </header>

        <div class="row">
            <?php if ($custom_query->have_posts()) : ?>
            <?php while($custom_query->have_posts()) : ?>
            <?php $custom_query->the_post(); ?>
            <div class="col-md-4">
                <?php get_template_part('template-parts/loop', 'interview'); ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <p class="sec_btn">
            <a href="<?php echo home_url('/interview'); ?>" class="btn btn-default">もっとみる<i class="fas fa-angle-right"></i></a>
        </p>

    </div>
</section>

<section class="sec">
    <div class="container">
        <header class="sec_header">
            <h2 class="title">エリアから探す</h2>
        </header>

        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo home_url('/area/east'); ?>" class="btn btn-default">東部<i class="fas fa-angle-right"></i></a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo home_url('/area/south'); ?>" class="btn btn-default">南部<i class="fas fa-angle-right"></i></a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo home_url('/area/west'); ?>" class="btn btn-default">西部<i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="sec">
    <div class="container">
        <header class="sec_header">
            <h2 class="title">こども食堂とは</h2>
        </header>

        <div class="row">
            <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
        </div>

        <p class="sec_btn">
            <a href="<?php echo home_url('/concept'); ?>" class="btn btn-default">もっとみる<i class="fas fa-angle-right"></i></a>
        </p>

    </div>
</section>

<section class="sec">
    <div class="container">
        <header class="sec_header">
            <h2 class="title">支援者の方へ</h2>
        </header>

        <div class="row">
            <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
        </div>

        <p class="sec_btn">
            <a href="<?php echo home_url('/support'); ?>" class="btn btn-default">もっとみる<i class="fas fa-angle-right"></i></a>
        </p>

    </div>
</section>

<section class="sec">
    <div class="container">
        <header class="sec_header">
            <h2 class="title">Instagram　＃一覧</h2>
        </header>

        <div class="row">
            <p>
                インスタの投稿を3件表示させる？
            </p>
        </div>

        <p class="sec_btn">
            <a href="<?php echo home_url('/hashtag'); ?>" class="btn btn-default">もっとみる<i class="fas fa-angle-right"></i></a>
        </p>

    </div>
</section>

<section class="sec">
    <div class="container">
        <header class="sec_header">
            <h2 class="title">リンク集</h2>
        </header>

        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo home_url('/links/cafe'); ?>" class="btn btn-default">こども食堂関連<i class="fas fa-angle-right"></i></a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo home_url('/links/care'); ?>" class="btn btn-default">子育て支援関連<i class="fas fa-angle-right"></i></a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo home_url('/links/third'); ?>" class="btn btn-default">第三の居場所関連<i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>