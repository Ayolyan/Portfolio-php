document.addEventListener("DOMContentLoaded", init);

function init(evt) {
    if (document.querySelector(".imgGallery") != null) {
        var btns = document.querySelectorAll(".imgGallery button");
        if (document.querySelectorAll(".imgGallery li").length > 1) {
            btns[0].addEventListener("click", moveImgLeft);
            btns[1].addEventListener("click", moveImgRight);
        } else {
            btns[0].remove();
            btns[1].remove();
        }

        // GESTION DES IMAGES
        var imgs = document.querySelectorAll(".imgGallery img");
        for (var img of imgs) {
            img.addEventListener("click", bigImage);
        }

        // GESTION DES VIDEOS
        var vods = document.querySelectorAll(".imgGallery .vod");
        if (vods.length > 0) {
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/player_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        }
        for (var vod of vods) {
            let request = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id='+vod.dataset.vodid+'&key=AIzaSyBevbDoYQCtlQ6mKdrsEvLxa3lqpI1f26Y ';
            let imgPath = getRequest(request).items[0].snippet.thumbnails.maxres.url;
            let img = document.createElement("img");
            img.src = imgPath;
            img.alt = "Miniature";

            vod.style.height = "100%";
            vod.appendChild(img);
            vod.addEventListener("click", launchVod);
        }
    }
}

function moveImgRight(evt) {
    var imgGallery = document.querySelector(".imgGallery");
    var lastImg = document.querySelector(".imgGallery li:last-of-type");

    imgGallery.insertBefore(lastImg, imgGallery.childNodes[0]);
}

function moveImgLeft(evt) {
    var imgGallery = document.querySelector(".imgGallery");
    var lastImg = document.querySelector(".imgGallery li:first-of-type");

    imgGallery.appendChild(lastImg);
}

function bigImage(evt) {
    var divBigImg = document.createElement("div");
    var closeBtn =  document.createElement("button");
    var cloneImg = this.cloneNode();

    divBigImg.id = "bigImageBox";
    divBigImg.classList.add("bigImageBox");

    closeBtn.textContent = "✖";
    closeBtn.addEventListener("click", closeBigImage);

    divBigImg.appendChild(closeBtn);
    divBigImg.appendChild(cloneImg);
    document.querySelector('body').appendChild(divBigImg);
}

function launchVod() {
    var vodId = this.dataset.vodid;

    var divBig = document.createElement("div");
    var closeBtn =  document.createElement("button");
    var divVod = document.createElement("div");

    divBig.id = "bigImageBox";
    divBig.classList.add("bigImageBox");

    closeBtn.textContent = "✖";
    closeBtn.addEventListener("click", closeBigImage);

    divVod.id = "bigVod";

    divBig.appendChild(closeBtn);
    divBig.appendChild(divVod);
    document.querySelector('body').appendChild(divBig);

    // Replace the 'ytplayer' element with an <iframe> and
    // YouTube player after the API code downloads.
    var bigVod = new YT.Player('bigVod', {
        autoplay: 1,
        height: '100%',
        width: '100%',
        videoId: vodId
    });
    bigVod.playVideo();
}

function closeBigImage() {
    document.getElementById("bigImageBox").remove();
}

function getRequest(requestPath) {
    var xhr = new XMLHttpRequest();
    var data;

    xhr.open('GET', requestPath, false);

    xhr.onload = function() {
        data = JSON.parse(this.response);
    };

    xhr.send();
    return data;
}