"use strict";

const modal = document.querySelectorAll(".modal");
const overlay = document.querySelectorAll(".overlay");
const btnsCloseModal = document.querySelectorAll(".close__modal");
const btnsOpenModal = document.querySelectorAll(".show__modal");
console.log(btnsOpenModal);
console.log(modal);

for (let i = 0; i < btnsOpenModal.length; i++) {
    btnsOpenModal[i].addEventListener("click", function () {
        modal[i].classList.remove("hidden");
        overlay[i].classList.remove("hidden");
        window.scrollTo(0, 0);
    });
}

for (let i = 0; i < btnsCloseModal.length; i++) {
    btnsCloseModal[i].addEventListener("click", function () {
        modal[i].classList.add("hidden");
        overlay[i].classList.add("hidden");
    });
}
