function toggleNotifications() {
    const menu = document.getElementById('notification-menu');
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block'; // عرض القائمة
    } else {
        menu.style.display = 'none'; // إخفاء القائمة
    }
}

// إخفاء القائمة عند الضغط خارجها
document.addEventListener('click', function (event) {
    const menu = document.getElementById('notification-menu');
    const bellIcon = document.querySelector('.notification-icon');

    if (!menu.contains(event.target) && !bellIcon.contains(event.target)) {
        menu.style.display = 'none';
    }
});
