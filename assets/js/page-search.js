"use strict";

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
