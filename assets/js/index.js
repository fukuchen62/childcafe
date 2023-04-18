"use strict";

// slick(KVスライド)
$(".kv_slider").slick({
    autoplay: true, // 自動再生
    autoplaySpeed: 4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
    infinite: true, // 無限スライド
});

// slick（pickupインタビュー）
// 幅が768px以上のビューポートをターゲットとするメディアクエリを作成
// const mediaQuery = window.matchMedia("(min-width: 760px)");

// // メディアクエリがtrueかどうかをチェック
// if (mediaQuery.matches) {
//     // その後、alertを実行
//     $(".pickup_slider").slick({
//         autoplay: true, // 自動再生
//         autoplaySpeed: 4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
//         infinite: true, // 無限スライド
//         slidesToShow: 3,
//     });
// } else {
//     // slick(pickupスライド)
//     $(".pickup_slider").slick({
//         autoplay: true, // 自動再生
//         autoplaySpeed: 4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
//         infinite: true, // 無限スライド
//         slidesToShow: 1,
//     });
// }

$(".pickup_slider").slick({
    autoplay: true, // 自動再生
    autoplaySpeed: 4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
    infinite: true, // 無限スライド
    slidesToShow: 3,
    responsive: [
        {
            breakpoint: 770,
            settings: {
                arrows: true,
                autoplaySpeed: 4000,
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false,
            },
        },
        {
            breakpoint: 1000,
            settings: {
                arrows: true,
                autoplaySpeed: 4000,
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                dots: false,
            },
        },
    ],
});

// slick(活動の様子スライド)
$(function () {
    $(".activity_slide").slick({
        arrows: false,
        autoplay: true,
        adaptiveHeight: true,
        centerMode: true,
        centerPadding: "8%",
        dots: true,
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 770,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                },
            },
        ],
    });
});
