const lazyElements = document.querySelectorAll('.lazyload');
let lazyElementsOnFocus = [];
let lazyElementsOnViewable = [];
function setRelativeHeight(imgElement) {
    if (!imgElement) return false;
    const newHeight = imgElement.getAttribute("data-relative-height") * imgElement.offsetWidth;
    if (typeof newHeight === "number" && newHeight > 0) {
        imgElement.setAttribute("height", newHeight);
    }
}
for (let element of lazyElements) {
    if (element.getAttribute("data-lazyload-listener") === "focus") {
        lazyElementsOnFocus.push(element);
        element.parentElement.parentElement.parentElement.addEventListener("focus", function () {
            changeSrc(element);
        });
    } else {
        lazyElementsOnViewable.push(element);
        if (element.tagName === "IMG") {
            setRelativeHeight(element);
        } else if (element.tagName === "PICTURE") {
            for (let elementChild of element.children) {
                if (elementChild.tagName === "IMG") {
                    setRelativeHeight(elementChild);
                }
            }
        }
    }
}

function changeSrc(element) {
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
            console.log(hasLoadedSomething);
        }
        if (i === lazyElementsOnViewable.length - 1 && hasLoadedSomething) {
            setTimeout(() => {
                loadImages();
                console.log('loading again');
            }, 2000);
            console.log('timeout set');
        }
    }
}

let isScrolling = false;
function scrollListener() {
    if (isScrolling) return;
    isScrolling = true;
    loadImages();
    setTimeout(function () {
        isScrolling = false;
    }, 100);
    console.log('scrolling');
}

window.addEventListener("scroll", scrollListener);
document.addEventListener("DOMContentLoaded", () => {loadImages()});

// let executionCounter = 0;
// let focusCounter = 0;
// const lazyElements = document.querySelectorAll('.lazyload');
// let lazyElementsOnFocus = [];
// let lazyElementsOnViewable = [];
// for (let element of lazyElements) {
//     if (element.getAttribute("data-lazyload-listener") === "focus") {
//         lazyElementsOnFocus.push(element);
//         focusCounter++;
//     } else {
//         lazyElementsOnViewable.push(element);
//     }
// }
//
// function loadImages() {
//
//     function changeSrc(element) {
//         if (element.offsetParent === null) return false;
//         if (element.getBoundingClientRect().top - window.innerHeight > 10) return false;
//         console.log(element.children);
//         if (element.tagName === "PICTURE") {
//             for (let elementChild of element.children) {
//                 if (elementChild.tagName === "IMG") {
//                     elementChild.setAttribute("src", elementChild.getAttribute("data-src"));
//                 } else if (elementChild.tagName === "SOURCE") {
//                     elementChild.setAttribute("srcset", elementChild.getAttribute("data-srcset"));
//                 }
//                 console.log(lazyElements);
//             }
//             if (element.getAttribute("data-lazyload-listener") !== "focus") {
//                 executionCounter++;
//             }
//         } else if (element.tagName === "IMG") {
//             const dataSrc = element.getAttribute("data-src");
//             const src = element.getAttribute("src");
//             if (dataSrc !== src) {
//                 element.setAttribute("src", dataSrc);
//                 if (element.getAttribute("data-lazyload-listener") !== "focus") {
//                     executionCounter++;
//                 }
//             }
//         } else {
//             const dataSrc = element.getAttribute("data-background-image");
//             if (typeof dataSrc === "string" && dataSrc.length > 0) {
//                 element.style.backgroundImage = `url("${dataSrc}")`;
//                 if (element.getAttribute("data-lazyload-listener") !== "focus") {
//                     executionCounter++;
//                 }
//             }
//         }
//     }
//
//     if (executionCounter >= lazyElements.length - focusCounter) {
//         window.removeEventListener("load", loadImages);
//         window.removeEventListener("scroll", scrollListener);
//         console.log('execution terminated');
//         return;
//     }
//
//     for (let element of lazyElements) {
//         const lazyListener = element.getAttribute("data-lazyload-listener");
//         if (lazyListener === "focus") {
//             element.parentElement.parentElement.parentElement.addEventListener("focus", function () {
//                 changeSrc(element);
//             });
//         } else {
//             changeSrc(element);
//         }
//     }
// }
//
// let isExecuting = false;
// let isScrolling = false;
//
// function scrollListener() {
//     if (isExecuting) return;
//     isExecuting = true;
//     loadImages();
//     setTimeout(function () {
//         isExecuting = false;
//     }, 400);
//
//     //nach 4s nochmal ausführen, um "nachgerückte" Bilder zu laden
//     if (isScrolling) {
//         clearTimeout(loadAgain);
//     }
//     isScrolling = true;
//     loadAgain = setTimeout(function () {
//         loadImages();
//         // console.log('loaded again');
//     }, 4000);
// }
//
// window.addEventListener("scroll", scrollListener);
// window.addEventListener("load", loadImages);

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