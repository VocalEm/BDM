document.addEventListener("DOMContentLoaded", () => {
  const sliderContainer = document.querySelector(".slider-container");
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");

  prevBtn.addEventListener("click", () => {
    sliderContainer.scrollBy({ left: -200, behavior: "smooth" });
  });

  nextBtn.addEventListener("click", () => {
    sliderContainer.scrollBy({ left: 200, behavior: "smooth" });
  });
});
