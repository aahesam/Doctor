<?php
ini_set("log_errors" , "off");
set_time_limit(0);

ob_start();

include("jdf.php");

$API_KEY = '633458659:AAGUU2KKDpIRMNCrkOiXl0zhqDnROh7OhCk';
$GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".$API_KEY."/getMe"));
$botids = $GetINFObot->result->username;
##------------------------------##
define('API_KEY', $API_KEY);
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

function SendMessage($chatid, $text, $parsmde, $disable_web_page_preview, $keyboard){bot('sendMessage', ['chat_id' => $chatid,'text' => $text,'parse_mode' => $parsmde,'disable_web_page_preview' => $disable_web_page_preview,'reply_markup' => $keyboard]);}
function ForwardMessage($chatid, $from_chat, $message_id){bot('ForwardMessage', ['chat_id' => $chatid,'from_chat_id' => $from_chat,'message_id' => $message_id]);}
function deletemessage($chat_id, $message_id){bot('deletemessage', ['chat_id' => $chat_id,'message_id' => $message_id,]);}
function SendPhoto($chatid, $photo, $keyboard, $caption){bot('SendPhoto', ['chat_id' => $chatid,'photo' => $photo,'caption' => $caption,'reply_markup' => $keyboard]);}
function SendAudio($chatid, $audio, $keyboard, $caption, $sazande, $title){bot('SendAudio', ['chat_id' => $chatid,'audio' => $audio,'caption' => $caption,'performer' => $sazande,'title' => $title,'reply_markup' => $keyboard]);}
function SendDocument($chatid, $document, $keyboard, $caption){bot('SendDocument', ['chat_id' => $chatid,'document' => $document,'caption' => $caption,'reply_markup' => $keyboard]);}
function SendSticker($chatid, $sticker, $keyboard){bot('SendSticker', ['chat_id' => $chatid,'sticker' => $sticker,'reply_markup' => $keyboard]);}
function SendVideo($chatid, $video, $keyboard, $duration){bot('SendVideo', ['chat_id' => $chatid,'video' => $video,'duration' => $duration,'reply_markup' => $keyboard]);}
function SendVoice($chatid, $voice, $keyboard, $caption){bot('SendVoice', ['chat_id' => $chatid,'voice' => $voice,'caption' => $caption,'reply_markup' => $keyboard]);}
function SendContact($chatid, $first_name, $phone_number, $keyboard){bot('SendContact', ['chat_id' => $chatid,'first_name' => $first_name,'phone_number' => $phone_number,'reply_markup' => $keyboard]);}
function SendAction($chatid, $action){bot('sendChatAction', ['chat_id' => $chatid,'action' => $action]);}
function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard){bot('editMessagetext', ['chat_id' => $chat_id,'message_id' => $message_id,'text' => $text,'parse_mode' => $parse_mode,'disable_web_page_preview' => $disable_web_page_preview,'reply_markup' => $keyboard]);}
function objectToArrays($object)
{
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_vars($object);
    }
    return array_map("objectToArrays", $object);
}

function ttoopp($number){ 
 $saveusers = array(); 
  $usersscan = scandir("data"); 
  unset($usersscan[0]); 
  unset($usersscan[1]); 
  foreach($usersscan as $savetojs){ 
$savedis = file_get_contents("data/$savetojs/shoklat.txt"); 
$saveusers[$savetojs] = $savedis; 
  } 
  $rating = $saveusers; 
    arsort($rating,SORT_NUMERIC);  
    $rate = array();  
    foreach($rating as $key=>$value){  
      $rate[] = $key;  
    }  
    return $rate[$number];  
}
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
	$tch = $truechannel->result->status;
	return $tch;
	}
function top_sea($number){ 
 $saveusers = array(); 
  $usersscan = scandir("data"); 
  unset($usersscan[0]); 
  unset($usersscan[1]); 
  foreach($usersscan as $savetojs){ 
$savedis = file_get_contents("data/$savetojs/membrs.txt"); 
$saveusers[$savetojs] = $savedis; 
  } 
  $rating = $saveusers; 
    arsort($rating,SORT_NUMERIC);  
    $rate = array();  
    foreach($rating as $key=>$value){  
      $rate[] = $key;  
    }  
    return $rate[$number];  
} 
function getrank($fadmin){  
     
  $saveusers = array(); 
  $usersscan = scandir("data"); 
  unset($usersscan[0]); 
  unset($usersscan[1]); 
  foreach($usersscan as $savetojs){ 
$savedis = file_get_contents("data/$savetojs/shoklat.txt"); 
$saveusers[$savetojs] = $savedis; 
  } 
  $rating = $saveusers; 
  if(isset($rating[$fadmin])){  
    arsort($rating,SORT_NUMERIC);  
    $rate = array();  
    foreach($rating as $key=>$value){  
      $rate[] = $key;  
    }  
    $flipped = array_flip($rate);  
    return $flipped[$fadmin]+1;  
  }else{  
    return false;  
  }  
}
//====================WHITE ™======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$channel_post = $update->message->channel_post;
$code = file_get_contents("data/code.txt");
$code2 = file_get_contents("data/code2.txt");
$chid = $update->channel_post->message->message_id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$name = $update->message->from->first_name;
$last = $update->message->from->last_name;
$kodomadmin = file_get_contents("data/$chat_id/kodomadmin.txt");
$username = $update->message->from->username;
$c_id = $message->forward_from_chat->id;
$data_id = $update->callback_query->from->id;
$data_username = $update->callback_query->from->username;
$forward_id = $update->message->forward_from->id;
$data_first = $update->callback_query->from->first_name;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$reply = $update->message->reply_to_message;
@$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
@$ali = file_get_contents("data/$chat_id/ali.txt");
@$penlist = file_get_contents("data/pen.txt");
$text = $message->text;
@mkdir("data/$chat_id");
@mkdir("ads/code");
@mkdir("ads/coded");
@mkdir("user/$from_id");
@$saeed = file_get_contents("data/$chat_id/saeed.txt");
@$list = file_get_contents("users.txt");
@$set_channel = file_get_contents("data/setchannel.txt");
$ADMIN = array("124863172","301550598","677344070","313526952");
$nitro = file_put_contents("data/$chat_id/nitro.txt");
$channel = file_get_contents("data/channel.txt");
$channel2 = file_get_contents("data/channel2.txt");
$channel3 = file_get_contents("data/channel3.txt");
$channel4 = file_get_contents("data/channel4.txt");
$channel5 = file_get_contents("data/channel5.txt");
$tedad_bazdid = file_get_contents("data/$chatid/bish.txt");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$message_id222 = $update->message->message_id;
$fatime = jdate("h:i:s");
$fadate = jdate("Y F d");
$date = date('Ymd');
@$date_coin = file_get_contents("user/$from_id/date.txt");
@$command = file_get_contents("user/$from_id/command.txt");
$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=@$channel4&user_id=".$chat_id));
$tch = $truechannel->result->status;
$button_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
//====================WHITE ™======================//
if ($text == "/start") {
    
            $user = file_get_contents('users.txt');
			$setstart = file_get_contents('data/setstart.txt');
            $members = explode("\n", $user);
            @$matnstart = file_get_contents("data/matnstart.txt");
            if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/membrs.txt", "0");
            file_put_contents("data/$chat_id/poorss.txt", "0");
            file_put_contents("data/$chat_id/enteghal.txt", "شما تراکنشی نداشتید:/");
            file_put_contents("data/$chat_id/bish.txt", "0");
            file_put_contents("data/$chat_id/masrafi.txt", "0");
            file_put_contents("data/$chat_id/entshoma.txt", "شما تراکنشی نداشتید:/");
            file_put_contents("data/$chat_id/kolbazdid.txt", "0");
            file_put_contents("data/$chat_id/kolbazdidzir.txt", "0");
			            file_put_contents("data/$chat_id/name.txt", "$name");
            file_put_contents("data/$chat_id/last.txt", "$last");
            file_put_contents("data/$chat_id/zaman.txt", $fadate);
            file_put_contents("data/$chat_id/shoklat.txt", "$matnstart");
            file_put_contents('users.txt', $add_user);
            }
            file_put_contents("data/$chat_id/saeed.txt", "no");
            sendAction($chat_id, 'typing');
if(in_array($chat_id,$ADMIN)){
            bot('sendmessage', [
            'chat_id' => $chat_id,
                'text' => "$setstart",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
					[['text' => "👤مدیریت"],['text' => "⚙تنظیمات"]],
                ]
            ])
        ]);
}else{
            bot('sendmessage', [
            'chat_id' => $chat_id,
                'text' => "$setstart",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
                ]
            ])
        ]);
}
    } elseif (strpos($penlist, "$from_id")) {
        SendMessage($chat_id, " کاربر عزیز شما از سرور ما بلاک شدید با ربات پیام رسان ما در ارتباط باشید با تشکر");
    } elseif (strpos($text, '/start') !== false && $forward_chat_username == null) {
        $newid = str_replace("/start ", "", $text);
        if ($from_id == $newid) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "شما نمیتونی با لینک خودت عضو بشی",
            ]);
        } elseif (strpos($list, "$from_id") !== false) {
            SendMessage($chat_id, "شما قبلا در این ربات عضو شدی و نمیتونی با لینک عضویت دوستت عضو ربات بشی😑");
        } else {
            sendAction($chat_id, 'typing');
            @$matnstart = file_get_contents("data/matnstart.txt");
            @$sho = file_get_contents("data/$newid/shoklat.txt");
			$setzirm = file_get_contents("data/setzirm.txt");
            $getsho = $sho + $setzirm;
            file_put_contents("data/$newid/shoklat.txt", $getsho);
            @$sea = file_get_contents("data/$newid/membrs.txt");
            $getsea = $sea + 1;
            file_put_contents("data/$newid/membrs.txt", $getsea);
            $user = file_get_contents('users.txt');
            $members = explode("\n", $user);
            if (!in_array($from_id, $members)) {
                $add_user = file_get_contents('users.txt');
                $add_user .= $from_id . "\n";
                file_put_contents("data/$chat_id/membrs.txt", "0");
            file_put_contents("data/$chat_id/poorss.txt", "0");
            file_put_contents("data/$chat_id/enteghal.txt", "شما تراکنشی نداشتید:/");
            file_put_contents("data/$chat_id/bish.txt", "0");
            file_put_contents("data/$chat_id/masrafi.txt", "0");
            file_put_contents("data/$chat_id/entshoma.txt", "شما تراکنشی نداشتید:/");
            file_put_contents("data/$chat_id/kolbazdid.txt", "0");
            file_put_contents("data/$chat_id/kolbazdidzir.txt", "0");
            file_put_contents("data/$chat_id/zaman.txt", $fadate);
            file_put_contents("data/$chat_id/bish.txt", "0");
            file_put_contents("data/$chat_id/name.txt", "$name");
            file_put_contents("data/$chat_id/last.txt", "$last");
            file_put_contents("data/$chat_id/masrafi.txt", "0");
			file_put_contents("data/$chat_id/shoklat.txt", "$matnstart");
                file_put_contents('users.txt', $add_user);
            }
            file_put_contents("data/$chat_id/invite.txt",$newid);
            file_put_contents("data/$chat_id/saeed.txt", "No");
            sendmessage($chat_id, "تبریک شما با دعوت کاربر $newid عضو ربات ما شدید🤖");
            $setstart = file_get_contents('data/setstart.txt');
            bot('sendmessage', [
            'chat_id' => $chat_id,
                'text' => "$setstart",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
                ]
            ])
        ]);
            SendMessage($newid, "️❇️تبریک!!! 😍❤️👌😐😐

یک کاربر با لینک فعالسازی شما عضو ربات شد و از این پس  20% درصد از بازدیدهای انجام گرفته شده توسط این زیر مجموعه به حساب شما لحاظ خواهد شد.
 تیم مدیریت سولار ");
     }
    }
elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator' && $set_channel == "yes" && $chat_id != $admin){
	SendMessage($chat_id,"🚫 برای حمایت از ما و همچنین ارسال پیام در این ربات میبایست ابتدا در کانال زیر عضو شوید:

@$channel4

♻️ پس از عضویت در کانال بالا، دوباره دستور /start را ارسال کنید","html","true",$button_remove);
}
if ($text == "سکه روزانه") {
SendAction($chat_id,typing);
        date_default_timezone_set('Asia/Tehran');
        if ($date == $date_coin) {
            bot('sendmessage', [
            'chat_id' => $chat_id,
                'text' => "⚠️ هدیه خود را دریافت کردید!
👈 شما امروز هدیه روزانه خود را دریافت کردید، جهت دریافت دوباره هدیه لطفا 24 ساعت دیگر امتحان کنید.",
                'parse_mode' => "MarkDown",
        ]);
}else{
$setraed = fopen("data/setraed.txt",'r');
$raed1 = str_replace("\n",'',fgets($setraed));
$raed2 = str_replace("\n",'',fgets($setraed));
file_put_contents("data/$chat_id/saeed.txt","date coin");
            bot('sendmessage', [
            'chat_id' => $chat_id,
                'text' => "حالا یه بسته رو به دلخواه از بین بسته های زیر (6 بسته) انتخاب کنید.
بسته به شانستون بین $raed1 تا $raed2 رعد دریافت میکنید!
 با دقت انتخاب کنید",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "1️⃣"], ['text' => "2️⃣"], ['text' => "3️⃣"]],
						[['text' => "4️⃣"], ['text' => "5️⃣"], ['text' => "6️⃣"]],
                ]
            ])
        ]);
}
}
elseif($saeed == "date coin"){
$setraed = fopen("data/setraed.txt",'r');
$raed1 = str_replace("\n",'',fgets($setraed));
$raed2 = str_replace("\n",'',fgets($setraed));
SendAction($chat_id,typing);
if($text == "1️⃣" or $text == "2️⃣" or $text == "3️⃣" or $text == "4️⃣" or $text == "5️⃣" or $text == "6️⃣"){
file_put_contents("data/$chat_id/saeed.txt",'none');
$rand = rand($raed1,$raed2);
file_put_contents("user/$from_id/date.txt",$date);
$shoklat = file_get_contents("data/$chat_id/shoklat.txt");
file_put_contents("data/$chat_id/shoklat.txt",$shoklat + $rand);
            bot('sendmessage', [
            'chat_id' => $chat_id,
                'text' => "✅ تبریک!
👈 $rand سکه هدیه روزانه از بسته شماره $text به حسابتان افزوده شد ☺️",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "بازگشت"],],
                ]
            ])
        ]);
}else{
            bot('sendmessage', [
            'chat_id' => $chat_id,
                'text' => "⚠️ یک بسته معتبر را انتخاب کنید!
👈 بسته مورد نظر خود را از روی کیبورد انتخاب کنید
 ",
                'parse_mode' => "MarkDown",
        ]);
}
}
if ($text == "🎁کد هدیه") {
file_put_contents("data/$chat_id/saeed.txt", "code pv 123");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "کد را وارد کنید.",
            'parse_mode' => "MarkDown",
        ]);
    }
if ($saeed == "code pv 123") {
file_put_contents("data/$chat_id/saeed.txt", "none");
  if(file_exists("ads/code/$text.txt")){
$coded = file_get_contents("ads/code/$text.txt");
  if($coded == 'true'){
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "کدی که فرستادی استفاده شده😕",
            'parse_mode' => "MarkDown",
        ]);
  }else{
$sho = file_get_contents("data/$chat_id/shoklat.txt");
$shocode = file_get_contents("ads/coded/$text.txt");
$getsho = $sho + $shocode;
file_put_contents("data/$chat_id/shoklat.txt", $getsho);
file_put_contents("ads/code/$text.txt", "true");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "تبریک کدت درست بود و تعداد $shocode سکه بهت اضافه شد.",
            'parse_mode' => "MarkDown",
        ]);
        bot('sendmessage', [
            'chat_id' => $channel2,
            'text' => "کد توسط $name استفاده شد.",
            'parse_mode' => "MarkDown",
        ]);
  }
}else{
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "کدی که فرستادی اصلا وجود نداره😂",
            'parse_mode' => "MarkDown",
        ]);
}
}
if ($text == "بازگشت") {
		
         file_put_contents("data/$chat_id/saeed.txt", "No");
        sendAction($chat_id, 'typing');
if(in_array($chat_id,$ADMIN)){
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "⚜️ صفحه اصلی

برای انجام عملیات مورد نظر، لطفا از دکمه های پایین استفاده نمایید.",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
					[['text' => "👤مدیریت"],['text' => "⚙تنظیمات"]],
                ]
            ])
        ]);
}else{
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "⚜️ صفحه اصلی

برای انجام عملیات مورد نظر، لطفا از دکمه های پایین استفاده نمایید.",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
                ]
            ])
        ]);
}
    }
 if ($text == "سکه رایگان") {
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "یکی از گزینه های زیر را انتخاب کنید.",
            'reply_markup' => json_encode([
                'keyboard' => [
                   [['text' => "سکه روزانه"],['text' => "👁‍🗨دیدن تبلیغات درون کانال"]],
				   [['text' => "بازگشت"]],
                ]
            ])
        ]);
 }    
 if ($text == "🛒فروشگاه") {
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "یکی از مبالغ زیر را انتخاب کنید.",
 'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "200 سکه | 1000 تومن", 'callback_data' => "idposht"]
                ],
                    [
                        ['text' => "400 سکه | 2000 تومن", 'callback_data' => "idposht"]
                ],
                    [
                        ['text' => "600 سکه | 3000 تومن", 'callback_data' => "idposht"]
                ],
                    [
                        ['text' => "1000 سکه | 5000 تومن", 'callback_data' => "idposht"]
                ],
                ]
            ])
        ]);
 }    
 if($text == "👁‍🗨دیدن تبلیغات درون کانال") {
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "به بخش دریافت سکهخوش آمدید.

🎁 سولار ویو دارای ۳ پنل به همراه ضرایب زیر می باشد.
پنل برنزی(🥉): دارای ضریب 0.8 می باشد. یعنی با دیدن 100 تبلیغ، شما می توانید 80 بازدید کسب نمایید.
پنل نقره ای(🥈): دارای ضریب 1.2 می باشد. یعنی با دیدن 100 تبلیغ، شما می توانید 120 بازدید کسب نمایید.
پنل طلایی(🥇): دارای ضریب 1.6 می باشد. یعنی با دیدن 100 تبلیغ، شما می توانید 160 بازدید کسب نمایید.

❇️ برای دیدن شرایط و نحوه ارتقاع پنل خود به نقره ای و یا طلایی، به صفحه اصلی بازگشته و دکمه زیر مجموعه گیری را لمس نمایید.",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "دیدن تبلیغات درون کانال و دریافت بازدید", 'url' => "https://t.me/$channel5"]
                    ]
                ]
            ])
        ]);
}    if ($data == "home") {
    unlink("cod/$chatid.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "No");
if(in_array($chatid,$ADMIN)){
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "⚜️ صفحه اصلی

برای انجام عملیات مورد نظر، لطفا از دکمه های پایین استفاده نمایید.",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
					[['text' => "👤مدیریت"],['text' => "⚙تنظیمات"]],
                ]
            ])
        ]);
}else{
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "⚜️ صفحه اصلی

برای انجام عملیات مورد نظر، لطفا از دکمه های پایین استفاده نمایید.",
            'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
                ]
            ])
        ]);
}
}    if ($data == "idposht") {
	$setkharid = file_get_contents("data/setkharid.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "💳جهت خرید نهایی تعداد سکه را به ایدی زیر اعلام کنید:

🆔 $setkharid",
            'parse_mode' => "MarkDown",
        ]);
    }  if ($text == "📚 کمک") {
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "روزانه ده ها نفر با استفاده از ایده ی جدید و کاربردی ربات رعد ویو در امر ویو یا همان بازدید زدن ، بازدید پست ها بنر ها چالش ها و چیزی که مد نظرشان هست را بالا میبرندروزانه ده ها نفر با استفاده از ایده ی جدید و کاربردی ربات رعد ویو در امر ویو یا همان بازدید زدن ، بازدید پست ها بنر ها چالش ها و چیزی که مد نظرشان هست را بالا میبرندروزانه ده ها نفر با استفاده از ایده ی جدید و کاربردی ربات سولار ویو در امر ویو (همان بازدید زدن ) ، بازدید پست ها ، بنر ها ، چالش ها و چیزی که مد نظرشان هست را بالا میبرند !

آموزش دقیق کارِ ربات و کار با ربات ! 👇

🔶 سوالاتی که پیش می آید : 

▪️یعنی پست ها بدونِ ربات تبچی ویو میخوره ؟
در جواب باید بگیم بله درست شنیدید !!

☑️ روش کار ربات ما : 
یک کانال برای ربات ایجاد شده که کاربران پست های که میخواهند ویو بخورد را به ربات میدهند تا ربات داخل کانال قرار دهد افراد داخل کانال همان کاربران داخل ربات هستند که برای پست ها ویو میزنند !

▫️ یعنی یه عده فقط کارشون اینه که بیان پست های ما رو ویو بزنن ؟
بعد من اگه مثلا 20 ویو بخوام چطوری میفهمید که ویو های پستم به 20 رسیده و پاک میکنید پستم رو ؟
↩️ در جواب باید بگیم که برای ربات الگوریتم مناسبی برنامه نویسی شده که هیچ کسی ضرر نمیکند و همه سود میکنند !
شما برای ارسال پست خودتون داخل کانال جهت ویو خوردن باید سکه خرج کنید ، اینگونه است که هر 1⃣ سکه براره با 1⃣ بازدید☺️
پس فهمیدید که کسانی که پست های کانال رو ویو میزنن بیکار تشریف ندارن و صرفا دارن سکه جمع میکنن !
 
شما وارد کاناله . $channel.  میشید ؛ با بازدید ثبت کردن ( روی دکمه های ثبت بازدید داخل کانال کلیک کنید تا بازدیدی که از بنر کردی ثبت بشه ) سکه جمع میکنید

خوب حالا اگر شما 20 ویو انتخاب کرده باشید تا براتون بنرتون رو ویو بزنن باید 20 نفر روی دکمه ثبت بازدید کلیک کنن و به طور اتوماتیک ربات پاک میکنه وقتی تعداد کلیک ها به 20 رسید !

- داخل کانال زیر هر پست سه ایموجی یا سه دکمه متفاوت هست :

| سمت راست ❗️ | برای اخطار دادن به بنر مورد نظره
شما وقتی اخطار میدید به دست ما میرسه و اگر واقعا مشکل داشت اون بنر پاک میشه!!
حالا به دلایل مختلف مثل بنر های غیر اخلاقی و ...
| دکمه وسط 👁‍🗨 | برای ثبت بازدید و گرفتنِ سکه هست ، شما وقتی یک بنر را میبینید حتما باید روی این گزینه کلیک کنید تا بازدیدتون ثبت بشه و یک سکه به سکه های که دارید اضافه بشه🙂
| سمت چپ ↩️ | این دکمه برای برگشتن به ربات هست دیگه نیاز نیست از کانال خارج بشید همونجا بزنید روی این دکمه خیلی سریع بر میگردید به ربات !

شما به طور معمول ، هر 100 بازدیدی که در کانال ثبت کنید 80 سکه در قبالش دریافت خواهید کرد یعنی با ضریبه 0.8 و پنل شما برنزی هست !

-سه پنله مختلف با ضریب های مختلف وجود داره :
🥉: پنل برنزی / هر 100 بازدید 80 سکه / ضریبه  0.8
🥈 : پنل نقره ای / هر 100 بازدید 100 سکه / ضریبه 1
🥇 : پنل طلای / هر 100 بازدید 140 سکه / ضریبه 1.4

- برای اینکه ارتقا پیدا کنید به پنل های دیگر لطفا به دکمه ' زیر مجموعه گیری ' بروید ، متوجه میشوید

- بعد از سکه جمع کردن وارد دکمه ثبت تبلیغ در ربات بشید و تبلیغتون رو ثبت کنید

برخی دیگر از امکانات ربات:

| انتقال و دریافت سکه بین دوستان خود داخل ربات
| فروش سکه های خود به هر قیمتی که دوست دارید !
| سکه بدهید بجایش شارژ دریافت کنید !
میبینید که خیلی راحت با ربات میتونی کسب و کار خوبی راه بندازین 

- دکمه ای وجود دارد به نام ' مشخصات کاربری ' که میتوانید دقیقا مطلع شوید چند بازدید زده اید چند زیر موجوعه دارید و کلی چیزای دیگه که لازم هست بدانید !

- چیز های واجب را گفتیم امکانات و دیگر دکمه های هم وجود دارد که خودتان متوجه میشوید نیازی به توضیح نیست بازم سوالی بود در دکمه ' پشتیبانی ' در خدمت هستیم !

- Solar bot team ! 💛",
        ]);
} if ($text == "⚖️ قوانین و مقررات") {
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "⚖️صفحه قوانین و مقررات⚖️


⛔️ تبلیغات شما نباید شامل موارد زیر باشد:
1️⃣ - خلاف قوانین جمهوری اسلامی ایران
2️⃣ - فحاشی و توهین
3️⃣ - محتوای جنسی و بزرگسالان
4️⃣ - مزاحمت و پخش اطلاعات افراد
5️⃣ - کلاهبرداری و پخش موارد جعلی
6️⃣ -سایتها و رباتها و کانالهای شرط بندی 
7️⃣ - تبلیغ ربات های مشابه، ربات های غیرواقعی
8️⃣ - فریب افراد و کاربران
9️⃣ - هک و نفوذ، پخش برنامه های پولی و موارد علیه کپی رایت
🔟 - و ... (موارد غیرمجاز)

⚠️ توجه داشته باشید در صورت گزارش هر پست و حذف پست شما 1 اخطار میگیرید؛ در صورتی که 3 اخطار دریافت کنید در ربات مسدود خواهید شد!

⚠️ قوانین و مقررات دائما در حال به روز شدن می باشند و کلیه کاربران موظف به مطالعه این صفحه به صورت مکرر می باشند.

❗️پست های غیرمجاز را به ما گزارش کنید تا ما سریعا برخوردهای قانونی را با عوامل آن انجام دهیم. برای گزارش پست های غیر مجاز می توانید هنگام مشاهده بنرها بر روی دکمه گزارش تخلف کلیک کنید.

⚠️ در صورت ثبت گزارش های غیرواقعی و دروغین، اخطار خواهید گرفت و در صورت تکرار این گزارشات به صورت عمدی، اکانت شما غیر فعال خواهد شد.",
'reply_to_message_id'=>$message_id,
        ]);
} if ($text == "👑رتبه بندی") {
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "برترین کاربران 

 برترین کاربران هر روز ساعت ۸ الی ۹ تازه سازی می گردند.",
 'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "برترین بازدیدگنندگان", 'callback_data' => "topse"], ['text' => "برترین جذب کنندگان", 'callback_data' => "topzi"]
                ],
                ]
            ])
        ]);
}
if ($data == "topse") {
 $kandom1 = ttoopp(0);
 $kandom2 = ttoopp(1);
 $kandom3 = ttoopp(2);
 //////////////////////
 $kandom11 = file_get_contents("data/$kandom1/shoklat.txt");
 $kandom22 = file_get_contents("data/$kandom2/shoklat.txt");
 $kandom33 = file_get_contents("data/$kandom3/shoklat.txt");
 //////////////////////
 $name1  = file_get_contents("data/$kandom1/name.txt");
 $name2  = file_get_contents("data/$kandom2/name.txt");
 $name3  = file_get_contents("data/$kandom3/name.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "⚜️ برترین های امروز
🏅نفر اول: [$kandom1](tg://user?id=$kandom1) 
🚀 تعداد : $kandom11

🏅نفر دوم: [$kandom2](tg://user?id=$kandom2)
🚀 تعداد: $kandom22

🏅نفر سوم: [$kandom3](tg://user?id=$kandom3)
🚀 تعداد: $kandom33
-  -  -  -  -
- چالش #نصفه یادتون نره بیایید تو پشتیبانی بگید بنر بده ! بنر میدیم هرچقدر بازدید زدید نصفه بازدیدی که زدی سکه تحیول میدیم بهت ! ⚡️💦",
 				'parse_mode'=>'MarkDown',
        ]);
		}
		if ($data == "topzi") {
$member1 = top_sea(0);
 $member2 = top_sea(1);
 $member3 = top_sea(2);
 //////////////////////
 $mosak1 = file_get_contents("data/$member1/membrs.txt");
 $mosak2 = file_get_contents("data/$member2/membrs.txt");
 $mosak3 = file_get_contents("data/$member3/membrs.txt");
 //////////////////////
 $nam1  = file_get_contents("data/$member1/name.txt");
 $nam2  = file_get_contents("data/$member2/name.txt");
 $nam3  = file_get_contents("data/$member3/name.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "⚜️ برترین های امروز
🏅نفر اول: [$member1](tg://user?id=$member1) 
🏛تعداد: $mosak1
 

🏅نفر دوم: [$member2](tg://user?id=$member2) 
🏛تعداد: $mosak2


🏅نفر دوم: [$member3](tg://user?id=$member3) 
🏛تعداد: $mosak3
-  -  -  -  -
- چالش #نصفه یادتون نره بیایید تو پشتیبانی بگید بنر بده ! بنر میدیم هرچقدر بازدید زدید نصفه بازدیدی که زدی سکه تحیول میدیم بهت ! ⚡️💦",
 				'parse_mode'=>'MarkDown',
        ]);
		}
	if ($text == "☎️ پشتیبانی") {
		       sendAction($chat_id, 'typing');
		bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
        'text' => "برای ادامه کلیک کنید!",
        'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                [
                        ['text' => "ارسال پیام", 'callback_data' => "se"]
                ],
                    ]
                ])
            ]);
	}
	if ($data == "se") {
		
         file_put_contents("data/$chatid/saeed.txt", "sp");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "جانم ؟
هر سوالی یا مشکلی دارید بعد این پیام بفرستید تا بچهای پشتیبانی پیگیری کنن پاسختون رو بدن",
        ]);

    } if ($saeed == 'sp') {
        file_put_contents("data/$chat_id/saeed.txt", "no");
		bot('sendMessage', [
            'chat_id' => "$channel3",
            'text' => "
			پیام جدید ارسال شد🤷‍♂️ 
➖➖➖ 
متن ارسال شده : $text
➖➖➖",
'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
[['text' => "اطلاعات ارسال کننده🔅", 'callback_data' => "whitetm"]],
[['text' => "نام فرد〽️", 'callback_data' => "whitetm"], ['text' => "$name", 'callback_data' => "whitetm"]],
[['text' => "نام خانوادگی فرد🌐", 'callback_data' => "whitetm"], ['text' => "$last", 'callback_data' => "whitetm"]],
[['text' => "آیدی عددی فرد🆔", 'callback_data' => "whitetm"], ['text' => "$from_id", 'callback_data' => "whitetm"]],
[['text' => "آیدی تلگرامیش💠", 'url' => "https://t.me/$username"]],
]
])
]);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ارسال شد به مدیریت",
        ]);
    } 
	if ($data == "daryaftpayam") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
       $sss = file_get_contents("data/$chatid/pasokh1.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "پیام مدیریت🔖
➖➖➖
$sss
➖➖➖
موفق باشید🤷‍♂️",
        ]);
    }  if ($text == "👥زیر مجموعه گیری") {
		var_dump(bot('sendPhoto',[
        'chat_id'=>$update->message->chat->id,
        'photo'=>"http://www.upsara.com/images/9ej_d407f4bf-dd4d-4700-bd20-e82ee945e1fb.jpeg",
        'caption'=>"سولار ویو ، یک ایده جدید! 👁‍🗨

📊 افزایش بازدید کانالها و چالشها
👥 زیر مجموعه گیری با ۲۰ درصد پورسانت
✅سکه روزانه و کد رایگان و شتاب و انتقال سکه
✅سکه کم=بیشترین بازدید
👇!برای پیش رفت کانالت استارت کن رباتو",
'reply_to_message_id'=>$message_id,
'reply_markup' => json_encode([
                'inline_keyboard' => [
                [
 ['text' => "دریافت بنر", 'callback_data' => "ba"]
                    ],
                ]
            ])
        ]));
} elseif ($data == "ba") {
$setzirm = file_get_contents("data/setzirm.txt");
      bot('sendphoto', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
             'photo'=>"http://www.upsara.com/images/9ej_d407f4bf-dd4d-4700-bd20-e82ee945e1fb.jpeg",
        'caption'=>"سولار ویو ، یک ایده جدید ! 👁‍🗨

📊 افزایش بازدید کانالها و چالشها
👥 زیر مجموعه گیری با ۲۰ درصد پورسانت
✅ قابلیت چنج کردن رعد ها با شارژ و پول

http://telegram.me/$botids?start=$chatid",
        ]);
	bot('sendmessage', [
            'chat_id' => $chatid,
            'text' => "اول اینکه بدونین هرکس با لینکه شما وارد ربات بشه $setzirm سکه هدیه دریافت میکنید !

و وقتی هم هر یک از زیر مجموعه های شما ثبت تبلیغ کنند 20 درصد از سکه ش میاد برای شما !!

حالا از اون باحال تر این که هر یک از زیر مجموعه های شما که برای اولین بار ثبت بازدید کنند 25 سکه به شما واریز میشه !!! 😳😐👌

دیگه از این بهتر ؟ 😉
خوب حالا بنری که پیام بالا فرستاده شد رو به اشتراک بزار و زیرمجموعه جمع کن 👆

تمام !💛",
'reply_to_message_id'=>$message_id2,
       'reply_markup' => json_encode([
                'keyboard' => [
[['text' => "زیر مجموعه های من"]],
[['text' => "بازگشت"]],
]
])
]); 
           } 
		   if ($text == "زیر مجموعه های من") {
			    @$sea = file_get_contents("data/$chat_id/membrs.txt"); 
				sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
                  'text' => "تعداد زیر مجموعه های شما : $sea",
        ]);
   } if ($text == "📊گزارشات سولار") {
sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "خوب عزیز توجه کن ⬇️

- با دکمه انتقال سکه میتونید سکه های که دارید رو انتقال بدید به دیگران .
- با دکمه تاریخچه دریافتی ها میتونید کلیه مشخصات دریافتی سکه های خودتون رو ببینید . 
- با دکمه تاریخچه انتقال ها میتونید کلیه مشخصات انتقال سکه های خودتون رو مشاهده کنید .

گزینه مورد نظر رو انتخاب نمایید ♻️",
'reply_to_message_id'=>$message_id,
       'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "📈 تاریخچه انتقال 📈"], ['text' => "📉 تاریخچه دریافت 📉"], ['text' => " انتقال سکه 💸"]
                ],
[
                        ['text' => "بازگشت"]
                ],
                ]
            ])
        ]); 
}  if ($text == "📈 تاریخچه انتقال 📈") {
	@$ent = file_get_contents("data/$chat_id/enteghal.txt");
	sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
                  'text' => "$ent",
        ]);
   } 
   if ($text == "📉 تاریخچه دریافت 📉") {
	@$entshoma = file_get_contents("data/$chat_id/entshoma.txt");
	sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
                  'text' => "$entshoma",
        ]);
   } 
if ($text == "👤 حساب کاربری من") {
        @$gettime = file_get_contents("data/$chat_id/date_tedad.txt");
        if ($gettime != $date) {
            file_put_contents("data/$chat_id/date_tedad.txt",$date);
            file_put_contents("data/$chat_id/bish.txt", "0");
        }
        @$sho = file_get_contents("data/$chat_id/shoklat.txt");
        $ent = file_get_contents("data/$chat_id/enteghal.txt");
       $tedad_bazdid = file_get_contents("data/$chat_id/bish.txt");
       $matnstart = file_get_contents("data/matnstart.txt");
         $masrafi = file_get_contents("data/$chat_id/masrafi.txt");
          $koli = file_get_contents("data/$chat_id/kolbazdid.txt");
        $entshoma = file_get_contents("data/$chat_id/entshoma.txt");
         $kolzir = file_get_contents("data/$chat_id/kolbazdidzir.txt");
         $zaman = file_get_contents("data/$chat_id/zaman.txt");
        @$poorss = file_get_contents("data/$chat_id/poorss.txt");
        @$sea = file_get_contents("data/$chat_id/membrs.txt");     
       sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
                  'text' => "🔻صفحه مشخصات کاربری

🔵 آیدی تلگرامی : $chat_id
🤖 آیدی رباتی : @$username
🏵 نوع پنل : برنزی
🏵 آعتبار پنل : 0 ساعت

📅 تاریخ عضویت : $zaman 
⚠️ اخطارها : 0 از 3 
🔻

⚡️♻️ کل سکه ها  : $sho 🏵
⚡️👁 سکه های دریافتی از دیدن تبلیغ : 1.4 
⚡️⌛️ مصرف شده : $masrafi
⚡️⬆️ انتقال از شما : $ent
⚡️⬇️ انتقال به شما : $entshoma
⚡️🎁 هدیه های مدیریت : $matnstart
⚡️❎سکه های برنده شده⚡️ : 0
⚡️❌سکه های از دست داده شده⚡️: 0

🔻
👥♻️ کل زیرمجموعه ها : $sea
👥⚡️ پورسانت از زیرمجموعه : $poorss

👁‍🗨 کل بازدید های شما : $koli 
👁‍🗨 بازدید ها امروز شما : $tedad_bazdid


- ربات سولار ویو",
        ]);
   } if ($text == " انتقال سکه 💸") {
       $almasid = file_get_contents("data/$chat_id/almasid.txt");

        file_put_contents("data/$chat_id/saeed.txt", "entalmas1");
       sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "⚠️کاربر گرامی برای انتقال بازدید از خود به کاربری دیگر به شناسه کاربری[آیدی عددی] شخص نیاز است لطفا آن را وارد نمایید. ",
              'reply_markup' => json_encode([
                'keyboard' => [
                    [
            ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } elseif ($saeed == 'entalmas1') {
            if (strpos($list, "$text") !== false) {
         if (preg_match('/^([0-9])/', $text)) {
        file_put_contents("data/$chat_id/almasid.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "entalmas2");
    $sho = file_get_contents("data/$chat_id/shoklat.txt");
        $shoo = $sho -1;
       sendAction($chat_id, 'typing');
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => " ❓تعداد بازدیدهای مورد نظر برای انتقال را وارد کنید:

⚠️ نکته:
 شما قادر به انتقال حداقل 50 بازدید و حداکثر $shoo میباشید ",
             'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
            ['text' => "انصراف️", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
            } else {
       sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>  "کاربرگرامی لطفا ایدی عددی را به صورت انگلیسی وارد کنید ",
             'reply_markup' => json_encode([
                'keyboard' => [
                    [
            ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
   }
            } else {
       sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
             'text' => "خطا❌
آیدی عددی وارد شده اشتباه می باشد یا کاربر مورد نظر عضو ربات نمیباشد  ",
             'reply_markup' => json_encode([
                 'keyboard' => [
                    [
            ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
   }
    } elseif ($saeed == 'entalmas2') {
            if ($shoklt > $text) {
              if ($text > 50) {
    $ident = file_get_contents("data/$chat_id/almasid.txt");
    $alms = file_get_contents("data/$chat_id/shoklat.txt");
          $fle = file_get_contents("data/$ident/shoklat.txt");
                $alm = $text;
               $getshe = $fle + $alm;
                file_put_contents("data/$ident/shoklat.txt", $getshe);
    $sho = file_get_contents("data/$ident/shoklat.txt");
        file_put_contents("data/$chat_id/saeed.txt", "");
                SendMessage($ident, "✅ مقدار $text بازدید از طرف شماره کاربری $chat_id به حساب شما با موفقیت انتقال یافت.
بازدید فعلی👁‍🗨: $sho");
           $getalm = $alms - $alm;
        file_put_contents("data/$chat_id/shoklat.txt", "$getalm");
    $ident = file_get_contents("data/$chat_id/almasid.txt");
    $sho = file_get_contents("data/$chat_id/shoklat.txt");
               $entshoma = file_get_contents("data/$ident/entshoma.txt");
               $getshee = $entshoma + $text;
                file_put_contents("data/$ident/entshoma.txt", $getshee);
            $ss = file_get_contents("data/$chat_id/enteghal.txt");
           $sss = $ss + $text;
                file_put_contents("data/$chat_id/enteghal.txt", $sss);
                SendMessage($chat_id, " ✅ شما مقدار $text بازدید را با موفقیت به شماره کاربری $ident انتقال دادید.
👁‍🗨بازدید فعلی شما: $sho");
            } else {
                SendMessage($chat_id, "حداقل بازدید مجاز برای انتقال 50 بازدید میباشد");
   }
        } else {
            SendMessage($chat_id, " موجودی شما کافی نیست ❌");
        }
    } if ($text == "ثبت تبلیغ📰") {
        @$gettime = file_get_contents("data/$chat_id/date_tedad.txt");
        if ($gettime != $date) {
            file_put_contents("data/$chat_id/date_tedad.txt",$date);
            file_put_contents("data/$chat_id/bish.txt", "0");
        }
         sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "❓ مقدار بازدیدی که مایلید تبلیغات شما به کاربران سولار ویو نشان داده شود را انتخاب کنید.",
'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                      [['text' => "50 بازدید | 50 سکـــــد", 'callback_data' => "seen50"]],
                    [['text' => "100 بازدید | 100 سکـــــد", 'callback_data' => "seen100"]],
                    [['text' => "250 بازدید | 250 سکـــــد", 'callback_data' => "seen250"]],
                    [['text' => "500 بازدید | 500 سکـــــد", 'callback_data' => "seen500"]],
                    [['text' => "1000 بازدید | 1000 سکـــــد", 'callback_data' => "seen1000"]],
                    [['text' => "بازدید دلخواه", 'callback_data' => "dekkhah"]],
					[['text' => "بازگشت", 'callback_data' => "home"]],
                ]
            ])
        ]);
       }elseif ($data == "seen50") {
        file_put_contents("data/$chatid/ted.txt", "50");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        $mahdood = file_get_contents("data/mahdood.txt");
        $tedad_bazdid = file_get_contents("data/$chatid/bish.txt");
        $mahdoood = $mahdood + 1;
        $ADMIN = array("698038310");
        if ($shoklt > $aaa) {
		if ($tedad_bazdid > $mahdood){
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "♻️ Please wait ...",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/saeed.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                 'text' => "👌حالا پست مورد نظرتان را  برای ربات بفرستید",
        ]);
        }   else {
        bot('sendMessage', [
                    'chat_id' => $chatid,
                'text' => "دوست عزیز برای افزایش سرعت سین, شما باید روزانه $mahdoood  تبلیغ در کانال ما مشاهده کنید سپس اقدام به سفارش بازدید نمایید",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "دیدن تبلیغات درون کانال و دریافت بازدید", 'url' => "https://t.me/$channel5"]
                    ]
                ]
            ])
        ]);
        }

    } else {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "‼️با عرض معذرت تعداد سکه های شما کم میباشد😔",
            'show_alert' => true
        ]);
        }
    } elseif ($data == "seen100") {
        file_put_contents("data/$chatid/ted.txt", "100");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        $mahdood = file_get_contents("data/mahdood.txt");
        $tedad_bazdid = file_get_contents("data/$chatid/bish.txt");
        $mahdoood = $mahdood + 1;
		$ADMIN = array("698038310");
        if ($shoklt > $aaa) {
          if ($tedad_bazdid > $mahdood){
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "♻️ Please wait ...",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/saeed.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                 'text' => "👌حالا پست مورد نظرتان را  برای ربات بفرستید

⚖️پستتون اگر بر خلاف قوانین بود به طور خودکار حذف میشه و سکه تون برگشته نمیشود(برای فهمیدن قوانین،به صفحه اول بروید و دکمه قوانین را بزنید)

⚠️توجه در صورتی که از ثبت تبلیغ منصرف شدید روی دکمه زیر کلیک کنید",
        ]);
        }   else {
        bot('sendMessage', [
                    'chat_id' => $chatid,
                'text' => "دوست عزیز برای افزایش سرعت سین, شما باید روزانه $mahdoood  تبلیغ در کانال ما مشاهده کنید سپس اقدام به سفارش بازدید نمایید",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "دیدن تبلیغات درون کانال و دریافت بازدید", 'url' => "https://t.me/$channel5"]
                    ]
                ]
            ])
        ]);
        }

    } else {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "‼️با عرض معذرت تعداد سکه های شما کم میباشد😔",
            'show_alert' => true
        ]);
        }
    } elseif ($data == "seen250") {
        file_put_contents("data/$chatid/ted.txt", "250");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        $mahdood = file_get_contents("data/mahdood.txt");
        $tedad_bazdid = file_get_contents("data/$chatid/bish.txt");
        $mahdoood = $mahdood + 1;
		$ADMIN = array("698038310");
        if ($shoklt > $aaa) {
          if ($tedad_bazdid > $mahdood){
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "♻️ Please wait ...",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/saeed.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                 'text' => "👌حالا پست مورد نظرتان را  برای ربات بفرستید

⚖️پستتون اگر بر خلاف قوانین بود به طور خودکار حذف میشه و سکه تون برگشته نمیشود(برای فهمیدن قوانین،به صفحه اول بروید و دکمه قوانین را بزنید)

⚠️توجه در صورتی که از ثبت تبلیغ منصرف شدید روی دکمه زیر کلیک کنید",
        ]);
        }   else {
        bot('sendMessage', [
                    'chat_id' => $chatid,
                'text' => "دوست عزیز برای افزایش سرعت سین, شما باید روزانه $mahdoood  تبلیغ در کانال ما مشاهده کنید سپس اقدام به سفارش بازدید نمایید",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "دیدن تبلیغات درون کانال و دریافت بازدید", 'url' => "https://t.me/$channel5"]
                    ]
                ]
            ])
        ]);
        }

    } else {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "‼️با عرض معذرت تعداد سکه های شما کم میباشد😔",
            'show_alert' => true
        ]);
        }
    } elseif ($data == "seen1000") {
        file_put_contents("data/$chatid/ted.txt", "1000");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        $mahdood = file_get_contents("data/mahdood.txt");
        $tedad_bazdid = file_get_contents("data/$chatid/bish.txt");
        $mahdoood = $mahdood + 1;
		$ADMIN = array("698038310");
        if ($shoklt > $aaa) {
          if ($tedad_bazdid > $mahdood){
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "♻️ Please wait ...",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/saeed.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                 'text' => "👌حالا پست مورد نظرتان را  برای ربات بفرستید

⚖️پستتون اگر بر خلاف قوانین بود به طور خودکار حذف میشه و سکه تون برگشته نمیشود(برای فهمیدن قوانین،به صفحه اول بروید و دکمه قوانین را بزنید)

⚠️توجه در صورتی که از ثبت تبلیغ منصرف شدید روی دکمه زیر کلیک کنید",
        ]);
        }   else {
        bot('sendMessage', [
                    'chat_id' => $chatid,
                'text' => "دوست عزیز برای افزایش سرعت سین, شما باید روزانه $mahdoood  تبلیغ در کانال ما مشاهده کنید سپس اقدام به سفارش بازدید نمایید",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "دیدن تبلیغات درون کانال و دریافت بازدید", 'url' => "https://t.me/$channel5"]
                    ]
                ]
            ])
        ]);
        }

    } else {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "‼️با عرض معذرت تعداد سکه های شما کم میباشد😔",
            'show_alert' => true
        ]);
      }
    } elseif ($data == "seen500") {
        file_put_contents("data/$chatid/ted.txt", "500");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        $mahdood = file_get_contents("data/mahdood.txt");
        $tedad_bazdid = file_get_contents("data/$chatid/bish.txt");
        $mahdoood = $mahdood + 1;
		$ADMIN = array("698038310");
        if ($shoklt > $aaa) {
          if ($tedad_bazdid > $mahdood){
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "♻️ Please wait ...",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/saeed.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                 'text' => "👌حالا پست مورد نظرتان را  برای ربات بفرستید

⚖️پستتون اگر بر خلاف قوانین بود به طور خودکار حذف میشه و سکه تون برگشته نمیشود(برای فهمیدن قوانین،به صفحه اول بروید و دکمه قوانین را بزنید)

⚠️توجه در صورتی که از ثبت تبلیغ منصرف شدید روی دکمه زیر کلیک کنید",
        ]);
        }   else {
        bot('sendMessage', [
                    'chat_id' => $chatid,
                'text' => "دوست عزیز برای افزایش سرعت سین, شما باید روزانه $mahdoood  تبلیغ در کانال ما مشاهده کنید سپس اقدام به سفارش بازدید نمایید",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "دیدن تبلیغات درون کانال و دریافت بازدید", 'url' => "https://t.me/$channel5"]
                    ]
                ]
            ])
        ]);
        }

        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "متاسفم تعداد سکه های شما با تعداد ویو درخواستی برابری نمیکند",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "dekkhah"){
$ADMIN = array("698038310");
		if ($tedad_bazdid < $mahdood){
			if(!in_array($chat_id,$ADMIN)){
        bot('sendMessage', [
                    'chat_id' => $chatid,
                'text' => "دوست عزیز برای افزایش سرعت سین, شما باید روزانه $mahdoood  تبلیغ در کانال ما مشاهده کنید سپس اقدام به سفارش بازدید نمایید",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "دیدن تبلیغات درون کانال و دریافت بازدید", 'url' => "https://t.me/$channel5"]
                    ]
                ]
            ])
        ]);
        }   else {
		file_put_contents("data/$chatid/saeed.txt", "delkhah1");
$setdel = fopen("data/setdel.txt",'r');
$del1 = str_replace("\n",'',fgets($setdel));
$del2 = str_replace("\n",'',fgets($setdel));
		bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✳️ در این صفحه می توانید بازدید دلخواه خود را وارد کنید. عدد دلخواه شما باید دارای شرایط زیر باشد.
1️⃣ باید عددی بین  $del1  الی $del2 باشد.
2️⃣ هنگام وارد کردن عدد، کیبورد در حالت انگلیسی باشد.

✅ لطفا عدد مورد نظر خود را طبق شرایط خواسته شده بالا وارد کنید:",
            ]);
        }
        }   else {
		file_put_contents("data/$chatid/saeed.txt", "delkhah1");
$setdel = fopen("data/setdel.txt",'r');
$del1 = str_replace("\n",'',fgets($setdel));
$del2 = str_replace("\n",'',fgets($setdel));
		bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "✳️ در این صفحه می توانید بازدید دلخواه خود را وارد کنید. عدد دلخواه شما باید دارای شرایط زیر باشد.
1️⃣ باید عددی بین  $del1  الی $del2 باشد.
2️⃣ هنگام وارد کردن عدد، کیبورد در حالت انگلیسی باشد.

✅ لطفا عدد مورد نظر خود را طبق شرایط خواسته شده بالا وارد کنید:",
            ]);
        }
	}
		elseif($saeed == "delkhah1"){
			SendAction($chat_id,typing);
			$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
$setdel = fopen("data/setdel.txt",'r');
$del1 = str_replace("\n",'',fgets($setdel));
$del2 = str_replace("\n",'',fgets($setdel));
       if($text >= $del1 && $del2 >= $text){
		   if($shoklt >= $text){
			   file_put_contents("data/$chat_id/ted.txt", "$text");
			   file_put_contents("data/$chat_id/saeed.txt", "seen2");
			   bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "👌حالا پست مورد نظرتان را  برای ربات بفرستید

⚖️پستتون اگر بر خلاف قوانین بود به طور خودکار حذف میشه و سکه تون برگشته نمیشود(برای فهمیدن قوانین،به صفحه اول بروید و دکمه قوانین را بزنید)

⚠️توجه در صورتی که از ثبت تبلیغ منصرف شدید روی دکمه زیر کلیک کنید",
                'reply_to_message_id'=>$message_id,
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌سکه های شما کافی نمیباشد",
            ]);
        }
    }
		}		elseif ($saeed == "seen2") {
			file_put_contents("data/$chat_id/saeed.txt", "no");
			file_put_contents("data/$chat_id/whit.txt", $message_id);
			$message_id7 = $message_id + 1;
			file_put_contents("data/$chat_id/whit2.txt", $message_id7);
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "آیا میخواهید این تبلیغ را به تعداد  بازدید ثبت کنید؟🤔
اگه آره روی✅ بزن
اگه نه هم روی ❌ بزن",
'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                      [['text' => "✅", 'callback_data' => "seen3"],['text' => "❌", 'callback_data' => "dda"]],
                ]
            ])
            ]);
		}		elseif ($data == "dda") {
		$wite2 = file_get_contents("data/$chatid/whit2.txt");
         file_put_contents("data/$chatid/saeed.txt", "No");
        sendAction($chatid, 'typing');
if(in_array($chatid,$ADMIN)){
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "⚜️ صفحه اصلی

برای انجام عملیات مورد نظر، لطفا از دکمه های پایین استفاده نمایید.",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
					[['text' => "👤مدیریت"],['text' => "⚙تنظیمات"]],
                ]
            ])
        ]);
}else{
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "⚜️ صفحه اصلی

برای انجام عملیات مورد نظر، لطفا از دکمه های پایین استفاده نمایید.",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'keyboard' => [
                        [['text' => "👥زیر مجموعه گیری"], ['text' => "ثبت تبلیغ📰"], ['text' => "👤 حساب کاربری من"]],
						[['text' => "سکه رایگان"]],
						[['text' => "🛒فروشگاه"], ['text' => "⚖️ قوانین و مقررات"], ['text' => "🗓پیگیری سفارشات"]],
                    [['text' => "☎️ پشتیبانی"], ['text' => "🎁کد هدیه"], ['text' => "📊گزارشات سولار"]],
                    [['text' => "👑رتبه بندی"]],
                ]
            ])
        ]);
}
deletemessage($chatid, $wite2);
		}		elseif ($data == "seen3") {
	   @$whit = file_get_contents("data/$chatid/whit.txt");
       @$al = file_get_contents("data/$chatid/ted.txt");
        //($forward_chat_username != null or $forward_chat_username == null )
        $msg_id = bot('ForwardMessage', [
            'chat_id' => $channel,
            'from_chat_id' => $chatid,
            'message_id' => $whit
        ])->result->message_id;
        bot('sendMessage', [
            'chat_id' => $channel,
            'text' => "👈👈👈👁‍🗨".($al)."👁‍🗨👉👉👉",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' =>  [
                        [
                           ['text' => "ثبت 👁‍🗨",  'callback_data' => "ok"], ['text' => "ربات🤖", 'url' => "https://t.me/$botids"], ['text' => "گزارش تخلف🚫",  'callback_data' => "goza"], ['text' => "شتاب⚡️", 'callback_data' => "shetab"]
                        ],
                    ]
                ])
            ]);

            @$al = file_get_contents("data/$chatid/ted.txt");
            @$sho = file_get_contents("data/$chatid/shoklat.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chatid/shoklat.txt", $getsho);
            @$masrafi = file_get_contents("data/$chatid/masrafi.txt");
            $getmasrafi = $masrafi + $al;
            file_put_contents("data/$chatid/masrafi.txt", $getmasrafi);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fadate);
            file_put_contents("ads/time/$msg_id.txt", $fatime);
            file_put_contents("ads/admin/$msg_id.txt", $chatid);
            file_put_contents("ads/seen/$msg_id.txt", "0");
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chatid/msg.txt", "$msg_id");
                   unlink("data/$chatid/ttt.txt");
            bot('editmessagetext', [
                'chat_id' => $chatid,
				'message_id' => $message_id2,
                'text' => "✅ تبلیغ شما با موفقیت ثبت شد !!

کد پیگیری سفارش شما $msg_id می باشد و میتوانی از بخش 🗓 کد پیگیری ، آمار مربوطه را مشاهده نمایید.",
           'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
            ['text' => "مشاهده تبلیغ در کانال", 'url' => "https://t.me/$channel5/$msg_id"]
                    ],
                ]
            ])
        ]);
        }
    if ($data == "ok") {
        $message_id12 = $update->callback_query->message->reply_to_message->message_id;
        $fromm_id = $update->callback_query->from->id;
        @$ue = file_get_contents("ads/user/$message_id12.txt");
        @$se = file_get_contents("ads/seen/$message_id12.txt");
        if (strpos($ue, "$fromm_id") !== false) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "شما قبلا از این پست بازدید کردید❌",
                'show_alert' => false
            ]);
        } else {
            $user = file_get_contents("ads/user/$message_id12.txt");
            $members = explode("\n", $user);
            if (!in_array($fromm_id, $members)) {
                $add_user = file_get_contents("ads/user/$message_id12.txt");
                $add_user .= $fromm_id . "\n";
                file_put_contents("ads/user/$message_id12.txt", $add_user);
            }
			$setbazdid2 = file_get_contents("data/setbazdid2.txt");
			$setbazdid3 = file_get_contents("data/setbazdid3.txt");
            $getse = $se + 1;
            file_put_contents("ads/seen/$message_id12.txt", $getse);
            @$sho = file_get_contents("data/$fromm_id/shoklat.txt");
            $getsho = $sho + $setbazdid2;
            file_put_contents("data/$fromm_id/shoklat.txt", $getsho);
        $date = date('Ymd');
        @$date_shetab = file_get_contents("data/$fromm_id/date_shetab.txt");
        if ($date_shetab != $date) {
            file_put_contents("data/$fromm_id/date_shetab.txt",$date);
            file_put_contents("data/$fromm_id/nitro.txt", "1");
        } else {
            @$nitro = file_get_contents("data/$fromm_id/nitro.txt");
            $getnitro = $nitro + 1;
            file_put_contents("data/$fromm_id/nitro.txt", $getnitro);
            }
            $Inviter = file_get_contents("data/$fromm_id/invite.txt");
            @$shop = file_get_contents("data/$Inviter/shoklat.txt");         
              $sendsho = $shop + 1.2;
            file_put_contents("data/$Inviter/shoklat.txt", $sendsho);
           $Inviterr = file_get_contents("data/$Inviter/poorss.txt");
             $sendshop = $Inviterr + $poors;
            file_put_contents("data/$Inviter/poorss.txt", $sendshop);
          $kolbazdid = file_get_contents("data/$fromm_id/kolbazdid.txt");
          $kol = $kolbazdid + 1;
          file_put_contents("data/$fromm_id/kolbazdid.txt", $kol);
            $Inviterrr = file_get_contents("data/$fromm_id/invite.txt");
            $Inbazdid = file_get_contents("data/$inviterrr/kolbazdidzir.txt");
             $bazzir = $Inbazdid + 1;
             file_put_contents("data/$inviterrr/kolbazdidzir.txt", $bazzir);
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "عملیات موفق آمیز بود✅ | $sho بازدید",
                'show_alert' => false
            ]);

        //date_default_timezone_set('Asia/Tehran');
        @$gettime = file_get_contents("data/$fromm_id/date_tedad.txt");
        if ($gettime != $date) {
            file_put_contents("data/$fromm_id/date_tedad.txt",$date);
            file_put_contents("data/$fromm_id/bish.txt", "1");
        } else {
            @$batar = file_get_contents("data/$fromm_id/bish.txt");
            $getad = $batar + 1;
            file_put_contents("data/$fromm_id/bish.txt", $getad);
            }
        }
        $end = file_get_contents("ads/seen/$message_id12.txt");
        $ad = file_get_contents("ads/admin/$message_id12.txt");
        $co = file_get_contents("ads/cont/$message_id12.txt");
        $te = file_get_contents("ads/time/$message_id12.txt");
        $de = file_get_contents("ads/date/$message_id12.txt");
		if ($end > $co) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "متاسفانه تعداد بازدید درخواستی این پست تمام شده",
                'show_alert' => false
            ]);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don - 1;
            file_put_contents("data/done.txt", $getdon);
            @$enn = file_get_contents("data/enf.txt");
            $getenf = $enn + 1;
            file_put_contents("data/enf.txt", $getenf);
            $de = $message_id12 + 1;
            deletemessage($channel, $message_id12);
            deletemessage($channel, $de);
            unlink("ads/seen/$message_id12.txt");
            unlink("ads/admin/$message_id12.txt");
            unlink("ads/cont/$message_id12.txt");
            unlink("ads/time/$message_id12.txt");
            unlink("ads/user/$message_id12.txt");
            unlink("ads/date/$message_id12.txt");
        }
        if ($end == $co) {
            file_put_contents("data/$chat_id/saeed.txt", "no");
            bot('sendMessage', [
                'chat_id' => $ad,
                'text' => "✅ تکمیل بازدید درخواستی

 بازدیدهای تبلیغ شما با کد پیگیری $message_id12  با موفقیت تکمیل شد. در صورت تمایل به ثبت تبلیغ جدید می توانید از قسمت 📝 ثبت تبلیغ موجود در صفحه اصلی ربات اقدام نمایید.
💯💯💯",

        ]);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don - 1;
            file_put_contents("data/done.txt", $getdon);
            @$enn = file_get_contents("data/enf.txt");
            $getenf = $enn + 1;
            file_put_contents("data/enf.txt", $getenf);
            $de = $message_id12 + 1;
            deletemessage($channel, $message_id12);
            deletemessage($channel, $de);
            unlink("ads/seen/$message_id12.txt");
            unlink("ads/admin/$message_id12.txt");
            unlink("ads/cont/$message_id12.txt");
            unlink("ads/time/$message_id12.txt");
            unlink("ads/user/$message_id12.txt");
            unlink("ads/date/$message_id12.txt");
        }
}   elseif ($data == "goza"){
    $message_id12 = $update->callback_query->message->reply_to_message->message_id;
$id = $update->callback_query->from->id;
$name = $update->callback_query->from->first_name;
$block = file_get_contents("data/$id/block-spam.txt");
$end = file_get_contents("ads/seen/$message_id12.txt");
$ad = file_get_contents("ads/admin/$message_id12.txt");
$co = file_get_contents("ads/cont/$message_id12.txt");
$te = file_get_contents("ads/time/$message_id12.txt");
$de = file_get_contents("ads/date/$message_id12.txt");
if($block == true){
 bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "🚫 - شما بدلیل بلاک شدن نمیتوانید گزارش کنید جهت رفع مشکل با ربات پیام رسان ما در ارتباط باشید باتشکر  !!",
                'show_alert' => true
            ]);
}else{
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "⭕️ گزارش شما با موفقیت ثبت شد

⚠️ در صورت دادن گزارش بی دلیل از شما 20 بازدید👁‍🗨 کم خواهد شد",
            'show_alert' => true
        ]);
        bot('sendMessage', [
            'chat_id' => "$channel3",
            'text' => "
گزارش تخلیف صورت گرفت😪",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مشخصات گزارش 👇🏻",'callback_data'=>"whitetm"]],
[['text'=>"⏰ ساعت درخواست بازدید",'callback_data'=>"whitetm"],['text'=>"$te",'callback_data'=>"whitetm"]],
[['text'=>"📅 تاریخ درخواست بازدید",'callback_data'=>"whitetm"],['text'=>"$de",'callback_data'=>"whitetm"]],
[['text'=>"آیدی عددی سفارش دهنده💎",'callback_data'=>"whitetm"],['text'=>"$ad",'callback_data'=>"whitetm"]],
[['text'=>"شخص گزارش دهنده 🌐",'callback_data'=>"whitetm"],['text'=>"$id",'callback_data'=>"whitetm"]],
[['text'=>"🗓 کد پیگیری",'callback_data'=>"whitetm"],['text'=>"$message_id12",'callback_data'=>"whitetm"]],
[['text'=>"لینک مستقیم درخواست بازدید 👇🏻",'url'=>"https://t.me/$channel5/$message_id12"]],
]
])
 ]);
}
} if ($text == "🗓پیگیری سفارشات") {
       
        file_put_contents("data/$chat_id/saeed.txt", "mlm");
sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "کد پیگیری خودتون را برام بفرستید",
        ]);
    } elseif ($saeed == "mlm") {
        file_put_contents("data/$chat_id/saeed.txt", "");
        if (file_exists("ads/admin/$text.txt")) {
            $ge = file_get_contents("ads/seen/$text.txt");
            $ad = file_get_contents("ads/admin/$text.txt");
            $co = file_get_contents("ads/cont/$text.txt");
            $te = file_get_contents("ads/time/$text.txt");
            $de = file_get_contents("ads/date/$text.txt");
sendAction($chat_id, 'typing');
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "مشخصات کد پیگیری  $text  بصورت زیر میباشد
👁‍🗨تعداد بازدید درخواستی شما: $co
⏰ساعت درخواست بازدید: $te
📅تاریخ درخواست بازدید: $de
👁تعداد بازدید در یافتی تا الان : $ge
🕰ساعت درخواست پیگیری: $fatime

موفق باشید!",
        ]);
        } else {
sendAction($chat_id, 'typing');
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "کد پیگیری شما اشتباه میباشد یا سفارش شما به پایان رسیده هست😬
موفق و سربلند باشید🤖
برای شروع مجدد /start را بزنید ",
   
            ]);
        }
    }
elseif($data == "shetab"){
$fromm_id = $update->callback_query->from->id;
$nitro = file_get_contents("data/$fromm_id/nitro.txt");
if($nitro > "50"){
file_put_contents("data/$fromm_id/shoklat.txt",(file_get_contents("data/$fromm_id/shoklat.txt") + 10) );
file_put_contents("data/$fromm_id/nitro.txt",(file_get_contents("data/$fromm_id/nitro.txt") - 50) );
        bot('sendmessage', [
            'chat_id' => $fromm_id,
            'text' => "تبریک
شما مخزن ۵٠ تایی نیتروژن رو مصرف و ١٠ بازدید شتاب گرفتید
۵٠ مشاهده ١٠ بازدید ✅ دریافت شد 
١٠٠ مشاهده ١٠ بازدید▫️فقط ".(100 - $nitro)." 👁‍🗨دیگر
٢٠٠ مشاهده ٢٠ بازدید▫️فقط ".(200 - $nitro)." 👁‍🗨دیگر
۵٠٠ مشاهده ۵٠ بازدید ▫️فقط ".(500 - $nitro)." 👁‍🗨دیگر
١٠٠٠ مشاهده ١٠٠ بازدید▫️فقط ".(1000 - $nitro)." 👁‍🗨دیگر
٢٠٠٠ مشاهده ٢٠٠ بازدید▫️فقط ".(2000 - $nitro)." 👁‍🗨دیگر
٣٠٠٠ مشاهده ٣٠٠ بازدید▫️فقط ".(3000 - $nitro)." 👁‍🗨دیگر",
]);
bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ 10 تا بازدید دریافت کردی",
            'show_alert' => false
    ]);
}else{
  bot('answercallbackquery',[
  'callback_query_id' =>$update->callback_query->id,
  'text' => "برای دریافت نیترو باید ".(50 - $nitro)." بازدید دیگه انجام بدی",
  'show_alert' => false
]);
}
if($nitro > "100"){
file_put_contents("data/$fromm_id/shoklat.txt",(file_get_contents("data/$fromm_id/shoklat.txt") + 10) );
file_put_contents("data/$fromm_id/nitro.txt",(file_get_contents("data/$fromm_id/nitro.txt") - 100) );
              bot('sendmessage', [
                  'chat_id' => $fromm_id,
                  'text' => "تبریک
شما مخزن ١٠٠ تایی نیتروژن رو مصرف و ١٠ بازدید شتاب گرفتید
۵٠ مشاهده ١٠ بازدید ✅ دریافت شد 
١٠٠ مشاهده ١٠ بازدید ✅ دریافت شد
٢٠٠ مشاهده ٢٠ بازدید▫️فقط ".(200 - $nitro)." 👁‍🗨دیگر
۵٠٠ مشاهده ۵٠ بازدید ▫️فقط ".(500 - $nitro)." 👁‍🗨دیگر
١٠٠٠ مشاهده ١٠٠ بازدید▫️فقط ".(1000 - $nitro)." 👁‍🗨دیگر
٢٠٠٠ مشاهده ٢٠٠ بازدید▫️فقط ".(2000 - $nitro)." 👁‍🗨دیگر
٣٠٠٠ مشاهده ٣٠٠ بازدید▫️فقط ".(3000 - $nitro)." 👁‍🗨دیگر",
]);
bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ 10 تا بازدید دریافت کردی",
            'show_alert' => false
    ]);
}else{
bot('answercallbackquery',[
  'callback_query_id' =>$update->callback_query->id,
  'text' => "برای دریافت نیترو باید ".(100 - $nitro)." بازدید دیگه انجام بدی",
  'show_alert' => false
]);  
}
if($nitro > "200"){
file_put_contents("data/$fromm_id/shoklat.txt",(file_get_contents("data/$fromm_id/shoklat.txt") + 20) );
file_put_contents("data/$fromm_id/nitro.txt",(file_get_contents("data/$fromm_id/nitro.txt") - 200) );
              bot('sendmessage', [
                  'chat_id' => $fromm_id,
                  'text' => "تبریک
شما مخزن ٢٠٠ تایی نیتروژن رو مصرف و ٢٠ بازدید شتاب گرفتید
۵٠ مشاهده ١٠ بازدید ✅ دریافت شد 
١٠٠ مشاهده ١٠ بازدید ✅ دریافت شد
٢٠٠ مشاهده ٢٠ بازدید ✅ دریافت شد
۵٠٠ مشاهده ۵٠ بازدید ▫️فقط ".(500 - $nitro)." 👁‍🗨دیگر
١٠٠٠ مشاهده ١٠٠ بازدید▫️فقط ".(1000 - $nitro)." 👁‍🗨دیگر
٢٠٠٠ مشاهده ٢٠٠ بازدید▫️فقط ".(2000 - $nitro)." 👁‍🗨دیگر
٣٠٠٠ مشاهده ٣٠٠ بازدید▫️فقط ".(3000 - $nitro)." 👁‍🗨دیگر",
]);
bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ 20 تا بازدید دریافت کردی",
            'show_alert' => false
]);
}else{
bot('answercallbackquery',[
  'callback_query_id' =>$update->callback_query->id,
  'text' => "برای دریافت نیترو باید ".(200 - $nitro)." بازدید دیگه انجام بدی",
  'show_alert' => false
]);  
}
if($nitro > "500"){
file_put_contents("data/$fromm_id/shoklat.txt",(file_get_contents("data/$fromm_id/shoklat.txt") + 50) );
file_put_contents("data/$fromm_id/nitro.txt",(file_get_contents("data/$fromm_id/nitro.txt") - 500) );
              bot('sendmessage', [
                  'chat_id' => $fromm_id,
                  'text' => "تبریک
شما مخزن ۵٠٠ تایی نیتروژن رو مصرف و ۵٠ بازدید شتاب گرفتید
۵٠ مشاهده ١٠ بازدید ✅ دریافت شد 
١٠٠ مشاهده ١٠ بازدید ✅ دریافت شد
٢٠٠ مشاهده ٢٠ بازدید ✅ دریافت شد
۵٠٠ مشاهده ۵٠ بازدید ✅ دریافت شد
١٠٠٠ مشاهده ١٠٠ بازدید▫️فقط ".(1000 - $nitro)." 👁‍🗨دیگر
٢٠٠٠ مشاهده ٢٠٠ بازدید▫️فقط ".(2000 - $nitro)." 👁‍🗨دیگر
٣٠٠٠ مشاهده ٣٠٠ بازدید▫️فقط ".(3000 - $nitro)." 👁‍🗨دیگر",
]);
bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ 50 تا بازدید دریافت کردی",
            'show_alert' => false
]);
}else{
bot('answercallbackquery',[
  'callback_query_id' =>$update->callback_query->id,
  'text' => "برای دریافت نیترو باید ".(500 - $nitro)." بازدید دیگه انجام بدی",
  'show_alert' => false
]);  
}
if($nitro > "1000"){
file_put_contents("data/$fromm_id/shoklat.txt",(file_get_contents("data/$fromm_id/shoklat.txt") + 100) );
file_put_contents("data/$fromm_id/nitro.txt",(file_get_contents("data/$fromm_id/nitro.txt") - 1000) );
              bot('sendmessage', [
                  'chat_id' => $fromm_id,
                  'text' => "تبریک
شما مخزن ١٠٠٠ تایی نیتروژن رو مصرف و ١٠٠ بازدید شتاب گرفتید
۵٠ مشاهده ١٠ بازدید ✅ دریافت شد 
١٠٠ مشاهده ١٠ بازدید ✅ دریافت شد
٢٠٠ مشاهده ٢٠ بازدید ✅ دریافت شد
۵٠٠ مشاهده ۵٠ بازدید ✅ دریافت شد
١٠٠٠ مشاهده ١٠٠ بازدید ✅ دریافت شد
٢٠٠٠ مشاهده ٢٠٠ بازدید▫️فقط ".(2000 - $nitro)." 👁‍🗨دیگر
٣٠٠٠ مشاهده ٣٠٠ بازدید▫️فقط ".(3000 - $nitro)." 👁‍🗨دیگر",
]);
bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ 100 تا بازدید دریافت کردی",
            'show_alert' => false
]);
}else{
bot('answercallbackquery',[
  'callback_query_id' =>$update->callback_query->id,
  'text' => "برای دریافت نیترو باید ".(1000 - $nitro)." بازدید دیگه انجام بدی",
  'show_alert' => false
]);  
}
if($nitro > "2000"){
file_put_contents("data/$fromm_id/shoklat.txt",(file_get_contents("data/$fromm_id/shoklat.txt") + 200) );
file_put_contents("data/$fromm_id/nitro.txt",(file_get_contents("data/$fromm_id/nitro.txt") - 2000) );
              bot('sendmessage', [
                  'chat_id' => $fromm_id,
                  'text' => "تبریک
شما مخزن ٢٠٠٠ تایی نیتروژن رو مصرف و ٢٠٠ بازدید شتاب گرفتید
۵٠ مشاهده ١٠ بازدید ✅ دریافت شد 
١٠٠ مشاهده ١٠ بازدید ✅ دریافت شد
٢٠٠ مشاهده ٢٠ بازدید ✅ دریافت شد
۵٠٠ مشاهده ۵٠ بازدید ✅ دریافت شد
١٠٠٠ مشاهده ١٠٠ بازدید ✅ دریافت شد
٢٠٠٠ مشاهده ٢٠٠ بازدید ✅ دریافت شد
٣٠٠٠ مشاهده ٣٠٠ بازدید▫️فقط ".(3000 - $nitro)." 👁‍🗨دیگر",
]);
bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ 200 تا بازدید دریافت کردی",
            'show_alert' => false
]);
}else{
bot('answercallbackquery',[
  'callback_query_id' =>$update->callback_query->id,
  'text' => "برای دریافت نیترو باید ".(2000 - $nitro)." بازدید دیگه انجام بدی",
  'show_alert' => false
]);  
}
if($nitro > "3000"){
file_put_contents("data/$fromm_id/shoklat.txt",(file_get_contents("data/$fromm_id/shoklat.txt") + 300) );
file_put_contents("data/$fromm_id/nitro.txt",(file_get_contents("data/$fromm_id/nitro.txt") - 3000) );
              bot('sendmessage', [
                  'chat_id' => $fromm_id,
                  'text' => "تبریک
شما مخزن ٣٠٠٠ تایی نیتروژن رو مصرف و ٣٠٠ بازدید شتاب گرفتید
۵٠ مشاهده ١٠ بازدید ✅ دریافت شد 
١٠٠ مشاهده ١٠ بازدید ✅ دریافت شد
٢٠٠ مشاهده ٢٠ بازدید ✅ دریافت شد
۵٠٠ مشاهده ۵٠ بازدید ✅ دریافت شد
١٠٠٠ مشاهده ١٠٠ بازدید ✅ دریافت شد
٢٠٠٠ مشاهده ٢٠٠ بازدید ✅ دریافت شد
٣٠٠٠ مشاهده ٣٠٠ بازدید ✅ دریافت شد",
]);
bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "✅ 300 تا بازدید دریافت کردی",
            'show_alert' => false
]);
	unlink("data/$fromm_id/nitro.txt");
}else{
bot('answercallbackquery',[
  'callback_query_id' =>$update->callback_query->id,
  'text' => "برای دریافت نیترو باید ".(3000 - $nitro)." بازدید دیگه انجام بدی",
  'show_alert' => false
]);  
}
}

////----
////----
if (in_array($chatid,$ADMIN) or in_array($chat_id,$ADMIN)) {
    if ($text == "⚙تنظیمات") {
        file_put_contents("data/$chat_id/saeed.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "play your",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "تنظیم آیدی کانال تبلیغ ها", 'callback_data' => "setc"]
                    ],
					[
                        ['text' => "تنظیم آیدی ارسال برترین ها توی چنل", 'callback_data' => "setc2"]
                    ],
					[
                        ['text' => "تنظیم چنل ارسال پیام های پشتیبانی", 'callback_data' => "setc3"]
                    ],
					[
                        ['text' => "تنظیم تعداد سکه به ازای هر بازدید", 'callback_data' => "setbazdid"]
                    ],
					[
                        ['text' => "تنظیم متن استارت", 'callback_data' => "setstart"]
                    ],
					[
                        ['text' => "تنظیم سکه روزانه", 'callback_data' => "setraed"]
                    ],
					[
                        ['text' => "تنظیم تعداد سکه برای آوردن هر زیر مجموعه", 'callback_data' => "setzirm"]
                    ],
					[
                        ['text' => "تنظیم آیدی خرید", 'callback_data' => "setkharid"], ['text' => "تنظیم کانال قفل 🔐", 'callback_data' => "set channel"]
                    ],
					[
                        ['text' => "تنظیم محدودیت بازدید دلخواه", 'callback_data' => "setdel"]
                    ],
					[
                        ['text' => "تنظیم محدودیت بازدید برای ثبت تبلیغ", 'callback_data' => "setbaztab"]
                    ],
                ]
            ])
        ]);


    }
	elseif ($data == "setbaztab"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setbaztab");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "تعداد بازدید در روز برای ثبت تبلیغ رو وارد کنید.",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "بازگشت 🔄", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($saeed == 'setbaztab') {
$mahdoodiat = $text - 1;
        file_put_contents("data/mahdood.txt", $mahdoodiat);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تعداد بازدید برای ثبت تبلغ به [    $mahdoodiat    ] تغییر کرد.",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } 
	elseif ($data == "set channel"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "set channel");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "ربات را ادمین کانال مورد نظر کنید و ایدی کانال رو بدون @ ارسال کنید:
برای لغو قفل کانال دستور /NotSet را بفرستید تا قفل برداشته شود!",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "بازگشت 🔄", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($saeed == 'set channel') {
        file_put_contents("data/$chat_id/saeed.txt", "No");
	if($text == "/NotSet"){
		file_put_contents("data/setchannel.txt","no");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "قفل کانال برداشته شد!",
        ]);
	}else{
		file_put_contents("data/channel4.txt","$text");
		file_put_contents("data/setchannel.txt","yes");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "قفل کانال برای @$text تنظیم شد!",
        ]);
	}
    }
	elseif ($data == "setdel"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setdel");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خب ادمین عزیز لطفا تعداد بازدید را به صورت زیر مشخص کنید👇👇

یه پیام برام بفرستید که در خط اول کمترین تعداد بازدید برای هر شخص و در خط دوم بیشترین تعداد بازدید برای هر شخص وارد شده باشد.

مثال:
5
25",
        ]);
    } elseif ($saeed == 'setdel') {
        file_put_contents("data/setdel.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تنظیم شد.",
        ]);
    }
	elseif ($data == "setkharid"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setkharid");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خب اینجا باید یه آیدی بزاری که هر کس بخواد از رباتت سکه بگیره به اون آیدی پیام بفرسته. توجه کنید کاآیدی را به همراه @ وارد کنید.",
        ]);
    } elseif ($saeed == 'setkharid') {
        file_put_contents("data/setkharid.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تنظیم شد.",
        ]);
    }
	elseif ($data == "setraed"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setraed");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خب ادمین عزیز لطفا تعداد سکه را به صورت زیر مشخص کنید👇👇

یه پیام برام بفرستید که در خط اول کمترین تعداد سکه روزانه برای هر شخص و در خط دوم بیشترین تعداد سکه برای هر شخص وارد شده باشد.

مثال:
5
25",
        ]);
    } elseif ($saeed == 'setraed') {
        file_put_contents("data/setraed.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تبریک تعداد سکه روزانه تنظیم شد.",
        ]);
    }
	elseif ($data == "setzirm"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setzirm");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خب ادمین عزیز لطفا تعداد سکه را وارد کنید.",
        ]);
    } elseif ($saeed == 'setzirm') {
        file_put_contents("data/setzirm.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تنظیم شد.",
        ]);
    }
	elseif ($data == "setraed"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setraed");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خب ادمین عزیز لطفا تعداد سکه را به صورت زیر مشخص کنید👇👇

یه پیام برام بفرستید که در خط اول کمترین تعداد سکه روزانه برای هر شخص و در خط دوم بیشترین تعداد سکه برای هر شخص وارد شده باشد.

مثال:
5
25",
        ]);
    } elseif ($saeed == 'setraed') {
        file_put_contents("data/setraed.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تبریک تعداد سکه روزانه تنظیم شد.",
        ]);
    }
	elseif ($data == "setstart"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setstart");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "متن استارت را وارد کنید.",
        ]);
    } elseif ($saeed == 'setstart') {
        file_put_contents("data/setstart.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "متن استارت تنظیم شد.",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    }
	elseif ($data == "setbazdid"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setbazi");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "تعداد سکه را وارد کنید.",
        ]);
    } elseif ($saeed == 'setbazi') {
        file_put_contents("data/setbazdid2.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تعداد $text سکه برای هر بازدید ثبت شد.",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } 
	elseif ($data == "setc3"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setc5");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "آیدی کانال را با (@) وارد کنید",
        ]);
    } elseif ($saeed == 'setc5') {
        file_put_contents("data/channel3.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "آیدی [  $text  ] با موفقیت ثبت شد",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "setc2"){
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setc4");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "آیدی کانال را با (@) وارد کنید",
        ]);
    } elseif ($saeed == 'setc4') {
        file_put_contents("data/channel2.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "آیدی [  $text  ] با موفقیت ثبت شد",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } 
    if ($text == "👤مدیریت") {
        file_put_contents("data/$chat_id/saeed.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "به پنل مدیریت خوش آمدید!",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                   [
                        ['text' => "آمار کلی و وضعیت ربات", 'callback_data' => "am"], ['text' => "☢کد رایگان", 'callback_data' => "cod free"]
                    ],
                    [
                        ['text' => "ارسال پیام به همه کاربران", 'callback_data' => "send"], ['text' => "فروارد همگانی", 'callback_data' => "fwd"]
                    ],
                    [
                        ['text' => "بلاک کردن کاربر", 'callback_data' => "pen"], ['text' => "انبلاک کاربر", 'callback_data' => "unpen"]
                    ],
                    [
                        ['text' => "بازدید اولیه کاربر", 'callback_data' => "matnstart"],['text' => "⚡️سکه همگانی", 'callback_data' => "s2a seke"]
                    ],
                    [
                        ['text' => "بازدید به کاربر", 'callback_data' => "buy"],['text' => "کسر بازدید", 'callback_data' => "buykam"]
                    ],
                  [
                        ['text' => "فیلتر کلمات", 'callback_data' => "fite"], ['text' => "پاسخ پشتیبانی", 'callback_data' => "pasokh"]
                    ],
                    [
                        ['text' => "ارسال برترین ها بر روی چنل", 'callback_data' => "rese"], ['text' => "پورسانت زیر مجموعه", 'callback_data' => "poors"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "rese"){
$kandom1 = ttoopp(0);
$kandom2 = ttoopp(1);
$kandom3 = ttoopp(2);
 //////////////////////
$member1 = top_sea(0);
$member2 = top_sea(1);
$member3 = top_sea(2);
//////////////////////
$kandom11 = file_get_contents("data/$kandom1/shoklat.txt");
$kandom22 = file_get_contents("data/$kandom2/shoklat.txt");
$kandom33 = file_get_contents("data/$kandom3/shoklat.txt");
//////////////////////
$mosak1 = file_get_contents("data/$member1/membrs.txt");
$mosak2 = file_get_contents("data/$member2/membrs.txt");
$mosak3 = file_get_contents("data/$member3/membrs.txt");
       bot('sendMessage', [
            'chat_id' => $channel2,
            'text' => "🌹سلام...
- امیدوارم حالتون خوب باشه!!!
✨خب خب خب!!!
🌙 مثل هرشب، اومدیم تا، #برترین های ویوگیرمون رو، بهتون معرفی کنیم:

➖➖➖➖➖➖➖➖

🏆برترین های[ 🤝زیرمجموعه گیری ]:
🔻➖➖➖➖➖➖➖➖
 1️⃣🥇نفر اول: 
 - کاربر $member1  با $mosak1 زیرمجموعه⚡️

 2️⃣🥈نفر دوم: 
 - کاربر $member2 با $mosak2 زیرمجموعه ⚡️

 3️⃣🥉نفر سوم: 
 - کاربر $member3 با $mosak3 زیرمجموعه⚡️
➖➖➖➖➖➖➖➖
🏆برترین های[ ✅ ثبت بازدید ]:
🔻➖➖➖➖➖➖➖➖
 1️⃣🥇نفر اول: 
 - کاربر $kandom1  با $kandom11 ثبت بازدید⚡️

 2️⃣🥈نفر دوم: 
 - کاربر $kandom2 با $kandom22 ثبت بازدید⚡️

 3️⃣🥉نفر سوم: 
 - کاربر $kandom3 با $kandom33 ثبت بازدید⚡️
➖➖➖➖➖➖➖➖

💠 #شروع دوره جدید، از همین لحظه ( 22:00امشب ) تا راس ساعت 22 فردا شب!

( توجه داشته باشید که، جوایز به صورت کاملا #اتوماتیک، و دقیقا راس ساعت 22:00 به حساب نفرات برتر واریز میشه وهیچ تاخیری در اهدای جوایز صورت نمیگیره!!! )

❤️ شما بهترین هستید! کافیه اراده داشته باشین! بدون شک #موفق میشین!!!
➖➖➖➖➖➖➖➖
● Advertisement : $channel
• information : $channel3
➖➖➖➖➖➖➖➖
🦋موفق باشید...",
        ]);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ارسال شد",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);


    } 	elseif ($data == "am") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "تعداد ممبر ها : $member_count
تعداد تبلیغات در حال انجام: $don
تعداد تبلیغات انجام شده: $enf",

            'show_alert' => true
        ]);
    } 	elseif ($data == "cod free") {
file_put_contents("data/$chatid/saeed.txt", "cod free");
file_put_contents("data/$chatid/kodomadmin.txt", "$data_first");
        bot('sendMessage', [
            'chat_id' => $chatid,
            'text' => "☢ کد مورد نظر رو وارد کنید",
        ]);
    } 	elseif ($saeed == "cod free") {
  file_put_contents("ads/code/$text.txt","false");
  file_put_contents("data/$chat_id/saeed.txt", "رعد ها");
  file_put_contents("data/$chat_id/ali.txt", "$text");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حالا تعداد سکه برای این کد را تعیین کنید.",
        ]);
    } 	elseif ($saeed == "رعد ها") {
file_put_contents("ads/coded/$ali.txt","$text");
file_put_contents("data/$chat_id/saeed.txt","none");
  bot('SendMessage',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'text'=>"کد ثبت شد.",
 ]);
  bot('SendMessage',[
    'chat_id'=>$channel2,
	'message_id'=>$message_id,
    'text'=>"آنلاین باشید میخوام کد بزارم.",
 ]);
 sleep(25);
 bot('SendMessage',[
    'chat_id'=>$channel2,
	'message_id'=>$message_id,
    'text'=>"1⃣",
 ]);
  sleep(15);
 bot('SendMessage',[
    'chat_id'=>$channel2,
	'message_id'=>$message_id,
    'text'=>"2⃣",
 ]);
  sleep(3);
 bot('SendMessage',[
    'chat_id'=>$channel2,
	'message_id'=>$message_id,
    'text'=>"3⃣",
 ]);
  sleep(5);
 bot('sendMessage',[
    'chat_id'=>$channel2,
    'text'=>"کد $text سکه ای است.",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[

			[
              ['text'=>"برای ورود به ربات کلیک کنید", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
              ['text'=>"کد ساخته شده در ساعت: ", 'url'=>"https://t.me/solar_viewbot "],['text'=>"$time", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
              ['text'=>"و در تاریخ: ", 'url'=>"https://t.me/solar_viewbot "],['text'=>"$date", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
              ['text'=>"$kodomadmin", 'url'=>"https://t.me/solar_viewbot "],['text'=>"توسط: ", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
             ['text'=>"⚜کد یکبار مصرف", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
           ['text'=>"➖➖➖➖➖➖➖➖", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
              ['text'=>"Code: ", 'url'=>"https://t.me/solar_viewbot "],['text'=>"$ali", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
			['text'=>"➖➖➖➖➖➖➖➖", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
         ['text'=>"❗️روش استفاده::", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
        ['text'=>"۱-وارد ربات @solar_viewbot  شوید.", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
        ['text'=>"۲-روی گزینه 🎁کد هدیه بزنید.", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
        ['text'=>"۳-کد رایگان $ali را وارد کنید.", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
        ['text'=>"*******************", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
        ['text'=>"🆑 @solar_viewbot", 'url'=>"https://t.me/solar_viewbot"]
    ],
	[
        ['text'=>"🤖 @solar_viewbot ", 'url'=>"https://t.me/solar_viewbot "]
    ],
	[
        ['text'=>"برای ورود به ربات کلیک کنید", 'url'=>"https://t.me/solar_viewbot "]
    ],
  ]
])
 ]);
    } elseif ($data == "send") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب پیام خودتون را برام بفرستید تا بفرستم برای کاربران (زود،تند،سریع)😑",
        ]);
    } elseif ($saeed == "send") {
        file_put_contents("data/$chat_id/saeed.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
            sendmessage($ckar, $text);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت برای همه کاربران ارسال شد",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب پیام خودتون را فروارد کنید فقط زود که حوصله ندارم😤",
        ]);
    } elseif ($saeed == 'fwd') {
        file_put_contents("data/$chat_id/saeed.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
            Forward($fakar, $chat_id, $message_id);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت فروارد شد.",
            'reply_markup' => json_encode([
               'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "pen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "pen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "فقط ایدی عددیشو بفرست تا بلاک بشه از ربات😡",
        ]);
    } elseif ($saeed == 'pen') {
        $myfile2 = fopen("data/pen.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$text\n");
        fclose($myfile2);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => " با موفقیت بلاکش کردم😤
 ایدیش هم 
 $text ",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "pasokh") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "pasokh1");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب ایدی عددی کاربر را بفرست️",
        ]);
    } elseif ($saeed == 'pasokh1') {
        file_put_contents("data/pasokh.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "pasokh2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "متن پیام خود را وارد کنید",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($saeed == 'pasokh2') {

        $pasokh = file_get_contents("data/pasokh.txt");
        file_put_contents("data/$pasokh/pasokh1.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "");
        bot('sendMessage', [
            'chat_id' => $pasokh,
            'text' => "کاربر گرامی شما یک پیام از طرف پشتیبانی دارید
            جهت مشاهده پیام به صندوق دریافت پیام مراجعه کنید",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "صندوق دریافت پیام", 'callback_data' => "daryaftpayam"]
                    ],
                ]
            ])
        ]);
        bot('sendMessage', [
                    'chat_id' => $chat_id,
            'text' => "با موفقیت فرستاده شد",
        ]);
    } elseif ($data == "unpen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "unpen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "بخشیده شد. ایدی عددیشو بدع تا انبلاکش کنم😕",
        ]);
    } elseif ($saeed == 'unpen') {
        $newlist = str_replace($text, "", $penlist);
        file_put_contents("data/pen.txt", $newlist);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "اوکی انبلاکش کردن
 ایدیش هم 
 $text ",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "matnstart") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "matnstart1");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "تعداد بازدید اولیه کاربر جدید را وارد کنید",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);

    } elseif ($saeed == 'matnstart1') {
        file_put_contents("data/matnstart.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "بازدید اولیه هر کاربر:
 
 $text 
",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);

    } 
	elseif ($data == "poors") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "poors1");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "  چه مقدار پورسانت به زیر مجموعه داده شود؟
لطفا به صورت زیر وارد کنید
برای نمونه :
20% 👈 0.2 
   ",
        ]);

    } elseif ($saeed == 'poors1') {
        file_put_contents("data/poors.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "عملیات با موفقیت انجام شد",
        ]);

    } 
    elseif ($data == "setc") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "setc");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب یوزر نیم چنل را بفرست    بدون @ بفرستید  ",
        ]);
    } elseif ($saeed == 'setc') {
        file_put_contents("data/channel.txt", "@".$text);
		file_put_contents("data/channel5.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله چنل تبلیغات این شد
 
 $text ",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    } 
	elseif ($data == "s2a seke") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
file_put_contents("data/$chatid/saeed.txt", "s2a seke1");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "⚡️ مقدار سکه مورد نظر رو وارد کنید:",
        ]);
    } elseif ($saeed == 's2a seke1') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "⚡️ مقدار سکه به زودی به همه اضافه میشود.",
            'parse_mode' => "MarkDown"
        ]);
	$all_member = fopen( "users.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
            sendmessage($user, "مقدار $text سکه از طرف مدیریت به شما اضافه شد.");
			$user = str_replace(" ",'',$user);
			$user = str_replace("\n",'',$user);
		$cn = file_get_contents('data/'.$user."/shoklat.txt");
		file_put_contents('data/'.$user."/shoklat.txt",($cn+$text) );
		}
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "⚡️ تعداد $text سکه به همه اعضا اضافه شد.",
            'parse_mode' => "MarkDown"
        ]);
file_put_contents("data/$chat_id/saeed.txt", "");
	}
	elseif ($data == "buykam") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "buykam1");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب ایدی عددی کاربر را بفرست️",
        ]);
    } elseif ($saeed == 'buykam1') {
        file_put_contents("data/buykam.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "buykam2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب  چه تعداد بازدید👁‍🗨 کسر بشه",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($saeed == 'buykam2') {
    $buy = file_get_contents("data/buykam.txt");
          $fle = file_get_contents("data/$buy/shoklat.txt");
               $getshe = $fle - $text;
                file_put_contents("data/$buy/shoklat.txt", $getshe);
        file_put_contents("data/$chat_id/saeed.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' => "کاربر گرامی
از طرف مدیریت ربات  تعداد $text بازدید از حساب شما کسر شد",
            'reply_markup' => json_encode([
                 'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
        bot('sendMessage', [
                    'chat_id' => $chat_id,
            'text' => "با موفقیت کسر شد",
            'reply_markup' => json_encode([
                 'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    }
    elseif ($data == "buy") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "♻️ Please wait ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/saeed.txt", "buy");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب ایدی عددی کاربر را بفرست️",
        ]);
    } elseif ($saeed == 'buy') {
        file_put_contents("data/buy.txt", $text);
        file_put_contents("data/$chat_id/saeed.txt", "buy2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب تعداد سکه ها چقدر باشه",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($saeed == 'buy2') {
        $buy = file_get_contents("data/buy.txt");
        $fle = file_get_contents("data/$buy/shoklat.txt");
        $getshe = $fle + $text;
        file_put_contents("data/$buy/shoklat.txt", $getshe);
        file_put_contents("data/$chat_id/saeed.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' => "‼️ کاربر گرامی
🎉 از طرف مدیریت ربات  تعداد $text سکه به حساب شما واریز شد",
            'reply_markup' => json_encode([
                 'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت فرستاده شد",
            'reply_markup' => json_encode([
                 'keyboard' => [
                    [
                        ['text' => "بازگشت"]
                    ],
                ]
            ])
        ]);
    }

}
?>
