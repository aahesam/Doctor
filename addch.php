<?php 

ob_start();
/*
به نام خدا
کاری از 
@amir_social
کانال:
@social_programming
*/

$API_KEY = 'توکن';
##------------------------------##
define('API_KEY',$API_KEY);
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
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
    function SendPhoto($chatid,$photo,$keyboard,$caption){
     bot('SendPhoto',[
        'chat_id'=>$chatid,
        'photo'=>$photo,
        'caption'=>$caption,
        'reply_markup'=>$keyboard
    ]);
    }
    function Forward($KojaShe,$AzKoja,$KodomMSG)
    {
    bot('ForwardMessage',[
    'chat_id'=>$KojaShe,
    'from_chat_id'=>$AzKoja,
    'message_id'=>$KodomMSG
    ]);
    }
    function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
	function SendVideo($chatid,$video,$caption,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
    'caption'=>$caption,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
	function remdir($dir){
    exec("rm -rf ".$dir);
    }
//====================special======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$message_id = $update->message->id;
$username = $update->message->from->username;
$name = $update->message->from->first_name;
$text = $message->text;
@$amir = file_get_contents("amir.txt");
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=@ایدی جهت جوین اجباری&user_id=".$from_id));
$tch = $forchaneel->result->status;
@$step = file_get_contents("data/$from_id/step.txt");
@$captio = file_get_contents("data/captio.txt");
@$vaz = file_get_contents("data/vaz.txt");
$payan = file_get_contents("data/payan.txt");
$vach = file_get_contents("data/vach.txt");
@$she = file_get_contents("data/photo.txt");
$add = file_get_contents("add/$from_id.txt");
$barandeh = file_get_contents("barandeh.txt");
$hal = file_get_contents("hal.txt");
$photo = $update->message->photo;
$photoid = $photo[count($photo)-1]->file_id;
$ADMIN = ;//ایدی سودو
$chan = ;// ایدی عددی کانال برای ثبت بنر کاربران در ان
//====================special=================//
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
  SendMessage($chat_id,"سلام🌹
🔸جهت حمایت و استفاده از ربات ما و همچنین اطلاع از بروز رسانی ها در کانال زیر عضو شوید و سپس گزینه 
/start
را بزنید.↖️
ایدی کانال ما:
🆔 : @social_programming ");
  }
else{
if($text == '/start'){
mkdir("data/$from_id");
mkdir("add");
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }
sendaction($chat_id,'typing');
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"
$name
🔰عضویت شما را در این بات تبریک میگویم

برای شرکت در چالش از دکمه های زیر استفاده کنید👇",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'keyboard'=>[
		  [['text'=>"ثبت چالش"]], 
		  [['text'=>"راهنمایی"]]		  
		  ],'resize_keyboard'=>true
		])
  ]);
}
elseif($text == "راهنمایی"){
sendMessage($chat_id,"1ـ ابتدا با استفاده از دکمه `شرکت در چالش` بنر خود را ثبت کنید.
2ـ سپس وارد کانالی که بعد از ثبت بنر برای شما ارسال شد شوید .
3ـ بعد وارد شدن به کانال بنری که اسم شما بر روی آن ثبت شده است پیدا کنید 
4ـ بنر خود را در گروه ها و ... ارسال کنید تا بازدید آن زیاد شود
- توجه داشته باشید بنرتان باید بیشترین بازدید را داشته باشد تا برنده چالش شوید
https://t.me/joinchat/AAAAAEGSJQixVJKRM5EvwQ
");   
}
elseif($text == 'بازگشت'){
sendaction($chat_id,'typing');
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"به منوی اصلی برگشتید",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'keyboard'=>[
		  [['text'=>"ثبت چالش"]],  
		  [['text'=>"راهنمایی"]]
		  ],'resize_keyboard'=>true
		])
  ]);
}


elseif($text == "ثبت چالش" && $add == "add" || $text == "ثبت چالش" && $payan != "add"){
sendaction($chat_id,'typing');
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"
⚠️ بنر شما قبلا ثبت شده است.
و یا فرصت چالش تمام شده است
ـ در صورتی که مشکلی در ثبت بنر وجود دارد به ایدی زیر پیام دهید :

🆔 : @amir_social
",
	'parse_mode'=>'html',
  ]);
}
if($text == "تعیین بنر عکسی" && $chat_id == "$ADMIN"){ 
sendMessage($chat_id,"
متن چالشتان را بفرستید");
save("data/$from_id/step.txt","zed");
}
///###################################################
if($text == "برنده" && $chat_id == $ADMIN){
sendmessage($chat_id,"چت ایدی برنده را بفرستید");
save("hal.txt","ok");
}
if($hal == "ok" && $chat_id == $ADMIN){
save("barandeh.txt","$text");
sendmessage($chat_id,"حله");
save("hal.txt","no");
}
if($text == "ارتباط با برنده" && $chat_id == $ADMIN){
save("hal.txt","arteb");
sendmessage($chat_id,"هم اکنون هر متنی بفرستید به برنده ارسال خواهد شد. جهت قطع این ارتباط یک طرفه دستور /payan را بفرستید.");
}
if($hal == "arteb" ){
if($chat_id == $ADMIN){
if($text && $text != "/payan"){
  bot('sendMessage',[
    'chat_id'=>$barandeh,
    'text'=>"$text",
  'parse_mode'=>'html',
  ]);
sendmessage($chat_id,"فرستاده شد");
}
}
if($text == "/payan" && $chat_id == $ADMIN ){
save("hal.txt","artebpayan");
sendmessage($chat_id,"ارتباط پایان یافت");
}
}
///###################################################
if($step == "zed"){
save("data/captio.txt","$text");    
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"لطفا تصویر خود را بفرستید",
  'parse_mode'=>'MarkDown',
  ]);
save("data/$from_id/step.txt","chasd");
}
if($step == "chasd"){
save("data/photo.txt","$photoid"); 
save("data/$from_id/step.txt","ttttamam");    
save("data/vach.txt","photo");
sendMessage($ADMIN,"بنر بر روی حالت عکس دار ست شد");
}

if($text == "اغاز چالش" && $chat_id == "$ADMIN"){ 
save("data/payan.txt","add");
sendMessage($ADMIN,"چالش اغاز شد هم اکنون کاربران میتوانند چالش خود را ثبت کنند");  
}
if($text == "پایان چالش"&& $chat_id == "$ADMIN"){ 
save("data/payan.txt","fjhfh");
sendMessage($ADMIN,"چالش پایان یافت");  
}

if($text == "فرصت کلی" && $chat_id == "$ADMIN"){ 
remdir("add");
sendMessage($ADMIN,"فرصت کلی صورت گرفت");  
mkdir("add");
}

if($text == "تعیین بنر ساده" && $chat_id == "$ADMIN"){ 
sendMessage($ADMIN,"متن بنر چالش را تعیین کنید"); 
save("data/$from_id/step.txt","nmpo");
}
if($step == "nmpo"){
save("data/vaz.txt","$text");
save("data/vach.txt","terx");
save("data/$from_id/step.txt","hhhkjkj");
sendMessage($ADMIN,"بنر ساده ثبت شد");
}

if($text == "ثبت چالش" && $add != "add" && $payan == "add" && $vach == "terx"){
sendMessage($chat_id,"اسم خودتون رو بفرستین");    
save("data/$from_id/step.txt","esm");
}
if($step == "esm"){
mkdir("add");
bot('sendMessage',[
    'chat_id'=>$chan,
    'text'=>"
#$text
$vaz
--------
$from_id",
	'parse_mode'=>'html',
  ]);
sendMessage($chat_id,"✅بنر شما با موفقیت ثبت شد

⚠️ به کانال زیر مراجعه کنید و بنر خود را پیدا کنید. سپس بنر خود را سین بزنید تا برنده شوید

🆔 : https://t.me/joinchat/AAAAAEGSJQixVJKRM5EvwQ
");  
save("data/$from_id/step.txt","khali");
save("add/$from_id.txt","add");
}

if($text == "ثبت چالش" && $add != "add" && $payan == "add" && $vach == "photo"){
sendMessage($chat_id,"اسم خودتون رو بفرستین");    
save("data/$from_id/step.txt","esmp");
}
if($step == "esmp"){

$kar=strlen($text);
if($kar<30){    
mkdir("add");
  bot('sendphoto',[
  'chat_id'=>$chan,
  'photo'=>"$she",
  'caption'=>"#$text\n$captio\n---------\n$from_id",
  ]);
sendMessage($chat_id,"✅بنر شما با موفقیت ثبت شد

⚠️ به کانال زیر مراجعه کنید و بنر خود را پیدا کنید. سپس بنر خود را سین بزنید تا برنده شوید

🆔 : https://t.me/joinchat/AAAAAEGSJQixVJKRM5EvwQ
");  
save("data/$from_id/step.txt","none");   
save("add/$from_id.txt","add");
}else{
sendmessage($chat_id,"اسم شما بیش از 30 کلمه است");
sendMessage($chat_id,"لطفا اسم خود را مجددا بفرستید");    
save("data/$from_id/step.txt","esmp");
}
}
}
//###############################################
if($text == "/social"){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' =>381292768,
                'text' =>"
+  version:3  +   
**************
* coded by  : *
*  @amir_social   *
**************
 @social_programming ",
        ]);
  } 
//#############################################################بخش مدیریت######################################################//
  if($text == "مدیریت" && $chat_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
                'parse_mode'=>'html',
      'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"تعداد اعضا"],['text'=>"ارسال پیام همگانی"]],
		      [['text'=>"بازگشت"]],
		      [['text'=>"تعیین بنر ساده"],['text'=>"تعیین بنر عکسی"]],
		      [['text'=>"فرصت کلی"]],
		      [['text'=>"پایان چالش"],['text'=>"اغاز چالش"]],
		      [['text'=>"برنده"],['text'=>"ارتباط با برنده"],['text'=>"/payan"]],
              ],'resize_keyboard'=>true
        ])
            ]);
        }
elseif($text == "تعداد اعضا" && $chat_id == $ADMIN){
	sendaction($chat_id,'typing');
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , " تعداد اعضا ربات : $member_count" , "html");
}
elseif($text == "ارسال پیام همگانی" && $chat_id == $ADMIN){
    file_put_contents("amir.txt","bc");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام مورد نظر را در قالب متن بنویسید",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'مدیریت']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($amir == "bc" && $chat_id == $ADMIN){
    file_put_contents("amir.txt","none");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" کاری از    @lyou4ul .پیام شما ارسال شد",
  ]);
	$all_member = fopen( "Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}

unlink ("error_log");
	?>
