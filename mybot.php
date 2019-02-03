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
	$rie = ['#ریه'];
	$rend = rand(000,999);
	$bwc = count($rie);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$rie[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص ریه", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$ghalb = ['#قلب','#اکو'];
	$rend = rand(000,999);
	$bwc = count($ghalb);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$ghalb[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص قلب  ", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$sono = ['#رادیولوژی','#سونو'];
	$rend = rand(000,999);
	$bwc = count($sono);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$sono[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص رادیولوژی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$mama = ['#زنان','#ماما'];
	$rend = rand(000,999);
	$bwc = count($mama);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$mama[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص زنان یا کارشناس مامایی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$dakheli = ['#داخلی'];
	$rend = rand(000,999);
	$bwc = count($dakheli);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$dakheli[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص داخلی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$ortoped = ['#ارتوپد'];
	$rend = rand(000,999);
	$bwc = count($ortoped);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$ortoped[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص ارتوپد", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$post = ['#پوست'];
	$rend = rand(000,999);
	$bwc = count($post);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$post[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص پوست،مو و زیبایی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$eye = ['#چشم'];
	$rend = rand(000,999);
	$bwc = count($eye);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$eye[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص چشم", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$ear = ['#گوش','#حلق','#بینی'];
	$rend = rand(000,999);
	$bwc = count($ear);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$ear[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص گوش،حلق و بینی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$ravanpe = ['#روانپزشک','#روانشناس'];
	$rend = rand(000,999);
	$bwc = count($ravanpe);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$ravanpe[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend]  متخصص روانپزشکی یا کارشناس روانشناسی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$ofoni = ['#عفون'];
	$rend = rand(000,999);
	$bwc = count($ofoni);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$ofoni[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص عفونی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$asab = ['#مغز','#اعصاب'];
	$rend = rand(000,999);
	$bwc = count($asab);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$asab[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص مغز و اعصاب", 'reply_to_message_id'=>$message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$orologh = ['#اورولوژ','#کلیه'];
	$rend = rand(000,999);
	$bwc = count($orologh);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$orologh[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص کلیه و‌مجاری ادراری", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$azem = ['#آزمایش','#ازمایش'];
	$rend = rand(000,999);
	$bwc = count($azem);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$azem[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] دکتری یا کارشناس آزمایشگاه", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$kodak = ['#کودک','#اطفال'];
	$rend = rand(000,999);
	$bwc = count($kodak);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$kodak[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص کودکان", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$jarah = ['#جراح'];
	$rend = rand(000,999);
	$bwc = count($jarah);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$jarah[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص جراحی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$paras = ['#پرستار'];
	$rend = rand(000,999);
	$bwc = count($paras);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$paras[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] کارشناس پرستاری ", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	
	$dandan = ['#دندان'];
	$rend = rand(000,999);
	$bwc = count($dandan);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$dandan[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] دندانپزشک ", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$omomi = ['#عمومی'];
	$rend = rand(000,999);
	$bwc = count($omomi);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$omomi[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] پزشک عمومی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$sex = ['#سکس'];
	$rend = rand(000,999);
	$bwc = count($sex);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$sex[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص سکس تراپی", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
	$ghode = ['#غدد'];
	$rend = rand(000,999);
	$bwc = count($ghode);
	for($i=0; $i<$bwc; $i++){
		if(strstr(strtolower($text),$ghode[$i])){
			$content = ['chat_id' => $chat_id, 'text'=>"نوبت [$rend] متخصص غدد", 'reply_to_message_id' => $message_id];
			$telegram->sendmessage($content);
			die(); // break code
		}	
	}
		 if(strstr($text,'منشی')){
	$content = ['chat_id' => $chat_id, 'text' => 'منشی سوپر گروه دکتر آنلاین هستم لطفا برای پرسش سوال خود و دریافت نوبت از من سوال خود را در قالب یک متن با شرح حال کامل با مشخص نمودن حوزه سوال خود با هشتگ (#) مشخص فرمایید به طور مثال #قلب', 'reply_to_message_id' => $message_id];
	$telegram->sendMessage($content);
	die();
	}	
