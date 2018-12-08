<?php
define('API_KEY','637271484:AAEv2GBi-vMLKDSw_mxJGbZIMi1K8xbvkSQ');
//----######------
function makereq($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//##############=--API_REQ
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}
//----######------
//---------
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
//=========
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$txtmsg = $update->message->text;
$reply = $update->message->reply_to_message->forward_from->id;
$stickerid = $update->message->reply_to_message->sticker->file_id;
$admin = 698038310;
$skayvaiker = file_get_contents("data/$chat_id/botmars.txt");
$time= file_get_contents("http://api.roonx.com/date-time/?roonx=time");
$date= file_get_contents("http://api.roonx.com/date-time/?roonx=date");
$step = file_get_contents("data/".$from_id."/step.txt");

//-------
function SendMessage($ChatId, $TextMsg)
{
 makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function SendSticker($ChatId, $sticker_ID)
{
 makereq('sendSticker',[
'chat_id'=>$ChatId,
'sticker'=>$sticker_ID
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
makereq('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function save($filename,$TXTdata)
	{
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
//===========
if(isset($update->callback_query)){
    $callbackMessage = '';
    var_dump(makereq('answerCallbackQuery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>$callbackMessage
    ]));
    $chat_id = $update->callback_query->message->chat->id;
    
    $message_id = $update->callback_query->message->message_id;
    $data = $update->callback_query->data;
    if (strpos($data, "del") !== false ) {
    $botun = str_replace("del ","",$data);
    unlink("bots/".$botun."/index.php");
    save("data/$chat_id/bots.txt","");
    save("data/$chat_id/tedad.txt","0");
    var_dump(makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"ربات شما با موفقیت حذف شد !",
        
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/solar_adv"]
                    ]
                ]
            ])
        ])
    );
 }

 else {
    var_dump(
        makereq('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'text'=>"خطا",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/Solar_adv"]
                    ]
                ]
            ])
        ])
    );
 }
}

elseif ($textmessage == '🔙 برگشت') {
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🔃 به منوی اصلی خوش آمدید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                ['text'=>"🤖ساخت ربات🤖"],['text'=>"❌حذف ربات❌"]
                ],
                [
                ['text'=>"🔄اپدیت ربات🔄"]
                ]
            	],
            	'resize_keyboard'=>false
       		])
    		]));
}
elseif ($textmessage == '❌حذف ربات❌') {
    save("data/$from_id/step.txt","nonehgddd");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ربات خود را جهت پاک کردن انتخاب کنید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                ['text'=>"-$skayvaiker"]
                ],
                [
                    ['text'=>"🔙 برگشت"]
                ]
            	],
            	'resize_keyboard'=>false
       		])
    		]));
}
elseif ($textmessage == "-$skayvaiker") {
save("bots/$skayvaiker/index.php","پاک شد");
save("data/$from_id/botmars.txt","رباتی وجودندارد");
save("data/$from_id/step.txt","nonehgkfjddjddd");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ربات با موفقیت پاک شد",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                ['text'=>"🔙 برگشت"]
                ]
            	],
            	'resize_keyboard'=>false
       		])
    		]));
}
elseif ($step == 'create bot') {
$token = $textmessage ;

			$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
			//==================
			function objectToArrays( $object ) {
				if( !is_object( $object ) && !is_array( $object ) )
				{
				return $object;
				}
				if( is_object( $object ) )
				{
				$object = get_object_vars( $object );
				}
			return array_map( "objectToArrays", $object );
			}

	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
		if($ok != 1) {
			//Token Not True
			SendMessage($chat_id,"توکن نا معتبر!");
		}
		else
		{
		SendMessage($chat_id,"در حال ساخت ربات ...");
		if (file_exists("bots/$un/index.php")) {
		$source = file_get_contents("bot/index.php");
		$source = str_replace("[*BOTTOKEN*]",$token,$source);
		$source = str_replace("123",$from_id,$source);
		save("bots/$un/index.php",$source);		file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://aaahesam.000webhostapp.com/haji/bots/$un/index.php");

var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🚀 ربات شما با موفقیت آپدیت شده است 

[برای ورود به ربات خود کلیک کنید 😃](https://telegram.me/$un)",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                ['text'=>"🔙 برگشت"]
                ]
            	],
            	'resize_keyboard'=>false
       		])
    		]));
		}
		else {
		$source = file_get_contents("bot/index.php");
		$source = str_replace("[*BOTTOKEN*]",$token,$source);
		$source = str_replace("123",$from_id,$source);
		mkdir("bots/$un");
		save("bots/$un/index.php","$from_id\n");
		save("bots/$un/index.php",$source);
		mkdir("bots/$un/data");
		
		save("bots/$un/data/sos.txt","سلام خوش امدید");
		save("bots/$un/data/rezaq.txt","راهنمایی کامل ادمین");
		save("bots/$un/data/rezaq.php","ادمین عزیز خوش امدید در این ربات باید خودتان دکمه های پیشرفته را بسازید برای ساخت دکمه به پنل مراجعه کنید برای رفتن به پنل دستور /panel را ارسال نمایید بعد وارد شدن پنل اگر مایل به پاک شدن این پیغام هستید به پنل رفته و رباترا ریست کنید سپس متن استارت را تعیین کنید و مجددا به پنل رفته ودکمه هارو تعیین نمایید");
			mkdir("bots/$un/users");
		mkdir("bots/$un/data/$from_id");
   save("data/$from_id/botmars.txt","$un");
		save("bots/$un/data/$from_id/reza.txt","jjjjj");
			file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://aaahesam.000webhostapp.com/haji/bots/$un/index.php");
		

var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"😀ربات شما با موفقیت ساخته شد😀
[👈برای ورود به ربات خود کلیک کنید👉](https://telegram.me/$un)
",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                ['text'=>"🤖ساخت ربات🤖"],['text'=>"❌حذف ربات❌"]
           ],
           [
       ['text'=>"🔄اپدیت ربات🔄"]
                ]
            	],
            	'resize_keyboard'=>false
       		])
    		]));
		}
}
}
	elseif ($textmessage == '/user' && $from_id == $admin) {
	$usercount = -1;
	$fp = fopen( "data/users.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$usercount ++;
	}
	fclose( $fp);
	SendMessage($chat_id,"`اعضای ربات`: `".$usercount."`");
	}
elseif($textmessage == '/start')
{

if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}

var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"سلام دوست عزیز خوش اومدی",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                ['text'=>"🤖ساخت ربات🤖"],['text'=>"❌حذف ربات❌"]
                ],
                [
         ['text'=>"🔄اپدیت ربات🔄"]
                ]
            	],
            	'resize_keyboard'=>false
       		])
    		]));
}
elseif ($textmessage == "🔄اپدیت ربات🔄") {

save("data/$from_id/step.txt","create bot");
var_dump(makereq('sendMessage',[
           'chat_id'=>$update->message->chat->id,
           'text'=>"توکن ربات خود را برای اپدیت ارسا نمایید✅",
           ]));
}
elseif ($textmessage == '🤖ساخت ربات🤖') {

$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 999999) {
SendMessage($chat_id,"تعداد ربات های ساخته شده شما زیاد است !
اول باید یک ربات را پاک کنید ! $tedad");
return;
}
save("data/$from_id/step.txt","create bot");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"توکن را ارسال نمایید",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                [
                   ['text'=>"🔙 برگشت"]
                ]
                
            	],
            	'resize_keyboard'=>false
       		])
    		]));
}

else
{
SendMessage($chat_id,"`Command Not Found!`
دستور مورد نظر یافت نشد");
}
?>             [
                ['text'=>"🤖ساخت ربات🤖"],['text'=>"❌حذف ربات❌"]
                ],
                [
                ['text'=>"🔄اپدیت ربات🔄"]
                ]
            	],
            	'resize_keyboard'=>false
       		])
    		]));
}
elseif ($textmessage == "🔄اپدیت ربات🔄") {

save("data/$from_id/step.txt","create bot");
var_dump(makereq('sendMessage',[
           'chat_id'=>$update->message->chat->id,
           'text'=>"توکن ربات خود را برای اپدیت ارسا نمایید✅",
           ]));
}
elseif ($textmessage == '🤖ساخت ربات🤖') {

$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 999999) {
SendMessage($chat_id,"تعداد ربات های ساخته شده شما زیاد است !
اول باید یک ربات را پاک کنید ! $tedad");
return;
}
save("data/$from_id/step.txt","create bot");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"توکن را ارسال نمایید",
		'�ات🤖"],['text'=>"❌حذف ربات❌"]
                ],
                [
                ['text'=>"🔄اپدیت ربات🔄"]
                ]
            	],
            	'resize_keyboard'=>false
       		])
    		]));
}
elseif ($textmessage == "🔄اپدیت ربات🔄") {

save("data/$from_id/step.txt","create bot");
var_dump(makereq('sendMessage',[
           'chat_id'=>$update->message->chat->id,
           'text'=>"توکن ربات خود را برای اپدیت ارسال نمایید✅",
           ]));
}
elseif ($textmessage == '🤖ساخت ربات🤖') {

$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 999999) {
SendMessage($chat_id,"تعداد ربات های ساخته شده شما زیاد است !
اول باید یک ربات را پاک �
