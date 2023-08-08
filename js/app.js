// swiper
let swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    }
});

// signUp logIn
function switchTab(tabName) {
    const forms = document.getElementsByClassName('form');
    for (let i = 0; i < forms.length; i++) {
        forms[i]
            .classList
            .remove('show');
    }

    const tab = document.getElementById(`${tabName}Form`);
    tab
        .classList
        .add('show');
}

async function signup() {
    const username = document
        .getElementById('signupUsername')
        .value;
    const email = document
        .getElementById('signupEmail')
        .value;
    const password = document
        .getElementById('signupPassword')
        .value;
    const passwordConfirm = document
        .getElementById('signupPasswordConfirm')
        .value;

    if (password !== passwordConfirm) {
        alert('Passwords do not match.');
        return;
    }

    const response = await fetch('http://localhost:8080/signup', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({username, email, password})
    });

    const data = await response.json();
    alert(data.message); // Assuming the server sends a JSON object with a "message" property
}