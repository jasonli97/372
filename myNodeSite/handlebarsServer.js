const express = require('express');
const handlebars = require('express-handlebars').create({ defaultLayout: 'main' });

const app = express();
const port = 1337;

app.engine('handlebars', handlebars.engine);
app.set('view engine', 'handlebars');

const publicPath = __dirname + '/public';
app.use(express.static(publicPath));
app.use(express.static(publicPath + '/css'));
app.use(express.static(publicPath + '/images'));
app.use(express.static(publicPath + '/scripts'));

app.get(['/','/index'], function(req, res) {
    res.render('index');
});

app.get('/blog', function(req, res) {
    res.render('blog');
});

app.get('/photo', function(req, res) {
    res.render('photo');
});

app.get('/about', function(req, res) {
    res.render('about');
});

app.get('/404', function(req, res) {
    res.render('404');
});

app.use(function(req, res, next) {
    res.status(404);
    res.render('404');
});

app.use(function(err, req, res, next) {
    console.error(err.stack);
    res.status(500);
    res.render('500');
});

app.listen(port, function() {
    console.log('Server is running on http://localhost:' + port);
});
