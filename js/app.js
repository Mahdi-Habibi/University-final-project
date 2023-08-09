// Import the Express framework Swiper Configuration Configure Swiper to create
// a carousel with specified settings
const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    }
});
const express = require('express');
const app = express();
const ejs = require('ejs');


// Import the body-parser middleware for parsing request bodies
const bodyParser = require('body-parser');

// Import routes from the specified route file
const routes = require('../routes/route.js'); // Update the path to your route file

// Set the view engine to EJS
app.set('view engine', 'ejs');

// Serve static files from the 'public' directory
app.use(express.static(__dirname + '/public'));

// Use bodyParser to parse URL-encoded and JSON request bodies
app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());

// Add your routes here Define a route to render the 'home' view
app.get('/', routes.home);

// Define a route to handle user signup
app.post('/signup', async (req, res) => {
    const {username, email, password} = req.body;

    // Check password confirmation
    if (password !== req.body.passwordConfirm) {
        return res
            .status(400)
            .json({error: 'Passwords do not match.'});
    }

    // Process your signup logic here ...

    res.json({message: 'Signup successful!'});
});

// Define the port to listen on, with a default value of 3001
const port = process.env.PORT || 3001;

// Start the server and listen on the specified port
const server = app.listen(port, function (req, res) {
    console.log("Catch the action at http://localhost:" + port);
});

// Function to switch tabs This function handles the switching of tabs in the
// user interface
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

// Function for signup This async function handles user signup by making a POST
// request to the '/signup' endpoint
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

    const response = await fetch('/signup', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({username, email, password})
    });

    const data = await response.json();
    alert(data.message); // Assuming the server sends a JSON object with a "message" property
}