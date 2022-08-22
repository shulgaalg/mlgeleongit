<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Создание формы обратной связи</title>
<!--<meta http-equiv="Refresh" content="2; URL=/thanks.html"> -->
<meta http-equiv="Refresh" content="8; URL=/tt"> 
</head>
<body>

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



    $queryUrl = 'https://geleon.bitrix24.ua/rest/1/er5ntilun5bbo0st/crm.lead.add.json';
    // Формируем параметры для создания лида в переменной $queryData
  
  $queryData = http_build_query(array(
 
    'fields' => array(
      // Устанавливаем название для заголовка лида 1578

      'TITLE' => $_POST['title'] . ' Сайт: https://t.geleon.ua',
      'NAME' => $_POST['name'], 
      'ASSIGNED_BY_ID' => 1,
      'UTM_CAMPAIGN' => !empty($_POST['utm_campaign']) ? $_POST['utm_campaign'] : NULL,
      'UTM_MEDIUM' => !empty($_POST['utm_medium'] )? $_POST['utm_medium'] : NULL,
      'UTM_SOURCE' => !empty($_POST['utm_source']) ? $_POST['utm_source'] : NULL,
      'UTM_CONTENT' => !empty($_POST['utm_content'] )? $_POST['utm_content'] : NULL,
      'UTM_TERM' => !empty($_POST['utm_term']) ? $_POST['utm_term']: NULL,
      'PHONE' => array(array("VALUE" =>  substr($_POST['telephone'], 3), "VALUE_TYPE" => "WORK" )),
      'EMAIL' => array(array("VALUE" => !empty($_POST['email']) ? $_POST['email'] : NULL, "VALUE_TYPE" => "WORK" )),
      'COMMENTS' => !empty($_POST['message']) ? $_POST['message'] : NULL,
  
    ),
    "PHONE" => array(
      array(
        "VALUE" =>  substr($_POST['telephone'],3),
        "VALUE_TYPE" => "WORK"
      )
    ),
    'params' => array("REGISTER_SONET_EVENT" => "Y")
    ));


 //qwwwqwqew
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

  echo "<center><img src='../../img/thanks.png'></center>";
?>

</body>
</html>