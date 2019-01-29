// Setup basic express server
var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io')(server);


var redis = require('socket.io-redis');
var port = process.env.PORT || 443;
var serverName = process.env.NAME || 'Unknown';


server.listen(port, function () {
  console.log('Server listening at port123 %d', port);
  console.log('Hello, I\'m %s, how can can  can I help?', serverName);
});

// Routing
app.use(express.static(__dirname + '/public'));
// Add headers
app.use(function (req, res, next) {

    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', '*');

    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');

    // Request headers you wish to allow
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');

    // Set to true if you need the website to include cookies in the requests sent
    // to the API (e.g. in case you use sessions)
    res.setHeader('Access-Control-Allow-Credentials', true);

    // Pass to next layer of middleware
    next();
});

// Chatroom

var numUsers = 0;
var room ="";
var people={};

// var server = require('http').createServer(app);
// var io = require('socket.io')(server, {
//   origins: '*:*',
// });
// io.adapter(redis({ host: 'redis', port: 6379 }));

io.on('connection', function (socket) {

 
  socket.on('setroom', function(roomin) {
   // socket.leave(room);
   // room = roomin;
   // socket.join(room);
  
});
console.log("room tren server : ",room);
//to(room)
  //room =  socket.handshake.query['roomcomment'];
  socket.to(room).emit('debug-room-test', room);
  //my-name-is
  //socket.emit(socket.handshake.query['room'], serverName);
  socket.to(room).emit('my-name-is', room);

  var addedUser = false;

  // when the client emits 'new message', this listens and executes
  socket.on('new message', function (data) {
    // we tell the client to execute 'new message'
    console.log('i am here!', data, people);
    if (data.to == 0) {
      socket.broadcast.emit('new message', {
        username: socket.username,
        message: data.msg,
        typeNoti: data.typeNoti,
        objData: data.objData
      });
    } else {
      socket.broadcast.to(people[data.to]).emit('new message', {
        username: socket.username,
        message: data.msg,
        typeNoti: data.typeNoti,
        objData: data.objData
      });
    }
    
  });

  // when the client emits 'add user', this listens and executes
  socket.on('add user', function (username) {
    if (addedUser) return;
    people[username] =  socket.id;
    // we store the username in the socket session for this client
    socket.username = username;
    ++numUsers;
    addedUser = true;
    socket.emit('login', {
      numUsers: numUsers
    });
    // echo globally (all clients) that a person has connected
    socket.broadcast.to(room).emit('user joined', {
      username: socket.username,
      numUsers: numUsers
    });
  });

  // when the client emits 'typing', we broadcast it to others
  socket.on('typing', function () {
    socket.broadcast.to(room).emit('typing', {
      username: socket.username
    });
  });

  // when the client emits 'stop typing', we broadcast it to others
  socket.on('stop typing', function () {
    socket.broadcast.to(room).emit('stop typing', {
      username: socket.username
    });
  });

  // when the user disconnects.. perform this
  socket.on('disconnect', function () {
    if (addedUser) {
      --numUsers;

      // echo globally that this client has left
      socket.broadcast.to(room).emit('user left', {
        username: socket.username,
        numUsers: numUsers
      });
    }
  });


  
});
