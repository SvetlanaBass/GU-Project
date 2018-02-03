let slideIndex = 0;
let repeat;
let slides = document.querySelectorAll(".slide");
let bg = document.querySelector(".slider");
let dot = document.querySelectorAll(".dot");
let bgcolor = ["#e8e8e8", "#0e0f14", "#f7f7f7"];

showSlides();

function showSlides() {
    for (let i = 0; i < slides.length; i++) {
        dot[i].style.backgroundColor = "transparent";
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    slides[slideIndex-1].style.display = "block";
    bg.style.backgroundColor = bgcolor[slideIndex-1];
    dot[slideIndex-1].style.backgroundColor = "#f16d7f";
    repeat = setTimeout(showSlides, 3000);
}

function currentSlide(n) {
    clearTimeout(repeat);
    for (let i = 0; i < slides.length; i++) {
        dot[i].style.backgroundColor = "transparent";
        slides[i].style.display = "none";
    }
    slides[n].style.display = "block";
    bg.style.backgroundColor = bgcolor[n];
    dot[n].style.backgroundColor = "#f16d7f";
}