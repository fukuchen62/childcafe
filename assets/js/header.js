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
