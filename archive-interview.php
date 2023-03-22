<?php get_header(); ?>
<?php
	$args = array(
		'post_type' => 'interview',
		'post_per_page' => -1,
	);
	$the_query = new WP_Query($args);

	?>


<h1>インタビュー一覧</h1>

<?php if ($the_query->have_posts()) : ?>
<?php while($the_query->have_posts()) : ?>
<?php $the_query->the_post(); ?>

<div class="">

    <!-- ここから後でテンプレートパーツ化する -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog_list') ?>>
        <div class="blog_pic">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage_600x400.png" alt="">
                <?php endif; ?>
            </a>
        </div>

        <div class="blog_list_meta">
            <?php the_category(); ?>
            <time datetime="<?php the_time('Y-m-d'); ?>">
                <?php the_time('Y年m月d日'); ?>
            </time>
        </div>
        <h3 class="">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
        <div class="blog_list_desc">
            <?php the_excerpt(); ?>
            <p>
						<a href="<?php the_permalink(); ?>">
							more
						</a>
					</p>
        </div>
    </article>
    <!-- ここまで後でテンプレートパーツ化する -->

</div>

<?php endwhile; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div>




<?php get_footer(); ?>