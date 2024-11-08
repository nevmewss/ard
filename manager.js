const socket = io();
socket.emit("joinManager");

// Получаем новые сообщения от пользователей
socket.on("newMessage", (data) => {
  const chatWindow = document.createElement("div");
  chatWindow.classList.add("chat-window");
  chatWindow.id = data.id;

  chatWindow.innerHTML = `
    <div class="chat-header">Пользователь ${data.id}</div>
    <div class="chat-messages" id="messages-${data.id}"></div>
    <input type="text" placeholder="Введите ответ..." class="chat-input" id="input-${data.id}">
    <button onclick="sendMessage('${data.id}')" class="chat-send-button">Отправить</button>
    <button onclick="closeChat('${data.id}')" class="chat-close-button">Закрыть</button>
  `;

  document.getElementById("chatsContainer").appendChild(chatWindow);

  // Добавляем сообщение от пользователя
  document.getElementById(`messages-${data.id}`).innerHTML += `
    <div class="user-message"><strong>Пользователь:</strong> ${data.message}</div>
  `;
});

function sendMessage(userId) {
  const message = document.getElementById(`input-${userId}`).value;
  if (message) {
    socket.emit("managerMessage", { id: userId, message });
    document.getElementById(`messages-${userId}`).innerHTML += `
      <div class="manager-message"><strong>Менеджер:</strong> ${message}</div>
    `;
    document.getElementById(`input-${userId}`).value = "";
  }
}

function closeChat(userId) {
  socket.emit("closeChat", userId);
  document.getElementById(userId).remove();
}
