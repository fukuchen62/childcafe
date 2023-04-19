<footer class="footer">
    <div class="footer_inner">
        <div class="footer_banner">
            <a href="https://awa-nolife.com/farmer/">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/awa_nolife_logo-02.png"
                    alt="あわ農ライフ">
            </a>
            <a href="http://yuruhenro.com/">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/yuruhenro_logo-02.png"
                    alt="ゆるへんろ">
            </a>
            <a href="https://www.tokuparknavi.com/">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/go_go_park_logo.png"
                    alt="とくしまGo!Go!パークなび">
            </a>
        </div>
        <nav class="footer_container with_girl">
            <?php
            $hoge = array(
            'menu' => 'footer-navigation',  //管理画面で作成したメニューの名前
            'menu_class' => 'footer_nav flex', //メニューを構成するulタグのクラス名
            'container' => false, //<ul>タグを囲んでいる<div>タグを削除
            );
            wp_nav_menu($hoge);
            ?>
            <!-- footer_nav end -->
            <div class="footer_copyright">
                <p>copyright©<?php echo bloginfo('name'); ?></p>
            </div>
        </nav>
    </div>
    <!-- footer_inner end -->
</footer>
<?php wp_footer(); ?>
</body>

</html>