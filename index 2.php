<?php
/*
@Monster_Source
*/
ob_start();

include();

define('API_KEY','[*[*TOKEN*]*]');
function bot($method,$datas=[]){
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

function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
 bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>$text,
 'parse_mode'=>$parsmde,
 'disable_web_page_preview'=>$disable_web_page_preview,
 'reply_markup'=>$keyboard
 ]);
 } 
 function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
function senddocument($chat_id,$document,$caption){
    bot('senddocument',[
        'chat_id'=>$chat_id,
        'document'=>$document,
        'caption'=>$caption
    ]);
}
 function sendvideo($chat_id, $video, $caption){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'photo'=>$video,
 'caption'=>$caption,
 ]);
 }
 function sendaudio($chat_id, $audio, $caption){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 ]);
 }

$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$text = $message->text;
mkdir("data/$chat_id");
@$Mahdiphp = file_get_contents("data/$chat_id/Mahdi.txt");
$admin = "[*[*ADMIN*]*]";//یوزر آیدی ادمین
$time = jdate("h:i:s");
$date = jdate("Y M d");
$channel = file_get_contents("data/$chat_id/channel.txt");
$name = $message->from->first_name;
$lastname = $message->from->last_name;
$username = $message->from->username;
$from_id = $message->from->id;
$list = file_get_contents("users.txt");
$start = file_get_contents("data/start.txt");
$start = str_replace("FIRSTNAME", "$name", $start);
$start = str_replace("LASTNAME", "$lastname", $start);
$start = str_replace("USERNAME", "$username", $start);
$start = str_replace("TIME", "$time", $start);
$start = str_replace("USERID", "$from_id", $start);
$start = str_replace("DATE", "$date", $start);
$photo = $message->photo;
$photo1_id = $photo[count($photo)-1]->file_id;
$photo2_id = $photo[count($photo)-2]->file_id;
$photo0_id = $photo[count($photo)-0]->file_id;
$sticker = $message->sticker;
$sticker_id = $sticker->file_id;
$voice = $message->voice;
$voice_id = $voice->file_id;
$audio = $message->audio;
$audio_id = $audio->file_id;
$video = $message->video;
$video_id = $video->file_id;
$document = $message->document;
$file_id = $document->file_id;
//=================//
if($text == '/start'){
$user = file_get_contents('users.txt');
$members = explode("\n",$user);
if (!in_array($chat_id,$members)){
$add_user = file_get_contents('users.txt');
$add_user .= $chat_id."\n";
file_put_contents('users.txt',$add_user);
}
bot('sendMessage', [
'chat_id' => $chat_id,
'text'=>"$start",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"تنظیم چنل"]
],
[
['text'=>"ارسال کردن"]
],
]
])
]);
}
if($text == "تنظیم چنل"){
file_put_contents("data/$from_id/mahdi.txt","setch");
sendMessage($chat_id,"یوزرنیم چنل رو همراه با @ بفرست",'html');
}
elseif($Mahdiphp == "setch"){
file_put_contents("data/$from_id/channel.txt","$text");
file_put_contents("data/$from_id/Mahdi.txt","none");
sendMessage($chat_id,"ست شد");
}
if($text == 'ارسال کردن'){
file_put_contents("data/$from_id/mahdi.txt","Sendc");
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "پیام خود را ارسال کنید",
'parse_mode'=>'html',
]);
}
elseif($Mahdiphp == "Sendc"){
file_put_contents("data/$chat_id/Mahdi.txt","none");
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"در صف ارسال",
'parse_mode' => 'html'
]);
   SendMessage($channel,$text,"html");
   }
//<Botsorce>//
if($text == '/panel' && $from_id == $admin){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"وارد پنل مدیریت شدید",
 'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"آمار ربات"],['text'=>"ارسال به همه"]
],
[
['text' => "تنظیم متن استارت"]
]
],
"resize_keyboard"=>true,
])
]);
}
if($text == "تنظیم متن استارت"){
file_put_contents("data/$from_id/Mahdi.txt","setstart");
sendMessage($chat_id,"متن استارت را ارسال نمایید میتوانید از دستور های زیر هم استفاده کنید وقتی از دستورات استفاده میکنید در میان متن جایگزین مقدار تعیین شده میشوند

FIRSTNAME 👈برای نمایش نام
LASTNAME 👈برای نمایش اسم خانوادگی
@USERNAME 👈برای نمایش یوزرنیم کاربر
USERID 👈برای نمایش لیست کاربران
TIME 👈برای نمایش ساعت
DATE 👈برای نمایش تاریخ
");
}
elseif($Mahdiphp == "setstart"){
file_put_contents("data/start.txt","$text");
file_put_contents("data/$from_id/Mahdi.txt","none");
sendMessage($chat_id,"ست شد","html");
}
if($text == 'آمار ربات' && $from_id == $admin){
$users = file_get_contents("users.txt");
$member_id = explode("\n",$users);
$member_count = count($member_id) -1;
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"تعداد اعضای ربات : $member_count",
 'parse_mode'=>"markdown",
 ]);
}
if($text == 'ارسال به همه' && $from_id == $admin){
file_put_contents("data/$from_id/Mahdi.txt","Send");
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "پیام مورد نظرتونو بفرستید تا برای همه ی کاربرا ارسالش کنم",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"/panel"]
],
]
])
]);
}
elseif($Mahdiphp == "Send" && $from_id == $admin){
file_put_contents("data/$chat_id/Mahdi.txt","none");
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" پیام همگانی فرستاده شد.",
'parse_mode' => 'html'
]);
$all_member = fopen( "users.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
   if($sticker_id != null){
   SendSticker($user,$sticker_id);
   }
   if($video_id != null){
   SendVideo($user,$video_id,$caption);
   }
   if($voice_id != null){
   SendVoice($user,$voice_id,'',$caption);
   }
   if($file_id != null){
   SendDocument($user,$file_id,'',$caption);
   }
   if($music_id != null){
   SendAudio($user,$music_id,'',$caption);
   }
   if($photo2_id != null){
   SendPhoto($user,$photo2_id,'',$caption);
   }
   if($photo1_id != null){
   SendPhoto($user,$photo1_id,'',$caption);
   }
   if($photo0_id != null){
   SendPhoto($user,$photo0_id,'',$caption);
   }
   if($text != null){
   SendMessage($user,$text,"html","true");
   }
  }
 }
?>
