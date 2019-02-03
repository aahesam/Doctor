<?php
/**
 * Telegram Bot example.
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 * https://github.com/Eleirbag89/TelegramBotPHP
 * https://t.me/howCreateBot
 */
include("Telegram.php");

// Set the bot TOKEN
$bot_id = "702172366:AAEW2_IMKw_RM7Mr3tRgVU10bUApDGvTxBM";

// Instances the class
$telegram = new Telegram($bot_id);

date_default_timezone_set("Asia/Tehran"); 

// Take text and chat_id from the message
$text 			  = $telegram->Text();
$chat_id 		  = $telegram->ChatID();
$user_id 		  = $telegram->UserID();
$message_id		  = $telegram->MessageID();

$updates = $telegram->getData();
$new_members = $updates['message']['new_chat_members'];
$is_bot = $updates['message']['new_chat_members'];
$content = ['chat_id' => $chat_id, 'user_id' => $user_id];
$member_type = $telegram->getChatMember($content);

$badWords = ['fuck','shit','bullshit']; // bad words array

if($text==strtolower('kick')){
	$content = ['chat_id' => $chat_id, 'text' => 'User Kicked From Group' , 'reply_to_message_id' => $message_id];
	$telegram->sendMessage($content);
	
	$content = ['chat_id' => $chat_id, 'user_id' => $user_id];
	$telegram->kickChatMember($content);
}

if(strtolower($text)=='ban 30 sec'){
	$content = ['chat_id' => $chat_id, 'text' => 'User Banned For 30 Seconds from now'.PHP_EOL.' - no gif and stickers, no media and more' , 'reply_to_message_id' => $message_id];
	$telegram->sendMessage($content);
	
	$currentUnixTime = time();
	$restrickTime = $currentUnixTime + 30; // add 30 sec to currwnt time
	
	$content = ['chat_id' => $chat_id, 'user_id' => $user_id, 'until_date' => $restrickTime, 'can_send_messages' => TRUE];
	$telegram->restrictChatMember($content);
}

if(in_array($text, strtolower($badWords))){ // bad words
	$content = ['chat_id' => $chat_id, 'text' => 'User Banned For 5 Minutes from now' , 'reply_to_message_id' => $message_id];
	$telegram->sendMessage($content);
	
	$currentUnixTime = time();
	$restrickTime = $currentUnixTime + 300; // add 300 sec == 5 Minutes
	
	$content = ['chat_id' => $chat_id, 'user_id' => $user_id, 'until_date' => $restrickTime, 'can_send_messages' => TRUE];
	$telegram->restrictChatMember($content);
}

if(strtolower($text)=='promote'){
	$content = ['chat_id' => $chat_id, 'text' => 'You Are now admin with delete, edit and post message privillages :)' , 'reply_to_message_id' => $message_id];
	$telegram->sendMessage($content);
	
	$content = ['chat_id' => $chat_id, 'user_id' => $user_id, 'can_post_messages' => TRUE, 'can_edit_messages' => TRUE, 'can_delete_messages' => TRUE];
	$telegram->promoteChatMember($content);
}
if(count($new_members) > 0){
	
	$mem_count = count($new_members);
	
	if($mem_count==1){
		if($is_bot[0]['is_bot']){
			$content = ['text' => 'Do Not Add Telegram bot AnyMore :|', 'reply_to_message_id' => $message_id, 'chat_id' => $chat_id];
			$telegram->sendMessage($content);
			
			$bot_id = $new_members[0]['id'];
			$content = ['chat_id' => $chat_id, 'user_id' => $bot_id];
			$telegram->kickChatMember($content);			
		}
	}else{
		
		for($i=0; $i < $mem_count; $i++){
			if($is_bot[$i]['is_bot']){
				$content = ['text' => 'Do Not Add Telegram bot AnyMore :|', 'reply_to_message_id' => $message_id, 'chat_id' => $chat_id];
				$telegram->sendMessage($content);
				
				$content = ['chat_id' => $chat_id, 'user_id' => $new_members[$i]['id']];
				$telegram->kickChatMember($content);
			}
		}
		
	}
	if(linkFinder($text)){ // remove Links
	$content = array('chat_id' => $chat_id, 'message_id' => $message_id);
	$telegram->deleteMessage($content);
}

function linkFinder($text){
	$regex = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	return preg_match($regex, $text);
}
}
if(!empty($text)){
	
	// monshi
	$pezeshkan = ['#قلب', '#داخلی', '#زنان', '#عمومی', '#پوست', '#عفونی', '#ارتوپد', '#ماما', '#کودکان', '#چشم', '#مغز', '#روانشناس','#ریه', '#پرستار', '#آزمایشگاه', '#عمومی', '#روانپزشک', '#اطفال','#پرستار','#عروق','#رادیولوژی','#سونو'];
	$rend = rand(000,999);
	$bwc = count($pezeshkan);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$pezeshkan[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت شما زده شد $rand منتظر باشید پزشک مورد نظر آنلاین بشن و جواب شما داده شود", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$ghalb = ['#قلب'];
	$rend = rand(000,999);
	$bwc = count($ghalb);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$ghalb[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت شما زده شد $rend منتظر باشید پزشک مورد نظر آنلاین بشن و جواب شما داده شود", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	if(strstr($text,'منشی')){
	$content = ['chat_id' => $chat_id, 'text' => 'منشی سوپر گروه دکتر آنلاین هستم لطفا برای پرسش سوال خود و دریافت نوبت از من سوال خود را در قالب یک متن با شرح حال کامل با مشخص نمودن حوزه سوال خود با هشتگ (#) مشخص فرمایید به طور مثال #قلب', 'reply_to_message_id' => $message_id];
	$telegram->sendMessage($content);
	die();
	}	
