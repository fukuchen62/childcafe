"use strict";

// 送信ボタン押して結果表示　いる？

$(function () {
    $(".submit_btn").on("click", function () {
        $(".result_img").fadeIn();
    });
});

// アコーディオン

$(function () {
    $(".ac_label").on("click", function () {
        $(this).next().slideToggle(400);
        $(this).toggleClass("open", 400);
    });
});
