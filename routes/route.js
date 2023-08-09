// Define the home function
// This function is responsible for rendering the 'home' view when requested.
// It sends the rendered view as a response to the client.
exports.home = function(req, res) {
  res.render('home');
}

// Define the login function
// This function is responsible for rendering the 'login' view when requested.
// It sends the rendered view as a response to the client.
exports.login = function(req, res) { 
  res.render('login');
}
