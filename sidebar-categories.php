<?php
$categories = get_categories();
?>
<div class="category_list">
    <h2 class="category_title">カテゴリー一覧</h2>
    <div class="bgcnone column">
        <?php
        foreach ($categories as $category) {
        echo '<a href="'.get_category_link($category->term_id).'" class="category_item">'.$category->name
        .'</a>';
        }
        ?>
        <a href="<?php echo home_url('/event'); ?>" class="category_item">開催情報</a>
    </div>
</div>