const http = require('http'),
  fs = require('fs');

const port = 1337;

function serveStaticFile(res, path, contentType, responseCode) {
   if (!responseCode) responseCode = 200;
   fs.readFile(__dirname + path, function(err, data) {
       if (err) {
           res.writeHead(500, { 'Content-Type': 'text/plain' });
           res.end('500 - Internal Server Error');
       } else {
           res.writeHead(responseCode, { 'Content-Type': contentType });
           res.end(data);
       }
   });
}


http.createServer(function(req,res) {
    var path = req.url.replace(/\/?(?:\?.*)?$/, '').toLowerCase();
 
 
 switch(path) {
            case '':
                serveStaticFile(res, '/public/index.html', 'text/html');
                break;
            case '/css/style.css':
                serveStaticFile(res, '/public/css/style.css', 'text/css');
                break;
            case '/css/blog.css':
                serveStaticFile(res, '/public/css/blog.css', 'text/css');
                break;
            case '/css/photo.css':
                serveStaticFile(res, '/public/css/photo.css', 'text/css');
                break;
            case '/index':
                serveStaticFile(res, '/public/index.html', 'text/html');
                break;
            case '/blog':
                serveStaticFile(res, '/public/blog.html', 'text/html');
                break;
            case '/photo':
                serveStaticFile(res, '/public/photo.html', 'text/html');
                break;
            case '/about':
                serveStaticFile(res, '/public/about.html', 'text/html');
                break;
            case '/images/hero_img.jpg':
                 serveStaticFile(res, '/public/images/hero_img.jpg', 'image/jpg');
                break;
            case '/images/logo.png':
                 serveStaticFile(res, '/public/images/logo.png', 'image/png');
                 break;
            case '/images/mocha.png':
                 serveStaticFile(res, '/public/images/mocha.jpg', 'image/jpg');
                 break;
            case '/images/molly.png':
                serveStaticFile(res, '/public/images/molly.jpg', 'image/jpg');
                break;
            case '/images/nori.png':
                serveStaticFile(res, '/public/images/nori.jpg', 'image/jpg');
                break;
            case '/scripts/about.js':
                serveStaticFile(res, '/public/scripts/about.js', 'text/javascript');
                break;
            case '/scripts/facts.js':
                serveStaticFile(res, '/public/scripts/facts.js', 'text/javascript');
                break;
            case '/scripts/greet.js':
                serveStaticFile(res, '/public/scripts/greet.js', 'text/javascript');
                break;
            case '/scripts/photo.js':
                serveStaticFile(res, '/public/scripts/photo.js', 'text/javascript');
                break;
            case '/photos':
                serveStaticFile(res, '/public/photos.json', 'application/json');
                break;
            default:
            serveStaticFile(res, '/public/404.html', 'text/html', 404);
            break;
        }
 
 }).listen(port);
 
 console.log('listening...go to http://localhost:' + port);
 