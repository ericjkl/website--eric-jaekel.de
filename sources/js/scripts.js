let executionCounter = 0;
const lazyElements = document.querySelectorAll('.lazyload');
let focusCounter = 0;
for (let element of lazyElements) {
    if (element.getAttribute("data-lazyload-listener") === "focus") {
        focusCounter++;
    }
}
function loadImages() {

    function changeSrc(element) {
        console.log('changeSrc() called');
        if (element.offsetParent !== null) {
            let windowBottom = window.scrollY + window.outerHeight;
            if (windowBottom + 200 >= element.offsetTop) {
                if (element.tagName === "PICTURE") {
                    const dataSrcset1 = element.childNodes[1].getAttribute("data-srcset");
                    const dataSrcset2 = element.childNodes[3].getAttribute("data-srcset");
                    const dataSrcset3 = element.childNodes[5].getAttribute("data-src");
                    const srcset1 = element.childNodes[1].getAttribute("srcset");
                    const srcset2 = element.childNodes[3].getAttribute("srcset");
                    const srcset3 = element.childNodes[5].getAttribute("src");
                    if (dataSrcset1 !== srcset1 || dataSrcset2 !== srcset2 || dataSrcset3 !== srcset3) {
                        element.childNodes[1].setAttribute("srcset", dataSrcset1);
                        element.childNodes[3].setAttribute("srcset", dataSrcset2);
                        element.childNodes[5].setAttribute("src", dataSrcset3);
                        if (element.getAttribute("data-lazyload-listener") !== "focus") {
                            executionCounter++;
                        }
                    }
                } else if (element.tagName === "IMG") {
                    const dataSrc = element.getAttribute("data-src");
                    const src = element.getAttribute("src");
                    if (dataSrc !== src) {
                        element.setAttribute("src", dataSrc);
                        if (element.getAttribute("data-lazyload-listener") !== "focus") {
                            executionCounter++;
                        }
                    }
                }
            }
        }
    }
    if (executionCounter >= lazyElements.length - focusCounter) {
        window.removeEventListener("load", loadImages);
        window.removeEventListener("scroll", scrollListener);
        console.log('execution terminated');
        return;
    }

    for (let element of lazyElements) {
        const lazyListener = element.getAttribute("data-lazyload-listener");
        if (lazyListener === "focus") {
            element.parentElement.parentElement.parentElement.addEventListener("focus", function () {
                changeSrc(element);
            });
        } else {
            changeSrc(element);
        }
    }
}

let isExecuting = false;
let isScrolling = false;
function scrollListener() {
    if (isExecuting) return;
    isExecuting = true;
    loadImages();
    setTimeout(function () {
        isExecuting = false;
    },400);

    //nach 4s nochmal ausführen, um "nachgerückte" Bilder zu laden
    if (isScrolling) {
        clearTimeout(loadAgain);
    }
    isScrolling = true;
    loadAgain = setTimeout(function () {
        loadImages();
        console.log('loaded again');
    }, 4000);
}
window.addEventListener("scroll", scrollListener);
window.addEventListener("load", loadImages);

function showHideElem(elemId, iconIdClosed, iconIdOpen) {
    if (typeof elemId !== "string") {
        console.log(`error: elemId must be string. ${typeof elemId} given.`);
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