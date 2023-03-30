"use strict";

document.addEventListener(
    "DOMContentLoaded",
    function () {
        // タブに対してクリックイベントを適用
        const tabs = document.getElementsByClassName("tab_js");
        for (let i = 0; i < tabs.length; i++) {
            tabs[i].addEventListener("click", tabSwitch, false);
        }

        // タブをクリックすると実行する関数
        function tabSwitch() {
            // コンテンツのclassの値を変更
            document
                .getElementsByClassName("is-show")[0]
                .classList.remove("is-show");
            const arrayTabs = Array.prototype.slice.call(tabs);
            const index = arrayTabs.indexOf(this);
            document
                .getElementsByClassName("panel")
                [index].classList.add("is-show");
        }
    },
    false
);
