const feedbackSlide = document.querySelector(".feedback-section .slide");
const feedbackCards = document.querySelectorAll(".feedback-section .card");

let currentFeedback = 0;

function showFeedback() {
    currentFeedback++;

    if (currentFeedback >= feedbackCards.length) {
        currentFeedback = 0;
    }

    feedbackSlide.style.transform = `translateX(-${currentFeedback * 100}%)`;
}

setInterval(showFeedback, 3000);