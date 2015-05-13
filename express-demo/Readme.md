## How should I structure my application?
* [Read the FAQ!](http://expressjs.com/starter/faq.html)


## Response methods
The methods on the response object (res) in the following table can send a response to the client and terminate the request response cycle. If none of them is called from a route handler, the client request will be left hanging.


* res.download()	Prompt a file to be downloaded.
* res.end()	End the response process.
* res.json()	Send a JSON response.
* res.jsonp()	Send a JSON response with JSONP support.
* res.redirect()	Redirect a request.
* res.render()	Render a view template.
* res.send()	Send a response of various types.
* res.sendFile	Send a file as an octet stream.
* res.sendStatus()	Set the response status code and send its string representation as the response body.


## Using middleware

An Express application is essentially a series of middleware calls.

Middleware is a function with access to the request object (req), the response object (res), and the next middleware in line in the request-response cycle of an Express application, commonly denoted by a variable named next. Middleware can:

1. Execute any code.
2. Make changes to the request and the response objects.
3. End the request-response cycle.
4. Call the next middleware in the stack.
5. If the current middleware does not end the request-response cycle,
it must call next() to pass control to the next middleware, otherwise the request will be left hanging.

With an optional mount path, middleware can be loaded at the application level or at the router level. Also, a series of middleware functions can be loaded together, creating a sub-stack of the middleware system at a mount point.

An Express application can use the following kinds of middleware:
