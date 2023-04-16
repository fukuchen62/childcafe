"use strict";

$(window).on("load", function () {
    var hash = $(location).attr("hash");
    if (hash) {
        var target = $(hash).offset().top;
        $("html,body").animate({ scrollTop: target }, "slow");
    }
});
