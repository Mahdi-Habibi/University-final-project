// import express from 'express';
// const app = express();
// import cors from 'cors';
// import { urlencoded, json } from 'body-parser';
// import { connect, Schema, model } from 'mongoose';

const express = require('express');
const app = express();
const http = require('http');

const path = require('path');


const port = 3000;
const hostname = '127.0.0.1';
const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
});
app.set('view engine', 'ejs');

app.use(express.static(__dirname + '/public'));

app.set('views', path.join(__dirname, 'views'));

app.get('/', function (req, res) {
  res.render('signup-login');
});

app.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});





// // Configure Mongoose to connect to your MongoDB database
// connect('mongodb://localhost:27017/user/user-information', {
//   useNewUrlParser: true,
//   useUnifiedTopology: true,
// });

// // Create a schema for user data
// const userSchema = new Schema({
//   username: String,
//   email: String,
//   password: String,
// });

// const User = model('User', userSchema);

// app.use(cors()); // Enable CORS for all routes
// app.use(urlencoded({ extended: true }));
// app.use(json());

// // Middleware to handle CORS headers
// app.use((req, res, next) => {
//   res.header("Access-Control-Allow-Origin", "*");
//   res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
//   next();
// });

// // Handle user signup
// app.post('/signup', (req, res) => {
//   const { username, email, password } = req.body;

//   // Check if the username or email already exists in the database
//   User.findOne(
//     {
//       $or: [{ username }, { email }],
//     },
//     (err, existingUser) => {
//       if (err) {
//         return res.status(500).json({ error: 'An error occurred.' });
//       }
//       if (existingUser) {
//         return res.status(400).json({ error: 'Username or email already exists.' });
//       }

//       // If the user does not exist, save the new user to the database
//       const newUser = new User({ username, email, password });
//       newUser.save((err, savedUser) => {
//         if (err) {
//           return res.status(500).json({ error: 'An error occurred while signing up.' });
//         }
//         res.json({ message: 'Signup successful!' });
//       });
//     }
//   );
// });

// // Handle user login
// app.post('/login', (req, res) => {
//   const { username, password } = req.body;

//   // Find the user by username and password
//   User.findOne({ username, password }, (err, user) => {
//     if (err) {
//       return res.status(500).json({ error: 'An error occurred.' });
//     }
//     if (!user) {
//       return res.status(401).json({ error: 'Invalid credentials.' });
//     }

//     res.json({ message: 'Login successful!' });
//   });
// });

// // const port = 3000;
// app.listen(port, () => console.log(`Server running on port ${port}`));
