<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

    $project_name = trim($_POST["project_name"]);
    $admin_email  = trim($_POST["admin_email"]);
    $form_subject = trim($_POST["form_subject"]);

    foreach ( $_POST as $key => $value ) {
        if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
            $message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #fff;">' ) . "
				<td style='width: 30%; padding: 10px; border: #ccc 1px solid;'><b>$key</b></td>
				<td style='width: 60%; padding: 10px; border: #ccc 1px solid;'>$value</td>
			</tr>
			";
            $message2 .= "<b>".$key."</b> ".$value."%0A";
        }
    }
} else if ( $method === 'GET' ) {

    $project_name = trim($_GET["project_name"]);
    $admin_email  = trim($_GET["admin_email"]);
    $form_subject = trim($_GET["form_subject"]);

    foreach ( $_GET as $key => $value ) {
        if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
            $message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #fff;">' ) . "
				<td style='width: 30%; padding: 10px; border: #ccc 1px solid;'><b>$key</b></td>
				<td style='width: 60%; padding: 10px; border: #ccc 1px solid;'>$value</td>
			</tr>
			";
            $message2 .= "<b>".$key."</b> ".$value."%0A";
        }
    }
}

$message = "<table style='width: 100%;'>$message</table>\nИсточник (utm_source): " .$_POST['utm_source']."\nТип рекламы (utm_medium): ".$_POST['utm_medium']."\nКампания (utm_campaign): ".$_POST['utm_campaign']."\nЗапрос (utm_term): ".$_POST['utm-term'];

function adopt($text) {
    return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
    "Content-Type: text/html; charset=utf-8" . PHP_EOL .
    'From: Theme <info@'.$_SERVER["SERVER_NAME"].'>'. PHP_EOL .
    'Reply-To: info@'.$_SERVER["SERVER_NAME"] . PHP_EOL;


//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5380894864:AAFO8f2kqbB0kxL6swZJ9frxx2nyTWORxs4";

//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-526170415";

//Далее создаем переменную, в которую помещаем PHP массив
$arr = 'Test';


//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message2}&parse_mode=html","r");

//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
    header('Content-Type: text/html; charset=utf-8');
    header( 'Refresh: 3; url=' . $_SERVER['HTTP_REFERER'] );
    echo '<div style="position:absolute; width:100%; top:30%; text-align:center; color:green; font-size:30px; font-weight: 700;">СПАСИБО, СООБЩЕНИЕ ОТПРАВЛЕНО :)</div>';
} else {
    header('Content-Type: text/html; charset=utf-8');
    header( 'Refresh: 3; url=' . $_SERVER['HTTP_REFERER'] );
    echo '<div style="position:absolute; width:100%; top:30%; text-align:center; color:red; font-size:30px; font-weight: 700;">ОШИБКА ОТПРАВКИ ПИСЬМА :(</div>';
}