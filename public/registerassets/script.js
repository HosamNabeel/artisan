const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function(event) {
    let isValid = true;

    const usernameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const username = usernameInput.value.trim();
    const email = emailInput.value.trim();
    usernameInput.classList.remove("error");
    emailInput.classList.remove("error");
    document.getElementById("nameError").style.display = "none";
    document.getElementById("emailError").style.display = "none";
    if (username === "") {
        usernameInput.classList.add("error");
        document.getElementById("nameError").style.display = "block";
        isValid = false;
    }
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // نمط للتحقق من البريد الإلكتروني
    if (!emailPattern.test(email)) {
        emailInput.classList.add("error");
        document.getElementById("emailError").style.display = "block";
        isValid = false;
    }
    event.preventDefault();
    if (isValid) {
        console.log("First Next Button Clicked");
        slidePage.style.marginRight  = "-25%";
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
    }
});

nextBtnSec.addEventListener("click", function(event) {
    let isValid = true;

    const phoneInput = document.getElementById("phone");
    const addressInput = document.getElementById("address");
    const phone = phoneInput.value.trim();
    const address = addressInput.value.trim();
    phoneInput.classList.remove("error");
    addressInput.classList.remove("error");
    document.getElementById("phoneError").style.display = "none";
    document.getElementById("addressError").style.display = "none";

    const phoneRegex = /^(\+?[0-9]{1,3})?([0-9]{10,12})$/;
    if (phone === "" || !phoneRegex.test(phone)) {
        phoneInput.classList.add("error");
        document.getElementById("phoneError").style.display = "block";
        isValid = false;
    }

    if (address === "") {
        addressInput.classList.add("error");
        document.getElementById("addressError").style.display = "block";
        isValid = false;
    }

    event.preventDefault();
    if (isValid) {
        slidePage.style.marginRight = "-50%";
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
    }
});

nextBtnThird.addEventListener("click", function(event) {
    let isValid = true;

    const dateInput = document.getElementById("birthday");
    dateInput.classList.remove("error");
    const birthday = dateInput.value.trim();
    document.getElementById("dateError").style.display = "none";

    if (!birthday) {
        dateInput.classList.add("error");
        document.getElementById("dateError").style.display = "block";
        isValid = false;
    }

    event.preventDefault();
    if (isValid) {
        slidePage.style.marginRight = "-75%";
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
    }
});

submitBtn.addEventListener("click", function() {
    let isValid = true;

    const passwordInput = document.getElementById("password");
    const confirm_passwordInput = document.getElementById("confirm-password");
    const password = passwordInput.value.trim();
    const confirm_password = confirm_passwordInput.value.trim();
    passwordInput.classList.remove("error");
    confirm_passwordInput.classList.remove("error");
    document.getElementById("passwordError").style.display = "none";
    document.getElementById("numPasswordError").style.display = "none";
    document.getElementById("confPasswordError").style.display = "none";
    document.getElementById("matchPasswordError").style.display = "none";

    if (password === '') {
        passwordInput.classList.add("error");
        document.getElementById("passwordError").style.display = "block";
        isValid = false;
    }

    if (password.length <= 8 && isValid) {
        passwordInput.classList.add("error");
        document.getElementById("numPasswordError").style.display = "block";
        isValid = false;
    }

    if (confirm_password === '' && isValid) {
        confirm_passwordInput.classList.add("error");
        document.getElementById("confPasswordError").style.display = "block";
        isValid = false;
    }

    if (confirm_password !== password && isValid) {
        confirm_passwordInput.classList.add("error");
        document.getElementById("matchPasswordError").style.display = "block";
        isValid = false;
    }

    if (isValid) {
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
        setTimeout(function() {
            alert("Your Form Successfully Signed up");
            location.reload();
        }, 800);
    }
});

prevBtnSec.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginRight = "0%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});

prevBtnThird.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginRight = "-25%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});

prevBtnFourth.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginRight = "-50%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});
