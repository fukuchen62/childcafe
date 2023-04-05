<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php
$args = array(
		'post_type' => 'event',
        'meta_key' => 'class',
        //不定期のもの
        'meta_value' => 2,
		'posts_per_page' => -1,
        'paged' => get_query_var('paged') //何ページ目の情報を表示すれば良いか
	);
$the_query = new WP_Query($args);
?>
<main>
    <div class="main_inner">
        <?php if ($the_query->have_posts()) : ?>
        <?php while($the_query->have_posts()) : ?>
        <?php $the_query->the_post(); ?>
        <div class="ivent_title">
            <h2 class="title">1月1日 〇〇食堂開催のお知らせ</h2>
            <?php if(! empty(get_field('eye_catching'))): ?>
            <img src="<?php the_field('eye_catching'); ?>" alt="" class="main_visual" />
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
            <?php endif; ?>
        </div>
        <div class="ivent_appeal">
            <p class="ivent_appeal_text">食堂から一言</p>
            <p><?php the_field('appeal'); ?></p>
        </div>
        <table class="ivent_table">
            <tr>
                <td class="ivent_table_tdtitle">開催日時</td>
                <td class="ivent_table_tdtext">
                    5/1 13:00~14:00まで
                </td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">開催住所</td>
                <td class="ivent_table_tdtext">
                    徳島市●●町●●1-1-1
                </td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">会場</td>
                <td class="ivent_table_tdtext">●●公民館</td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">参加条件</td>
                <td class="ivent_table_tdtext">
                    テキストテキストテキストテキストテキストテキスト
                </td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">参加料金</td>
                <td class="ivent_table_tdtext">
                    こども 300円 大人 400円
                </td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">参加年齢</td>
                <td class="ivent_table_tdtext">
                    未就学児～高校生まで
                </td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">食事提供方法</td>
                <td class="ivent_table_tdtext">
                    参加者と一緒に料理を作る
                </td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">
                    <span class="sp"> 取り扱いが</span>
                    <span class="sp">あるもの</span>
                </td>
                <td class="ivent_table_tdtext">おもちゃ</td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">事前の予約</td>
                <td class="ivent_table_tdtext">電話にて必要</td>
            </tr>
            <tr>
                <td class="ivent_table_tdtitle">連絡先</td>
                <td class="ivent_table_tdtext">088-000-000</td>
            </tr>
        </table>
        <div class="ivent_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1671457.3013939436!2d134.69202636250003!3d35.0925991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60037bf455fa707d%3A0xfaaea9929402ee59!2z5bmz5bCG6ZaA6aaW5aGa!5e0!3m2!1sja!2sjp!4v1680162253664!5m2!1sja!2sjp" width="250" height="200" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <?php get_sidebar('categories'); ?>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</main>
<?php get_footer(); ?>