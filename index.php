<?php
 //@Monster_Source
ini_set("log_errors" , "off");
ob_start();
define('API_KEY','451422153:AAHMrFSqRVSCRTpvLQnD3AMg7XrTs2W6QP4');
//-------------------------------
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
//-----------------------
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
mkdir("data/$from_id");
$message_id = $message->message_id;
$text1 = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$username = $message->from->username;
$admin = 422823081;
$token = "451422153:AAHMrFSqRVSCRTpvLQnD3AMg7XrTs2W6QP4";
$data = $update->callback_query->data;
$reply = $update->message->reply_to_message;
$step = file_get_contents("data/$chat_id/step.txt");
$type = file_get_contents("data/$chat_id/type.txt");
$coins = file_get_contents("data/$chat_id/coins.txt");
$create = file_get_contents("data/$chat_id/create.txt");
$frosh = file_get_contents("data/frosh.txt");
$sharzh_h1000 = file_get_contents("data/ham.txt");
$sharzh_ir300 = file_get_contents("data/iran.txt");
$type = file_get_contents("data/$chat_id/type.txt");
$number = file_get_contents("data/$chat_id/number.txt");
$code_taiid = file_get_contents("data/$chat_id/code taiid.txt");
$shoklat = file_get_contents("data/$chat_id/shoklat.txt");
$membrs = file_get_contents("data/$chat_id/membrs.txt");
$maroof =  file_get_contents("data/$from_id/maroof.txt");
$ban = file_get_contents("data/ban.txt");
$dt = "http://api.mostafa-am.ir/date-time/";
$jd_dt = json_decode(file_get_contents($dt),true);
$time=$jd_dt['time_en'];  
$dt = "http://api.mostafa-am.ir/date-time/";
$jd_dt = json_decode(file_get_contents($dt),true);
$date=$jd_dt['date_fa_num_en'];
//----------------------
$button_tiid = json_encode(['keyboard'=>[
[['text'=>'تایید حساب ویژه 💫','request_contact'=>true]],
],'resize_keyboard'=>true]);
$button_meno = json_encode(['keyboard'=>[
[['text' => "🔐 حساب کاربری 🔐"], ['text' => "🔗 لینک دعوت"]],
],'resize_keyboard'=>true]);
//------------------------
function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function ForwardMessage($chat_id,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chat_id,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
  bot('editMessagetext',[
    'chat_id'=>$chat_id,
 'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
 'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$keyboard
 ]);
 }
 function SendPhoto($chat_id, $photo, $caption = null){
	bot('SendPhoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>$caption
	]);
	}
	function objectToArrays($object){
        if (!is_object($object) && !is_array($object)) {
            return $object; }
        if (is_object($object)) {
            $object = get_object_vars($object);}
        return array_map("objectToArrays", $object);}
//------------------
$timing = date("Y-m-d-h-i-sa");
$timing = str_replace("am","",$timing);
$timing = str_replace("pm","",$timing);

$metti_khan = file_get_contents("check/$timing-$from_id.txt");
$timing_spam = $metti_khan+1;
file_put_contents("check/$timing-$from_id.txt","$timing_spam");

$metti_khan2 = file_get_contents("check/$timing-$from_id.txt");
if($metti_khan2 >= 5){
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کاربر عزیز شما از ربات بلاک شدید🚫",
'reply_markup'=>json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true])
]);
  return false;
$banlis = file_get_contents('data/ban.txt');
            $bmem = explode("\n", $banlis);
            if (!in_array($from_id, $bmem)) {
            $add_block = file_get_contents('data/ban.txt');
            $add_block .= $from_id . "\n";
            file_put_contents('data/ban.txt', $add_block);
            }

}
	elseif($text1=="/start" or $text1=="بازگشت 🔙"){
    if (file_exists("data/$from_id/step.txt")) {
      bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "سلام 😉 [$first_name](tg://user?id=$chat_id)
  
به ربات شارژگرام خوش امدید🌹

از طریق این ربات میتوانید با دعوت دوستانتان به ربات زیر مجموعه گیری کنید و به وسیله زیر مجموعه ها شارژ رایگان دریافت کنید😍

از دکمه های زیر استفاده کن 🔻",
'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "🔐 حساب کاربری 🔐"], ['text' => "🔗 لینک دعوت"]],
[['text' => "دریافت شارژ 📲"], ['text' => "✨ثبت معرف✨"]]
],
"resize_keyboard"=>true,
])
]);
}  
    else{
        mkdir("data/$from_id");
        file_put_contents("data/$chat_id/membrs.txt", "0");
            file_put_contents("data/$chat_id/shoklat.txt", "1");
			file_put_contents("data/$chat_id/type.txt", "free");
			file_put_contents("data/$chat_id/step.txt", "no");
			file_put_contents("data/$from_id/maroof.txt","none");
			file_put_contents("data/$chat_id/number.txt", "");
			file_put_contents("data/$chat_id/code taiid.txt", "");
         $myfile2 = fopen("data/user.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$chat_id\n");
        fclose($myfile2);   
        SendMessage($chat_id,"اطلاعات حساب کاربری شما با موفقیت در سیستم ثبت گردید !
جهت ادامه کار در ربات یکبار دیگر بروی /start کلیک کنید ✔️");
    }
}
elseif (strpos($ban , "$from_id") !== false) {
	return false;
	}
	elseif (strpos($ban , "$from_id") !== false) {
	return false;
	}
	elseif ($from_id != $chat_id and $chat_id != $ADMIN1) {
	LeaveChat($chat_id);
	}
	elseif (strpos($penlist , "$from_id") !== false  ) {
	bot('Sendmessage',[
'chat_id'=>$ban,
'text'=>"کاربر عزیز شما از ربات بلاک شدید🚫",
'reply_markup'=>json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true])
]);
  return false;
 }
elseif($update->message->contact and $number == null){
  file_put_contents("data/$chat_id/number.txt",$update->message->contact->phone_number);
  bot("forwardMessage",['chat_id' =>$admin,'from_chat_id'=>$chat_id,'message_id' => $message_id]);
  bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "سلام 😉 [$first_name](tg://user?id=$chat_id)
  
به ربات شارژگرام خوش امدید🌹

از طریق این ربات میتوانید با دعوت دوستانتان به ربات زیر مجموعه گیری کنید و به وسیله زیر مجموعه ها شارژ رایگان دریافت کنید😍

از دکمه های زیر استفاده کن 🔻",
'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "🔐 حساب کاربری 🔐"], ['text' => "🔗 لینک دعوت"]],
[['text' => "دریافت شارژ 📲"], ['text' => "✨ثبت معرف✨"]]
],
"resize_keyboard"=>true,
])
]);
  }
elseif($number == null){
	bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "حتما باید شمارتونو تایید کنید 💉",
'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'تایید حساب ویژه 💫','request_contact'=>true]],
],
"resize_keyboard"=>true,
])
]);
}
elseif($text1 == "✨ثبت معرف✨" && $maroof == "ok"){
     file_put_contents("data/$from_id/step.txt","none");
   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما یک مرتبه شناسه معروف خود را وارد کرده اید✨",
 'parse_mode'=>"MarkDown",
	 ]);
}
elseif($text1 == "✨ثبت معرف✨" && $maroof == "none"){
     file_put_contents("data/$from_id/step.txt","sabtem");
   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"اگر ربات از طرف کسی به شما معرفی شده لطفا کد معروف فرد را وارد کنید تا هم شما و هم فرد سکه بگیرید : (کد معروف همان شناسه عددی است)🔥
کد معروف شما : 
$from_id 💎

در صورتی که قصد انجام این کار ربات ندارید دستور /start را ارسال کنید✨",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true])
	 ]);
}
elseif($step == "sabtem"){
    $text2 = $message->text;
    $txxt = file_get_contents('data/user.txt');
$pmembersid= explode("\n",$txxt);
if(!in_array($text2,$pmembersid)){
    bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر مورد نظرهنوز ربات را استارت نکرده است📛",
 'parse_mode'=>"MarkDown",
	 ]);
	 file_put_contents("data/$from_id/step.txt","none");
	   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"به منوی اصلی برگشتیم",
 'parse_mode'=>"HTML",
  'reply_markup'=>json_encode([
    'keyboard'=>[
   [['text' => "🔐 حساب کاربری 🔐"], ['text' => "🔗 لینک دعوت"]],
[['text' => "دریافت شارژ 📲"], ['text' => "✨ثبت معرف✨"]]
	],
		"resize_keyboard"=>true,
	 ])
	 ]);
}
if($text2 == $from_id){
    bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما نمیتوانید شناسه خود را ثبت کنید !⚠️",
 'parse_mode'=>"MarkDown",
	 ]);
	 file_put_contents("data/$from_id/step.txt","none");
	   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"به منوی اصلی برگشتیم",
 'parse_mode'=>"HTML",
  'reply_markup'=>json_encode([
    'keyboard'=>[
  [['text' => "🔐 حساب کاربری 🔐"], ['text' => "🔗 لینک دعوت"]],
[['text' => "دریافت شارژ 📲"], ['text' => "✨ثبت معرف✨"]]
	],
		"resize_keyboard"=>true,
	 ])
	 ]);
}else{
         $shoklat = file_get_contents("data/$from_id/shoklat.txt");
          settype($shoklat,"integer");
          $newshoklt = $shoklat + 1;
          save("data/$from_id/shoklat.txt",$newshoklt);
     SendMessage($chat_id,"کد معروف ثبت شد و مقدار 1 سکه به شما افزوده شد🌹
جهت ادامه ربات را استارت کنید!");
SendMessage($text2,"یک کاربر شناسه معروف شما رو ثبت کرد!");
$shoklat = file_get_contents("data/$text2/shoklat.txt");
		  settype($shoklat,"integer");
          $newshokltn = $shoklat + 1;
          save("data/$text2/shoklat.txt",$newshokltn);
		  $membrs = file_get_contents("data/$text2/membrs.txt");
		  settype($membrs,"integer");
          $newmembrsn = $membrs + 1;
          save("data/$text2/membrs.txt",$newmembrsn);
		  file_put_contents("data/$text2/membrs.txt",$membrs+1);
file_put_contents("data/$from_id/maroof.txt","ok");
file_put_contents("data/$from_id/step.txt","none");
    bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"به منوی اصلی برگشتیم",
 'parse_mode'=>"HTML",
  'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text' => "🔐 حساب کاربری 🔐"], ['text' => "🔗 لینک دعوت"]],
[['text' => "دریافت شارژ 📲"], ['text' => "✨ثبت معرف✨"]] 
	],
		"resize_keyboard"=>true,
	 ])
	 ]);
}}

elseif($text1 =="دریافت شارژ 📲" or $text1 == "بازگشت"){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"لطفا اپراتور خود را انتخاب کنید 😃👇",
 'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "ایرانسل⭐️"], ['text' => "همراه اول🗳"]],
[['text' => "بازگشت 🔙"]]
],
"resize_keyboard"=>true,
])
]);
}  
if ($text1 == "🔗 لینک دعوت") {
		bot('sendPhoto',[
        'chat_id'=>$update->message->chat->id,
        'photo'=>"http://s8.picofile.com/file/8323321892/IMG_20180409_172842_040.jpg",
        'caption'=>"ربات شارژ رایگان 📣 شارژ رایگان 📣
  
🎉 با ربات شارژگرام میتونی یک عامله شارژ رایگان دریافت کنی با دعوت دوستات به ربات این عالیه 🎉

🔗 لینک ورود به ربات :

t.me/SharjGramRBot?start=$chat_id",
        ]);
	bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "📍 بنر بالا حاوی لینک دعوت شماست ان را برای دوستانتان ارسال کنید و با دعوت هر نفر زیر مجموعه های خود را افزایش دهید",
'reply_to_message_id'=>$message_id,
]); 
}
elseif($text1 =="ایرانسل⭐️"){
	if ($shoklt > 10){
        file_put_contents("data/$chat_id/step.txt", "iran");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "شماره خود را ارسال کنید!",
            'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "بازگشت 🔙"]]
],
"resize_keyboard"=>true,
])
        ]);
    }else{
		bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "⛔️موجودی شما کافی نمیباشد",
            'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "بازگشت 🔙"]]
],
"resize_keyboard"=>true,
])
        ]);
    }
}
if($text1 && $step == "iran"){
	file_put_contents("data/frosh.txt",$frosh+1);
	file_put_contents("data/$chat_id/shoklat.txt",$shoklt-10);
    file_put_contents("data/$chat_id/step.txt","no");
	bot("forwardMessage",['chat_id' =>$admin,'from_chat_id'=>$chat_id,'message_id' => $message_id]);
	bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "در خواست شما ثبت شد ❗️❗️
تا دقایق دیگر شارژ شما بصورت مستقیم ارسال خواهد شد❗️
و از طریق همین ربات اعلام خواهد شد⚠️",
        'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "🔐 حساب کاربری 🔐"], ['text' => "🔗 لینک دعوت"]],
[['text' => "دریافت شارژ 📲"], ['text' => "✨ثبت معرف✨"]]
],
"resize_keyboard"=>true,
])
]);
$tedad_sharj = file_get_contents("data/$chat_id/tedad-sharj.txt");
    if ($tedad_sharj == null){
        file_put_contents("data/$chat_id/tedad-sharj.txt","0");
    }
    file_put_contents("data/$chat_id/tedad-sharj.txt",$tedad_sharj+1);
	bot('sendMessage', [
        'chat_id' => $admin,
        'text' => "⚠️ یک درخواست شارژ ایرانسل با شماره [` $text1 `] موجود است",
        'parse_mode' => "MarkDown",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "درخواست انجام شد", 'url' => "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=✅ درخواست شارژ برای شماره [ $text1 ] با موفقیت انجام شد%0Aهم اکنون شارژ واریز شده"]
                ]
            ]
        ])
    ]);
}

elseif($text1 =="همراه اول🗳"){
	if ($shoklt > 10){
        file_put_contents("data/$chat_id/step.txt", "ham");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "شماره خود را ارسال کنید!",
            'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "بازگشت 🔙"]]
],
"resize_keyboard"=>true,
])
        ]);
    }else{
		bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "⛔️موجودی شما کافی نمیباشد",
            'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "بازگشت 🔙"]]
],
"resize_keyboard"=>true,
])
        ]);
    }
}
if($text1 && $step == "ham"){
	file_put_contents("data/frosh.txt",$frosh+1);
	file_put_contents("data/$chat_id/shoklat.txt",$shoklt-10);
    file_put_contents("data/$chat_id/step.txt","no");
	bot("forwardMessage",['chat_id' =>$admin,'from_chat_id'=>$chat_id,'message_id' => $message_id]);
	bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "در خواست شما ثبت شد ❗️❗️
تا دقایق دیگر شارژ شما بصورت مستقیم ارسال خواهد شد❗️
و از طریق همین ربات اعلام خواهد شد⚠️",
        'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "🔐 حساب کاربری 🔐"], ['text' => "🔗 لینک دعوت"]],
[['text' => "دریافت شارژ 📲"], ['text' => "✨ثبت معرف✨"]]
],
"resize_keyboard"=>true,
])
]);
$tedad_sharj = file_get_contents("data/$chat_id/tedad-sharj.txt");
    if ($tedad_sharj == null){
        file_put_contents("data/$chat_id/tedad-sharj.txt","0");
    }
    file_put_contents("data/$chat_id/tedad-sharj.txt",$tedad_sharj+1);
	bot('sendMessage', [
        'chat_id' => $admin,
        'text' => "⚠️ یک درخواست شارژ همراه اول با شماره **[ $number ]** موجود است",
        'parse_mode' => "MarkDown",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "درخواست انجام شد", 'url' => "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=✅ درخواست شارژ برای شماره [ $text1 ] با موفقیت انجام شد%0Aهم اکنون شارژ واریز شده"]
                ]
            ]
        ])
    ]);
}
elseif($text1 =="🔐 حساب کاربری 🔐"){
	$sklat = file_get_contents("data/$chat_id/shoklat.txt");
$mems = file_get_contents("data/$chat_id/membrs.txt");
	bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
		        ایدی عددی شما : $chat_id
        تعداد الماس های شما💎 : $sklat
        زیرمجموعه شما : $mems",
        'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
]);
}
	
//---------
	if($text1 == "مدیریت" && $chat_id == $admin){
	  bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ادمین عزیز به پنل مدیریت ربات خوش آمدید💎",
  'reply_markup'=>json_encode([
                    'keyboard'=>[
  [['text'=>"آمار ربات 📊"],['text'=>"ارسال ✅"]],
  [['text'=>"فروارد💠"],['text'=>"مسدود کردن کاربر⛔️"]],
  [['text'=>"بازگشت 🔙"],['text'=>"گرفتن شماره کاربر 🙄🖕"]]
	],
		"resize_keyboard"=>true,
	 ])
	 ]);
	    }
		/*
نوشته شده توسط
@DevAmirH
@WorldSource
روش و کپی سورس به نام خودتان شرعا حرام است و نویسنده سورس راضی به این کار نمیباشد
*/
		if($text1 == "مسدود کردن کاربر⛔️" && $from_id == $admin){
file_put_contents("data/$from_id/step.txt","banuser");
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"آیدی عددی فرد را برای مسدود کردن از ربات ارسال کنید",
 'parse_mode'=>"HTML",
	 ]);
}
if($text1 && $from_id == $admin && $step == "banuser"){
	if (file_exists("data/$text1/step.txt")) {
	 file_put_contents("data/$chat_id/step.txt","none");
         $myfile2 = fopen("data/ban.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر <a href='tg://user?id=$text1'>$text1</a> با موفقیت در ربات شما مسدود شد",
 'parse_mode'=>"HTML",
	 ]);
	 bot('sendMessage',[
 'chat_id'=>$text1,
 'text'=>"شما توسط مدیر از ربات مسدود شدید",
 'parse_mode'=>"HTML",
	 ]);
		}
		}
		elseif($text1=="فروارد💠" && $chat_id == $admin ){           
     file_put_contents("data/$chat_id/step.txt","f2all");
      bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"برای فروارد به همه اعضا لطفا پیام خود را فروارد کنید💣",
 'parse_mode'=>"MarkDown",
  ]);
}  
elseif($chat_id == $admin && $step == "f2all" ){  
    file_put_contents("data/$chat_id/step.txt","none");
    $all_member = fopen( "data/user.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
ForwardMessage($user,$admin,$message_id);
		}    
		}
	elseif($text1=="ارسال ✅" && $chat_id == $admin ){           
     file_put_contents("data/$chat_id/step.txt","send2all");
      bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"برای ارسال به همه اعضا لطفا پیام خود را ارسال کنید💣",
 'parse_mode'=>"MarkDown",
  ]);
}  
elseif($chat_id == $admin && $step == "send2all" ){  
    file_put_contents("data/$chat_id/step.txt","none");
    $all_member = fopen( "data/user.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
 			 bot('sendMessage',[
 'chat_id'=>$user,
 'text'=>$text1,
 'parse_mode'=>"MarkDown",
  ]);
}  }
	    elseif($text1=="آمار ربات 📊" && $chat_id == $admin ){ 
   $txtt = file_get_contents('data/user.txt');
    $member_id = explode("\n",$txtt);
    $amar = count($member_id) -1;
	$frosh = file_get_contents("data/frosh.txt");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"تعداد اعضای ربات ♥️: $amar
تعداد شارژ های گرفته شده :  $frosh",
 'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
]);
}  
elseif($text1=="گرفتن شماره کاربر 🙄🖕" && $chat_id == $admin ){
	file_put_contents("data/$chat_id/step.txt","getnum");
      bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"آیدی عددی کاربر رو ارسال کن 😃✋️",
 'parse_mode'=>"MarkDown",
  ]);
}  elseif($chat_id == $admin && $step == "getnum" ){ 
file_put_contents("data/$chat_id/step.txt","none");
 $numbbeerr = file_get_contents("data/$text1/number.txt");
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شماره کاربر [$text1](tg://user?id=$text1)  با موفقیت پیدا شد!😌
شمارش : $numbbeerr
 ",
 'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
]);
}  
unlink("error_log");
/*
:0
*/
?>
