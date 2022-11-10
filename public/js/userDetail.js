const userContent = document.querySelector(".user-content");

userContent.addEventListener("mouseenter", function () {
    userContent.classList.add("scroll-show");
    // userContent.classList.remove("scroll-fixed2");
});

userContent.addEventListener("mouseleave", function () {
    userContent.classList.remove("scroll-show");
    // userContent.classList.add("scroll-fixed2");
});

const imgButton = document.getElementById("camera");
const imgUpdate = document.querySelector(".img-box");
imgButton.addEventListener("click", function () {
    imgUpdate.classList.remove("hidden");
});
