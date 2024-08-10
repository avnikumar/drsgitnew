import express from 'express';
import http from 'http';
import { Server as socketIo } from 'socket.io';

const app = express();
const server = http.createServer(app);
const io = new socketIo(server, {
    cors: {
        origin: "http://drsgitnew.com", // Use your domain here
        methods: ["GET", "POST"],
        credentials: true
    }
});

io.on('connection', (socket) => {
    console.log('a user connected');

    socket.on('private message', (msg) => {
        io.to(msg.to).emit('private message', msg);
    });

    socket.on('group message', (msg) => {
        io.to(msg.group).emit('group message', msg);
    });

    socket.on('disconnect', () => {
        console.log('user disconnected');
    });
});

server.listen(3000, () => {
    console.log('listening on *:3000');
});
