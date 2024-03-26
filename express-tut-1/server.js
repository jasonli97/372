const express = require('express');

const app = express();

const port = 1337;

app.get('/', function(request, response){
    response.send('Hello World');
});

app.listen(port, function(){
    console.log('Server is running on port ' + port);
});