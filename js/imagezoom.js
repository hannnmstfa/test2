// imagezoom.js

function showPopupImage(e) {
    var overlay = document.getElementById("overlay");
    var largeImage = document.getElementById("largeImage");

    largeImage.src = e.target.src;

    // Set posisi overlay sesuai dengan posisi gambar kecil yang diklik
    overlay.style.top = window.scrollY + e.clientY + 'px';
    overlay.style.left = window.scrollX + e.clientX + 'px';

    overlay.style.display = "flex";
}

function hideOverlay() {
    var overlay = document.getElementById("overlay");
    overlay.style.display = "none";
}

var smallImage = document.getElementById("smallImage");
smallImage.addEventListener("mouseenter", showPopupImage);
smallImage.addEventListener("mouseleave", hideOverlay);
