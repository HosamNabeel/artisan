// *************
// متابعون
// *************

// استدعاء العناصر من الصفحة
const followersModal = document.getElementById('followersModal');
const openFollowersModal = document.getElementById('openFollowersModal');
const closeFollowersModal = document.getElementById('closeFollowersModal');

// فتح النافذة المنبثقة عند الضغط على زر "عرض المتابعين"
openFollowersModal.onclick = function() {
    followersModal.style.display = 'flex';
}

// إغلاق النافذة المنبثقة عند الضغط على زر الإغلاق
closeFollowersModal.onclick = function() {
    followersModal.style.display = 'none';
}

// إغلاق النافذة عند الضغط خارجها
window.onclick = function(event) {
    if (event.target == followersModal) {
        followersModal.style.display = 'none';
    }
}

// *************
// يتابع
// *************
const followsModal = document.getElementById('followsModal');
const openFollowsModal = document.getElementById('openFollowsModal');
const closeFollowsModal = document.getElementById('closeFollowsModal');

openFollowsModal.onclick = function() {
    followsModal.style.display = 'flex';
}

closeFollowsModal.onclick = function() {
    followsModal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == followsModal) {
        followsModal.style.display = 'none';
    }
}
