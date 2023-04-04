"use strict";

// ハンバーガーメニュー

$(".hamburger").on("click", function () {
    $(this).toggleClass("is-active");
    $(".menu").toggleClass("is-active");
});

//hamburgerメニューのタグを押した場合
$(".menu a").on("click", function () {
    $(".hamburger").removeClass("is-active");
    $(".menu").removeClass("is-active");
});

// トップボタンスクロールアニメーション
$(".toppage_btn").on("click", function () {
    $("window,html").animate({ scrollTop: 0 }, 550);
});

// トップボタン非表示
$(".toppage_btn").hide();
// トップボタン表示条件
$(window).on("scroll", function () {
    let value = $(this).scrollTop();
    if (value > 80) {
        $(".toppage_btn").fadeIn();
    } else {
        $(".toppage_btn").fadeOut();
    }
});
