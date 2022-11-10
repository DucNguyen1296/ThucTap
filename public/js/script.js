"use strict";

window.onbeforeunload = function () {
    window.scrollTo(0, 0);
};

// Modal update button
const modal = document.querySelectorAll(".modal2");
const overlay = document.querySelectorAll(".overlay");
const btnsCloseModal = document.querySelectorAll(".close__modal");
const btnsOpenModal = document.querySelectorAll(".show__modal");
const scroll = document.querySelector("body");
const menuToggle = document.querySelectorAll(".toggle");
const commentButton = document.querySelectorAll(".post__feed--comment--button");
for (let i = 0; i < btnsOpenModal.length; i++) {
    btnsOpenModal[i].addEventListener("click", function () {
        modal[i].classList.remove("hidden");
        overlay[i].classList.remove("hidden");
        window.scrollTo(0, 0);
        scroll.classList.add("scroll-lock");
    });
}

for (let i = 0; i < btnsCloseModal.length; i++) {
    btnsCloseModal[i].addEventListener("click", function () {
        modal[i].classList.add("hidden");
        overlay[i].classList.add("hidden");
        scroll.classList.remove("scroll-lock");
    });
}

// console.log(commentButton);

for (let i = 0; i < menuToggle.length; i++) {
    menuToggle[i].onclick = function () {
        menuToggle[i].classList.toggle("active");
        commentButton[i].classList.toggle("hidden");
    };
}

const menuComment = document.querySelectorAll(".post__feed--comment");
const showComment = document.querySelectorAll(".btn__comment");

for (let i = 0; i < showComment.length; i++) {
    showComment[i].onclick = function () {
        menuComment[i].classList.remove("hidden");
    };
}

// --------- Sticky NavBar -----------//
window.onscroll = function () {
    myFunction();
};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}

// Reply hidden
const replyBtn = document.querySelectorAll(".comment-footer-comment");
const replyShow = document.querySelectorAll(".reply-box");
console.log(replyShow);
for (let i = 0; i < replyBtn.length; i++) {
    replyBtn[i].onclick = function () {
        replyShow[i].classList.remove("hidden");
    };
}
