"use strict";

// slick(KVスライド)
$(".kv_slider").slick({
    autoplay: true, // 自動再生
    autoplaySpeed: 4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
    infinite: true, // 無限スライド
});

// slick(pickupスライド)
$(".pickup_slider").slick({
    autoplay: true, // 自動再生
    autoplaySpeed: 4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
    infinite: true, // 無限スライド
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
        slidesToShow: 4,
    });
});
