<?php get_header(); ?>

<h2 class="pageTitle">Pick up インタビュー</h2>

<?php get_template_part('template-parts/breadcrumb'); ?>

<main class="main">
    <div class="container">
        <div class="row">

            <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
            <?php the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('article') ?>>
                <header class="article_header">
                    <h2 class="article_title"><?php the_title(); ?></h2>
                    <div class="article_meta">
                        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
                    </div>
                </header>

                <div class="article_body">
                    <div class="content">
                        <?php the_post_thumbnail('medium'); ?>
                        <?php
                        //カスタムフィールドから主催者名を取得
                        echo get_post_meta( get_the_ID(), 'organizer', true ). 'さん';
                        ?>
                        <?php
                        //カスタムフィールドから概要を取得
                        echo get_post_meta( get_the_ID(), 'excerpt', true );
                        ?>
                    </div>
                </div>

                <div class="postLinks">
                    <div class="postLink postLink-prev"><?php previous_post_link('<i
										class="fas fa-chevron-left"></i>%link'); ?></div>
                    <div class="postLink postLink-next"><?php next_post_link('%link<i
										class="fas fa-chevron-right"></i>'); ?></div>
                </div>
            </article>
            <?php endwhile; ?>
            <?php endif; ?>


        </div>
    </div>
</main>

<?php get_footer(); ?>