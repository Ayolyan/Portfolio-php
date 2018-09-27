document.addEventListener("DOMContentLoaded", initialised);

function initialised() {
    window.addEventListener('scroll', scrollAnimation);
}

function scrollAnimation() {
    var contentSections = document.querySelectorAll(".contentSection");
    for (var contentSection of contentSections) {
        if (isPartiallyVisible(contentSection)) {
            contentSection.children[0].classList.add('contentSectionLeft');
            contentSection.children[1].classList.add('contentSectionRight')
        }
    }
}

function isPartiallyVisible(el) {
    var elementBoundary = el.getBoundingClientRect();

    var top = elementBoundary.top;
    var bottom = elementBoundary.bottom;
    var height = elementBoundary.height;

    return ((top + height >= 0) && (height + window.innerHeight >= bottom));
}

function isFullyVisible(el) {
    var elementBoundary = el.getBoundingClientRect();

    var top = elementBoundary.top;
    var bottom = elementBoundary.bottom;

    return ((top >= 0) && (bottom <= window.innerHeight));
}