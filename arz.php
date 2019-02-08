<?php
define('BOT_TOKEN','656199537:AAFmlhsPid5TSXXlGXu5-Pd-_LkPc-E3mhA');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');


function bot($method, $parameters) {

  if (!$parameters) {
    $parameters = array();
  }
  
  $parameters["method"] = $method;

  $handle = curl_init(API_URL);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
  curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
  $result = curl_exec($handle);
  return $result; 
}
 
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chat_id = $update["message"]['chat']['id'];
$text = $update["message"]['text'];
$message_id = $update->message_id;
$cha = $update->message->reply_to_message->forward_from->id;
//$text= urlencode($text);
//---------------------
$arz = file_get_contents("http://54996.ir/Arz/index.php");
$arz = json_decode($arz);
$dolar = $arz["name"]["price"];

if($text == "/start"){
     
  $matn = "سلام
  /info
  ";
  bot("sendMessage", array('chat_id' =>$chat_id,'text'=>$matn));

 }

 else if($text == "/info" || $text == "arz"){
     
  bot("sendMessage", array('chat_id' =>$chat_id,'text'=>$dolar));
 }

 else {
     
  $matn = "دستور صحیح نمیباشد";
  bot("sendMessage", array('chat_id' =>$chat_id,'text'=>$matn));

 }


?>
