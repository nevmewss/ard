// Функция для показа попапа
function showPopupMessage() {
	document.getElementById("popupMessage").classList.add("show");
  }

  // Функция для скрытия попапа
  function closePopupMessage() {
	document.getElementById("popupMessage").classList.remove("show");
  }

  // Функция для показа попапа дважды с заданной задержкой
  function displayPopupTwice() {
	// Первый показ через 3 секунды
	setTimeout(() => {
	  showPopupMessage();

	  // Второй показ через 10 секунд после первого закрытия
	  setTimeout(() => {
		showPopupMessage();
	  }, 10000); // Вторая задержка в миллисекундах (10 секунд)
	}, 3000); // Первая задержка в миллисекундах (3 секунды)
  }

  // Запуск функции после загрузки страницы
  window.addEventListener("load", displayPopupTwice);