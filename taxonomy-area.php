<?php get_header(); ?>

< <main class="main">
    <?php
        //開いているページの情報を取得
        $area_slug = get_query_var('area');
        $kind = get_term_by('slug', $area_slug, 'area');
        ?>
    <section class="sec">
        <div class="container">
            <div class="sec_header">
                <h2 class="title title-jp"><?php echo $area->name; ?></h2>
                <span class="title title-en"><?php echo strtoupper($area->slug); ?></span>
            </div>
            <div class="row justify-content-center">

                <?php if (have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                <div class="col-md-3">
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
                <?php endif; ?>

            </div>
        </div>
    </section>
    </main>
    <?php get_footer(); ?>