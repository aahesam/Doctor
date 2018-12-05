<?php
ini_set("log_errors" , "off");
ob_start();
include 'administrative/access/Class.php';
// Variable Source
$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$chat_id = $update->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$from_id = $update->message->from->id;
 //========================
$forward_id = $update->message->forward_from->id;
$first = $update->message->from->first_name;
$username = $update->message->from->username;
$text = $update->message->text;
$message_id = $update->message->message_id;
$m = $gold - 20;
$txt = $update->callback_query->message->text;
$messageid = $update->callback_query->message->message_id;
$block = file_get_contents("administrative/block-list.txt");
$feed = Admin;
$banall = file_get_contents("administrative/banall-member/banall.txt");
$command = file_get_contents('administrative/user/'.$from_id."/command.txt");
$vipbot = file_get_contents('administrative/user/'.$from_id."/vipp.txt");
$idtxt = file_get_contents("administrative/access/robots.txt");
$idpushe = file_get_contents("Bot/$idtxt/other/access/mum.txt");
$tokentxt = file_get_contents("administrative/tokensadmins/token/$idtxt.txt");
$create = file_get_contents('administrative/user/'.$from_id."/create.txt");
$cre = file_get_contents('administrative/user/'.$from_id."/cre.txt");
$karbarash = file_get_contents('administrative/user/'.$from_id."/gold.txt");
$gold = file_get_contents('administrative/user/'.$from_id."/gold.txt");
$goldacc = file_get_contents('administrative/user/'.$from_id."/goldacc.txt");
$wait = file_get_contents('administrative/user/'.$from_id."/wait.txt");
$codefree = file_get_contents('administrative/user/'.$from_id."/codefree.txt");
$Member = file_get_contents('administrative/access/mum.txt');
$url_s2a = file_get_contents("administrative/user/".$from_id."/url_s2a.txt");
$text_s2a = file_get_contents("administrative/user/".$from_id."/text_s2a.txt");
$listtbots = file_get_contents("administrative/user/".$from_id."/create.txt");
$from_chat_msg_id = $update->message->forward_from_message_id;
$from_chat_username = $update->message->forward_from_chat->username;
$bot = file_get_contents('administrative/user/'.$from_id."/bot.txt");
$dt = json_decode(file_get_contents("http://api.mostafa-am.ir/date-time/"));
$date = $dt->date_fa;
$time = $dt->time_fa;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$nan = file_get_contents("administrative/admins.txt");
$idtxt = file_get_contents("administrative/access/robots.txt");
$idpushe = file_get_contents("Bot/$idtxt/other/access/mum.txt");
$voiceid = $update->message->voice->file_id;
$textmessage = isset($update->message->text)?$update->message->text:'';
$membersvip = file_get_contents("administrative/user/$from_id/gold.txt");
$fileid = $update->message->document->file_id;
$photoid = $update->message->photo->file_id;
$musicid = $update->message->audio->file_id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/botToken/getChatMember?chat_id=@LINE_TM&user_id=".$from_id));
$tch = $truechannel->result->status;
$message_id = $update->message->message_id;
$message_id_call = $update->callback_query->message->message_id;
$ban_all = file_get_contents("administrative/user/banall.txt");
$banels = file_get_contents("administrative/banall-member/banall.txt");
//=========
    if (strpos($banall , "$from_id") !== false) {
	return false;
	}
	elseif (strpos($block , "$from_id") !== false) {
	return false;
	}
	elseif ($from_id != $chat_id and $chat_id != $feed) {
	LeaveChat($chat_id);
	}
	elseif (strpos($banall , "$from_id") !== false  ) {
  SendMessage($chat_id,"کاربر عزیز شما از ربات بلاک شدید🚫");
 }
	//===============
	//===============
	elseif(preg_match('/^\/([Ss]tart)(.*)/',$text)){
	preg_match('/^\/([Ss]tart)(.*)/',$text,$match);
	$match[2] = str_replace(" ","",$match[2]);
	$match[2] = str_replace("\n","",$match[2]);
	if($match[2] != null){
	if (strpos($Member , "$from_id") == false){
	if($match[2] != $from_id){
	if (strpos($gold , "$from_id") == false){
	$txxt = file_get_contents('administrative/user/'.$match[2]."/gold.txt");
    $pmembersid= explode("\n",$txxt);
    if (!in_array($from_id,$pmembersid)){
      $aaddd = file_get_contents('administrative/user/'.$match[2]."/gold.txt");
		save('administrative/user/'.$match[2]."/gold.txt",$aaddd+1);
    }
	SendMessage($match[2],"یک نفر با لینک اختصاصی شما وارد ربات شد و شما یک امتیاز گرفتید✔️
زمان : $time
تاریخ : $date","html","true",$button_official_fa);
	}
	}
	}
	}
	mkdir('administrative/user/'.$from_id);
	if($from_id == $Member){
	SendMessage($chat_id,"📍 سلام دوست عزیز به ربات ساز لاین خوش اومدید.
برای استفاده از این ربات باید قوانینی را قبل از استفاده تایید کنید📍

🔖قوانین به شرح زیر می باشد:

📓اسپم زدن(ارسال مکرر یک پیام) به ربات کاملا غیرقانونی بوده وباعث فشار به سرور اصلی میگردد و با افرادی که رعایت نکنند برخورد قانونی میشود.

📔ساخت هرگونه ربات بر خلاف جمهوری اسلامی ایران کاملا ممنوع و برخود قانونی میشود.

📮مسئولیت همه پیام های رد و بدل شده در ربات به عهده صاحب ربات مورد نظر می باشد.

📲ارسال هر گونه پیام های رکیک به پشتیبانی و خود ربات ممنوع می باشد و با این افراد برخورد جدی می شود.

📂 مسئولیت ربات با خود صاحب ربات بوده و ما هیچ مسئولیتی در قبال آن نداریم.

📦 در صورت مشاهده هر یک از موارد بالا و موارد فوق که در کانال ذکر میشود کاربر مورد نظر از ربات مسدود و همه ربات های او بن میشوند و برخورد قانونی میشود.
● @LINE_TM●

✔️ اگر قوانین را قبول می کنید روی دکمه زیر کلیک کنید✔️","html","true",$button_lang);
	}else{
	SendMessage($chat_id,"📍 سلام دوست عزیز به ربات ساز لاین خوش اومدید.
برای استفاده از این ربات باید قوانینی را قبل از استفاده تایید کنید📍

🔖قوانین به شرح زیر می باشد:

📓اسپم زدن(ارسال مکرر یک پیام) به ربات کاملا غیرقانونی بوده وباعث فشار به سرور اصلی میگردد و با افرادی که رعایت نکنند برخورد قانونی میشود.

📔ساخت هرگونه ربات بر خلاف جمهوری اسلامی ایران کاملا ممنوع و برخود قانونی میشود.

📮مسئولیت همه پیام های رد و بدل شده در ربات به عهده صاحب ربات مورد نظر می باشد.

📲ارسال هر گونه پیام های رکیک به پشتیبانی و خود ربات ممنوع می باشد و با این افراد برخورد جدی می شود.

📂 مسئولیت ربات با خود صاحب ربات بوده و ما هیچ مسئولیتی در قبال آن نداریم.

📦 در صورت مشاهده هر یک از موارد بالا و موارد فوق که در کانال ذکر میشود کاربر مورد نظر از ربات مسدود و همه ربات های او بن میشوند و برخورد قانونی میشود.
● @LINE_TM●

✔️ اگر قوانین را قبول می کنید روی دکمه زیر کلیک کنید✔️","html","true",$button_lang);
	}
	}
	//===============
	elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"📍 دوست عزیز برای دریافت آخرین ‌اخبار ربات ابتدا وارد کانال زیر شوید
● @LINE_TM
📍پس از وارد شدن به کانال بالا به ربات برگردید و کلمه
📌 /start
📍را ارسال کنید تا به قسمت اصلی ربات وارد شوید.","html","true",$button_remove);
	}
	//===============
	elseif($text == '🔙 برگشت به منوی اصلی'){
  save('administrative/user/'.$from_id."/command.txt","none");
  if($from_id == $admin){
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_admin);
  }else{
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }
  }
  //===============
	
		elseif($text == '↩️برگشت به منوی ادمین'){
  save('administrative/user/'.$from_id."/command.txt","none");
  if($from_id == $admin){
  SendMessage($chat_id,"به منوی ادمین خوش امدید ","html","true",$button_manage);
  }else{
  SendMessage($chat_id,"کاربر عزیز شما ادمین نیستید","html","true",$button_official_fa);
  }
  }
  //===============
      elseif($text == '📌 همه قوانین را قبول دارم 📌'){
                save('administrative/user/'.$from_id."/command.txt","none");
  if($from_id == $admin){
  SendMessage($chat_id,"زبان فارسی 🇮🇷 تنظیم شد
  🅾 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.

⚛ برای ساخت ربات دکمه (☢ساخت ربات) رو بزنید","html","true",$button_official_admin);
  }else{
  SendMessage($chat_id,"📱 سلــام $first 👋😉
📍 به سرویس ربات ساز لاین خوش آمدید.
📌 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.
🎈 برای ساخت ربات از دکمه ی ساخت ربات استفاده نمایید.
■ @LINE_ROBOT □","html","true",$button_official_fa);
  }
  }
    //===============
    elseif($text == '📦 استفاده از کد'){
  SendMessage($chat_id,"لطفا نوع رباتی که میخواهید ویژه شود را انتخاب کنید✔️","html","true",$button_vip_code);
  }
  //===============
  elseif (strpos($text,"🔝ویژه کردن ویوگیر🔝") !== false) {
  save('administrative/user/'.$from_id."/command.txt","code pv 123");
  SendMessage($chat_id,"کد رایگان را ارسال کنید✔️","html","true",$button_back);
}
//===============
elseif (strpos($text,"🔝ویژه کردن پیام رسان🔝") !== false) {
  save('administrative/user/'.$from_id."/command.txt","code pv 123");
  SendMessage($chat_id,"کد رایگان را ارسال کنید✔️","html","true",$button_back);
}
  //===============
  elseif (strpos($text,"🔝ویژه کردن تبچی🔝") !== false) {
  save('administrative/user/'.$from_id."/command.txt","code pv 123");
  SendMessage($chat_id,"کد رایگان را ارسال کنید✔️","html","true",$button_back);
}
  //===============
  elseif (strpos($text,"🔝ویژه کردن بنردهی🔝") !== false) {
  save('administrative/user/'.$from_id."/command.txt","code pv 123");
  SendMessage($chat_id,"کد رایگان را ارسال کنید✔️","html","true",$button_back);
}
  //===============
  elseif (strpos($text,"🔝ویژه کردن فروشگاه ساز🔝") !== false) {
  save('administrative/user/'.$from_id."/command.txt","code pv 123");
  SendMessage($chat_id,"کد رایگان را ارسال کنید✔️","html","true",$button_back);
}
  //===============
	elseif($command == 'code pv 123'){
  if($codefree == 'true' and $from_id != $admin){
  SendMessage($chat_id,"📛شما قبلا یک بار از این امکان استفاده کردید","html","true");
  }else{
  if(file_exists("administrative/code/$text.txt")){
  $code = file_get_contents("administrative/code/$text.txt");
  if($code == 'true'){
  SendMessage($chat_id,"کدی که فرستادی استفاده شده😕","html","true");
  }else{
  save('administrative/user/'.$from_id."/command.txt","code free");
  save('administrative/user/'.$from_id."/wait.txt",$text);
  SendMessage($chat_id,"الا آیدی رباتتان را بدون @ بفرست.
لطفا به حروف کوچک و بزرگ آیدی دقت کنید🤗","html","true",$button_back);
  }
  }else{
  SendMessage($chat_id,"کدی که فرستادی اصلا وجود نداره😂","html","true");
  }
  }
  }
	//===============
	elseif($command == 'code free'){
	$code = file_get_contents("administrative/code/$wait.txt");
	if($code == 'true'){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($chat_id,"کدی که فرستادی استفاده شده😕","html","true",$button_official_fa);
	}else{
	$text = str_replace("@",'',$text);
	if(file_exists("Bot/$text")){
	$vip = file_get_contents("Bot/$text/data/bottype.txt");
	if($vip == 'gold'){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($chat_id,"رباتی که آیدیشو فرستادی قبلا هم ویژه بوده.","html","true",$button_official_fa);
	}else{
	save("administrative/code/$wait.txt","true");
	save('administrative/user/'.$from_id."/command.txt","none");
	save('administrative/user/'.$from_id."/codefree.txt","true");
	save("Bot/$text/data/bottype.txt","gold");
	SendMessage($chat_id,"😍تبریک میگم رباتت ویژه شد.","html","true",$button_official_fa);
	SendMessage($admin,"کاربری از کد رایگان استفاده کرد مشخصاتش👇
	$first $from_id $wait","html","true");
	SendMessage($kanal,"***************
😎اطلاعات استفاده کننده از کد👇

👤نام : $first
🆔 آیدی عددی : $from_id
🎁کد استفاده شده : $wait
🤖آیدی ربات : @$text
⏰زمان استفاده از کد : $time
📆تاریخ استفاده از کد : $date
***************
🆑 @LINE_TM
🤖 @LINE_ROBOT","html","true");
	}
	}else{
	save('administrative/user/'.$from_id."/command.txt","code free");
	SendMessage($chat_id,"⭕️ ربات وجود ندارد.
	✳️ به حروف کوچیک و بزرگ آیدی دقت کنید.","html","true",$button_back);
	}
	}
	}
  //===============
  elseif($text == '❌حذف ربات' and $from_id){
  save('administrative/user/'.$from_id."/command.txt","hesabb");
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"لطفا یکی از ربات خود را از گزینه های زیر انتخاب نمایید✔️
⚠️توجه شما فقط میتوانید آخرین ربات خود را حذف کنید.",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"$listtbots"]],
              [['text'=>"🔙 برگشت به منوی اصلی"]]
              ],
              "resize_keyboard"=>true,
              "one_time_keyboard" => true
        ])
 ]);
}
  elseif($command == 'hesabb' and $from_id){
  unlink("Bot/".$text."/index.php");
  unlink("Bot/".$text."/Class.php");
  unlink("administrative/user/".$from_id."/create.txt");
  SendMessage($chat_id,"ربات شما با موفقیت حذف شد👍","html","true",$button_back);
  }
  //===============
  elseif($text == 'راهنمای استفاده 🔖'){
  SendMessage($chat_id,"1⃣ ابتدا به ربات ( @BotFather ) مراجعه کنید
2⃣ دستور /newbot رو ارسال کنید
3⃣ یک نام برای ربات ارسال کنید
4⃣ پس از ارسال نام،یک یوزرنیم ارسال کنید
❌ توجه کنین قبل 
یوزرنیم نباید (@) بزارین و حتما باید در آخر یوزرنیم ارسالی کلمه bot با حروف کوچیک یا بزرگ (فرقی نداره) وجود داشته باشه
5⃣ اگر با پیغام زیر برخورد کردید
Sorry, this username is already taken. Please try something different.
یعنی قبلا یکی این یوزرنیم رو ثبت کرده یوزرنیم دیگری وارد کنید. اگر این پیغام رو دریافت نکردید یعنی کار حل است
6⃣ حالا به این ربات مراجعه کنید و دکمه (🛠
📍 ساخت ربات) رو بزنید
7⃣ سپس پیام آخری که از ربات ( @BotFather ) دریافت کردید رو اون جایی که مثل این یه متن نوشته👇

369762599:AAFeMVVjM8KSYz_-1f-6nowsl22-0gGAr36
کپی کن و بفرست به
@LINE_ROBOT 😁
8⃣ ربات شما با موفقیت ثبت شد.
آموزش تصویری در 👇
🆔 @LINE_TM
#آموزش_ساخت_ربات","html","true");
  }
//===============
  elseif($text == '📌 ویژه کردن با هزینه 📌' and $from_id){
SendMessage($chat_id,"🎈 برای ویژه کردن ربات خود با هزینه و دریافت تعرفه ها میتوانید به پشتیبانی مراجعه کنید.
📌 @LINE_TMbot","html","true");
  }
  //===============
  elseif($command == 'gold acc 20'){
	if(file_exists("Bot/$text")){
	save("Bot/$text/other/setting/bot_type.txt","gold");
	save('administrative/user/'.$from_id."/command.txt","none");
	save('administrative/user/'.$from_id."/goldacc.txt","true");
	SendMessage($chat_id,"✅ حساب ربات ویژه شد","html","true",$button_official_fa);
	}else{
  SendMessage($chat_id,"🤖 آیدی بات رو بدون @ وارد کنید.آیدی وارد شده اشتباه است
⭕️ به کوچیک و بزرگی حروف دقت کنید","html","true");
  }
  }
  //===============
  elseif($text == '🎈 پشتیبانی آنلاین 🎈'){
  SendMessage($chat_id,"💻 پشتیبانی ربات ساز لاین همیشه آنلاین و در خدمت شما می باشد.

🆔 @LINE_ROBOT","html","true");
  }
  //===============
  elseif($text == '📓 قوانین کامل ساخت ربات 📓'){
  SendMessage($chat_id,"💯قوانین ساخت ربات:

🔹 همه مطالب باید تابع قوانین جمهوری اسلامی ایران باشد.
🔹 رعایت ادب و احترام به کاربران.
🔹 ساخت هرگونه ربات در ضمیمه +18 خلاف قوانین ربات میباشد و در صورت مشاهده ربات مورد نظر مسدود و همچنین مدیر ربات از تمامی ربات ها بلاک میشود.
🔹 مسئولیت پیام های رد و بدل شده در هر ربات با مدیر آن میباشد و ما هیچگونه مسئولیتی نداریم.
🔹 در صورت مشاهده استفاده از قابلیت های ربات در جهات منفی به شدت برخورد میشود.
🔹 اگر به هر دلیلی درخواست های ربات شما به سرور ما بیش از حد معمول باشد (و حساب ربات ویژه نباشد) چند باری به شما اخطار داده میشود اگر این اخطار ها نادیده گرفته شوند ربات شما مسدود و به هیچ عنوان از محدودیت خارج نمیشود.
🔹 بعد از پرداخت مبلغ جهت ویژه کردن رباتتان وجه به هیچ عنوان باز نمیگردد مگر اینکه ربات شما مشکل داشته باشد.","html","true");
  }
  //===============
    elseif($text == 'ویژه کردن رایگان 📦'){
  SendMessage($chat_id,"به بخش ( ویژه کردن رایگان) خوش آمدید😊
شما میتوانید با دعوت دوستان خود به ربات ساز امتیاز جمع آوری کرده و ربات خود را ویژه کنید.

برای دریافت بنر خود و ارسال به دوستان دکمه (📲 دریافت بنر 📲) را بزنید.

برای اطلاع از امتیازات خود روی دکمه (📍 تعداد امتیازات 📍) بزنید.","html","true",$button_bazaryabi);
  } 
  //===============
  elseif($text == 'ویژگی ها 📝'){
   sendMessage($chat_id,"🔸ویژگی ربات های ساخته شده با ربات ساز ما:
1-بدون هیچ گونه تبلیغات🚫
2-سرعت بالا🚀
3-پشتیبانی حرفه ای و 24 ساعته💪
4-بدون قطعی و کندی🤝
5-📮امکان ارسال پیام همگانی
6-📊امکان آمار لحظه ای
🆔 @LINE_ROBOT");  
   }
  //===============
  
   elseif($text == '📲 دریافت بنر 📲'){
  sendMessage($chat_id,"📍 انتظار ها به پایان رسید 📍

📌 ربات ساز لاین ساخته شد با قابلیت ساخت 24 نمونه ربات 😱

📌بدون نیاز به دانش برنامه نویسی همین الان میتونی از لینک زیر رایگان پیشرفته ترین ربات ها رو برای خودت بسازی⬇️
https://telegram.me/LINE_ROBOT?start=$from_id");  
 }
  //===============
  elseif($text == 'spam'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫️","html","true");
  }
}
//===============
  elseif($text == 'Spam'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == 'SPAM'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@Spam'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@SPAM'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == 'spambot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == 'Spambot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == 'SpamBot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@spambot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@SpamBot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@Spambot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}
//===============
  elseif($text == '@SPAMBOT'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

   //===============
   elseif($text == '🔝ویژه کردن ربات🔝'){
  SendMessage($chat_id,"لطفا نوع ربات خود را جهت ویژه کردن انتخاب نمایید✔️","html","true",$button_vipp);
  }
  //
  elseif($text == '📍 تعداد امتیازات 📍'){
  SendMessage($chat_id,"🔘کل امتیازات شما: $gold

  با زدن به روی دکمه (🔝ویژه کردن ربات🔝) ربات خود را ویژه کنید.","html","true","$button_bazaryabi");
  }
  		elseif($text == '⛏ویژه کردن پیام رسان💬'){
		if($karbarash > 19){
		save("administrative/user/$from_id/command.txt","viplink");
		sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
		}else{
		SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
		}}
		elseif($command == 'viplink'){
		$newgold = $karbarash - 19;
		save("administrative/user/$from_id/gold.txt",$newgold);
		save("administrative/user/$from_id/command.txt","none");
		save("Bot/$text/data/bottype.txt","gold");
		sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
		}
		
		elseif($text == '⛏ویژه کردن ویوگیر👁‍🗨'){
  if($karbarash > 19){
  save("administrative/user/$from_id/command.txt","viplin");
  sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
  }else{
  SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
  }}
  elseif($command == 'viplin'){
  $newgold = $karbarash - 19;
  save("Bot/$text/data/bottype.txt","gold");
  save("administrative/user/$from_id/gold.txt",$newgold);
  save("administrative/user/$from_id/command.txt","none");
  sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
  }
  elseif($text == '⛏ویژه کردن ویوگیر پیشرفته👁‍🗨'){
		if($karbarash > 19){
		save("administrative/user/$from_id/command.txt","viplink3");
		sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
		}else{
		SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
		}}
		elseif($command == 'viplink3'){
		$newgold = $karbarash - 19;
		save("administrative/user/$from_id/gold.txt",$newgold);
		save("administrative/user/$from_id/command.txt","none");
		save("Bot/$text/data/bottype.txt","gold");
		sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
		}
		elseif($text == '⛏ویژه کردن بنردهی📥'){
  if($karbarash > 19){
  save("administrative/user/$from_id/command.txt","viplink38");
  sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
  }else{
  SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
  }}
  elseif($command == 'viplink38'){
  $newgold = $karbarash - 19;
  save("administrative/user/$from_id/gold.txt",$newgold);
  save("administrative/user/$from_id/command.txt","none");
  save("Bot/$text/bot_type_ads.txt","gold");
  sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
  }
  elseif($text == '💬ویژه کردن چت ناشناس⚜️'){
  if($karbarash > 19){
  save("administrative/user/$from_id/command.txt","viplink38");
  sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
  }else{
  SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
  }}
  elseif($command == 'viplink38'){
  $newgold = $karbarash - 19;
  save("administrative/user/$from_id/gold.txt",$newgold);
  save("administrative/user/$from_id/command.txt","none");
  save("Bot/$text/bot_type_ads.txt","gold");
  sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
  }
		elseif($text == '⛏ویژه کردن فروشگاه ساز🛍'){
    if($karbarash > 19){
    save("administrative/user/$from_id/command.txt","viplink4");
    sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink4'){
    $newgold = $karbarash - 19;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/botttype.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
    elseif($text == '⚜️ویژه کردن تغییر نام فایل📝'){
    if($karbarash > 19){
    save("administrative/user/$from_id/command.txt","viplink44");
    sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink44'){
    $newgold = $karbarash - 19;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/bot_type_ads.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
    elseif($text == '✉️ویژه کردن تبچی🎈'){
    if($karbarash > 19){
    save("administrative/user/$from_id/command.txt","viplink4411");
    sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink4411'){
    $newgold = $karbarash - 19;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/bot_type_ads.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
    elseif($text == '🔑ویژه کردن ضد لینک📟'){
    if($karbarash > 19){
    save("administrative/user/$from_id/command.txt","viplink44116");
    sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink44116'){
    $newgold = $karbarash - 19;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/bot_type_ads.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
    elseif($text == '😱ویژه کردن ربات ساز😎'){
    if($karbarash > 299){
    save("administrative/user/$from_id/command.txt","viplink44116o");
    sendMessage($chat_id,"⚠️توجه
آیدی ربات خود را دقیق و بدون @ ارسال نمایید.
اگر با توضیحات بالا مطابقت نداشته باشد امتیاز الکی از شما کسر میشود و ربات ویژه نمیشود🚫","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 300 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink44116o'){
    $newgold = $karbarash - 299;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/botupe.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
		
		  elseif($text == '📌 ساخت ربات دوم'){
			  if($karbarash > 9){
				  save("administrative/user/".$from_id."/gold.txt",$karbarash-9);
  unlink("administrative/user/".$from_id."/create.txt");
  SendMessage($chat_id,"ساخت ربات دوم برای شما فعال شد و 10 امتیاز از شما کم شد.
هم اکنون میتوانید با زدن دکمه (📍 ساخت ربات) در منوی اصلی ربات برای خود ربات بسازید.","html","true",$button_bazaryabi);
  }else{
	  sendMessage($chat_id,"متاسفانه شما ۱۰ امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
  }
		  }
  elseif($text == '📝 گزارش کردن'){
  save('administrative/user/'.$from_id."/command.txt","takhlof");
  SendMessage($chat_id,"➰ لطفا نام کاربری ربات(آیدی) که با ربات ساز لاین ساخته شده و تخلف کرده است را بفرستید.➰","html","true",$button_back);
  }
    //===============
    elseif($text == '♦️ارسال نظر'){
  save('administrative/user/'.$from_id."/command.txt","suport");
  SendMessage($chat_id,"با سلام لطفا نظر خود را ارسال کنید✔️️","html","true",$button_back);
  }
  //===============
  elseif($command == 'suport'){
  if($text){
  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($feed,"پیام ارسال شده از کاربر👇️","html","true");
  ForwardMessage($feed,$chat_id,$message_id);
  SendMessage($chat_id,"نظر شما با موفقیت به ادمین ربات ارسال شد","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","takhlof");
  SendMessage($chat_id,"خطا","html","true",$button_back);
  }
  }
    //===============
  elseif($command == 'takhlof'){
	if(preg_match('/^(@)(.*)([Bb][Oo][Tt])/s',$text)){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($feed,"گزارش تخلف ⬇","html","true");
	ForwardMessage($feed,$chat_id,$message_id);
	SendMessage($chat_id,"🖌 گزارش شما ثبت شد و به زودی از طرف پشتیبانی ربات ساز لاین پیگیری خواهد شد.
با تشکر از شما🥀","html","true",$button_official_fa);
  }else{
	save('administrative/user/'.$from_id."/command.txt","takhlof");
	SendMessage($chat_id,"⭕️ خطا !!!
	⭕️ دقت کنین یوزرنیم ربات با @ شروع شده و با کلمه (bot) پایان میابد","html","true",$button_back);
  }
  }
  //===============
  elseif($text == '📍 ساخت ربات'){
	SendMessage($chat_id,"📌 خب دوست عزیز لطفا نوع ربات خود را برای ساخت انتخاب کنید.","html","true",$button_create);
  }
  //
  elseif($text == '💬ساخت ربات پیام رسان'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create botpv");
  }
  elseif($text == '👁‍🗨ساخت ربات ویو گیر'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create botview");
  }
  elseif($text == '📡ساخت ربات ویوگیر پیشرفته😎'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create tst");
  }
     elseif($text == '👽ساخت ربات تبچی ساز👽'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید یا میتونین پیام حاوی توکن رو از ( @BotFather ) فوروارد کنید","html","true",$button_back);
  save('admin0098/user/'.$from_id."/command.txt","create bottabchi");
  }
  elseif($text == '🎉بازدیدگیرشکلاتی🎉'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","ویو");
  } 
  elseif($text == '⚡ ممبرگیر ⚡'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","ممب");
  }
    elseif($text == '📤ست وب هوک📤'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","ست");
  }
  elseif($text == '🚀ساخت ربات ضدلینک📡'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create zedelink");
  }
  elseif($text == '📥ساخت ربات بنردهی📥'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create banerr");
  }
  elseif($text == '🌇ساخت ربات عکس نوشته ساز😎'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create aksnevesh");
  }
  elseif($text == '💖ست وب هوک💖'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('ads/user/'.$from_id."/command.txt","create80");
  }
  elseif($text == '📝ساخت ربات تغییر نام فایلها📌'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create editename");
  }
  elseif($text == '⛏ساخت ربات فروشگاه ساز🛍'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create shopsaz");
  }
  elseif($text == '✈️ ساخت ربات مترجم  📞'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create trans");
  }
  elseif($text == '📿صلوات شمار'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create bot8");
  }

  elseif($text == '🕹ساخت ربات کوتاه کننده لینک📟'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create short");
  }
  elseif($text == '👤پیام رسان ساده👤'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید یا میتونین پیام حاوی توکن رو از ( @BotFather ) فوروارد کنید","html","true",$button_back);
  save('ads/user/'.$from_id."/command.txt","create2");
  }
      elseif($text == "✨ ساخت ربات چالش ساز ✨"){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create chaleshsaz");
  }
  elseif($text == '🗞ساخت ربات تبچی💸'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create tbligcho");
  }
  elseif($text == '💬ساخت ربات چت ناشناس🗣'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create chatnashenas");
  }
    elseif($text == '📲 ساخت ربات ست وبهوک 📲'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create add");
  }
      elseif($text == '🎵 موزیک یاب پیشرفته 🎵'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create erfan");
  }
        elseif($text == '📎 ساخت ربات اینستا اینفو 📎'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.  ◻️ توجه این ربات چون یک ربات عمومی هست دارای پنل مدیریت نمیباشد ◻️","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create addkon");
  }
          elseif($text == '✏️ ربات ادیت موزیک ✏️'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.  ◻️ توجه این ربات چون یک ربات عمومی هست دارای پنل مدیریت نمیباشد ◻️","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create mozik");
  }
      elseif($text == '📒 ساخت ربات تبدیل متن به فایل تکست 📘'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create erf");
  }
        elseif($text == 'فیک میل'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create fake");
  }
    elseif($text == "💰ساخت ربات کسب درآمد"){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create kasb");
  }
      elseif($text == "➕ساخت ربات ادکن گروه"){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create gap");
  }
        elseif($text == "شیشه"){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create shis");
  }
  elseif($text == "ساخت ربات ساز 📍"){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (راهنمای استفاده 🔖) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create robotsaz");
  }
  //==============
  ////////////////////////////////////
    elseif($command == 'create botview'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  $class = file_get_contents("administrative/source/view/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/view/index.php");
  save("Bot/$username_bot/index.php",$index);	
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
  mkdir("Bot/$username_bot/admin");
  mkdir("Bot/$username_bot/ads");
  mkdir("Bot/$username_bot/user");
  mkdir("Bot/$username_bot/admin/code");
  mkdir("Bot/$username_bot/ads/ads admin");
  mkdir("Bot/$username_bot/ads/ads msg id");
  mkdir("Bot/$username_bot/ads/ads tally");
  mkdir("Bot/$username_bot/ads/ads tedad");
  mkdir("Bot/$username_bot/ads/ads username");
  mkdir("Bot/$username_bot/ads/ads time");
  mkdir("Bot/$username_bot/ads/ads date");
  mkdir("Bot/$username_bot/data");
  save("Bot/$username_bot/data/start.txt","Hi!✋ 
  Welcome To My Bot");
  save("Bot/$username_bot/data/help.txt","راهنمایی تنظیم نشده است");
  save("Bot/$username_bot/data/channel.txt","تنظیم نشده");
  save("Bot/$username_bot/data/shop.txt","متن فروشگاه ثبت نشده است.");
  save("Bot/$username_bot/data/zir.txt","متن زیر مجموعه گیری ثبت نشده است");
  save("Bot/$username_bot/data/seen.txt","1");
  save("Bot/$username_bot/data/coinlink.txt","5");
  save("Bot/$username_bot/data/bottype.txt","free");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/view/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/view/index.php");
  save("Bot/$username_bot/index.php",$index);	
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
      elseif($command == 'create chaleshsaz'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  $class = file_get_contents("administrative/source/chalesh/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/chalesh/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت در سرور پرسرعت  متصل شد
 @LINE_ROBOT
 بروز رسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/starttxt.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/chalesh/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/chalesh/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت در سرور پرسرعت BOTSAZ MEGACREAT🚀  متصل شد
 @LINE_ROBOT
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/ArtWork/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
    //==========
    elseif($command == 'ویو'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the 
  API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "ربات شما با موفقیت در سرور @LINE_ROBOT بروزرسانی شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/ArtWork/Bot/$username_bot/bot.php");
  
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇
پنل مدیریت 
/panel
را برای ربات بفرستین

","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  
    SendMessage($kanal,"✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @LINE_ROBOT",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ دوست عزیز شما قبلا یک ربات ساخته اید برای ربات دوم باید مبلغ 1,000 تومن پرداخت کنید.برای اطلاعات بیشتر به @sobhan_pvbot کنید","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","true");
  mkdir("Bot/$username_bot");
     mkdir("Bot/$username_bot/data");
	  mkdir("Bot/$username_bot/data/$chat_id");
	  mkdir("Bot/$username_bot/cod");
	   mkdir("Bot/$username_bot/ads");
	   mkdir("Bot/$username_bot/ads/user");
mkdir("Bot/$username_bot/ads/cont");
mkdir("Bot/$username_bot/ads/date");
mkdir("Bot/$username_bot/ads/seen");
mkdir("Bot/$username_bot/ads/time");
mkdir("Bot/$username_bot/ads/user");
	   save("Bot/$username_bot/data/shop.txt","متنی تنظیم نشده");
	   	   save("Bot/$username_bot/data/name.txt","ساخت ربات ویوگیر");
		   	   save("Bot/$username_bot/data/link.txt","LINE_ROBOT");
	   save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $index = file_get_contents("administrative/source/viogir/bot.php");
  $index = str_replace("[*[TOKEN]*]",$token,$index);
  $index = str_replace("[*[ADMIN]*]",$from_id,$index);
    $index = str_replace("[*[username]*]",$username,$index);
	$index = str_replace("[*[botid]*]",$username_bot,$index);
  save("Bot/$username_bot/bot.php",$index);	
    $jdf = file_get_contents("administrative/source/viogir/jdf.php");
	 save("Bot/$username_bot/jdf.php",$jdf);	
  $textinstalls = "ربات شما با موفقیت به سرور @LINE_ROBOT متصل شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/bot.php");
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇
پنل مدیریت 
/panel
را برای ربات بفرستین

","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));

SendMessage($kanal,"✅ ربات ساخته شد  توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @LINE_ROBOT",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));

SendMessage($kanal,"","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/Bots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/Bots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/Bots.txt',$aaddd);
  }
  }
  }
  }
  }
  
  
  ///////////////////////////////////
    elseif($command == 'create add'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/add/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/add/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
      elseif($command == 'create erf'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/erf/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان??) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/erf/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
      elseif($command == 'create erfan'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/erfan/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/erfan/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
      elseif($command == 'create addkon'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/addkon/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/addkon/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ///////////////////////////////////
    elseif($command == 'create kasb'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  $class = file_get_contents("administrative/source/kasb/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/kasb/index.php");
  save("Bot/$username_bot/index.php",$index);	
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز آاش 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
  mkdir("Bot/$username_bot/admin");
  mkdir("Bot/$username_bot/ads");
  mkdir("Bot/$username_bot/user");
  mkdir("Bot/$username_bot/admin/code");
  mkdir("Bot/$username_bot/ads/ads admin");
  mkdir("Bot/$username_bot/ads/ads msg id");
  mkdir("Bot/$username_bot/ads/ads tally");
  mkdir("Bot/$username_bot/ads/ads tedad");
  mkdir("Bot/$username_bot/ads/ads username");
  mkdir("Bot/$username_bot/ads/ads time");
  mkdir("Bot/$username_bot/ads/ads date");
  mkdir("Bot/$username_bot/data");
  save("Bot/$username_bot/data/start.txt","Hi!✋ 
  Welcome To My Bot");
  save("Bot/$username_bot/data/help.txt","راهنمایی تنظیم نشده است");
  save("Bot/$username_bot/data/channel.txt","تنظیم نشده");
  save("Bot/$username_bot/data/shop.txt","متن فروشگاه ثبت نشده است.");
  save("Bot/$username_bot/data/zir.txt","متن زیر مجموعه گیری ثبت نشده است");
  save("Bot/$username_bot/data/seen.txt","1");
  save("Bot/$username_bot/data/coinlink.txt","5");
  save("Bot/$username_bot/data/bottype.txt","free");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/kasb/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/kasb/index.php");
  save("Bot/$username_bot/index.php",$index);	
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
        elseif($command == 'create gap'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/gap/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/gap/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ///////////////////////////////////
        elseif($command == 'create mozik'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/mozik/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/mozik/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ///////////////////////////////////
        elseif($command == 'create fake'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/fake/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/fake/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ///////////////////////////////////
          elseif($command == 'create shis'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/shis/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/shis/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ///////////////////////////////////
  elseif($command == 'create2'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the 
  API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"‼️دوست عزیز توکن مورد نظر نامعتبر است.

⭕️لطفا با دقت بیشتر یک توکن صحیح بفرستید:","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  save('ads/user/'.$from_id."/command.txt","none");
  save("ads/admin-and-token/token/$username_bot.txt",$token);
  save("ads/admin-and-token/admin/$username_bot.txt",$from_id);
    $textinstalls = "ربات شما با موفقیت در سرور @LINE_ROBOT بروزرسانی شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/pvsaz/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"✅ ربات شما با موفقیت آپدیت شد.

✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  
    SendMessage($kanal,"✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @LINE_ROBOT",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('ads/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ دوست عزیز شما قبلا یک ربات ساخته اید برای ربات دوم باید مبلغ 1,000 تومن پرداخت کنید.برای اطلاعات بیشتر به @heman_joker کنید","html","true",$button_official_fa);
  }else{
  save('ads/user/'.$from_id."/command.txt","none");
  save('ads/user/'.$from_id."/create.txt","true");
  mkdir("Bot/$username_bot");
   mkdir("Bot/$username_bot/Bot");
  mkdir("Bot/$username_bot/data");
  save("ads/admin-and-token/token/$username_bot.txt",$token);
  save("ads/admin-and-token/admin/$username_bot.txt",$from_id);
  $index = file_get_contents("ads/bot3/index.php");
  $index = str_replace("[*[TOKEN]*]",$token,$index);
  $index = str_replace("[*[ADMIN]*]",$from_id,$index);
  save("Bot/$username_bot/index.php",$index);	
  $textinstalls = "ربات شما با موفقیت به سرور @LINE_ROBOT متصل شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/pvsaz/Bot/$username_bot/index.php");
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));

SendMessage($kanal,"✅ ربات ساخته شد  توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @LINE_ROBOT",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));

SendMessage($kanal,"","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  
  $txxt = file_get_contents('ads/access/Bots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('ads/access/Bots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('ads/access/Bots.txt',$aaddd);
  }
  }
  }
  }
  }
       //==============
      elseif($command == 'create bottabchi'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"‼️دوست عزیز توکن مورد نظر نامعتبر است.

⭕️لطفا با دقت بیشتر یک توکن صحیح بفرستید:","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/tabchisaz/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/tabchisaz/index.php");
  save("Bot/$username_bot/index.php",$index);	
    $textinstalls = "ربات شما با موفقیت در سرور @LINE_ROBOT بروزرسانی شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  
  SendMessage($chat_id,"✅ ربات شما با موفقیت آپدیت شد.

✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ دوست عزیز شما قبلا یک ربات ساخته اید برای ربات دوم باید مبلغ 1,000 تومن پرداخت کنید.برای اطلاعات بیشتر به 
  @Poshtiban_holobot
  مراجعه کنید","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","true");
  mkdir("Bot/$username_bot");
  mkdir("Bot/$username_bot/bot");
  $indexx = file_get_contents("administrative/source/tabchisaz/indexx.php");
  save("Bot/$username_bot/bot/indexx.php",$indexx);
  mkdir("Bot/$username_bot/bots");
  mkdir("Bot/$username_bot/data");
  mkdir("Bot/$username_bot/data/$from_id");
  save("Bot/$username_bot/data/start.txt","Hi!✋ 
  Welcome To My Bot");
  save("Bot/$username_bot/data/help.txt","راهنمایی تنظیم نشده است");
  save("Bot/$username_bot/data/channel.txt","تنظیم نشده");
  save("Bot/$username_bot/data/posh.txt","تنظیم نشده");
  save("Bot/$username_bot/data/channel_lock.txt","");
  save("Bot/$username_bot/data/bot_type_tabchi.txt","free");
  save("Bot/$username_bot/data/creator_username.txt","$username_bot");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/tabchisaz/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/tabchisaz/index.php");
  save("Bot/$username_bot/index.php",$index);	
  $textinstalls = "ربات شما با موفقیت به سرور @LINE_ROBOT متصل شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
    elseif($command == 'ممب'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the 
  API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  	   save("Bot/$username_bot/data/start.txt","😎 سلام! خوش اومدی 

☑️ یک گزینه رو انتخاب کن ☑️");
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
   $index = file_get_contents("administrative/source/member/bot.php");
  $index = str_replace("[*[TOKEN]*]",$token,$index);
  $index = str_replace("[*[ADMIN]*]",$from_id,$index);
    $index = str_replace("[*[username]*]",$username,$index);
	$index = str_replace("[*[botid]*]",$username_bot,$index);
  save("Bot/$username_bot/bot.php",$index);	
    $jdf = file_get_contents("administrative/source/member/jdf.php");
	 save("Bot/$username_bot/jdf.php",$jdf);	
    $textinstalls = "ربات شما با موفقیت در سرور @LINE_ROBOT بروزرسانی شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Amirhose12.maxmizban.xyz/Bot/$username_bot/bot.php");
  
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
⚡ به ربات ما امتیاز بدین⚡
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀⚡
پنل مدیریت 
/panel
را برای ربات بفرستین

","html","true",json_encode(['inline_keyboard'=>[[['text'=>"⚡ @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  
    SendMessage($chnnal,"✅ ربات آپدیت شد توسط ⚡ ($username)}{🤖 ربات مربوطه ⚡ (@$username_bot)}{⏰ زمان ⚡ ($time)}{📅 تاریخ ⚡ ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"⚡ @LINE_ROBOT",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"⚡ به منوی اصلی برگشتید

⚡ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ دوست عزیز شما قبلا یک ربات ساخته اید برای ربات دوم باید مبلغ 1,000 تومن پرداخت کنید.برای اطلاعات بیشتر به @heman_jokerکنید","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","true");
  mkdir("Bot/$username_bot");
     mkdir("Bot/$username_bot/data");
	  mkdir("Bot/$username_bot/data/$chat_id");
	  mkdir("Bot/$username_bot/cod");
	   mkdir("Bot/$username_bot/ads");
	   mkdir("Bot/$username_bot/ads/user");
mkdir("Bot/$username_bot/ads/cont");
mkdir("Bot/$username_bot/ads/date");
mkdir("Bot/$username_bot/ads/seen");
mkdir("Bot/$username_bot/ads/time");
mkdir("Bot/$username_bot/ads/user");
mkdir("Bot/$username_bot/ads/admin");
	   save("Bot/$username_bot/data/shop.txt","متنی تنظیم نشده");
	   save("Bot/$username_bot/data/channel.txt","تنظیم نشده");
	   save("Bot/$username_bot/data/pen.txt");
	   save("Bot/$username_bot/data/frosh.txt");
	   	   save("Bot/$username_bot/data/name.txt","ساخت ربات ویوگیر");
		   	   save("Bot/$username_bot/data/link.txt","LINE_ROBOT");
	   save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $index = file_get_contents("administrative/source/member/bot.php");
  $index = str_replace("[*[TOKEN]*]",$token,$index);
  $index = str_replace("[*[ADMIN]*]",$from_id,$index);
    $index = str_replace("[*[username]*]",$username,$index);
	$index = str_replace("[*[botid]*]",$username_bot,$index);
  save("Bot/$username_bot/bot.php",$index);	
    $jdf = file_get_contents("administrative/source/member/jdf.php");
	 save("Bot/$username_bot/jdf.php",$jdf);	
  $textinstalls = "ربات شما با موفقیت به سرور @LINE_ROBOT متصل شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/bot.php");
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
⚡ به ربات ما امتیاز بدین⚡
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀⚡
پنل مدیریت 
/panel
را برای ربات بفرستین

","html","true",json_encode(['inline_keyboard'=>[[['text'=>"⚡ @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));

SendMessage($chnnal,"✅ ربات ساخته شد  توسط ⚡ ($username)}{🤖 ربات مربوطه ⚡ (@$username_bot)}{⏰ زمان ⚡ ($time)}{📅 تاریخ ⚡ ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"⚡ @LINE_ROBOT",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));

SendMessage($chnnal,"","html","true",json_encode(['inline_keyboard'=>[[['text'=>"⚡ @$username_bot",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"⚡ به منوی اصلی برگشتید

⚡ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/Bots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/Bots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/Bots.txt',$aaddd);
  }
  }
  }
  }
  }
  
  
  ////////////////////////////////////
  elseif($command == 'create bot8'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/del/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/del/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز ربات ساز لاین سافت 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  
  
  ////////////////////////////////////
    elseif($command == 'ست'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the 
  API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/admin-and-token/token/$username_bot.txt",$token);
  save("administrative/admin-and-token/admin/$username_bot.txt",$from_id);
    $textinstalls = "ربات شما با موفقیت در سرور @LINE_ROBOT بروزرسانی شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"✅ ربات شما با موفقیت آپدیت شد.

✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  
    SendMessage($kanal,"✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @LINE_ROBOT",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ دوست عزیز شما قبلا یک ربات ساخته اید برای ربات دوم باید مبلغ 1,000 تومن پرداخت کنید.برای اطلاعات بیشتر به @heman_joker کنید","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","true");
  mkdir("Bot/$username_bot");
   mkdir("Bot/$username_bot/data");
  save("administrative/adminand-token/token/$username_bot.txt",$token);
  save("administrative/adminand-token/admin/$username_bot.txt",$from_id);
  $index = file_get_contents("administrative/source/shop/index.php");
  $index = str_replace("[*[TOKEN]*]",$token,$index);
  $index = str_replace("[*[ADMIN]*]",$from_id,$index);
  save("Bot/$username_bot/index.php",$index);
  $textinstalls = "ربات شما با موفقیت به سرور @LINE_ROBOT متصل شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));

SendMessage($kanal,"✅ ربات ساخته شد  توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @LINE_ROBOT",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));

SendMessage($kanal,"","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/Bots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/Bots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/Bots.txt',$aaddd);
  }
  }
  }
  }
  }
  //==============
  elseif($command == 'create chatnashenas'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/Chatnashenas/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/Chatnashenas/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create trans'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/data/start.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/trans/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/trans/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
 ///////////////////////////////
    elseif($command == 'create short'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/data/start.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/short/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/short/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  /////////////////////////////////////////////
  elseif($command == 'create zedelink'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/zeee/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[idbot]*]",$username_bot,$class);
  save("Bot/$username_bot/Class.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
??ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/zeee/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[idbot]*]",$username_bot,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/zeee/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create banerr'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  $class = file_get_contents("administrative/source/baner/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/baner/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/bot_type_ads.txt","free");
save("Bot/$username_bot/starttxt.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/baner/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/baner/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create shopsaz'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  $class = file_get_contents("administrative/source/shopsaz/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/shopsaz/index.php");
save("Bot/$username_bot/bot/index.php",$claaas); 
$claaasss = file_get_contents("administrative/source/shopsaz/indexvip.php");
save("Bot/$username_bot/bot/indexvip.php",$claaasss); 
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز آاش 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/bots");
mkdir("Bot/$username_bot/bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/startt.txt","سلام خوش اومدی");
save("Bot/$username_bot/uzernameebot.txt","$username_bot");
save("Bot/$username_bot/botttype.txt");
save("Bot/$username_bot/booleans.txt");
save("Bot/$username_bot/banlist.txt");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/shopsaz/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/shopsaz/index.php");
save("Bot/$username_bot/bot/index.php",$claaas); 
$claaasss = file_get_contents("administrative/source/shopsaz/indexvip.php");
save("Bot/$username_bot/bot/indexvip.php",$claaasss); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create aksnevesh'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/starttxt.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/aksneveshte/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/aksneveshte/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create editename'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Amirhose12.maxmizban.xyz/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/data/start.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/editename/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/editename/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create tbligcho'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/tab/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/tab/index.php");
save("Bot/$username_bot/index.php",$claaas); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
mkdir("Bot/$username_bot/admin");
mkdir("Bot/$username_bot/user/$from_id");
save("Bot/$username_bot/admin/start.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/tab/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/tab/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
??جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create tst'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $clslass = file_get_contents("administrative/source/see/Class.php");
  $clslass = str_replace("[*[TOKEN]*]",$token,$clslass);
$clslass = str_replace("[*[ADMIN]*]",$from_id,$clslass);
  save("Bot/$username_bot/Class.php",$clslass);
    $textinstalls = "??ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/ads");
mkdir("Bot/$username_bot/cod");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/ads/admin");
mkdir("Bot/$username_bot/ads/cont");
mkdir("Bot/$username_bot/ads/date");
mkdir("Bot/$username_bot/ads/seen");
mkdir("Bot/$username_bot/ads/time");
mkdir("Bot/$username_bot/ads/user");
save("Bot/$username_bot/data/bottype.txt","o");
save("Bot/$username_bot/data/buy.txt","$from_id");
save("Bot/$username_bot/data/starttx.txt","سلام خوش اومدی");
save("Bot/$username_bot/data/setcoin2.txt","10");
save("Bot/$username_bot/data/setcoin.txt","1");
save("Bot/$username_bot/data/uzernamo.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/data/coinruz.txt","10");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/see/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/see/index.php");
save("Bot/$username_bot/index.php",$claaas); 
$claaass = file_get_contents("administrative/source/see/jdf.php");
save("Bot/$username_bot/jdf.php",$claaass); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create80'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the 
  API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  save('ads/user/'.$from_id."/command.txt","none");
  save("ads/admin-and-token/token/$username_bot.txt",$token);
  save("ads/admin-and-token/admin/$username_bot.txt",$from_id);
    $textinstalls = "ربات شما با موفقیت در سرور @LINE_TMبروزرسانی شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"✅ ربات شما با موفقیت آپدیت شد.

✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=pvnarenj

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  
    SendMessage($kanal,"✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @LINE_TM",'url'=>"https://telegram.me/pvnarenj"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('ads/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ دوست عزیز شما قبلا یک ربات ساخته اید برای ربات دوم باید مبلغ 1,000 تومن پرداخت کنید.برای اطلاعات بیشتر به @heman_joker کنید","html","true",$button_official_fa);
  }else{
  save('ads/user/'.$from_id."/command.txt","none");
  save('ads/user/'.$from_id."/create.txt","true");
  mkdir("Bot/$username_bot");
   mkdir("Bot/$username_bot/data");
  save("ads/admin-and-token/token/$username_bot.txt",$token);
  save("ads/admin-and-token/admin/$username_bot.txt",$from_id);
  $index = file_get_contents("ads/source/add/index.php");
  $index = str_replace("[*[TOKEN]*]",$token,$index);
  $index = str_replace("[*[ADMIN]*]",$from_id,$index);
  save("Bot/$username_bot/index.php",$index);
  $textinstalls = "ربات شما با موفقیت به سرور @LINE_TMمتصل شد✅
برای مشاهده خدمات لطفا /start را ارسال بکنید🗳";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/index.php");
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=LINE_ROBOT

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));

SendMessage($kanal,"✅ ربات ساخته شد  توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @LINE_TM",'url'=>"https://telegram.me/pvnarenj"]],]]));

SendMessage($kanal,"","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/LINE_ROBOT"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_fa);
  
  $txxt = file_get_contents('ads/access/Bots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('ads/access/Bots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('ads/access/Bots.txt',$aaddd);
  }
  }
  }
  }
  }
  //==============
  elseif($command == 'create botpv'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
  mkdir("Bot/$username_bot/other");
  mkdir("Bot/$username_bot/data");
  mkdir("Bot/$username_bot/other/$from_id");
  mkdir("Bot/$username_bot/other/access");
  mkdir("Bot/$username_bot/other/button");
  mkdir("Bot/$username_bot/other/profile");
  mkdir("Bot/$username_bot/other/setting");
  mkdir("Bot/$username_bot/other/wordlist");
  mkdir("Bot/$username_bot/other/button/caption");
  mkdir("Bot/$username_bot/other/button/file");
  mkdir("Bot/$username_bot/other/button/forward");
  mkdir("Bot/$username_bot/other/button/music");
  mkdir("Bot/$username_bot/other/button/photo");
  mkdir("Bot/$username_bot/other/button/feed");
  mkdir("Bot/$username_bot/other/button/sticker");
  mkdir("Bot/$username_bot/other/button/text");
  mkdir("Bot/$username_bot/other/button/video");
  mkdir("Bot/$username_bot/other/button/voice");
  save("Bot/$username_bot/other/setting/start.txt","Hi!✋ 
  <b>Welcome To My Bot</b>");
  save("Bot/$username_bot/other/setting/send.txt","<b>Sent To My Admin!</b>");
  save("Bot/$username_bot/other/setting/sticker.txt","✅");
  save("Bot/$username_bot/other/setting/file.txt","✅");
  save("Bot/$username_bot/other/setting/aks.txt","✅");
  save("Bot/$username_bot/other/setting/music.txt","✅");
  save("Bot/$username_bot/other/setting/film.txt","✅");
  save("Bot/$username_bot/other/setting/voice.txt","✅");
  save("Bot/$username_bot/other/setting/join.txt","✅");
  save("Bot/$username_bot/other/setting/link.txt","✅");
  save("Bot/$username_bot/other/setting/forward.txt","✅");
  save("Bot/$username_bot/other/setting/pm_forward.txt","⛔️");
  save("Bot/$username_bot/other/setting/pm_resani.txt","✅");
  save("Bot/$username_bot/other/setting/on-off.txt","true");
  save("Bot/$username_bot/other/setting/profile.txt","✅");
  save("Bot/$username_bot/other/setting/contact.txt","⛔️");
  save("Bot/$username_bot/other/setting/location.txt","⛔️");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/index.php");
  save("Bot/$username_bot/index.php",$index);	
  $butt = file_get_contents("administrative/source/Button.php");
  save("Bot/$username_bot/other/Button.php",$butt);	
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create robotsaz'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
   $indexasl = file_get_contents("administrative/source/Robotsaz/index.php");
$indexasl = str_replace("[*[ADMIN]*]",$from_id,$indexasl);
  save("Bot/$username_bot/index.php",$indexasl); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/Bot");
mkdir("Bot/$username_bot/administrative");
mkdir("Bot/$username_bot/administrative/access");
mkdir("Bot/$username_bot/administrative/user");
mkdir("Bot/$username_bot/administrative/code");
mkdir("Bot/$username_bot/administrative/banall-member");
mkdir("Bot/$username_bot/administrative/tokensadmins");
mkdir("Bot/$username_bot/administrative/tokensadmins/token");
mkdir("Bot/$username_bot/administrative/tokensadmins/admin");
mkdir("Bot/$username_bot/administrative/source");
mkdir("Bot/$username_bot/administrative/source/tab");
mkdir("Bot/$username_bot/administrative/source/view");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/text_start.txt","به سرویس ربات ساز خوش اومدی");
save("Bot/$username_bot/administrative/access/text_ads_mamol.txt","🤖Create Your Robot Create😃
🤖ربات ساز خود را بسازید😃👇
🆔 @LINE_ROBOT
✊️با سرور قوی و پرسرعت💪
✌️و پنلی بسیار پیشرفته😎");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $indexasl = file_get_contents("administrative/source/Robotsaz/index.php");
$indexasl = str_replace("[*[ADMIN]*]",$from_id,$indexasl);
  save("Bot/$username_bot/index.php",$indexasl); 
   $indexasl1 = file_get_contents("administrative/source/Robotsaz/Class.php");
   $indexasl1 = str_replace("[*[TOKEN]*]",$token,$indexasl1);
$indexasl1 = str_replace("[*[ADMIN]*]",$from_id,$indexasl1);
  save("Bot/$username_bot/administrative/access/Class.php",$indexasl1); 
   $indexasl2 = file_get_contents("administrative/source/Robotsaz/tab/Class.php");
   save("Bot/$username_bot/administrative/source/tab/Class.php",$indexasl2); 
   $indexasl3 = file_get_contents("administrative/source/Robotsaz/view/Class.php");
   save("Bot/$username_bot/administrative/source/view/Class.php",$indexasl3); 
   $indexasl4 = file_get_contents("administrative/source/Robotsaz/view/index.php");
   save("Bot/$username_bot/administrative/source/view/index.php",$indexasl4); 
      $indexasl5 = file_get_contents("administrative/source/Robotsaz/pm/index.php");
   save("Bot/$username_bot/administrative/source/index.php",$indexasl5); 
         $indexasl6 = file_get_contents("administrative/source/Robotsaz/pm/Class.php");
   save("Bot/$username_bot/administrative/source/Class.php",$indexasl6); 
   $indexasl7 = file_get_contents("administrative/source/Robotsaz/pm/Button.php");
   save("Bot/$username_bot/administrative/source/Button.php",$indexasl7); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز لاین 
  @LINE_ROBOT 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://arashsoft1.tk/Arashsoft/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=LINE_ROBOT
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"📦 به صفحه اصلی ربات برگشتیم.
📍لطفا از دکمه های زیر یکی را انتخاب کنید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  //==========
  // Manage
  elseif($text == '👤مدیریت' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🈸 به بخش ادمین خوش اومدین","html","true",$button_manage);
  }
  elseif ($text == 'افزودن ادمین' and $from_id == $admin){
	  $s = file_get_contents("administrative/admin.txt");
	 save('administrative/user/'.$from_id."/command.txt","addadmin");
	 sendMessage($chat_id,"سلام
	 لطفا ایدی ادمین را بصورت آرایه
	 ,id
	 در فایل 
	 administrative/admin.txt
	 اضافه کنید.
	 و ایدی فرد را اینجا وارد کنید تا من خبر ادمین شدنشو بهش بدم","html","true",$button_back);
  }
  elseif($command == 'addadmin' and $from_id == $admin){
	save('administrative/user/'.$from_id."/command.txt","none");
	save('administrative/admin.txt',"$text");
	sendMessage($chat_id,"فرد موردنظر ادمین شد!");
	sendMessage($text,"تبریک شما ادمین شدید
	لطفا قوانین را رعایت کنید");
  }
  //============
  elseif($text == '☢کد رایگان' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","cod free");
  SendMessage($chat_id,"☢ کد مورد نظر رو وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'cod free' and $from_id == $admin){
  save("administrative/code/$text.txt","false");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"☢ کد ثبت شد.","html","true",$button_manage);
  SendMessage($kanal,"🎁کد رایگان مخصوص ویژه کردن ربات 
⚜کد یکبار مصرف
➖➖➖➖➖➖➖➖
code : $text
➖➖➖➖➖➖➖➖
❗️روش استفاده:
۱-وارد ربات @LINE_ROBOT شوید.
۲-روی گزینه 📦 استفاده از کد بزنید.
۳-نوع ربات خود را انتخاب کنید.
۴-کد $text را ارسال کنید.
۵-آیدی ربات خود را بدون @ و دقیق ارسال کنید.
تبریک ربات شما ویژه شد✔️
*******************
🆑 @LINE_TM
🤖 @LINE_ROBOT","html","true");
  }
  //============
  elseif($text == '⭕️لغو حساب ویژه' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","laghv hesab");
  SendMessage($chat_id,"⭕️ یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'laghv hesab' and $from_id == $admin){
  unlink("Bot/$text/data/bottype.txt");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ حساب غیر ویژه شد.","html","true",$button_manage);
  SendMessage($admin,"از طرف آدمین ربات رباتی غیر ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '🤗ویژه کردن ربات ساز😎' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2311y");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2311y' and $from_id == $admin){
  save("Bot/$text/botupe.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  //============
  elseif($text == '⚜️ویژه کردن ربات فروشگاه ساز' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab gold5");
  SendMessage($chat_id,"🔱 یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab gold5' and $from_id == $admin){
  save("Bot/$text/botttype.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
  SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
  elseif($text == '⚜️ویژه کردن ربات پیام رسان' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab gold");
  SendMessage($chat_id,"🔱 یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab gold' and $from_id == $admin){
  save("Bot/$text/data/bottype.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
  SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '⚜️ویژه کردن ربات ویوگیر️' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview' and $from_id == $admin){
  save("Bot/$text/data/bottype.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
    ////////////////////////
    elseif($text == 'ویژه کردن بنردهی' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview23");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview23' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == 'ویژه کردن تغییر نام فایل📝' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview231");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview231' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
    ////////////////////////
    elseif($text == 'ویژه کردن📝' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2361");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2361' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '✉️ویژه کردن تبچی' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2311");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2311' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '🔑ویژه کردن ضد لینک' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2311");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2311' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '💬ویژه کردن چت ناشناس' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2311");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2311' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  //============
  elseif($text == '🤖ربات دوم' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","Bot 2");
  SendMessage($chat_id,"🤖 پیامی از شخص مورد نظر فوروارد کنید","html","true",$button_back2);
  }
  elseif($command == 'Bot 2' and $from_id == $admin){
  unlink("administrative/user/".$forward_id."/create.txt");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🤖 شخص مورد نظر ربات دیگری میتواند بسازد.","html","true",$button_manage);
  SendMessage($admin,"از طرف آدمین ربات فردی ربات دومش فعال شد.
آیدی آدمین:
@$username
آیدی فرد
$text","html","true",$button_back2);
  }
  //============
  elseif($text == '🔖 آمار فعلی ربات'){
	  $txtt = file_get_contents('administrative/access/mum.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
	$mmemcount_member = numberformat("$mmemcount",',');
	$txttt = file_get_contents('administrative/access/robots.txt');
    $member_id1 = explode("\n",$txttt);
    $mmemcount1 = count($member_id1) -1;
	$mmemcount_bots = numberformat("$mmemcount1",',');
	$txtttt = file_get_contents('administrative/access/allm.txt');
    $member_id111 = explode("\n",$txtttt);
    $mmemcount111 = count($member_id111) -1;
	$mmemcount_member_all_bot = numberformat("$mmemcount111",',');
	$adminHA = getFileList('administrative/tokensadmins/admin','.txt');
	$tokenHA = getFileList('administrative/tokensadmins/token','.txt');
	$bots = file_get_contents("administrative/access/UserName.txt");
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
  SendMessage($chat_id,"📦 آخرین آمار ربات ساز لاین به شرح زیر می باشد.

📌 تعداد ربات های ساخته شده:
$mmemcount_bots

📍تعداد اعضای اصلی ربات ساز:
$mmemcount_member

● @LINE_ROBOT ●
  ","html","true");
  }
  //============
  elseif($text =="/creator") {
	bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "این ربات توسط @heman_joker ساخته شده هست شما هم میتوانید همچین رباتی داشته باشید ⚡ ",
]);
}
  //============
elseif($text =="🌐 اسپـــــانسـر 🌐") {
	bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "این قسمت بعدا تکمیل میشود.📰",
]);
}
  //============
  elseif($text == '📮فوروارد همگانی' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","s2a fwd");
	SendMessage($chat_id,"📮 پیام مورد نظر را فوروارد کنید","html","true",$button_back2);
	}
	elseif($command == 's2a fwd' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📮 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "administrative/access/mum.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			ForwardMessage($user,$admin,$message_id);
		}
	}
	//===========
	elseif($text == '📭پیام همگانی' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","s2a");
	SendMessage($chat_id,"📭 پیامتون رو وارد کنید","html","true",$button_back2);
	}
	elseif($command == 's2a' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📭 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "administrative/access/mum.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($sticker_id != null){
			SendSticker($user,$sticker_id);
			}
			elseif($video_id != null){
			SendVideo($user,$video_id,$caption);
			}
			elseif($voice_id != null){
			SendVoice($user,$voice_id,'',$caption);
			}
			elseif($file_id != null){
			SendDocument($user,$file_id,'',$caption);
			}
			elseif($music_id != null){
			SendAudio($user,$music_id,'',$caption);
			}
			elseif($photo2_id != null){
			SendPhoto($user,$photo2_id,'',$caption);
			}
			elseif($photo1_id != null){
			SendPhoto($user,$photo1_id,'',$caption);
			}
			elseif($photo0_id != null){
			SendPhoto($user,$photo0_id,'',$caption);
			}
			elseif($text != null){
			SendMessage($user,$text,"html","true");
			}
		}
	}
//============
elseif($text == '📟تبلیغات' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","ads");
	SendMessage($chat_id,"📟 تبلیغ مورد نظر رو فوروارد کنید","html","true",$button_back2);
	}
	elseif($command == 'ads' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	save("administrative/access/forward-msg-id.txt",$from_chat_msg_id);
	save("administrative/access/forward-id.txt","@$from_chat_username");
	SendMessage($chat_id,"📟 تبلیغ مورد نظر ثبت شد.","html","true",$button_manage);
	}
	//============
	elseif($text == 'banels'){
  SendMessage($chat_id,"کل اعضا بن شده👇
$banels","html","true");
  }
  //===============
  elseif($text == '/ban' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","cod ban");
  SendMessage($chat_id,"ایدیشو بفرس","html","true",$button_back2);
  }
  elseif($command == 'cod ban' and $from_id == $admin){
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"بلاک شد🚫","html","true",$button_manage);
  SendMessage($text,"شما از ربات بلاک شده اید🚫📛
🚷اگر اشتباه بلاک شده اید به ما خبر دهید👇
@heman_joker","html","true");
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $text."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  }
  }
	//==========
	 elseif($text == '📡لیست افراد بلاک شده' and $from_id == $admin){
	
	$botsban = file_get_contents("administrative/banall-member/banall.txt");
	$exbotban = explode(">",$botsban);
	$c = count($exbotban)-2;
	$botsssban = '';
	if($exbotban[$c-(-1)] != null){
	$botsssban = $botsssban.">".$exbotban[$c-(-1)];
	}if($exbotban[$c] != null){
	$botsssban = $botsssban.">".$exbotban[$c];
	}if($exbotban[$c-1] != null){
	$botsssban = $botsssban.">".$exbotban[$c-1];
	}if($exbotban[$c-2] != null){
	$botsssban = $botsssban.">".$exbotban[$c-2];
	}if($exbotban[$c-3] != null){
	$botsssban = $botsssban.">".$exbotban[$c-3];
	}if($exbotban[$c-4] != null){
	$botsssban = $botsssban.">".$exbotban[$c-4];
	}if($exbotban[$c-5] != null){
	$botsssban = $botsssban.">".$exbotban[$c-5];
	}if($exbotban[$c-6] != null){
	$botsssban = $botsssban.">".$exbotban[$c-6];
	}if($exbotban[$c-7] != null){
	$botsssban = $botsssban.">".$exbotban[$c-7];
	}if($exbotban[$c-8] != null){
	$botsssban = $botsssban.">".$exbotban[$c-8];
	}
	$botsssban = str_replace("\n",' | ',$botsssban);
	
	SendChatAction($chat_id,"typing");
	SendMessage($chat_id,"<i>📊🕵لیست </i> <code>10</code> <i>کاربر بلاک شده: </i>
	$botsssban","html","true");
	}
	
    //============
else{
  SendMessage($chat_id,"✨ دوست عزیز منظورتو نفهمیدم ربات آپدیت شده لطفا دوباره ربات را استارت کنید ✨👇

🔺 /start 🔺","html","true");
  SendMessage($admin,"دستور نامشخص زد👇
نام کاربر : $first
یوزرنیم : @$username
آیدی عددی : $from_id
متن نامشخص : $text","html","true");
}
mkdir('administrative/user/'.$from_id);
$txxt = file_get_contents('administrative/access/mum.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('administrative/access/mum.txt');
      $aaddd .= $chat_id."\n";
		file_put_contents('administrative/access/mum.txt',$aaddd);
    }
	$txxt = file_get_contents('administrative/access/UserName.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array("@".$username,$pmembersid)){
      $aaddd = file_get_contents('administrative/access/UserName.txt');
      $aaddd .= "@".$username."\n";
	  if($username != null){
		file_put_contents('administrative/access/UserName.txt',$aaddd);
	  }
    }
    unlink("error_log");
?>