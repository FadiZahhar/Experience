var express = require('express');
var app = express();

/*
Serving files, such as images, CSS, JavaScript and other static files is accomplished with the
help of a built-in middleware in Express - express.static.
Pass the name of the directory, which is to be marked as the location of static assets,
to the express.static middleware to start serving the files directly. For example,
if you keep your images, CSS, and JavaScript files in a directory named public, you can do this:
*/
app.use(express.static('public'));

/*
If you want to create a “virtual” (since the path does not actually exists in the file system)
path prefix for the files served by express.static, you can specify a mount path for the static directory, as shown below:
app.use('/static', express.static('public'));
*/


/* hello world example
// Get the root
app.get('/',function(req,res){
  res.send('Hello world');
});
End hello world example*/

/* Basic routing tutorial */
/*This tutorial is a basic introduction to routing with Express.
Routing refers to determining how an application responds to a client request to a particular endpoint,
which is a URI (or path) and a specific HTTP request method (GET, POST, and so on).
Each route can have one or more handler functions, which is / are executed when the route is matched.
Route definition takes the following structure app.METHOD(PATH, HANDLER), where app is an instance of express,
METHOD is an HTTP request method, PATH is a path on the server, and HANDLER is the function executed when the
route is matched.
*/

// respond with "Hello World!" on the homepage
app.get('/', function (req, res) {
  res.send('Hello World!');
});

// accept POST request on the homepage
app.post('/', function (req, res) {
  res.send('Got a POST request');
});

// accept PUT request at /user
app.put('/user', function (req, res) {
  res.send('Got a PUT request at /user');
});

// accept DELETE request at /user
app.delete('/user', function (req, res) {
  res.send('Got a DELETE request at /user');
});

/* end Basic routing tutorial */


/* Route handling examples */

// A route can be handled using a single callback function:
app.get('/example/a',function(req, res){
  res.send('Hello from A!');
});

// A route can be handled using a more than one callback function (make sure to specify the next object):
app.get('/example/b',function(req,res,next){
  console.log('response will be send by the next function...');
  next();
}, function(req,res){
  res.send('Hello from B!');
});

// A route can be handled using an array of callback functions:
var cb0 = function (req, res, next) {
  console.log('CB0');
  next();
}

var cb1 = function (req, res, next) {
  console.log('CB1');
  next();
}

var cb2 = function (req, res) {
  res.send('Hello from C!');
}

app.get('/example/c', [cb0, cb1, cb2]);

// A route can be handled using a combination of array of functions and independent functions:

var cb0 = function (req, res, next) {
  console.log('CB0');
  next();
}

var cb1 = function (req, res, next) {
  console.log('CB1');
  next();
}

app.get('/example/d', [cb0, cb1], function (req, res, next) {
  console.log('response will be sent by the next function ...');
  next();
}, function (req, res) {
  res.send('Hello from D!');
});


/* Response methods */
/*
res.download()	Prompt a file to be downloaded.
res.end()	End the response process.
res.json()	Send a JSON response.
res.jsonp()	Send a JSON response with JSONP support.
res.redirect()	Redirect a request.
res.render()	Render a view template.
res.send()	Send a response of various types.
res.sendFile	Send a file as an octet stream.
res.sendStatus()	Set the response status code and send its string representation as the response body.
*/


/* App Route
Chainable route handlers for a route path can be created using app.route().
Since the path is specified at a single location, it helps to create modular routes
and reduce redundancy and typos. For more information on routes, see Router() documentation.
Here is an example of chained route handlers defined using app.route().
*/
app.route('/book')
  .get(function(req,res){
    res.send('Get a random book');
  })
  .post(function(req,res){
    res.send('Add a book');
  })
  .put(function(req,res){
    res.send('Update the book');
  });
/* End routing examples */

/*
load the router module in the app:
*/
var birds = require('./birds');
app.use('/birds', birds);





var server = app.listen(3000, function(){

  // this is how we get the address host and port
  var host = server.address().address;
  var port = server.address().port;

  // passing host and port strings to the sign %s
  console.log('Example app listening at http://%s:%s', host, port);

});
