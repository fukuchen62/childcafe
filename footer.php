<footer class="footer">
    <div class="container">
        <div class="footer_inner">
            <nav>
                <?php
		$hoge = array(
		'menu' => 'footer-navigation',  //管理画面で作成したメニューの名前
		'menu_class' => '', //メニューを構成するulタグのクラス名
		'container' => false, //<ul>タグを囲んでいる<div>タグを削除
		);
		wp_nav_menu($hoge);
		?>
            </nav>
            <div class="footer_copyright">
                <small>&copy; BISTRO CALME All rights reserved.</small>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>