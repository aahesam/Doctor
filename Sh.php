<?php

define('API_KEY','[*[*TOKEN*]*]');
$admin = "[*[*ADMIN*]*]";
$admin2 = file_get_contents("data/admin2.txt");
function makereq($method,$datas=[])
    {$url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch))
  {var_dump(curl_error($ch));}
    else
  {return json_decode($res);}
    }
function apiRequest($method, $parameters)
    {if (!is_string($method))
    {error_log("Method name must be a string\n");
    return false;}
    if (!$parameters) {
    $parameters = array();}
  else if (!is_array($parameters))
  {error_log("Parameters must be an array\n");
    return false;}
  foreach ($parameters as $key => &$val)
  {if (!is_numeric($val) && !is_string($val))
  {$val = json_encode($val);}
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
    }
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
mkdir = ("data");
mkdir = ("btn");
mkdir = ("lock");
$chat_id = $update->message->chat->id;
$mossage_id = $update->message->message_id;
$from_id = $update->message->from->id;
$username = $update->message->from->username;
$msg_id = $update->message->message_id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
@$usm = file_get_contents("data/users.txt");
@$spep = file_get_contents("data/user/$chat_id/spep.txt");
$step = file_get_contents("step.txt");
@$members = file_get_contents('data/users.txt');
@$ban = file_get_contents('banlist.txt');
@$vaze = file_get_contents("data/user/$chat_id/lock.txt");
@$trew = file_get_contents("lock/idkanal.txt");
@$tmaew = file_get_contents("lock/matnkanal.txt");
$chanell = '@Dandeeh5';
@$lart = file_get_contents('lock/vaze.txt');
@$kanalp = file_get_contents('lock/vazekanal.txt');
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot486510954:AAH81BElkVarnokeGU4EpQL7MRdpHayBTk4/getChatMember?chat_id=$trew&user_id=".$from_id));
$tch = $truechannel->result->status;


 $stre = file_get_contents("data/start.txt");
function SendMessage($ChatId, $TextMsg)
{
makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function sendphoto($Chat_id, $photo, $caption){
	makereq('sendphoto',[
	'chat_id'=>$Chat_id,
	'photo'=>$photo,
	'caption'=>$caption,
	'parse_mode'=>"MarkDown"
	]);
	}
	
	function sendany($Chat_id,$photo, $caption){
	makereq('sendphoto',[
	'chat_id'=>$Chat_id,
	'text'=>$TextMsg,
	'photo'=>$photo,
	
	'caption'=>$caption,
	'parse_mode'=>"MarkDown"
	]);
	}
function getChatMembersCount($chat_id){
  $up = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChatMembersCount?chat_id='.$chat_id),true);
  if($up['ok'] == false){
	  return false;
  }
  else{
  $result = $up['result'];
return $result;
}
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
if (strpos($ban , "$chat_id") !== false  ) {
SendMessage($chat_id,"شما از سرور مسدود شده اید
درصورت اشتباه به مدیریت گزارش دهید","html","true",$button_remove);
return;
}
	
	
elseif(isset($update->callback_query))
{$callbackMessage = '';var_dump(makereq('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,'text'=>$callbackMessage]));
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
if (strpos($data, "del") !== false )
{$newlist = str_replace($unsttart,"","");
save("sfart.txt",$newlist);
var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"متن استارت با موفقیت پاک شد ، دستور /panel را ارسال کنید",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/phpyar"]]]
                            ])
]                )
        );
}
else{var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"خطا",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/phpyar"]]]
                            ])
]                    )
             );
   }
}
elseif ($from_id != $chat_id) {
		
	SendMessage($chat_id,"من اجازه ورود به گروه را ندارم!
بای😐👋");
makereq('leaveChat',[
	'chat_id'=>$chat_id
	]);
	}
	
	
if($kanalp == "ok" && $tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"$tmaew","html","true",$button_remove);
	
  return;
}

	



	
	




elseif ($textmessage == '/start')
{    
	mkdir("data/user/$chat_id");
	$bory = file_get_contents("data/btnlist.txt");
$ttx = explode("\n",$bory);
 $rt=[[['text'=>"ارسال نظر"]]];
 for ($po=0;$po<=count($ttx);$po++){
    $name = $ttx["$po"];
    $rt[] = [['text'=>"$name"]]; }
$sttart = file_get_contents('sfart.txt');
if ($lart == "ok" && $vaze == "")
{SendMessage($chat_id,"ربات توسط ادمین قفل شده
با ارسال /on
و سپس کد ورود ربات را فعال کنید
","html","true",$button_remove);
return;
}

if ($sttart == "")
{SendMessage($chat_id,"کاربر گرامی این سرویس توسط «جهان سورس» طراحی شده
برای نمایش دکمه های ربات وارد پنل ادمین شوید و از بخش مدیریت متن ها -متن استارت
را تعیین کنید
برای اینکار وارد پنل ادمین شوید 
/panel
حتما اول این متن راتغییر دهید
و گرنه دکمه های ربات نمایش داده نمیشود
");
return;
}

var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"$sttart",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
        'keyboard'=>$rt
,'resize_keyboard'=>true
])
    ]));
 

}



	
	elseif ($textmessage == 'پاسخ خودکار' && $from_id == $admin | $from_id == $admin2) {

		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"یکی از گزینه های زیر را انتحاب کنید :",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'اضافه کردن کلمه'],['text'=>'حذف']
                ],
                [
                   ['text'=>'اضافه کردن عکس']
                   ],
                   [
                   ['text'=>'مشاهده کلمه ها'],['text'=>'حذف کلی کلمه ها']
                   ],
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
	}


elseif ($textmessage == 'اضافه کردن کلمه' && $from_id == $admin | $from_id == $admin2) {
				save("step.txt","set word");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کلمه ای که میخواهید به آن جواب داده شود را ارسال کنید

برای مثال `سلام`
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	
	elseif ($step == 'set word') {
		save("step.txt","set answer");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"در جواب کلمه چه ارسال شود؟
مثال:
`سلام،خوبی؟`",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keybord'=>true
       		])
    		]));
			save("words/$textmessaage.txt","Tarif Nashode !");
			save("last_word.txt",$textmessage);
	}
	elseif ($step == 'set answer') {
		save("step.txt","none");
		
		$last = file_get_contents("last_word.txt");
			$myfile2 = fopen("data/wordlist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$last\n");
			fclose($myfile2);
			save("data/words/$last.txt","$textmessage");
		
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت ذخیره شد
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'اضافه کردن کلمه'],['text'=>'حذف']
                ],
                [
                   ['text'=>'اضافه کردن عکس']
                   ],
                   [
                   ['text'=>'مشاهده کلمه ها'],['text'=>'حذف کلی کلمه ها']
                   ],
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
	elseif ($textmessage == 'دکمه فیدخوان' && $from_id == $admin | $from_id == $admin2) {
				save("step.txt","set rssbt");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"نام دکمه را وارد کنید
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	
	elseif ($step == 'set rssbt') {
		save("step.txt","set rsslink");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"لینک rss را ارسال کنید",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keybord'=>true
       		])
    		]));
			save("rss/$textmessaage.txt","Tarif Nashode !");
			save("last_btn.txt",$textmessage);
	}
	elseif ($step == 'set rsslink') {
		save("step.txt","none");
		
		$last = file_get_contents("last_btn.txt");
			$myfile2 = fopen("data/btnlist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$last\n");
			fclose($myfile2);
			save("data/rss/$last.txt","$textmessage");
		
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت ذخیره شد
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
	elseif (file_exists("data/rss/$textmessage.txt")) {
		$jij = file_get_contents("data/rss/$textmessage.txt");
		$content = file_get_contents("$jij");
    $x = new SimpleXmlElement($content);
      foreach($x->channel->item as $entry){
       $l = $entry->link;
      $t = $entry->title;
SendMessage($chat_id,"[$t]($l)");
}
	}
	
	elseif ($textmessage == 'مشاهده کلمه ها' && $from_id == $admin | $from_id == $admin2)
{
$key = file_get_contents("data/wordlist.txt");
$ex = explode("\n",$key);
 $t=[[['text'=>"منوی اصلی"]]];
 for ($i=0;$i<=count($ex);$i++){
    $name = $ex["$i"];
    $t[] = [['text'=>"$name"]]; }

if ($key == "")
{SendMessage($chat_id,"هیچ دستوری ذخیره نشده
");
return;
}

var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"
تمام کلمه های سیو شده
",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
        'keyboard'=>$t

])
    ]));
 }
 
 elseif ($textmessage == 'مدیریت دکمه ها' && $from_id == $admin | $from_id == $admin2) {

		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"یکی از گزینه های زیر را انتحاب کنید :",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'اضافه کردن دکمه'],['text'=>'حذف دکمه']
                ],
                   [
                   ['text'=>'مشاهده دکمه ها'],['text'=>'حذف کلی دکمه ها']
                   ],
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
	}
	
	elseif ($textmessage == 'اضافه کردن دکمه' && $from_id == $admin | $from_id == $admin2) {
mkdir("data/btn");
	mkdir("data/rss");
	mkdir("data/photobtn");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"یکی از گزینه های زیر را انتحاب کنید :
دکمه متنی : پاسخوزبات به صورت متن
دکمه عکس : پاسخ به صورت عکس
دکمه فید خوان : پاسخ به صورت feed
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'دکمه متنی'],['text'=>'دکمه عکس']
                ],
                   [
                   ['text'=>'دکمه فیدخوان'],['text'=>'دکمه اسپم']
                   ],
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
	}

elseif ($textmessage == 'دکمه متنی' && $from_id == $admin | $from_id == $admin2) {
				save("step.txt","set txtbt");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"نام دکمه را وارد کنید
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	
	elseif ($step == 'set txtbt') {
		save("step.txt","set txtans");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"پاسخ را اضافه کنید
باید به صورت متن باشد",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keybord'=>true
       		])
    		]));
			save("btn/$textmessaage.txt","Tarif Nashode !");
			save("last_btn.txt",$textmessage);
	}
	elseif ($step == 'set txtans') {
		save("step.txt","none");
		
		$last = file_get_contents("last_btn.txt");
			$myfile2 = fopen("data/btnlist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$last\n");
			fclose($myfile2);
			save("data/btn/$last.txt","$textmessage");
		
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت ذخیره شد
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
	elseif (file_exists("data/btn/$textmessage.txt")) {
		SendMessage($chat_id,file_get_contents("data/btn/$textmessage.txt"));
		
	}
	elseif ($textmessage == 'دکمه عکس' && $from_id == $admin | $from_id == $admin2) {
				save("step.txt","set pxtbt");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"نام دکمه را وارد کنید
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	
	elseif ($step == 'set pxtbt') {
		save("step.txt","set pxtans");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"لینک عکس را وارد کنید
حتما لینک مستقیم
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keybord'=>true
       		])
    		]));
			save("btn/$textmessaage.txt","Tarif Nashode !");
			save("last_btn.txt",$textmessage);
	}
	elseif ($step == 'set pxtans') {
		save("step.txt","none");
		
		$last = file_get_contents("last_btn.txt");
			$myfile2 = fopen("data/btnlist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$last\n");
			fclose($myfile2);
			save("data/btnphoto/$last.txt","$textmessage");
		
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت ذخیره شد
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
	elseif (file_exists("data/btnphoto/$textmessage.txt")) {
		
		Sendany($chat_id,file_get_contents("data/btnphoto/$textmessage.txt"),"");
	}
	
	elseif ($textmessage == 'حذف' && $from_id == $admin | $from_id == $admin2) {
				save("step.txt","del words");

		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کلمه مورد نظر را برای حذف کردن وارد کنید :",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	elseif($step == "del words") {
			unlink("data/words/$textmessage.txt");
			var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"`حذف شد.`
یک گزینه را انتخاب کنید :
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'اضافه کردن کلمه'],['text'=>'حذف']
                ],
                [
                   ['text'=>'اضافه کردن عکس']
                   ],
                   [
                   ['text'=>'مشاهده کلمه ها'],['text'=>'حذف کلی کلمه ها']
                   ],
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
			save("step.txt","none");
	}
	elseif (file_exists("data/words/$textmessage.txt")) {
		SendMessage($chat_id,file_get_contents("data/words/$textmessage.txt"));
		
	}
	elseif ($textmessage == 'حذف کلی دکمه ها' && $from_id == $admin | $from_id == $admin2){

	unlink("data/btnlist.txt");
	unlink("data/btn");
	unlink("data/rss");
	unlink("data/photobtn");
	SendMessage($chat_id,"

پاک شدند 
");
	}
	elseif ($textmessage == 'اضافه کردن عکس' && $from_id == $admin | $from_id == $admin2) {
				save("step.txt","set wrd");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"کلمه ای که میخواهید به آن جواب داده شود را ارسال کنید

برای مثال `سلام`
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	
	elseif ($step == 'set wrd') {
		save("step.txt","set aswer");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"لینک عکس رو ارسال کنید تا ذخیره شود",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keybord'=>true
       		])
    		]));
			save("wrds/$textmessaage.txt","Tarif Nashode !");
			save("last_word.txt",$textmessage);
	}
	elseif ($step == 'set aswer') {
		save("step.txt","none");
		
		$last = file_get_contents("last_word.txt");
			$myfile2 = fopen("data/wordlist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$last\n");
			fclose($myfile2);
			save("data/wrds/$last.txt","$textmessage");
		
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت ذخیره شد
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				[
                   ['text'=>'اضافه کردن کلمه'],['text'=>'حذف']
                ],
                [
                   ['text'=>'اضافه کردن عکس']
                   ],
                   [
                   ['text'=>'مشاهده کلمه ها'],['text'=>'حذف کلی کلمه ها']
                   ],
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
	elseif (file_exists("data/wrds/$textmessage.txt")) {
		
		Sendany($chat_id,file_get_contents("data/wrds/$textmessage.txt"),"");
	}
	

 
 

	elseif ($textmessage == 'حذف کلی کلمه ها' && $from_id == $admin | $from_id == $admin2){

	unlink("data/wordlist.txt");
	unlink("data/wrds");
	unlink("data/words");
	SendMessage($chat_id,"

پاک شدند 
");
	}

	
 elseif ($textmessage == 'بازگشت')
{
save("data/user/$chat_id/spep.txt","");
	$bory = file_get_contents("data/btnlist.txt");
$ttx = explode("\n",$bory);
 $rt=[[['text'=>"ارسال نظر"]]];
 for ($po=0;$po<=count($ttx);$po++){
    $name = $ttx["$po"];
    $rt[] = [['text'=>"$name"]]; }
$sttart = file_get_contents('sfart.txt');
if ($lart == "ok" && $vaze == "")
{SendMessage($chat_id,"ربات توسط ادمین قفل شده
با ارسال /on
و سپس کد ورود ربات را فعال کنید
","html","true",$button_remove);
return;
}
if ($sttart == "")
{SendMessage($chat_id,"کاربر گرامی این سرویس توسط «جهان سورس» طراحی شده
برای نمایش دکمه های ربات وارد پنل ادمین شوید و از بخش مدیریت متن ها -متن استارت
را تعیین کنید
برای اینکار وارد پنل ادمین شوید 
/panel
حتما اول این متن راتغییر دهید
و گرنه دکمه های ربات نمایش داده نمیشود
");
return;
}

var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"$sttart",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
        'keyboard'=>$rt
,'resize_keyboard'=>true
])
    ]));
 }
 
	elseif ($textmessage == 'مشاهده دکمه ها' && $from_id == $admin | $from_id == $admin2)
{
$key = file_get_contents("data/btnlist.txt");
$ex = explode("\n",$key);
 $t=[[['text'=>"منوی اصلی"]]];
 for ($i=0;$i<=count($ex);$i++){
    $name = $ex["$i"];
    $t[] = [['text'=>"$name"]]; }

if ($key == "")
{SendMessage($chat_id,"هیچ دستوری ذخیره نشده
");
return;
}

var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"
تمام دکمه های ذخیره شده
",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
        'keyboard'=>$t

])
    ]));
 }
 

 elseif ($textmessage == 'مدیریت متن ها')
if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"سلام به بخش ویرایش متن ها خوش آمدید
برای ویرایش هر متن از دکمه ها استفاده کنید

راهنما: 
متن استارت - متن استارت را تغییر میدهد

دستور اشتباه- وقتی کاربر متن اشتباهی ارسال میکند

",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"متن استارت"],['text'=>"دستور اشتباه"]
              ],
              [
                ['text'=>"پاسخ خودکار"],['text'=>"بزودی"]
              ],
              [
                ['text'=>"بزودی"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($textmessage == 'مدیریت کاربران') if ($from_id == $admin | $from_id == $admin2)
{

var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"بخش مدیریت کاربران",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"بلاک"],['text'=>"آن بلاک"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ],
            'resize_keyboard'=>true
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($textmessage == 'آن بلاک فوری' && $from_id == $admin | $from_id == $admin2)
{
$bku = file_get_contents("banlist.txt");
$adr = explode("\n",$bku);
 $tii=[[['text'=>"منوی اصلی"]]];
 for ($i=0;$i<=count($adr);$i++){
    $name = $adr["$i"];
    $tii[] = [['text'=>"/unban $name"]]; }

if ($bku == "")
{SendMessage($chat_id,"کاربری بلاک نیست
");
return;
}

var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"
برای آنبلاک کاربران روی دکمه ها کلیک کنید
",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
        'keyboard'=>$tii

])
    ]));
 }
elseif ($textmessage == 'آن بلاک') if ($from_id == $admin | $from_id == $admin2){
	
	SendMessage($chat_id,"برای آن بلاک ایدی عددی فرد رو بعد از
/unban
ارسال کنید
مثلا
/unban 577678");
 

	}
	else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif($textmessage == 'ارسال نظر')
{
file_put_contents("data/user/$chat_id/spep.txt","feedback");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"نظر خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"بازگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($spep == 'feedback')
{
save("spep.txt","none");
$feed = $textmessage;
SendMessage($admin,"یک نظر جدید📜\n\n-کاربر `$from_id`🍿\n\n-آیدی `@$username`🎨\n\n`📋متن نظر : $textmessage`");
SendMessage($chat_id,"ارسال شد.");
}

elseif($textmessage == 'ارسال به کاربر') if ($from_id == $admin | $from_id == $admin2)
{
file_put_contents("step.txt","ioio");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"پیام خود را در قالب متن ارسال کنید",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"منوی اصلی"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}


elseif ($step == 'ioio')
{$udg = $textmessage;
save("step.txt","none");
save("matnuser.txt","$udg");

var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"
پیام شما : $udg
در صورت تایید ادامه کار را بزنید",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"ادامه کار"]],
               [['text'=>"منوی اصلی"]],
              
            ]
          
        ])
    ]));
}




elseif($textmessage == 'ادامه کار') if ($from_id == $admin | $from_id == $admin2)
{$eddad = file_get_contents('matnuser.txt');
if ($eddad == "")
{SendMessage($chat_id,"هنوز متنی ارسال نکردی");
return;
}
file_put_contents("step.txt","sendtouset2");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"آیدی عددی کاربر رو ارسال کنید",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"منوی اصلی"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($step == 'sendtouset2')
{$matay = file_get_contents('matnuser.txt');
save("step.txt","none");
$useresh = $textmessage;
SendMessage($useresh,"$matay");
SendMessage($chat_id,"ارسال شد.");

}
elseif($textmessage == '/on')
{
file_put_contents("data/user/$chat_id/spep.txt","coden");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"کد رو ارسال کن",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"بازگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}


elseif ($spep == 'coden')
{$codesh = $textmessage;
save("data/user/$chat_id/spep.txt","");
$shash = file_get_contents('lock/lock.txt');
if($codesh == $shash){
	save("data/user/$chat_id/lock.txt","ok");
	SendMessage($chat_id,"ربات با موفقیت فعال شد");
	}else{
	
	SendMessage($chat_id,"کد درست نیست
دوباره دستور /on رو بفرست و رمز رو بزن");
	
		
	}

}

elseif (strpos($textmessage , "/code") !== false && $chat_id == $admin)
{
$bban = str_replace('/code','',$textmessage);
if ($bban != '')
{
$shash = file_get_contents('lock/lock.txt');
if($bban == $shash){
	save("data/user/$chat_id/lock.txt","ok");
	SendMessage($chat_id,"موفق");
	}else{
	
	SendMessage($chat_id,"نیست");
	
		
	}
}
}
elseif (strpos($textmessage , "/ban") !== false && $chat_id == $admin)
{
$ict = str_replace('/ban','',$textmessage);
if ($ict != '')
{
$myfile2 = fopen("banlist.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$ict\n");
fclose($myfile2);
SendMessage($chat_id,"`کاربر $ict با موفقیت مسدود شد`");
SendMessage($ict,"شما از سرور این ربات مسدود شده اید");

}
}

elseif (strpos($textmessage , "/unban") !== false && $chat_id == $admin)
{
$unbban = str_replace('/unban','',$textmessage);
if ($unbban != '')
{
$newlist = str_replace($unbban,"","banlist.txt");
save("banlist.txt",$newlist);
SendMessage($chat_id,"`کاربر $unbban با موفقیت از مسدودیت خارج شد🍃`");
SendMessage($unbban,"شما با موفقیت آزاد شدید");
}
}




elseif ($textmessage == 'متن استارت')
if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"خوب به بخش متن استارت خوش آمدید
اگر تا کنون متن استارت تعیین نکرده اید دکمه تعیین متن استارت
را بزنید و اگر تعیین کرده اید ابتدا آن را پاک کنید
و سپس دوباره تعیین کنید
",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"تعیین متن استارت"]
              ],
              [
                ['text'=>"مشاهده متن استارت"]
              ],
              [
                ['text'=>"حذف متن استارت"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}




elseif($textmessage == 'تعیین متن استارت') if ($from_id == $admin | $from_id == $admin2)
{
file_put_contents("step.txt","statsyo");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"متن مورد نظر رو ارسال کن",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"منوی اصلی"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($step == 'statsyo')
{$hamonn = $textmessage;
save("step.txt","none");
save("sfart.txt","$hamonn");

SendMessage($chat_id,"متن 


$hamonn 

با موفقیت برای متن استارت انتخاب شد");

}




elseif ($textmessage == 'حذف متن استارت')  if ($from_id == $admin | $from_id == $admin2) {
$matnam = file_get_contents("sfart.txt");
if ($matnam == "")
{SendMessage($chat_id,"هنوز متن استارت تعیین نشده");}
else
{
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"برای حذف روی دکمه شیشه ای زیر بزنید",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"حذف متن استارت",'callback_data'=>"del ".$matnam]]]
                            ])
                               ]
        )
    );

}
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($textmessage == 'مشاهده متن استارت') if ($from_id == $admin | $from_id == $admin2)
{$tsrxk = file_get_contents('sfart.txt');
if ($tsrxk == "")
{SendMessage($chat_id,"
متن استارت هنوز تعیین نشده
");
return;
}
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"$tsrxk",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"حذف متن استارت"]],
               [['text'=>"منوی اصلی"]],
               
    
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($textmessage == 'حذف دکمه' && $from_id == $admin | $from_id == $admin2)
{
$key = file_get_contents("data/btnlist.txt");
$ex = explode("\n",$key);
 $t=[[['text'=>"منوی اصلی"]]];
 for ($i=0;$i<=count($ex);$i++){
    $name = $ex["$i"];
    $t[] = [['text'=>"❌ $name"]]; }

if ($key == "")
{SendMessage($chat_id,"
هیچ دستوری ذخیره نشده
");
return;
}

var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"

به هیچ وجه دو ❌ اخر (دو دکمه اخر را پاک نکنید)

برای حذف دکمه روی آن کلیک کنید
به جز دو دکمه آخر
",
        'parse_mode'=>'MarkDown',
          'reply_markup'=>json_encode([
        'keyboard'=>$t

])
    ]));
 }
 elseif (strpos($textmessage , "❌") !== false && $chat_id == $admin)
{
$txtan = str_replace('❌','',$textmessage);
if ($txtan != '')
{
$newlist = str_replace($txtan,"");
save("data/btnlist.txt",$newlist);
unlink("data/btn/$txtan");
unlink("data/btnphoto/$txtan");
unlink("data/rss/$txtan");
SendMessage($chat_id,"پاک شد");
}
}



elseif ($textmessage == 'آمار تکمیلی' && $from_id == $admin | $from_id == $admin2){
	$usercount = 1;
	$fp = fopen( "Member.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$usercount ++;
	}
	
	
	$bots = file_get_contents("UserName.txt");
	$exbot = explode("@",$bots);
	$c = count($exbot)-2;
	$botsss = '';
	if($exbot[$c-(-1)] != null){
	$botsss = $botsss."@".$exbot[$c-(-1)];
	}if($exbot[$c] != null){
	$botsss = $botsss."@".$exbot[$c];
	}if($exbot[$c-1] != null){
	$botsss = $botsss."@".$exbot[$c-1];
	}if($exbot[$c-2] != null){
	$botsss = $botsss."@".$exbot[$c-2];
	}if($exbot[$c-3] != null){
	$botsss = $botsss."@".$exbot[$c-3];
	}if($exbot[$c-4] != null){
	$botsss = $botsss."@".$exbot[$c-4];
	}if($exbot[$c-5] != null){
	$botsss = $botsss."@".$exbot[$c-5];
	}if($exbot[$c-6] != null){
	$botsss = $botsss."@".$exbot[$c-6];
	}if($exbot[$c-7] != null){
	$botsss = $botsss."@".$exbot[$c-7];
	}if($exbot[$c-8] != null){
	$botsss = $botsss."@".$exbot[$c-8];
	}
	$botsss = str_replace("\n",' | ',$botsss);

	fclose( $fp);
	SendMessage($chat_id,"تعداد اعضای ربات:  $usercount





  آخرین کاربران:
  $botsss","html","true");
	}

elseif ($textmessage == 'فروارد به همه')
if ($from_id == $admin | $from_id == $admin2)
{
save("step.txt","fortoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"
    پیام خود را از یک کانال فروارد کنید
    در صورتی که یک پیام متنی ارسال کنید از طرف شما فروارد میشود
",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"منوی اصلی"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($step == 'fortoall')
{
save("step.txt","none");
		 SendMessage($chat_id,"در حال فروارد پیام شما...");
$forp = fopen( "Member.txt", 'r');
while( !feof( $forp)) {
$fakar = fgets( $forp);
Forward($fakar, $chat_id,$mossage_id);
		 }
		 makereq('sendMessage',[
		 'chat_id'=>$chat_id,
		 'text'=>"پیام شما برای تمام کاربران فروارد شد",
		 ]);
	 }

elseif ($textmessage == 'ارسال به همه')
if ($from_id == $admin | $from_id == $admin2)
{
save("step.txt","sendtoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"پیام خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"منوی اصلی"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($step == 'sendtoall')
{
SendMessage($chat_id,"پیام شما در حال ارسال به تمامی کاربران است");
save("step.txt","none");
$fp = fopen( "Member.txt", 'r');
while( !feof( $fp)) {
$ckar = fgets( $fp);
SendMessage($ckar,$textmessage);
}
SendMessage($chat_id,"پیام شما با موفقیت به تمام کاربران ارسال شد");
}






elseif ($textmessage == 'تعیین متن نامربوط')
if ($chat_id == $admin) {
SendMessage($chat_id,"برای تعیین متن نامربوط به صورت زیر عمل کنید
/notxt متن


به جای متن ، متن نامربوط خود را قرار دهید

و برای حذف متن
عینا همان متن را بعد از 
/unnotxt

قرار دهید
مثلا 
/unnotxt متن
");
}
else
{ SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده"); }

elseif ($textmessage == '/panel') if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"ادمین گرامی سلام
جهت مدیریت از دکمه ها استفاده کنید",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
                  [
                ['text'=>"مدیریت دکمه ها"]
              ],
              [
['text'=>"ارسال پیام"],['text'=>"آمار"]
              ],
              [
                ['text'=>"مدیریت کاربران"]
              ],
              [
                ['text'=>"مدیریت متن ها"]
              ],
              [
                ['text'=>"تعیین ادمین"]
              ],
              [
                ['text'=>"تنظیمات"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($textmessage == 'ارسال پیام') if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"    بخش ارسال پیام.
 برای ارسال پیام از دکمه ها اقدام کنیم",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ارسال به همه"],['text'=>"فروارد به همه"]
              ],
             [
                ['text'=>"ارسال به کاربر"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($textmessage == 'منوی اصلی') if ($from_id == $admin | $from_id == $admin2)
{
save("matnuser.txt","");
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"ادمین گرامی سلام
جهت مدیریت از دکمه ها استفاده کنید",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
                  [
                ['text'=>"مدیریت دکمه ها"]
              ],
              [
['text'=>"ارسال پیام"],['text'=>"آمار"]
              ],
              [
                ['text'=>"مدیریت کاربران"]
              ],
              [
                ['text'=>"مدیریت متن ها"]
              ],
              [
                ['text'=>"تعیین ادمین"]
              ],
              [
                ['text'=>"تنظیمات"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif($textmessage == 'تعیین ادمین') if ($from_id == $admin | $from_id == $admin2)
{
file_put_contents("step.txt","adminset");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ایدی عددی کاربر رو ارسال کن",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"منوی اصلی"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($step == 'adminset')
{$adsset = $textmessage;
save("step.txt","none");
save("data/admin2.txt","$adsset");

SendMessage($admin,"کاربر  $adsset  با موفقیت ادمین شد ");
 SendMessage($adsset,"با موفقیت ادمین شدی ");

}



elseif ($textmessage == 'تنظیمات') if ($from_id == $admin | $from_id == $admin2)
{
save("matnuser.txt","");
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"بخش تنظیمات

ریست ربات:حذف تمام اطلاعات ربات
قفل ربات:تعیین رمز روی ربات
",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ریست ربات"],['text'=>"امضای ربات"]
              ],
              [
              ['text'=>"قفل ربات"],['text'=>"قفل کانال"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ],
           'resize_keyboard'=>true
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif($textmessage == 'تعیین متن اشتباه') if ($from_id == $admin | $from_id == $admin2)
{
file_put_contents("step.txt","statso");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"متن مورد نظر رو ارسال کن",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"منوی اصلی"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($step == 'statso')
{$hamonn = $textmessage;
save("step.txt","none");
save("nog.txt","$hamonn");

SendMessage($chat_id,"متن 


$hamonn 

با موفقیت برای متن اشتباه انتخاب شد");

}

elseif ($textmessage == 'دستور اشتباه')
if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"خوب به بخش متن اشتباه خوش آمدید
زمانی که کاربر یک دستور ارسال کند که در ربات تعیین نشده باشد
ربات دستور ذخیره شده را ارسال میکند
",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"تعیین متن اشتباه"]
              ],
              [
                ['text'=>"مشاهده متن اشتباه"]
              ],
             
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}



	
elseif ($textmessage == 'مشاهده متن اشتباه')  if ($from_id == $admin | $from_id == $admin2)
{$tsrxk = file_get_contents('nog.txt');
if ($tsrxk == "")
{SendMessage($chat_id,"
متن اشتباه هنوز تعیین نشده
");
return;
}
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"
$tsrxk",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              
               [['text'=>"منوی اصلی"]],
               
    
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}


elseif ($textmessage == 'آمار')  if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"
بخش آمار
در این بخش از امار و ارقام کاربران خود مطلع شوید ",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              
               [
     ['text'=>"آمار تکمیلی"],['text'=>"مشاهده لیست مسدود"]
     ],
               
               [['text'=>"منوی اصلی"]],
               
    
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($textmessage == 'مشاهده لیست مسدود') if ($from_id == $admin | $from_id == $admin2)
{$tsrxk = file_get_contents('banlist.txt');
if ($tsrxk == "")
{SendMessage($chat_id,"
کاربری مسدود نیست
");
return;
}
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"
ایدی عددی افراد مسدود شده

برای رفع مسدودیت آن ایدی عددی فرد را بعد از
/unban
ارسال کنید

لیست:

$tsrxk",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[

               [['text'=>"منوی اصلی"]],
               
    
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($textmessage == 'دکمه تست ۱') {
	
	Sendphoto($chat_id,"http://imgurl.ir/uploads/89956_4AFDD059-E36D-4ED1-83BB-F704BFADD025.jpeg","");
 

	}
elseif ($textmessage == 'بلاک') if ($from_id == $admin | $from_id == $admin2)
{
	
	SendMessage($chat_id,"برای بلاک ایدی عددی فرد رو بعد از
/ban
ارسال کنید
مثلا
/ban 577678");
 

	}
	else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($textmessage == 'ریست ربات')
if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"تمامی اطلاعات پاک میشوند
آیا مطمینی؟

فقظ ادمین اصلی قادر به ریست ربات است
",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ریست ربات✅"]
              ],
   
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($textmessage == 'قفل کانال')
if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"به بخش قفل کانال خوش آمدی
    میتونی ی کاری کنی تا وقتی تو کانالت عضو نشدن نتونن ربات رو استارت کنن
",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"تعیین قفل کانال"]
              ],
              [
                ['text'=>"حذف قفل کانال"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($textmessage == 'قفل ربات')
if ($from_id == $admin | $from_id == $admin2)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"به بخش قفل ربات خوش آمدی
        میتونی رو ربات رمز بزاری تا وقتی رمز رو نزدن نتونن وارد شن
",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"تعیین قفل ربات"]
              ],
   [
                ['text'=>"مشاهده قفل ربات"]
              ],
              [
                ['text'=>"حذف قفل ربات"]
              ],
              [
                ['text'=>"منوی اصلی"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif($textmessage == 'تعیین قفل ربات') if ($from_id == $admin | $from_id == $admin2)
{
file_put_contents("step.txt","setcode");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"کد رو ارسال کن",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"منوی اصلی"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}

elseif ($step == 'setcode')
{$settcd = $textmessage;
save("step.txt","none");
save("lock/lock.txt","$settcd");
save("lock/vaze.txt","ok");
save("lock/vze.txt","ok");
SendMessage($chat_id,"کد 
$settcd 
با موفقیت ذخیره شد");

}

elseif ($textmessage == 'مشاهده قفل ربات')  if ($from_id == $admin | $from_id == $admin2)
{$jxrjo = file_get_contents('lock/lock.txt');
if ($jxrjo == "")
{SendMessage($chat_id,"
ربات قفل نیست
");
return;
}
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"کد قفل ربات👇
$jxrjo",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              
               [['text'=>"منوی اصلی"]],
               
    
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"این دستور فقط برای ادمین طراحی شده");
}
elseif ($textmessage == 'حذف قفل ربات' && $from_id == $admin | $from_id == $admin2){
    
	unlink("lock/lock.txt");
	unlink("lock/vze.txt");
	unlink("lock/vaze.txt");
	SendMessage($chat_id,"

پاک شد 
");
	}
elseif ($textmessage == 'تعیین قفل کانال' && $from_id == $admin | $from_id == $admin2) {
				save("step.txt","set setchc");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"ایدی کانال 
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
	}
	
	
	elseif ($step == 'set setchc') {
		save("step.txt","set pns");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"متن کانال
",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
				
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keybord'=>true
       		])
    		]));
			save("lock/idkanal.txt","$textmessage");
			
	}
	elseif ($step == 'set pns') {
		save("step.txt","none");
		
		
			save("lock/matnkanal.txt","$textmessage");
		save("lock/vazekanal.txt","ok");
		var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"با موفقیت ذخیره شد
			",
			'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                 [
                   ['text'=>'منوی اصلی']
                ]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
		
			
	}
elseif ($textmessage == 'حذف قفل کانال' && $from_id == $admin | $from_id == $admin2){
    
	save("lock/vazekanal.txt","no");
	unlink("lock/idkanal.txt");
	unlink("lock/matnkanal.txt");
	SendMessage($chat_id,"
با موفقیت قفل کانال باز شد
");
	}
elseif ($textmessage == 'ریست ربات✅') {

	
SendMessage($chat_id,"در حال حاضر امکان وجود ندارد");

	}


else {
$nogo = file_get_contents('nog.txt');
if ($nogo == "")
{SendMessage($chat_id,"متاسفانه متوجه منظورت نشدم");
return;
}
SendMessage($chat_id,"$nogo");}
$txxt = file_get_contents('Member.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('Member.txt');
      $aaddd .= $chat_id."\n";
      file_put_contents('Member.txt',$aaddd);
      
    }
    $txxt = file_get_contents('UserName.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array("@".$username,$pmembersid)){
      $aaddd = file_get_contents('UserName.txt');
      $aaddd .= "@".$username."\n";
	  if($username != null){
		file_put_contents('UserName.txt',$aaddd);
	  }
    }
    unlink("error_log");
?>
