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




var server = app.listen(3000, function(){

  // this is how we get the address host and port
  var host = server.address().address;
  var port = server.address().port;

  // passing host and port strings to the sign %s
  console.log('Example app listening at http://%s:%s', host, port);

});
