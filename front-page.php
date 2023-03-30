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
<!-- Pick Upインタビュー一覧 -->
<section class="interviews">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff8e6" fill-opacity="1" d="M0,160L60,170.7C120,181,240,203,360,197.3C480,192,600,160,720,138.7C840,117,960,107,1080,112C1200,117,1320,139,1380,149.3L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>
    <div class="section_inner">
        <div class="title">
            <h2>Pick Upインタビュー一覧</h2>
        </div>
        <div class="pickup_slide">
            <ul class="pickup_slider flex">
                <?php if ($custom_query->have_posts()) : ?>
                <?php while($custom_query->have_posts()) : ?>
                <?php $custom_query->the_post(); ?>
                <li>
                    <?php get_template_part('template-parts/loop', 'interview'); ?>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
        <a href="<?php echo home_url('/interview'); ?>" class="btn_item">もっと見る</a>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff8e6" fill-opacity="1" d="M0,160L60,170.7C120,181,240,203,360,197.3C480,192,600,160,720,138.7C840,117,960,107,1080,112C1200,117,1320,139,1380,149.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
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