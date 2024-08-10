<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>
  <!-- Load Socket.io client library -->
  <script src="https://drsgitnew.com:3000/socket.io/socket.io.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      var socket = io('https://drsgitnew.com:3000');
      
      socket.on('connect', function() {
        console.log('connected to server Avnish');
      });

      socket.on('private message', function(msg) {
        console.log('private message:', msg);
        displayMessage('Private', msg.message);
      });

      socket.on('group message', function(msg) {
        console.log('group message:', msg);
        displayMessage('Group', msg.message);
      });

      function sendPrivateMessage() {
        alert('hi');
        const to = document.getElementById('private-to').value;
        const message = document.getElementById('private-message').value;
        alert(to);
        alert(message);
        socket.emit('private message', { to: to, message: message });
      }

      function sendGroupMessage() {
        const group = document.getElementById('group-name').value;
        const message = document.getElementById('group-message').value;
        socket.emit('group message', { group: group, message: message });
      }

      function displayMessage(type, message) {
        const messageBox = document.getElementById('messages');
        const newMessage = document.createElement('div');
        newMessage.textContent = `${type} Message: ${message}`;
        messageBox.appendChild(newMessage);
      }

      document.getElementById('send-private-message-btn').addEventListener('click', sendPrivateMessage);
      document.getElementById('send-group-message-btn').addEventListener('click', sendGroupMessage);
    });
  </script>
</head>
<body>
  <h1>Chat</h1>
  
  <h2>Private Message</h2>
  <input id="private-to" type="text" placeholder="To">
  <input id="private-message" type="text" placeholder="Message">
  <button id="send-private-message-btn">Send</button>
  
  <h2>Group Message</h2>
  <input id="group-name" type="text" placeholder="Group">
  <input id="group-message" type="text" placeholder="Message">
  <button id="send-group-message-btn">Send</button>

  <div id="messages">Message Should display here</div> <!-- Display messages here -->
</body>
</html>
