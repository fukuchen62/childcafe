"use strict";
$(".ac_slide").slick({
    dots: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    responsive: [
        {
            breakpoint: 770,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
            },
        },
    ],
});

$(".past_slide").slick({
    dots: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 770,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
            },
        },
    ],
});

// スクロールの文字のアニメーション
$(function () {
    $(".firstview_scroll_p").textillate({
        loop: true,
        // フェードインのアニメーション
        in: {
            effect: "rotateIn",
            delay: 50,
        },
        // フェードアウトのアニメーション
        out: {
            effect: "rotateOut",
            delay: 50,
        },
    });
});
