<?php get_header(); ?>

<h2>検索結果</h2>

<main class="main">
    <div class="container">
        <h2 class="main_title">「<?php the_search_query(); ?>」の検索結果</h2>
        <div class="row">

            <?php if (have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
            <div class="col-md-4">
                <article>
                    <div class="news_pic">
                        <?php if(has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="news_meta">
                        <?php the_category(); ?>
                        <time class="news_time" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
                    </div>
                    <h2 class="news_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="news_desc">
                        <?php the_excerpt(); ?>
                        <p><a href="<?php the_permalink(); ?>">[続きを読む]</a></p>
                    </div>
                </article>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <div class="col-12 text-center">
                <p>検索結果はありませんでした</p>
            </div>
            <?php endif; ?>

        </div>

        <?php if (function_exists('wp_pagenavi')) {
						wp_pagenavi();
					} ?>
    </div>

</main>

<?php get_footer(); ?>