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
            console.log('21',elem.getAttribute("data-display"));
            elem.style.display = elem.getAttribute("data-display");
        } else {
            elem.style.display = "block";
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