const replyBtn = document.querySelectorAll(".reply-button-fa");
const replyShow = document.querySelectorAll(".reply-comment");
for (let i = 0; i < replyBtn.length; i++) {
    replyBtn[i].onclick = function () {
        replyShow[i].classList.remove("hidden");
    };
}


//------ Chat Box ------//
// const chatBoxBtn = document.querySelectorAll(".friendz-list li");
// console.log(chatBoxBtn);
// const chatBox = document.querySelectorAll("chat-box");

// const imgButton = document.getElementById("camera");
// const imgUpdate = document.querySelector(".img-box");
// imgButton.addEventListener("click", function () {
//     imgUpdate.classList.remove("hidden");
// });
