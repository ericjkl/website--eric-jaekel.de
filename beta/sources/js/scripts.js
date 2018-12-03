//Menu
var navMenu = document.getElementById('nav-menu');
var navIcon = document.getElementById('nav-icons');

function open_close_menu() {
    if (navMenu.style.display == 'flex') {
        navIcon.style.display = 'block';
        navMenu.style.display = 'none';
    } else {
        navIcon.style.display = 'none';
        navMenu.style.display = 'flex';
    }
}

//Notification
var notificationAlert1 = document.getElementById("notificationAlert1");
var notificationCover1 = document.getElementById("notificationCover1");

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

function CloseNotificationAlert() {
    notificationAlert1.style.display = "none";
}

// Gallery

function open_close_imageContainer(clicked_id) {
    var ic_expand_less_1 = document.getElementById("ic_expand_less_1");
    var ic_expand_more_1 = document.getElementById("ic_expand_more_1");
    var imageContainer1 = document.getElementById("imageContainer1");
    var ic_expand_less_2 = document.getElementById("ic_expand_less_2");
    var ic_expand_more_2 = document.getElementById("ic_expand_more_2");
    var imageContainer2 = document.getElementById("imageContainer2");
    
    switch (clicked_id){
        case ("ic_expand_less_1"):
        imageContainer1.style.display = 'none';
        ic_expand_less_1.style.display = 'none';
        ic_expand_more_1.style.display = 'block';
        break;
        case ("ic_expand_more_1"):
        imageContainer1.style.display = 'flex';
        ic_expand_less_1.style.display = 'block';
        ic_expand_more_1.style.display = 'none';
        break;
        case ("ic_expand_less_2"):
        imageContainer2.style.display = 'none';
        ic_expand_less_2.style.display = 'none';
        ic_expand_more_2.style.display = 'block';
        break;
        case ("ic_expand_more_2"):
        imageContainer2.style.display = 'flex';
        ic_expand_less_2.style.display = 'block';
        ic_expand_more_2.style.display = 'none';
        break;
    }
}

function open_close_description(clicked_element) {
    var content_expandable = clicked_element.nextElementSibling;
    switch (content_expandable.style.display) {
        case('none') :
        content_expandable.style.display = 'block';
        clicked_element.style.marginBottom = '0';
        clicked_element.children[1].style.display = 'block';
        clicked_element.children[2].style.display = 'none';
        break;
        case('block') :
        content_expandable.style.display = 'none';
        clicked_element.style.marginBottom = '-20px';
        clicked_element.children[1].style.display = 'none';
        clicked_element.children[2].style.display = 'block';
        break;
    }
}

var size_check = false;
function view_fullscreen(clicked_image_container) {
    var clicked_card = clicked_image_container.parentElement.parentElement;
    var clicked_thumbnail = clicked_image_container.children[0];
    var clicked_image = clicked_image_container.children[1];
    var ic_fullscreen = clicked_image_container.children[2];
    var ic_fullscreen_exit = clicked_image_container.children[3];
    var all_cards = document.getElementsByClassName("card-nobootstrap");
    var card_width = clicked_card.offsetWidth;
    var screen_width = window.innerWidth;
    var format_portrait = document.getElementsByClassName("portrait");
    var portrait = true;
    var format_landscape = document.getElementsByClassName("landscape");
    var format_square = document.getElementsByClassName("square");
    // if (card_width < screen_width * 0.5 || size_check == true) {        
        if (clicked_card.style.flexBasis == '100%') {
            clicked_card.style.flexBasis = '300px';
            clicked_image.style.width = '100%';
            clicked_thumbnail.style.width = '100%';
            clicked_image.style.display = 'none';
            clicked_thumbnail.style.display = 'block';
            ic_fullscreen.style.display = 'block';
            ic_fullscreen_exit.style.display = 'none';
            var scroll_distance = clicked_card.offsetTop;
            window.scrollTo(0, scroll_distance);
            size_check = false;
        } else {
            //reset all open (fullscreen) images
            for (var i=0; i < all_cards.length; i++) {
                all_cards[i].style.flexBasis = '300px';
                // all_cards[i].children[0].children[0].children[0].style.width = '100%';
                // all_cards[i].children[0].children[0].children[1].style.width = '100%';
                all_cards[i].children[0].children[0].children[0].style.display = 'block';
                all_cards[i].children[0].children[0].children[1].style.display = 'none';
                all_cards[i].children[0].children[0].children[2].style.display = 'block'; //ic fullscreen
                all_cards[i].children[0].children[0].children[3].style.display = 'none'; //ic exit fullscreen
                all_cards[i].children[0].children[0].children[0].style.width = '100%';
            }
            //enable fullscreen (only for clicked image)
            clicked_card.style.flexBasis = '100%';
            ic_fullscreen.style.display = 'none';
            ic_fullscreen_exit.style.display = 'block';
            clicked_thumbnail.style.display = 'none';
            clicked_image.style.display = 'block';
            clicked_image.style.width = 'auto';
            var maxScreenHeight = window.outerHeight;
            clicked_card.style.maxHeight = maxScreenHeight+'px';
            var scroll_distance = clicked_card.offsetTop;
            window.scrollTo(0, scroll_distance);
            size_check = true;
            //Bildbreite anhand des Bildformates festlegen
            // for (var i=0; i < format_portrait.length;) {
            //     if (format_portrait[i] == clicked_image) {
            //         portrait = true;
            //         i = format_portrait.length;
            //     } else {
            //         portrait = false;
            //         i++;
            //     }
            // }
            // if (portrait == true) {
            //     clicked_image.style.width = '40%';
            //     clicked_thumbnail.style.width = '40%';
            // }
        }    
    // } else {
    //     size_check = false;
    //     hovered_image.style.WebkitFilter = 'blur(0)';
    // }   
}



// im div-tag von .img-container-nobootstrap: onmouseover="size_check_animations(this)"
// function size_check_animations(hovered_image_container) {
//     var hovered_image = hovered_image_container.children[0];
//     var card_width = hovered_image_container.parentElement.parentElement.offsetWidth;
//     var screen_width = window.innerWidth;
//     var icon1 = hovered_image_container.children[1];
//     var icon2 = hovered_image_container.children[2];
//     if (card_width > screen_width * 0.5 & size_check == false) {
//         hovered_image.style.WebkitFilter = 'blur(0)';
//         hovered_image.style.cursor = 'default';
//         icon1.style.width = '0';
//         icon2.style.width = '0';
//     } else {
//         hovered_image_container.onmouseover = function() {
//             hovered_image.style.WebkitFilter = 'blur(4px)';
//             hovered_image.style.cursor = 'pointer';
//             icon1.style.width = '50%';
//             icon2.style.width = '50%';
//         }        
//         hovered_image_container.onmouseout = function() {
//             hovered_image.style.WebkitFilter = 'blur(0)';
//             hovered_image.style.cursor = 'default';
//             icon1.style.width = '0';
//             icon2.style.width = '0';
//         }
//     }
// }