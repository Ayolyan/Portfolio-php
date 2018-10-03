document.addEventListener("DOMContentLoaded", init);

function init(evt) {
    var listLi = document.querySelectorAll(".catSelector li");
    for (var li of listLi) {
        li.addEventListener("click", changeCat);
    }
}

function changeCat(evt) {
    var itemsGallery = document.querySelectorAll(".itemsGallery a");

    for (var item of itemsGallery) {
        if (item.dataset.cat == this.textContent.toLowerCase() || this.textContent.toLowerCase() == 'tous') {
            item.style.display = "initial";
        } else {
            item.style.display = "none";
        }
    }
    document.querySelector(".catSelected").classList.remove("catSelected");
    this.classList.add("catSelected");
}