setInterval(newsSlide, 2000); // 每隔2秒呼叫一次newsSlide

let currentNews = 1;
const totalNews = 5; // 定義總共的圖片數量
let timeout2; // 定義 timeout2
let posts = [];

// 使用 fetch 進行 AJAX 請求
fetch('api/post-random')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        posts = data;
    })
    .catch(error => {
        console.error('Fetch error:', error); // 提供錯誤信息
    });

function newsSlide() {
    // 清除之前的 setTimeout
    clearTimeout(timeout2);

    // 切換到下一張圖片
    if (currentNews < totalNews) {
        currentNews++;
    } else {
        currentNews = 1;
    }

    if (posts[currentNews - 1] !== undefined) {
        // 根據 currentPic 切換標題
        $("#newsTopic").text(posts[currentNews - 1].topic);
        $("#newsTopic").attr('href', posts[currentNews - 1].url);
        // 根據 currentPic 切換圖片
        $(".c-newsCard__bgImg").css("background-image", "url(" + posts[currentNews - 1].image_path + ")");
        let string = posts[currentNews - 1].category.map(item => `<p class="o-tag">` + item + `</p>`).join('');
        $(".c-newsCard__tags").html(string);
        $(".c-newsCard__meta").text(posts[currentNews - 1].title);
        $(".c-newsCard__brief").text(encodeHTML(posts[currentNews - 1].body));
        $(".c-newsCard__readMore").attr('href', posts[currentNews - 1].url);
        $(".c-newsCard__meta").attr('href', posts[currentNews - 1].url);
        $(".c-newsCard__brief").attr('href', posts[currentNews - 1].url);
    }
}

function encodeHTML(dirtyString) {
    const container = document.createElement('div');
    const text = document.createTextNode(dirtyString);
    container.appendChild(text);
    return container.innerHTML; // innerHTML will be a XSS safe string
}
