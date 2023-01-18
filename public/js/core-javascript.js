// off canvas

document.querySelector("html").classList.add("noscroll");
document.querySelector("html").classList.remove("noscroll");

$(function() {
    $("#sidebar-agunan-tab-text").width($("#sidebar-agunan").height());
});
$(window).resize(function() {
    $("#sidebar-agunan-tab-text").width($("#sidebar-agunan").height());
});
/* End of unsure centering */

//The only necessary piece of code lol
function toggleSidebar() {
    $("#sidebar-agunan").toggleClass("move-to-left");
    $("#sidebar-agunan-tab").toggleClass("move-to-left");
    $("main").toggleClass("move-to-left-partly");
    $(".arrow").toggleClass("active");
}

/* Totally unncessary swyping gestures*/
var gestureZone = document;
var touchstartX = 0,
    touchstartY = 0;
gestureZone.addEventListener('touchstart', function(event) {
    touchstartX = event.changedTouches[0].screenX;
    touchstartY = event.changedTouches[0].screenY;
}, false);

gestureZone.addEventListener('touchend', function(event) {
    var touchendX = event.changedTouches[0].screenX;
    var touchendY = event.changedTouches[0].screenY;
    // handleGesure(touchendX, touchendY);
}, false);

// function handleGesure(touchendX, touchendY) {
//     var acceptableYTravel = (touchendY - touchstartY) < 15 && (touchendY - touchstartY) > -15;

//     var swiped = 'swiped: ';
//     if (touchendX < touchstartX && acceptableYTravel) {
//         openSidebar();
//         console.log(swiped + 'left!');
//     }
//     if (touchendX > touchstartX && acceptableYTravel) {
//         closeSidebar();
//         console.log(swiped + 'right!');
//     }
// }

function openSidebar() {
    $("#sidebar-agunan").addClass("move-to-left");
    $("main").addClass("move-to-left-partly");
    $("#sidebar-agunan-tab").addClass("move-to-left");
    $(".arrow").addClass("active");
}

function closeSidebar() {
    $("#sidebar-agunan").removeClass("move-to-left");
    $("main").removeClass("move-to-left-partly");
    $("#sidebar-agunan-tab").removeClass("move-to-left");
    $(".arrow").removeClass("active");
}