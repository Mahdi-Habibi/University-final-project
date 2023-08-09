const express = require('express');
const app = express();
// const cors = require('cors');
const bodyParser = require('body-parser');
// const mongoose = require('mongoose');

// Configure Mongoose to connect to your MongoDB database
// mongoose.connect('mongodb://localhost:27017/your_database_name', {
//   useNewUrlParser: true,
//   useUnifiedTopology: true,
// });

// // Create a schema for user data
// const userSchema = new mongoose.Schema({
//   username: String,
//   email: String,
//   password: String,
// });

// const User = mongoose.model('User', userSchema);

// app.use(cors()); // Enable CORS for all routes
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Middleware to handle CORS headers
// app.use((req, res, next) => {
//   res.header("Access-Control-Allow-Origin", "*");
//   res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
//   next();
// });

// Handle user signup
app.post('/signup', (req, res) => {
  const { username, email, password } = req.body;

  // Check if the username or email already exists in the database
  User.findOne(
    {
      $or: [{ username }, { email }],
    },
    (err, existingUser) => {
      if (err) {
        return res.status(500).json({ error: 'An error occurred.' });
      }
      if (existingUser) {
        return res.status(400).json({ error: 'Username or email already exists.' });
      }

      // If the user does not exist, save the new user to the database
      const newUser = new User({ username, email, password });
      newUser.save((err, savedUser) => {
        if (err) {
          return res.status(500).json({ error: 'An error occurred while signing up.' });
        }
        res.json({ message: 'Signup successful!' });
      });
    }
  );
});

// Handle user login
app.post('/login', (req, res) => {
  const { username, password } = req.body;

  // Find the user by username and password
  User.findOne({ username, password }, (err, user) => {
    if (err) {
      return res.status(500).json({ error: 'An error occurred.' });
    }
    if (!user) {
      return res.status(401).json({ error: 'Invalid credentials.' });
    }

    res.json({ message: 'Login successful!' });
  });
});

// const port = 3000;
// app.listen(port, () => console.log(`Server running on port ${port}`));
