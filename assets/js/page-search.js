"use strict";
$(function () {
    $(".multiple-select").multipleSelect({
        width: 200,
        formatSelectAll: function () {
            return "すべて";
        },
        formatAllSelected: function () {
            return "全て選択されています";
        },
    });
});

// 送信ボタン押して結果表示　いる？

$(function () {
    $(".submit_btn").on("click", function () {
        $(".result_img").fadeIn();
    });
});

// アコーディオン

$(function () {
    $(".area_label").on("click", function () {
        $(this).next().slideToggle(400);
        $(this).toggleClass("open", 400);
    });
});
