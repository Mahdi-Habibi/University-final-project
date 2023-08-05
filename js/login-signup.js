const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const loginTab = document.querySelector('.tab-button:nth-child(1)');
const signupTab = document.querySelector('.tab-button:nth-child(2)');

loginForm.addEventListener('submit', login);
signupForm.addEventListener('submit', signup);
loginTab.addEventListener('click', () => switchTab('login'));
signupTab.addEventListener('click', () => switchTab('signup'));

function switchTab(tab) {
  if (tab === 'login') {
    loginForm.style.display = 'block';
    signupForm.style.display = 'none';
    loginTab.classList.add('active');
    signupTab.classList.remove('active');
  } else {
    loginForm.style.display = 'none';
    signupForm.style.display = 'block';
    loginTab.classList.remove('active');
    signupTab.classList.add('active');
  }
}

function login(event) {
  event.preventDefault();
  const formData = new FormData(loginForm);
  const data = Object.fromEntries(formData.entries());
  // Handle login data (data.username and data.password)
  console.log('Login Data:', data);
  loginForm.reset();
}

function signup(event) {
  event.preventDefault();
  const formData = new FormData(signupForm);
  const data = Object.fromEntries(formData.entries());
  // Handle signup data (data.username, data.email, data.password, data.confirmPassword)
  console.log('Signup Data:', data);
  signupForm.reset();
}
