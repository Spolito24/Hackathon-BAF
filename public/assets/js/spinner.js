// (A) SHOW & HIDE SPINNER
window.onload = function () {
    show();
    setTimeout(() => {
        hide();
    }, 1600); // remove the notification after 1 seconds
}

function show() {
    document.getElementById("spinner").classList.add("show");
}
function hide() {
    document.getElementById("spinner").classList.remove("show");
}