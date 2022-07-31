<?php 
function writeToLog($data, $title = '')
{
    $log = "\n------------------------\n";
    $log .= date("Y.m.d G:i:s") . "\n";
    $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
    $log .= print_r($data, 1);
    $log .= "\n------------------------\n";
    file_put_contents(getcwd() . '/hook.log', $log, FILE_APPEND);
    return true;
    echo "succes";
}
$defaults = array('TITLE' => '', 'NAME' => '', 'PHONE' => '', 'COMMENTS' => '', 'EMAIL' => '');
$defaults = $_REQUEST;
$utm = '';
    writeToLog($_REQUEST, 'webform PHP');


$leadData = $_POST['DATA'];
$queryUrl = 'https://geleon.bitrix24.ua/rest/1/er5ntilun5bbo0st/crm.lead.add.json';
// Формируем параметры для создания лида в переменной $queryData

$queryData = http_build_query(array(
	'fields' => array(
	  // Устанавливаем название для заголовка лида 1578
	  'TITLE' => $leadData['TITLE'] . ' Сайт: t.geleon.ua/latki',
	  'NAME' => $leadData['NAME'], 
	  'ASSIGNED_BY_ID' => 1,
	  'UTM_CAMPAIGN' => $_POST['utm_campaign'],
	  'UTM_MEDIUM' => $_POST['utm_medium'],
	  'UTM_SOURCE' => $_POST['utm_source'],
	  'UTM_CONTENT' => $_POST['utm_content'],
	  'UTM_TERM' => $_POST['utm_term'],
	  'PHONE' => array(array("VALUE" => $leadData['PHONE_MOBILE'], "VALUE_TYPE" => "WORK" )),
	  'EMAIL' => array(array("VALUE" => $leadData['EMAIL_WORK'], "VALUE_TYPE" => "WORK" )),

	),
	"PHONE" => array(
	  array(
		  "VALUE" => $leadData['PHONE_MOBILE'],
		  "VALUE_TYPE" => "WORK"
	  )
  ),
	'params' => array("REGISTER_SONET_EVENT" => "Y")
  ));


 
    // Обращаемся к Битрикс24 при помощи функции curl_exec
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST => 1,
      CURLOPT_HEADER => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $queryUrl,
      CURLOPT_POSTFIELDS => $queryData,
    ));
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, 1);   
    writeToLog($result, 'webform result');
	if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: ".$result['error_description']."<br/>";
	

$sendto   = "zakaz@geleon.ua"; // почта, на которую будет приходить письмо
$username = $leadData['NAME'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $leadData['PHONE_MOBILE']; // сохраняем в переменную данные полученные из поля c телефонным номером
$usermail = $leadData['EMAIL_WORK']; // сохраняем в переменную данные полученные из поля c адресом электронной почты
$usermessage = $leadData['COMMENTS']; // сохраняем в переменную данные полученные из поля c сообщением
$otvet1 = $_POST['shinomontazh']; // сохраняем в переменную данные полученные из поля c сообщением
$otvet2 = $_POST['brend']; // сохраняем в переменную данные полученные из поля c сообщением
$otvet3 = $_POST['tehnology']; // сохраняем в переменную данные полученные из поля c сообщением

// Формирование заголовка письма
$subject  = "Заявка с RM";
$headers  = "From: rns@geleon.ua \r\n";
$headers .= "Reply-To: \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Заявка с RM</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Почта:</strong> ".$usermail."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
$msg .= "<p><strong>Сообщение:</strong> ".$ovet1." ".$otvet2." ".$otvet3."</p>\r\n";
$msg .= "<p><strong>Сообщение:</strong> ".$usermessage."</p>\r\n";
$msg .= "</body></html>";

// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
	echo "Отправляем...";
} else {
	echo "Произошла ошибка.";
}

/*






<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Создание формы обратной связи</title>
<meta http-equiv="Refresh" content="1; URL=/"> 
</head>
<body>

<?php 

$sendto   = "zakaz@geleon.ua"; // почта, на которую будет приходить письмо
$username = $_POST['name'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['telephone']; // сохраняем в переменную данные полученные из поля c телефонным номером
$usermail = $_POST['email']; // сохраняем в переменную данные полученные из поля c адресом электронной почты

// Формирование заголовка письма
$subject  = "Заявка с RM латки";
$headers  = "From: " . strip_tags($usermail) . "\r\n";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Заявка с RM</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Почта:</strong> ".$usermail."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
$msg .= "</body></html>";

// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
	echo "<center><img src='images/spasibo.png'></center>";
} else {
	echo "<center><img src='images/ne-otpravleno.png'></center>";
}

?>

</body>
</html>

*/