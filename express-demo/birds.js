/*
The following example creates a router as a module, loads a middleware in it,
defines some routes, and mounts it on a path on the main app.

Create a router file named birds.js in the app directory, with the following content:
*/

var express = require('express');
var router = express.Router();

// middleware specific to this router
router.use(function timeLog(req, res, next) {
  console.log('Time: ', Date.now());
  next();
});
// define the home page route
router.get('/', function(req, res) {
  res.send('Birds home page');
});
// define the about route
router.get('/about', function(req, res) {
  res.send('About birds');
});

module.exports = router;
