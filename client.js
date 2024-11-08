const socket = io();
const chatPopup = document.getElementById("chatPopup");
const chatMessages = document.getElementById("chatMessages");

function openChat() {
  chatPopup.style.display = "block";
}

function sendMessage() {
  const message = document.getElementById("userMessage").value;
  if (message) {
    socket.emit("userMessage", message);
    chatMessages.innerHTML += `<div class="user-message"><strong>Вы:</strong> ${message}</div>`;
    document.getElementById("userMessage").value = "";
  }
}

// Слушаем ответы от менеджера
socket.on("managerResponse", (data) => {
  chatMessages.innerHTML += `<div class="manager-message"><strong>Менеджер:</strong> ${data.message}</div>`;
});

// Закрытие чата
socket.on("chatClosed", () => {
  chatMessages.innerHTML += `<div class="info-message">Чат закрыт менеджером</div>`;
  document.getElementById("userMessage").disabled = true;
});
