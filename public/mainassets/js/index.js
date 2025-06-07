const dots = document.querySelectorAll('.circle-btn');
const d_animations = document.querySelectorAll('.d_animation');
let slider_title = document.getElementById('slide-title');

let nextIndex = 1;

function animations_r(){
    let reverseAnimation = `d1_r`;
    d_animations.forEach((d_animation, index) => {
        reverseAnimation = `d${index + 1}_r`;
        d_animation.style.animation = `${reverseAnimation} 1s forwards`;
    });
}

function animations(){
    d_animations[0].style.animation = `d1 1s forwards`;
    d_animations[1].style.animation = `d2 1s 1s forwards`;
    d_animations[2].style.animation = `d3 1s forwards`;
    d_animations[3].style.animation = `d4 1s 1s forwards`;
    d_animations[4].style.animation = `d5 1s forwards`;
    d_animations[5].style.animation = `d6 1s 1s forwards`;
    d_animations[6].style.animation = `d7 1s 1s forwards`;
    d_animations[7].style.animation = `d8 1s 1s forwards`;
    d_animations[8].style.animation = `d9 1s forwards`;
    d_animations[9].style.animation = `d10 1s forwards`;
    d_animations[10].style.animation = `d11 1s 1s forwards`;
    d_animations[11].style.animation = `d12 1s forwards`;
    d_animations[12].style.animation = `d13 1s 1s forwards`;
}

function transmissionSlids(){
    animations_r();
    setTimeout(() => {
        animations();
    },1000);
    setTimeout(() => {
        nextSlide();
    },5000);
}

function slide1(){
    slider_title.innerHTML = 'السلايد الأول';
    slider_title.style.color = 'gold';
    dots.forEach(dot => dot.style.backgroundColor = 'gold');
    dots[0].style.backgroundColor = '#a99002';
    nextIndex = 2;
    transmissionSlids();
}

function slide2(){
    slider_title.innerHTML = 'السلايد الثاني';
    slider_title.style.color = 'red';
    dots.forEach(dot => dot.style.backgroundColor = 'red');
    dots[1].style.backgroundColor = '#e64545';
    nextIndex = 3;
    transmissionSlids();
}

function slide3(){
    slider_title.innerHTML = 'السلايد الثالث';
    slider_title.style.color = 'green';
    dots.forEach(dot => dot.style.backgroundColor = 'green');
    dots[2].style.backgroundColor = '#015901';
    nextIndex = 4;
    transmissionSlids();
}

function slide4(){
    slider_title.innerHTML = 'السلايد الرابع';
    slider_title.style.color = 'blue';
    dots.forEach(dot => dot.style.backgroundColor = 'blue');
    dots[3].style.backgroundColor = '#01018f';
    nextIndex = 1;
    transmissionSlids();
}

function showSlide(index) {
    dots.forEach((dot, i) => {
        dot.classList.remove('active');
        if (i == index) {
            dot.classList.add('active');
            if(index == 0){
                slide1();
            }if(index == 1){
                slide2();
            }if(index == 2){
                slide3();
            }if(index == 3){
                slide4();
            }
        }
    });
}

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        showSlide(index);
    });
});

function nextSlide() {
    switch (nextIndex) {
        case 1: slide1();
            break;
        case 2: slide2();
            break;
        case 3: slide3();
            break;
        default:
           slide4();
    }
}

window.onload = function() {
    slide1();
};


const LoginModal = document.getElementById('LoginModal');
const openLoginModal = document.getElementById('openLoginModal');
const closeLoginModal = document.getElementById('closeLoginModal');

// فتح النافذة المنبثقة عند الضغط على زر "عرض المتابعين"
openLoginModal.onclick = function() {
    LoginModal.style.display = 'flex';
}

// إغلاق النافذة المنبثقة عند الضغط على زر الإغلاق
// closeLoginModal.onclick = function() {
//     LoginModal.style.display = 'none';
// }

const regModal = document.getElementById('regModal');
const openRegModal = document.getElementById('openRegModal');
const closeRegModal = document.getElementById('closeRegModal');

// فتح النافذة المنبثقة عند الضغط على زر "عرض المتابعين"
openRegModal.onclick = function() {
    regModal.style.display = 'flex';
}

// إغلاق النافذة المنبثقة عند الضغط على زر الإغلاق
closeRegModal.onclick = function() {
    regModal.style.display = 'none';
}

// إغلاق النافذة عند الضغط خارجها
window.onclick = function(event) {
    if (event.target == regModal) {
        regModal.style.display = 'none';
    }
    if (event.target == LoginModal) {
        LoginModal.style.display = 'none';
    }
}
