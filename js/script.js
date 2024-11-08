let slideIndex = 0;

function showSlides() {
    slideIndex++;
    moveSlides();
}

function moveSlides() {
    let slides = document.querySelector(".slideku");
    if (slideIndex === slides.children.length) {
        slideIndex = 0;
    }
    if (slideIndex < 0) {
        slideIndex = slides.children.length - 1;
    }
    let transformValue = -slideIndex * 100 + "%";
    slides.style.transition = "transform 0.5s ease-in-out";
    slides.style.transform = "translateX(" + transformValue + ")";
}

function prevSlide() {
    slideIndex--;
    moveSlides();
}

function nextSlide() {
    slideIndex++;
    moveSlides();
}

setInterval(showSlides, 7500); // Ganti 2000 dengan interval waktu dalam milidetik (misalnya, 3000 untuk 3 detik)

// Tambahkan event listener untuk menangani saat transisi slider selesai
document.querySelector(".slider").addEventListener("transitionend", function () {
    let slides = document.querySelector(".slideku");
    if (slideIndex === 0) {
        slides.style.transition = "none";
        slideIndex = slides.children.length - 2;
        let transformValue = -slideIndex * 100 + "%";
        slides.style.transform = "translateX(" + transformValue + ")";
    }
    if (slideIndex === slides.children.length - 1) {
        slides.style.transition = "none";
        slideIndex = 1;
        let transformValue = -slideIndex * 100 + "%";
        slides.style.transform = "translateX(" + transformValue + ")";
    }
});



//image zoom
function zoomImage() {
    var overlay = document.getElementById("overlay");
    overlay.style.display = "flex";
}

function closeZoom() {
    var overlay = document.getElementById("overlay");
    overlay.style.display = "none";
}

