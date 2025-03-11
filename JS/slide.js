$(document).ready(function () {
    let index = 1; // Commencer à 1 car on ajoute des clones
    const slides = $(".slide");
    const totalSlides = slides.length;
    const sliderContainer = $(".slider-container");

    // 🔹 Ajouter des clones pour un effet infini
    const firstClone = slides.first().clone();
    const lastClone = slides.last().clone();

    sliderContainer.prepend(lastClone);
    sliderContainer.append(firstClone);

    const allSlides = $(".slide"); // Prendre en compte les clones
    const totalWithClones = allSlides.length;

    sliderContainer.css("transform", `translateX(${-index * 100}%)`);

    function updateSlider(smooth = true) {
        if (smooth) {
            sliderContainer.css("transition", "transform 0.5s ease-in-out");
        } else {
            sliderContainer.css("transition", "none");
        }
        sliderContainer.css("transform", `translateX(${-index * 100}%)`);
    }

    function nextSlide() {
        index++;
        updateSlider();
        if (index >= totalWithClones - 1) {
            setTimeout(() => {
                index = 1;
                updateSlider(false);
            }, 500);
        }
    }

    function prevSlide() {
        index--;
        updateSlider();
        if (index <= 0) {
            setTimeout(() => {
                index = totalSlides;
                updateSlider(false);
            }, 500);
        }
    }

    $(".next").on("click", nextSlide);
    $(".prev").on("click", prevSlide);

    let autoSlide = setInterval(nextSlide, 5000);
    $(".slider").hover(
        () => clearInterval(autoSlide),
        () => (autoSlide = setInterval(nextSlide, 5000))
    );

    let touchStartX = 0, touchEndX = 0;
    $(".slider-container").on("touchstart", (e) => {
        touchStartX = e.originalEvent.touches[0].clientX;
    });

    $(".slider-container").on("touchend", (e) => {
        touchEndX = e.originalEvent.changedTouches[0].clientX;
        if (touchStartX - touchEndX > 50) nextSlide();
        else if (touchEndX - touchStartX > 50) prevSlide();
    });

    $(document).on("keydown", (e) => {
        if (e.key === "ArrowLeft") prevSlide();
        if (e.key === "ArrowRight") nextSlide();
    });
});
// JavaScript pour basculer l'affichage du menu mobile
document.querySelector('.menu-mobile i').addEventListener('click', function() {
    var menu = document.getElementById('mobile-menu');
    menu.classList.toggle('active'); // Bascule la classe 'active' pour afficher/masquer le menu
});
