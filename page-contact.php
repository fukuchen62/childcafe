<?php
// session_start();
// //連想配列の中身を空にする
// $_SESSION = []; //$_SESSION = array()と同じ意味
// //連想配列の中身を空にする
// if(isset($_COOKIE[session_name()])){
//     $cparam = session_get_cookie_params();
//     setcookie(session_name(),"",
//     time() - 60 *60, //時間さかのぼり削除をここでしている
//     $cparam['path'],
//     $cparam['domain'],
//     $cparam['secure'],
//     $cparam['httponly'],
// );
// //sessionを切る
// session_destroy();
// }

// if(isset($_COOKIE["cf7msm_posted_data"])) {
//     // クッキー名"cookie"に値がセットされていたら削除する
//     echo"クッキーの値：".$_COOKIE["cf7msm_posted_data"]."<br />";
//     setcookie("cf7msm_posted_data", "", time() - 30);
//     echo"クッキーを削除しました";

// //     // 削除確認用メッセージをクッキーにセット
// //     setcookie("cookie_delete", "cookieは削除されています", time() + 1800);
// // } else if(isset($_COOKIE["cookie_delete"])) {
// //     // クッキー削除確認メッセージ出力
// //     echo $_COOKIE["cookie_delete"];
// // } else {
// //     // クッキーをセット
// //     setcookie("cookie", "cookie_info", time() + 1800);
// //     echo"クッキーをセットしました";
// // }
// }

?>

<?php get_header(); ?>

<main>
    <div class="main_inner">
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">お問い合わせ</h2>
        <?php
    //     if(isset($_COOKIE["cf7msm_posted_data"])) {
    // // クッキー名"cookie"に値がセットされていたら削除する
    // echo"クッキーの値：".$_COOKIE["cf7msm_posted_data"]."<br />";
    // setcookie("cf7msm_posted_data", " ", time()-60);
    // echo"クッキーを削除しました";
    //     }
        ?>
        <!-- 各子供食堂 -->
        <section class="contact1">

            <div class="text">
                <h3 class="subtitle">
                    各こども食堂への<wbr>お問い合わせについて
                </h3>
                <p class="contact1_text_p1">
                    各こども食堂に関する詳細な情報や
                    問い合わせについては、各こども食堂に直接お問い合わせください。
                </p>
                <ul class="contact1_text_p2">
                    <p> 問い合わせ(例)</p>
                    <li>こども食堂についての詳細な情報が知りたい。</li>
                    <li> こども食堂でのボランティア活動に参加したい場合、どのように申し込めば良いか。</li>
                    <li> こども食堂の運営に対する寄付をしたい場合、どのように手続きをすれば良いか。</li>
                    <li> その他、こども食堂に関する疑問点や問題がある場合、解決方法を知りたい。</li>
                    <p> なお、各こども食堂の開催日時等の運営状況や人員の都合により、返信までに時間がかかる場合があります。予めご了承ください。</p>
                </ul>
            </div>
            <div class="btn_item">
                <a href="<?php echo home_url('/cafeinfo'); ?>">各こども食堂一覧</a>
            </div>
        </section>
        <!-- 各子供食堂 終了-->

        <!-- 全体への問い合わせ -->
        <?php echo do_shortcode('[contact-form-7 id="323" title="contact"]'); ?>
        <!-- 全体への問い合わせ 終了-->
    </div>
</main>
</div>

<?php get_footer(); ?>