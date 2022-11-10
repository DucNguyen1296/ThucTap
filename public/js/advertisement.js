const mouse1 = document.querySelector(".advertisement-left");
const mouse2 = document.querySelector(".advertisement-right");
// console.log(btnsOpenModal);

mouse1.addEventListener("mouseenter", function () {
    mouse1.classList.add("scroll-show");
    mouse1.classList.remove("scroll-fixed");
});

mouse1.addEventListener("mouseleave", function () {
    mouse1.classList.remove("scroll-show");
    mouse1.classList.add("scroll-fixed");
});

mouse2.addEventListener("mouseenter", function () {
    mouse2.classList.add("scroll-show");
    mouse2.classList.remove("scroll-fixed");
});

mouse2.addEventListener("mouseleave", function () {
    mouse2.classList.remove("scroll-show");
    mouse2.classList.add("scroll-fixed");
});
