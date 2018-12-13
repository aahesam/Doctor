<?php



 mkdir("data/user/$chat_id");
	$bory = file_get_contents("data/btnlist.txt");
$ttx = explode("\n",$bory);
 $rt=[[['text'=>"ارسال نظر"]]];
 for ($po=0;$po<=count($ttx);$po++){
    $name = $ttx["$po"];
    $rt[] = [['text'=>"$name"]]; }
$sttart = file_get_contents('sfart.txt');


if ($sttart == "")
{SendMessage($chat_id,"کاربر گرامی این سرویس توسط @phpyar طراحی شده
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
 


?>