document.addEventListener("DOMContentLoaded", init);

function init(evt) {
    if (document.querySelector(".imgGallery") != null) {
        var btns = document.querySelectorAll(".imgGallery button");
        btns[0].addEventListener("click", moveImgLeft);
        btns[1].addEventListener("click", moveImgRight);

        var imgs = document.querySelectorAll(".imgGallery img");
        for (var img of imgs) {
            img.addEventListener("click", bigImage);
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
    var cloneImg = this.cloneNode();

    divBigImg.style.position = "fixed";
    divBigImg.style.height = "calc(100vh - 15px)";
    divBigImg.style.top = "15px";
    divBigImg.style.left = "15px";
    divBigImg.style.width = "calc(100vw - 15px)";

    divBigImg.appendChild(cloneImg);
}