<?php
/**
 * Telegram Bot example.
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 * https://github.com/Eleirbag89/TelegramBotPHP
 */
include("Telegram.php");

// Set the bot TOKEN
$bot_id = "633941167:AAGwM59WBIkvGypj7q71LLj1lnmPgRKKP3E"; //deleteSpammerBot

// Instances the class
$telegram = new Telegram($bot_id);

/* If you need to manually take some parameters
*  $result = $telegram->getData();
*  $text = $result["message"] ["text"];
*  $chat_id = $result["message"] ["chat"]["id"];
*/

//$result = $telegram->getData();
//$channel_post = $result["channel_post"];

// Take text and chat_id from the message
$text 			   = $telegram->Text();
$chat_id 		   = $telegram->ChatID();
$user_id		   = $telegram->UserID();
//$message_id		   = $telegram->MessageID();
//$username 		   = $telegram->Username();
//$name 		  	   = $telegram->FirstName();
//$family 		   = $telegram->LastName();
$message_id = $telegram->MessageID();

//$up_type = $telegram->getUpdateType();

$new_members = $telegram->NewChatMember(); // new chat member for new user

$content = ['chat_id' => $chat_id, 'user_id' => $user_id];
$member_type = $telegram->getChatMember($content); // member Type

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
}

if(count($new_members) > 0){
	
	for($i=0; $i<count($new_members); $i++){
		$new_mem_user_id = $new_members[$i]["id"];
		$new_mem_is_bot = $new_members[$i]["is_bot"];
		
		if($member_type['result']['status'] == 'member'){
			// Ban Bot
			if($new_mem_is_bot){
				$content = ['chat_id' => $chat_id, 'user_id' => $new_mem_user_id];
				$telegram->kickChatMember($content);

				// Ban User Who Added Bot
				$content = ['chat_id' => $chat_id, 'user_id' => $user_id];
				$telegram->kickChatMember($content);			
			}	
		}
	}
}
