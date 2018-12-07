<?php
      if (in_array($userID, $admins)){

	if($msg == '/ping'){
              $MadelineProto->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id ,'message' => '**Pong!**','parse_mode' => 'MarkDown']);
            }
      }
