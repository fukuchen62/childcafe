<footer class="footer">
            <!-- 波型の画像 -->
            <!-- <img
                class="footer_wave"
                src="../assets/images/footer_wave.svg"
                alt=""
            /> -->
            <div class="footer_inner">
                <nav class="footer_container with_girl">
                    <!-- 女の子の画像 -->
                    <img
                        src="../assets/images/girl.png"
                        alt=""
                        class="footer_girl"
                    />
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
                        <p>copyright©</p>
                    </div>
                </nav>
            </div>
            <!-- footer_inner end -->
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
