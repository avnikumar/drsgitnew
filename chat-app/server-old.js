const express = require('express');
const fs = require('fs');
const https = require('https');
const socketIo = require('socket.io');

const app = express();

// Read SSL certificate files
const privateKey = fs.readFileSync('C:/wamp64/bin/apache/apache2.4.59/conf/key/private.key', 'utf8');
const certificate = fs.readFileSync('C:/wamp64/bin/apache/apache2.4.59/conf/key/certificate.crt', 'utf8');

const credentials = { key: privateKey, cert: certificate };

const httpsServer = https.createServer(credentials, app);
const io = socketIo(httpsServer, {
  cors: {
    origin: "https://drsgitnew.com",  // Ensure your domain is correct
    methods: ["GET", "POST"],
    credentials: true
  }
});

io.on('connection', (socket) => {
  console.log('a user connected');

  socket.on('disconnect', () => {
    console.log('user disconnected');
  });

  socket.on('private message', (msg) => {
    io.to(msg.to).emit('private message', msg);
  });

  socket.on('group message', (msg) => {
    io.to(msg.group).emit('group message', msg);
  });
});

httpsServer.listen(3000, () => {
  console.log('listening on *:3000');
});
