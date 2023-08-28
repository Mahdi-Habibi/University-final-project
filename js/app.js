// Import the Express framework Swiper Configuration Configure Swiper to create
// a carousel with specified settings
const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: false,
    loop: true,
});
const express = require('express');
const app = express();
const ejs = require('ejs');

function showForm(formType) {
    const signupForm = document.getElementById('signupForm');
    const loginForm = document.getElementById('loginForm');
    const formContainer = document.getElementById('formContainer');

    if (formType === 'signup') {
        signupForm.style.display = 'block';
        loginForm.style.display = 'none';
    } else {
        signupForm.style.display = 'none';
        loginForm.style.display = 'block';
    }
}


