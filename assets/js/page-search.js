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
        // $(this).next().slideToggle(400);
        $(this).next().addClass("show");
        $(this).toggleClass("open", 400);
    });
});

// 東部すべてチェックＯＮ・ＯＦＦ
$(function () {
    $("#east_all").on("click", function () {
        $(".east_list").prop("checked", $(this).prop("checked"));
    });
});
// 西部すべてチェックＯＮ・ＯＦＦ
$(function () {
    $("#west_all").on("click", function () {
        $(".west_list").prop("checked", $(this).prop("checked"));
    });
});
// 南部すべてチェックＯＮ・ＯＦＦ
$(function () {
    $("#south_all").on("click", function () {
        $(".south_list").prop("checked", $(this).prop("checked"));
    });
});
