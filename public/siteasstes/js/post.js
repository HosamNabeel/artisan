document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('postCarousel');
    const totalSlides = document.querySelectorAll('.carousel-item').length;
    const totalSlidesElement = document.getElementById('totalSlides');
    const currentSlideElement = document.getElementById('currentSlide');

    totalSlidesElement.textContent = totalSlides;

    // تحديث الرقم عند التبديل بين الصور
    carousel.addEventListener('slide.bs.carousel', function (event) {
        const currentSlide = event.to + 1;  // +1 لأن الفهرس يبدأ من 0
        currentSlideElement.textContent = currentSlide;
    });
});

function toggleReplies(button) {
    const replies = button.closest('.comment-content').querySelector('.replies');
    if (replies.style.display === 'none' || replies.style.display === '') {
        replies.style.display = 'block';
        button.textContent = 'إخفاء الردود';
    } else {
        replies.style.display = 'none';
        var repliesCount = button.getAttribute('data-replies-count');
        button.textContent = `عرض الردود (${repliesCount})`;
    }
}

// modal JS
function openModal() {
    const modal = document.getElementById("likesModal");
    if (modal) {
        modal.style.display = "block";
    } else {
        console.error("Modal غير موجود!");
    }
}

const followersModal = document.getElementById('lovesModal');
const openFollowersModal = document.getElementById('lovesCount');
const closeFollowersModal = document.getElementById('closeLovesModal');

lovesCount.onclick = function() {
    followersModal.style.display = 'flex';
}

closeFollowersModal.onclick = function() {
    followersModal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == followersModal) {
        followersModal.style.display = 'none';
    }
}
//***** */

function toggleReplyForm(commentId) {
    const replyForm = document.getElementById(`reply-form-${commentId}`);
    replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
}

window.addEventListener('focusInput', () => {
    const input = document.querySelector('#commentInput');
    if (input) {
        input.focus();
    }
});
