const express = require("express");
const http = require("http");
const { Server } = require("socket.io");
const path = require("path");
const app = express();
const server = http.createServer(app);
const io = new Server(server);

app.use(express.static(path.join(__dirname)));

// Обработка подключения пользователей
io.on("connection", (socket) => {
  console.log(`User connected: ${socket.id}`);

  // Пользователь отправляет сообщение
  socket.on("userMessage", (data) => {
    // Отправляем сообщение на менеджерскую панель
    io.to("manager").emit("newMessage", { id: socket.id, message: data, sender: "user" });
  });

  // Менеджер присоединяется к комнате manager
  socket.on("joinManager", () => {
    socket.join("manager");
    console.log("Manager joined");
  });

  // Менеджер отправляет ответ пользователю
  socket.on("managerMessage", (data) => {
    // Отправляем сообщение пользователю
    io.to(data.id).emit("managerResponse", { message: data.message, sender: "manager" });
  });

  // Менеджер закрывает чат
  socket.on("closeChat", (userId) => {
    io.to(userId).emit("chatClosed");
    socket.leave(userId);
  });

  // Пользователь отключается
  socket.on("disconnect", () => {
    console.log(`User disconnected: ${socket.id}`);
  });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
