const http = require('http');
const express = require('express');
var app = express();

var server = http.createServer(app);
const io = require('socket.io')(server);
var Gpio = require('onoff').Gpio;
var LED1 = new Gpio(4, 'out');
var LED2 = new Gpio(17, 'out');

server.listen(8080);

//load in HTML file
app.get('/', function (req, res) {
  res.sendFile(__dirname + '/index.html');
}).use(express.static(__dirname));

//on event
io.sockets.on('connection', function (socket) {

  //on LED1 event
  socket.on('LED1', function (data) {
    LED1.writeSync(data);
  });

  //on LED2 event
  socket.on('LED2', function (data) {
    LED2.writeSync(data);
  });

});

//ctrl c
process.on('SIGINT', function () {
  LED1.writeSync(0);
  LED2.writeSync(0);
  LED1.unexport();
  LED2.unexport();
  process.exit();
});