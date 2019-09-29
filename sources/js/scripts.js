const lazyElements = document.querySelectorAll('.lazyload');
let lazyElementsOnFocus = [];
let lazyElementsOnViewable = [];
let relHeightElements = [];
let isScrolling = false;

window.addEventListener("load", () => {
    for (let element of lazyElements) {
        if (element.getAttribute("data-lazyload-listener") === "focus") {
            if (element.parentElement.parentElement.parentElement.id === location.hash.substring(1)) {
                changeSrc(element);
            }
            lazyElementsOnFocus.push(element);
            element.parentElement.parentElement.parentElement.addEventListener("focus", function () {
                changeSrc(element);
            });
        } else {
            lazyElementsOnViewable.push(element);
            relHeightElements.push(element);
        }
    }

    window.addEventListener("scroll", scrollListener);
    loadImages();
});

function setRelativeHeights() {
    let elementChangeHeight = undefined;
    let newHeight = undefined;
    for (i = 0; i < relHeightElements.length - 1; i++) {
        let tagSupported = true;
        if (relHeightElements[i].tagName === "IMG") {
            elementChangeHeight = relHeightElements[i];
        } else if (relHeightElements[i].tagName === "PICTURE") {
            for (let elementChild of relHeightElements[i].children) {
                if (elementChild.tagName === "IMG") {
                    elementChangeHeight = elementChild;
                }
            }
        } else {
            tagSupported = false;
        }
        if (tagSupported) {
            if (typeof elementChangeHeight === "object") {
                newHeight = elementChangeHeight.getAttribute("data-relative-height") * relHeightElements[i].offsetWidth;
                if (typeof newHeight === "number" && newHeight > 0) {
                    elementChangeHeight.setAttribute("height", newHeight);
                    relHeightElements.splice(i, 1);
                }
            }
        }
    }
}

function changeSrc(element) {
    console.log(element);
    if (typeof element !== "object") return false;
    if (element.offsetParent === null) return false;
    if (element.tagName === "PICTURE") {
        for (let elementChild of element.children) {
            if (elementChild.tagName === "IMG") {
                if (elementChild.getBoundingClientRect().top - window.innerHeight > 10) return false;
            }
        }
        for (let elementChild of element.children) {
            if (elementChild.tagName === "IMG") {
                elementChild.setAttribute("src", elementChild.getAttribute("data-src"));
            } else if (elementChild.tagName === "SOURCE") {
                elementChild.setAttribute("srcset", elementChild.getAttribute("data-srcset"));
            }
        }
        return true;
    } else {
        if (element.getBoundingClientRect().top - window.innerHeight > 10) return false;
        if (element.tagName === "IMG") {
            const dataSrc = element.getAttribute("data-src");
            const src = element.getAttribute("src");
            if (dataSrc !== src) {
                element.setAttribute("src", dataSrc);
                return true;
            }
        } else {
            const dataSrc = element.getAttribute("data-background-image");
            if (typeof dataSrc === "string" && dataSrc.length > 0) {
                element.style.backgroundImage = `url("${dataSrc}")`;
                return true;
            }
        }
    }
    return false;
}

function loadImages() {
    setRelativeHeights();
    if (lazyElementsOnViewable.length < 1) {
        window.removeEventListener("scroll", scrollListener);
        console.log('execution terminated');
        return;
    }
    let hasLoadedSomething = false;
    for (i = 0; i < lazyElementsOnViewable.length; i++) {
        let element = lazyElementsOnViewable[i];
        let changed = changeSrc(element);
        if (changed) {
            lazyElementsOnViewable.splice(i, 1);
            hasLoadedSomething = true;
        }
        if (i === lazyElementsOnViewable.length - 1 && hasLoadedSomething) {
            setTimeout(() => {
                loadImages();
            }, 2000);
        }
    }
}

function scrollListener() {
    if (isScrolling) return;
    isScrolling = true;
    loadImages();
    setTimeout(function () {
        isScrolling = false;
    }, 100);
}


function showNextImage(currentImage) {
    if (typeof currentImage !== "object") return false;
    let nextImage;

    function getNextImage(currentImage) {
        nextImage = currentImage.nextElementSibling;
        let nextImageFound = false;
        while (!nextImageFound) {
            if (typeof nextImage !== "object") {
                return false;
            } else if (nextImage.className === "fullscreen-link") {
                nextImageFound = true;
                if (typeof nextImage.id === "string") {
                    return nextImage;
                }
            } else {
                nextImage = nextImage.nextElementSibling;

            }
        }
        return false;
    }

    nextImage = getNextImage(currentImage);
    if (typeof nextImage === "object") {
        location.hash = '#' + nextImage.id;
    }

    //already load next nextI
    // mage to prevent loading pause
    nextImage = getNextImage(nextImage);
    changeSrc(nextImage.children[0].children[0].children[0]);
}

function showPreviousImage(currentImage) {
    if (typeof currentImage !== "object") return false;
    let previousImage = currentImage.previousElementSibling;
    let previousImageFound = false;
    while (!previousImageFound) {
        if (typeof previousImage !== "object") {
            return false;
        } else if (previousImage.className === "fullscreen-link") {
            previousImageFound = true;
            if (typeof previousImage.id === "string") {
                location.hash = '#' + previousImage.id;
            }
        } else {
            previousImage = previousImage.previousElementSibling;
        }
    }
}

function closeFullscreen() {
    const scrollPos = document.body.scrollTop;
    location.hash = " ";
    document.body.scrollTop = scrollPos;
}


function showHideElem(elemId, iconIdClosed, iconIdOpen) {
    if (typeof elemId !== "string") {
        console.log(
            `error: elemId must be string. ${typeof elemId} given.`
        );
        return false;
    }
    const elem = document.getElementById(elemId);
    let elemStyleDisplay = window.getComputedStyle(elem).display;
    if (elemStyleDisplay !== "none" && elemStyleDisplay !== "") {
        elem.setAttribute("data-display", elemStyleDisplay);
        elem.style.display = "none";

        if (typeof iconIdClosed === "string" && typeof iconIdOpen === "string") {
            document.getElementById(iconIdOpen).style.display = "none";
            document.getElementById(iconIdClosed).style.display = "block";
        } else if (typeof iconIdClosed === "string") {
            document.getElementById(iconIdClosed).style.display = "block";
        }
    } else {
        let displayAttr = elem.getAttribute("data-display");
        if (typeof displayAttr === "string" && displayAttr != "") {
            elem.style.display = elem.getAttribute("data-display");
            loadImages();
        } else {
            elem.style.display = "block";
            loadImages();
        }
        if (typeof iconIdClosed === "string" && typeof iconIdOpen === "string") {
            document.getElementById(iconIdOpen).style.display = "block";
            document.getElementById(iconIdClosed).style.display = "none";
        } else if (typeof iconIdClosed === "string") {
            document.getElementById(iconIdClosed).style.display = "none";
        }
    }
}

function resetScrolling() {
    if (window.removeEventListener) {
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
        window.onmousewheel = document.onmousewheel = null;
        window.onwheel = null;
        window.ontouchmove = null;
        document.onkeydown = null;
    }
}

function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

function disableScrolling() {
    if (window.addEventListener) {// older FF
        window.addEventListener('DOMMouseScroll', preventDefault, false);
        window.onwheel = preventDefault; // modern standard
        window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
        window.ontouchmove = preventDefault; // mobile
        document.onkeydown = preventDefaultForScrollKeys;
    }
}