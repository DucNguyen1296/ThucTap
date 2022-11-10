const btnOutline = document.querySelectorAll(".btn-outline-secondary");

// console.log(btnOutline);

for (let i = 0; i < btnOutline.length; i++) {
    btnOutline[i].addEventListener("click", function () {
        btnOutline[i].classList.add("active");
        btnOutline[i + 1].classList.remove("active");
        btnOutline[i - 1].classList.remove("active");
    });
}
