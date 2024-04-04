const express = require('express');
const path = require('path');

const app = express();
const port = 1337;

const dir = __dirname + '/public';

// Serve static files from the 'public' directory
app.use(express.static(`public`));

// Serve static files from the 'public/images' directory
app.use(express.static('public/images'));

// Serve static files from the 'public/css' directory
app.use(express.static('public/css'));

// Serve static files from the 'public/scripts' directory
app.use(express.static('public/scripts'));

// Serve the 'photos.json' file from the '/photos' route
const jsonFilePath = path.join(__dirname, 'public', 'photos.json');
app.use('/photos', express.static(jsonFilePath));

// Handle requests for the root and '/index' routes
app.get(['/', '/index'], function (request, response) {
    response.sendFile(`${dir}/index.html`);
});

// Handle requests for the '/blog' route
app.get('/blog', function (request, response) {
    response.sendFile(`${dir}/blog.html`);
});

// Handle requests for the '/photo' route
app.get('/photo', function (request, response) {
    response.sendFile(`${dir}/photo.html`);
});

// Handle requests for the '/about' route
app.get('/about', function (request, response) {
    response.sendFile(`${dir}/about.html`);
});

// Handle requests for the '/404' route
app.get('/404', function (request, response) {
    response.sendFile(`${dir}/404.html`);
});

// Handle requests for any other route
app.get('*', function (request, response) {
    response.sendFile(`${dir}/404.html`);
});

app.use(function(err, request, response, next){
    console.error(err.stack);
    response.type('text/plain');
    response.status(500);
    response.send('Internal Server Error');
});

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
