let text = ['職涯最前線', '工作有問題', '想要問前輩'];
let images = [
    "images/senpai_banner_default/senpai_banner_default_1.jpg",
    "images/senpai_banner_default/senpai_banner_default_2.jpg",
    "images/senpai_banner_default/senpai_banner_default_3.jpg"
];
let backendImages = [];
let description1 = [];
let description2 = [];

// 使用 fetch 進行 AJAX 請求
fetch('carousel-list')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        data.forEach(item => {
            backendImages.push(item.image_path);
            description1.push(item.description1);
            description2.push(item.description2);
        });
        totalPics = backendImages.length || images.length; // 若無後端圖片，則使用預設圖片數量
        headerSlide(); // 開始自動切換圖片
    })
    .catch(error => {
        console.error('Fetch error:', error); // 提供錯誤信息
    });

let currentPic = 1;
let totalPics = images.length; // 預設圖片數量
let intervalId = setInterval(headerSlide, 2000); // 每隔2秒呼叫一次headerSlide

function headerSlide() {
    currentPic = (currentPic < totalPics) ? currentPic + 1 : 1; // 切換到下一張圖片
    changePic(currentPic); // 根據 currentPic 切換圖片
}

function changePic(index) {
    let image_path = backendImages[index - 1] || images[index - 1]; // 使用後端或預設圖片
    if (backendImages.length !== 0) {
        $('.description1').text(description1[index - 1]);
        $('.description2').text(description2[index - 1]);
    } else {
        $('#topic').text(text[index - 1] + "，");
    }
    $("#bannerImg").css("background-image", "url('" + image_path + "')");
}

// 單擊切換圖片功能
function setPic(index) {
    currentPic = index;
    changePic(currentPic);
}

// 綁定圖片單擊事件（假設你有一個按鈕或觸發器）
$('.pic-trigger').on('click', function() {
    let index = $(this).data('index'); // 假設每個按鈕都有 data-index
    setPic(index);
});

// 節流函數 throttle
function throttle(func, limit) {
    let lastFunc;
    let lastRan;
    return function() {
        const context = this;
        const args = arguments;
        if (!lastRan) {
            func.apply(context, args);
            lastRan = Date.now();
        } else {
            clearTimeout(lastFunc);
            lastFunc = setTimeout(function() {
                if ((Date.now() - lastRan) >= limit) {
                    func.apply(context, args);
                    lastRan = Date.now();
                }
            }, limit - (Date.now() - lastRan));
        }
    };
}


// header scrollfunction
$(document).ready(function() {
    const $window = $(window);
    const $lHeaderLiA = $(".l-header__li a");
    const $lHeader = $(".l-header");
    const $innerHeader = $(".l-innerHeader");
    const $studentHeader = $(".l-student");

    let currentTextColor = "";
    let currentBgColor = "";

    function handleScroll() {
        let screenRoll = $window.scrollTop();
        let isDesktop = $window.width() > 768;
        const bannerHeight = isDesktop ? $innerHeader.height() : $studentHeader.offset().top;

        let textColor = screenRoll >= bannerHeight ? "#000000" : "#FFFFFF";
        let bgColor = screenRoll >= bannerHeight ? "white" : "transparent";

        // 只在需要變更時執行 DOM 操作
        if (currentTextColor !== textColor) {
            $lHeaderLiA.css("color", textColor);
            currentTextColor = textColor;
        }
        if (currentBgColor !== bgColor) {
            $lHeader.css("background-color", bgColor);
            currentBgColor = bgColor;
        }
    }

    // 使用 throttle 函數來限制 scroll 事件觸發頻率
    $window.scroll(throttle(handleScroll, 100));
});

function bg_change() {
    let navbarState = $(".l-header__hamburger").attr('aria-expanded') === "true";
    let bgColor = navbarState ? "white" : "transparent";

    $(".l-header").css("background-color", bgColor);
}





