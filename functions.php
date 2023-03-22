<?php

//バージョン情報を消す
// function remove_cssjs_ver2( $src ) {
//     if ( strpos( $src, 'ver=' ) )
//         $src = remove_query_arg( 'ver', $src );
//     return $src;
// }
// add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
// add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );



//after_setup_themeアクションフックを使用する関数をまとめる
function my_theme_setup() {
    add_theme_support('title-tag'); //<title>タグを出力する
    add_theme_support('post-thumbnails'); //アイキャッチ画像を使用可能にする
    add_theme_support('menus'); //カスタムメニュー機能を使用可能にする
}
add_action('after_setup_theme', 'my_theme_setup');