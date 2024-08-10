<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <script src="http://drsgitnew.com/socket.io/socket.io.js"></script> <!-- Update with your domain -->
    <script>
        const socket = io('http://localhost:3000'); // Use your Socket.io server URL

        socket.on('connect', function() {
            console.log('connected to socket server');
        });

        socket.on('private message', function(msg) {
            console.log('Private message:', msg);
        });

        socket.on('group message', function(msg) {
            console.log('Group message:', msg);
        });

        function sendPrivateMessage() {
            const to = document.getElementById('private-to').value;
            const message = document.getElementById('private-message').value;
            socket.emit('private message', { to, message });
        }

        function sendGroupMessage() {
            const group = document.getElementById('group-name').value;
            const message = document.getElementById('group-message').value;
            socket.emit('group message', { group, message });
        }
    </script>
</head>
<body>
    <h1>Chat</h1>

    <h2>Private Message</h2>
    <input id="private-to" type="text" placeholder="To">
    <input id="private-message" type="text" placeholder="Message">
    <button onclick="sendPrivateMessage()">Send</button>

    <h2>Group Message</h2>
    <input id="group-name" type="text" placeholder="Group">
    <input id="group-message" type="text" placeholder="Message">
    <button onclick="sendGroupMessage()">Send</button>

    <div id="messages"></div> <!-- Display messages here -->
</body>
</html>
