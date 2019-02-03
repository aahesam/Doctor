<?php
/**
 * Telegram Bot example.
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 * https://github.com/Eleirbag89/TelegramBotPHP
 * https://t.me/howCreateBot
 */
include("Telegram.php");

// Set the bot TOKEN
$bot_id = "Your_Token";

// Instances the class
$telegram = new Telegram($bot_id);

date_default_timezone_set("Asia/Tehran"); 

// Take text and chat_id from the message
$text 			  = $telegram->Text();
$chat_id 		  = $telegram->ChatID();
$user_id 		  = $telegram->UserID();
$message_id		  = $telegram->MessageID();

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