<?php
/*
برای دیدن سورس های بیشتر به کانال ما سر بزنید :)



@Monster_Source
*/
$MainBotToken = '799791740:AAHOOWJW8zNnX5rvg3prdI82QpKyZphzLw0'; // توکن ربات
$Notices_Channel_Id = '-1001192028814'; // ایدی عددی کانال شما
$Bot_Channel_Username = '@tab_khodro'; // یوزرنیم چنل
$Admin_User_Id = '698038310'; // ایدی عددی ادمین
define('API_KEY',$MainBotToken);
ini_set("log_errors","off");
function GoldDev($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$msg = $message->text;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
if($msg == '/start' and $from_id == $Admin_User_Id){
GoldDev('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به کانال تنظیم شده ارسال شد.",
'parse_mode'=>"HTML",
]);
$Get = json_decode(file_get_contents("https://khabar-arz.ml/Arz/api.php"),true);
for ($i=0; $i <= 29; $i++ ){
$name = $Get["$i"]['name'];
$BTNS[] = [['text'=>"💰 $name 💰",'callback_data'=>"$i"]];
}
$BTNS[] = [['text'=>"کانال ما",'url'=>"https://t.me/$Bot_Channel_Username"]];
GoldDev('sendMessage',[
'chat_id'=>$Notices_Channel_Id,
'text'=>"🌐قیمت انواع ارز بصورت آنلاین🌐
برای مشاهده قیمت ارز با استفاده از دکمه های زیر روی ارز مورد نظر خود کلیک کنید⚠️",
'parse_mode'=>"HTML",
  'reply_markup'=>json_encode([
'inline_keyboard'=>$BTNS
])
]);
}
if($data){
$Get = json_decode(file_get_contents("https://khabar-arz.ml/Arz/api.php"),true);
$name = $Get["$data"]['name'];
$price = $Get["$data"]['price'];
GoldDev('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text' => "قیمت ارز 💰 $name 💰 برابر با $price ریال میباشد.",
'show_alert' => true
]);
}
if($_GET['cron'] !== null){
$Get = json_decode(file_get_contents("https://khabar-arz.ml/Arz/api.php"),true);
$msg = "";
for($z = 0;$z <= 29;$z++){
$name = $Get["$z"]['name'];
$price = $Get["$z"]['price'];
$msg .= "<pre>$name  : </pre><b>$price</b> ریال\n";
}
$gettime = json_decode(file_get_contents("http://api.bot-dev.org/time/"),true);
$time1 = $gettime["ENtime"];
$date_fa = $gettime["FAdate"];
$time = "$time1 | $date_fa";
GoldDev('sendMessage',[
'chat_id'=>$Notices_Channel_Id,
'text'=>"🔉لیست بروز قیمت ارز ها در حال حاضر (این لیست هر روز بروز میشود)

$msg

〰〰〰〰〰〰〰〰〰〰〰
📣کانال ما :
@$Bot_Channel_Username
$time",
'parse_mode'=>"HTML",
]);
echo 'True';
}





