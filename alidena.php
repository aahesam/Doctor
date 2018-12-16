<?php
//@Robotsazi_Eliya
//اوپن شده در رباتسازی ایلیاتیم
ini_set('error_logs','off');
#fill outs
$token='768152343:AAH3JLurn-DhQPZRv7YRTOSkluK6q8dgtzs';
$admin='698038310';
#defines
define('API_KEY',$token);
define('ADMIN',$admin);
#functions
function bot($method,$datas=[]){
	$url="https://api.telegram.org/bot".API_KEY."/".$method;
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
	$res=curl_exec($ch);
	if(curl_error($ch)){
		var_dump(curl_error($ch));
	}else{
		return json_decode($res);
	}
}
function sendMessage($chat_id,$text,$parse_mode,$reply_markup){
	bot('sendMessage',array('chat_id'=>$chat_id,'text'=>$text,'parse_mode'=>$parse_mode,'disable_web_page_preview'=>true,'reply_markup'=>$reply_markup));
}
function forwardMessage($chat_id,$from_chat_id,$message_id){
	bot('forwardMessage',array('chat_id'=>$chat_id,'from_chat_id'=>$from_chat_id,'message_id'=>$message_id,'disable_web_page_preview'=>true));
}
function editMessageReplyMarkup($chat_id,$message_id,$reply_markup){
	bot('editMessageReplyMarkup',array('chat_id'=>$chat_id,'message_id'=>$message_id,'reply_markup'=>$reply_markup));
}
function getChat($chat_id){
	return json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChat?chat_id='.$chat_id));
}
function getMe($token){
	return json_decode(file_get_contents('https://api.telegram.org/bot'.$token.'/getMe'));
}
function getFile($file_id){
	return json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$file_id));
}
function saveJson($file,$date){
	$new_data=json_encode($date);
	file_put_contents($file,$new_data);
}
function buttonStart($chat_id){
	$button=array();
	$button[]=array(array('text'=>'حذف ربات⭕️'),array('text'=>'ساخت ربات🛠'));
	$_button=array();
	@$my_robots=json_decode(file_get_contents('data/members/'.$chat_id.'/my_robots.json'),true);
	if($my_robots!=null){
		$_button[]=array('text'=>'ربات های من💠');
	}
	@$vips=json_decode(file_get_contents('data/bot/vips.json'),true);
	@$admins=json_decode(file_get_contents('data/bot/admins.json'),true);
	if(!in_array($chat_id,$vips) && $chat_id!=ADMIN && in_array($chat_id,$admins)==false){
		$_button[]=array('text'=>'حساب ویژه💞');
	}
	$button[]=$_button;
	$button[]=array(array('text'=>'قوانین و مقررات🛑'),array('text'=>'راهنما📖'));
	@$settings=json_decode(file_get_contents('data/bot/settings.json'),true);
	$_button=array();
	if($settings['support']!='تنظیم نشده' && file_exists('data/bot/settings.json')){
		$_button[]=array('text'=>'پشتیبانی🍷');
	}
	if($settings['channel']!='تنظیم نشده' && file_exists('data/bot/settings.json')){
		$_button[]=array('text'=>'کانال ما🔊');
	}
	$button[]=$_button;
	@$admins=json_decode(file_get_contents('data/bot/admins.json'),true);
	if($chat_id==ADMIN || in_array($chat_id,$admins)){
		$button[]=array(array('text'=>'🎃مدیریت🎃'));
	}
	return json_encode(array('resize_keyboard'=>true,'keyboard'=>$button));
}
function buttonManagemant($settings,$chat_id){
	$button=array();
	$button[]=array(array('text'=>'ارسال به اعضا'),array('text'=>'فوروارد به اعضا'));
	$button[]=array(array('text'=>'بلاک کردن کاربر'),array('text'=>'آنبلاک کردن کاربر'));
	$button[]=array(array('text'=>'اخطار دادن به کاربر'),array('text'=>'حذف اخطار های کاربر'));
	$button[]=array(array('text'=>'بلاک کردن ربات'),array('text'=>'آنبلاک کردن ربات'));
	$_button=array();
	if($settings['channel']!='تنظیم نشده'){
		$_button[]=array('text'=>'قفل کانال / '.$settings['lock_channel']);
	}
	$_button[]=array('text'=>'وضعیت ربات / '.$settings['ping']);
	$button[]=$_button;
	$button[]=array(array('text'=>'تنظیم کانال'),array('text'=>'تنظیم ربات پشتیبانی'));
	$button[]=array(array('text'=>'کد رایگان (کاربر)'),array('text'=>'کد رایگان (ربات)'));
	$button[]=array(array('text'=>'اضافه کردن سورس'),array('text'=>'حذف کردن سورس'));
	$button[]=array(array('text'=>'ویژه کردن حساب'),array('text'=>'معمولی کردن حساب'));
	$button[]=array(array('text'=>'ویژه کردن ربات'),array('text'=>'معمولی کردن ربات'));
	@$admins=json_decode(file_get_contents('data/bot/admins.json'),true);
	if($chat_id==ADMIN){
		$button[]=array(array('text'=>'افزودن ادمین'),array('text'=>'حذف ادمین'));
	}
	$button[]=array(array('text'=>'آمار ربات'),array('text'=>'تنظیمات دیگر'));
	$button[]=array(array('text'=>'بلاک لیست'),array('text'=>'لیست سورس ها'));
	$button[]=array(array('text'=>'لیست حساب های ویژه'),array('text'=>'لیست اخطار ها'));
	$button[]=array(array('text'=>'لیست ادمین ها'),array('text'=>'لیست ربات ها'));
	$button[]=array(array('text'=>'تنظیم تبلیغ'),array('text'=>'حذف تبلیغ'));
	$button[]=array(array('text'=>'لیست ربات های ویژه'));
	$button[]=array(array('text'=>'🔙برگشت'));
	return json_encode(array('resize_keyboard'=>true,'keyboard'=>$button));
}
function backStart($chat_id,$text){
	if($text==null){
		$text="__به منوی اصلی برگشتید 🐾\n\nهر روز منتظر آپدیت های جدید ربات باشید__";
	}
	@$step=json_decode(file_get_contents('data/members/step.json'),true);
	@$step[$chat_id]='home';
	saveJson('data/members/step.json',$step);
	$button_start=buttonStart($chat_id);
	sendMessage($chat_id,$text,'MarkDown',$button_start);
}
function backManagemant($chat_id,$text,$settings){
	if($text==null){
		$text="__به منوی مدیریتی برگشتید 🐾\n\n__";
	}
	if($settings==null){
		$settings=json_decode(file_get_contents('data/bot/settings.json'),true);
	}
	@$step=json_decode(file_get_contents('data/members/step.json'),true);
	@$step[$chat_id]='managemant';
	$button_start=buttonManagemant($settings,$chat_id);
	saveJson('data/members/step.json',$step);
	sendMessage($chat_id,$text,'MarkDown',$button_start);
}
function channel(){
	@$settings=json_decode(file_get_contents('data/bot/settings.json'),true);
	if($settings['channel']!='تنظیم نشده' && file_exists('data/bot/settings.json')){
		return '🔊 @'.$settings['channel'];
	}
}
function buttonOderSettings($settings){
	$button=array();
	$button[]=array(array('text'=>$settings['max_warning'],'callback_data'=>'none'),array('text'=>'حداکثر اخطار','callback_data'=>'none'));
	$button[]=array(array('text'=>'➖','callback_data'=>'max_warning-'),array('text'=>'➕','callback_data'=>'max_warning+'));
	$button[]=array(array('text'=>$settings['free_max_robot'],'callback_data'=>'none'),array('text'=>'حداکثر ربات های حساب رایگان','callback_data'=>'none'));
	$button[]=array(array('text'=>'➖','callback_data'=>'free_max_robot-'),array('text'=>'➕','callback_data'=>'free_max_robot+'));
	$button[]=array(array('text'=>$settings['score_vip'],'callback_data'=>'none'),array('text'=>'امتیاز مورد نیاز ویژه شدن','callback_data'=>'none'));
	$button[]=array(array('text'=>'➖','callback_data'=>'score_vip-'),array('text'=>'➕','callback_data'=>'score_vip+'));
	return json_encode(array('inline_keyboard'=>$button));
}
#variables
$update=json_decode(file_get_contents('php://input'));
@$text=$update->message->text;
@$data=$update->callback_query->data;
@$chat_id=$update->message->chat->id;
@$message_id=$update->message->message_id;
@$chat_id2=$update->callback_query->message->chat->id;
@$message_id2=$update->callback_query->message->message_id;
$get_me=getMe($token);
$first_name_bot=$get_me->result->first_name;
$username_bot=$get_me->result->username;
@$first_name=$update->message->from->first_name;
@$my_robots=json_decode(file_get_contents('data/members/'.$chat_id.'/my_robots.json'),true);
@$step=json_decode(file_get_contents('data/members/step.json'),true);
@$last_text=json_decode(file_get_contents('data/members/last_text.json'),true);
@$settings=json_decode(file_get_contents('data/bot/settings.json'),true);
@$members=json_decode(file_get_contents('data/bot/members.json'),true);
@$robots=json_decode(file_get_contents('data/bot/robots.json'),true);
@$robot_list=json_decode(file_get_contents('data/bot/robot_list.json'),true);
@$admins=json_decode(file_get_contents('data/bot/admins.json'),true);
@$vips=json_decode(file_get_contents('data/bot/vips.json'),true);
@$vips_robots=json_decode(file_get_contents('data/bot/vips_robots.json'),true);
@$block_list=json_decode(file_get_contents('data/bot/block_list.json'),true);
@$warning_list=json_decode(file_get_contents('data/bot/warning_list.json'),true);
@$settings_tab=json_decode(file_get_contents('data/bot/settings_tab.json'),true);
$channel=channel();
@$button_managemant=buttonManagemant($settings,$chat_id);
@$button_start=buttonStart($chat_id);
$button_back=json_encode(array('resize_keyboard'=>true,'keyboard'=>array(array(array('text'=>'🔙برگشت')))));
$button_back_managemant=json_encode(array('resize_keyboard'=>true,'keyboard'=>array(array(array('text'=>'🔙برگشت به منوی مدیریت')))));
$button_support=json_encode(array('inline_keyboard'=>array(array(array('text'=>'ورود به ربات پشتیبانی👣','url'=>'https://telegram.me/'.$settings['support'])))));
$button_channel=json_encode(array('inline_keyboard'=>array(array(array('text'=>'ورود به کانال ما🎗','url'=>'https://telegram.me/'.$settings['channel'])))));
@$join=json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChatMember?chat_id=@'.$settings['channel'].'&user_id='.$chat_id))->result->status;
#left group
if($update->message->chat->type!='private' && $update->callback_query->message->chat->type!='private'){
	bot('leaveChat',array('chat_id'=>$chat_id));
	die;
}
#make default works
if(!is_dir('data')){
	mkdir('data');
}
if(!is_dir('data/bot')){
	mkdir('data/bot');
}
if(!is_dir('data/robots')){
	mkdir('data/robots');
}
if(!is_dir('data/members')){
	mkdir('data/members');
}
if(!is_dir('data/sources')){
	mkdir('data/sources');
}
if(in_array($chat_id,$members)==false){
	@$members[]=$chat_id;
	saveJson('data/bot/members.json',$members);
}
if(!file_exists('data/bot/settings.json')){
	@$settings=json_encode(array('ping'=>'✅','lock_channel'=>'☑️','channel'=>'تنظیم نشده','support'=>'تنظیم نشده','max_warning'=>3,'score_vip'=>10,'free_max_robot'=>3));
	file_put_contents('data/bot/settings.json',$settings);
}
#blocked
if(in_array($chat_id,$block_list)){
	if($settings['support']!='تنظیم نشده' || file_exists('data/bot/settings.json')==false){
		sendMessage($chat_id,"📛متاسفانه شما از ربات ما بلاک شده اید📛\n\n〽️برای پیگیری دلیل بلاک شدن خود می توانید از پشتیبانی کمک بگیرید.",'HTML',$button_support);
	}else{
		sendMessage($chat_id,"📛متاسفانه شما از ربات ما بلاک شده اید📛",'HTML',null);
	}
	die;
}
#max warning
if($warning_list[$chat_id]>=$settings['max_warning']){
	if($settings['support']!='تنظیم نشده' || file_exists('data/bot/settings.json')==false){
		sendMessage($chat_id,"⚠️اخطار های شما از حد مجاز بیشتر شد و به همین دلیل شما نمی توانید از ربات استفاده کنید⚠️\n\n〽️برای پیگیری دلیل اخطار گرفتن خود می توانید از پشتیبانی کمک بگیرید.",'HTML',$button_support);
	}else{
		sendMessage($chat_id,"⚠️اخطار های شما از حد مجاز بیشتر شد و به همین دلیل شما نمی توانید از ربات استفاده کنید⚠️",'HTML',null);
	}
	die;
}
#off robot
if($settings['ping']=='☑️' && $chat_id!=$admin && in_array($chat_id,$admins)==false){
	sendMessage($chat_id,'ربات هم اکنون خاموش است و امکان استفاده از آن میسر نمی باشد😴','HTML',null);
	die;
}
#join channel
if(isset($update->message) && $join!='member' && $join!='administrator' && $join!='creator' && $settings['lock_channel']=='✅' && $settings['channel']!='تنظیم نشده' && $chat_id!=$admin && in_array($chat_id,$admins)==false){
	sendMessage($chat_id,"کاربر گرامی !🌹\n\nبرای اینکه بتوانید از امکانات ربات استفاده کنید باید ابتدا در کانال ما عضو شوید.\n\n⬇️برای عضویت در کانال ما روی دکمه زیر کلیک کنید⬇️",'HTML',$button_channel);
	die;
}
#start
if(preg_match('/^\/([Ss][Tt][Aa][Rr][Tt])(.*)/',$text)){
	preg_match('/^\/([Ss][Tt][Aa][Rr][Tt])(.*)/',$text,$match);
	if($match[2]!=null){
		$match[2]=trim($match[2]);
		@$my_subset=json_decode(file_get_contents('data/members/'.$match[2].'/my_subset.json'),true);
		if($match[2]!=$chat_id && $match[2]!=$admin && in_array($match[2],$admins)==true && in_array($chat_id,$my_subset)==true){
			if(!is_dir('data/members/'.$match[2])){
				mkdir('data/members/'.$match[2]);
			}
			@$my_subset[]=$chat_id;
			saveJson('data/members/'.$match[2].'/my_subset.json',$my_subset);
			$count=count($my_subset);
			if($count>=$settings['score_vip']){
				@$vips[]=$match[2];
				saveJson('data/bot/vips.json',$vips);
				backStart($match[2],"یک نفر با لینک دعوت شما وارد ربات شد💖\n\n💝امتیازات شما به حد نساب رسیده و حساب شما اکنون ویژه شد !💝");
			}else{
				sendMessage($match[2],"یک نفر با لینک دعوت شما وارد ربات شد💖\n\n🌟امتیازات شما تا الان : `$count`",'MarkDown',null);
			}
		}
	}
	backStart($chat_id,"__به ربات هوشمند $first_name_bot خوش آمدید🌹__ \n\nبا استفاده از این ربات می توانید ربات دلخواه خود را بصورت رایگان بسازید😋\n\nشما می توانید با ربات های ساخته شده خدمات ارئه دهید و کسب در آمد کنید !🤑\n\n$channel");
}
#back
if($text=='🔙برگشت'){
	backStart($chat_id,null);
	die;
}
#create robot
if($text=='ساخت ربات🛠' && $step[$chat_id]=='home'){
	if($robot_list!=null){
		if(count($my_robots)>=$settings['free_max_robot'] && $chat_id!=$admin && in_array($chat_id,$admins)==false && in_array($chat_id,$vips)==false){
			backStart($chat_id,"حساب شما معمولی است و شما نمی توانید بیشتر از `$settings[free_max_robot]` ربات بسازید❌\n\nبرای رفع محدودیت ساخت ربات باید حساب خود را ویژه کنید🙃");
			die;
		}
		$button=array();
		$e=-1;
		foreach($robot_list as $key=>$value){
			$e+=1;
			$button[$e]=array(array('text'=>$key.'🛠'));
		}
		$button[]=array(array('text'=>'🔙برگشت'));
		$button=json_encode(array('resize_keyboard'=>true,'keyboard'=>$button));
		sendMessage($chat_id,'__لطفا یکی از موارد زیر را برای ساخت انتخاب کنید⬇️__','MarkDown',$button);
		@$step[$chat_id]='create_robot';
		saveJson('data/members/step.json',$step);
	}else{
		sendMessage($chat_id,'__ ⭕️ هنوز هیچ رباتی برای ساخت قرار داده نشده است !__','MarkDown',$button_start);
	}
}
if(array_key_exists(str_replace('🛠',null,$text),$robot_list) && $step[$chat_id]=='create_robot'){
	$name_source=str_replace('🛠',null,$text);
	sendMessage($chat_id,"لطفا توکن ربات خود را برای ساخت ارسال کنید😚 :\n\nمی توانید به [BotFather](https://telegram.me/BotFather) بروید و یک ربات بسازید و سپس توکن ربات خود را به اینجا فوروارد کنید !🙂",'MarkDown',$button_back);
	@$step[$chat_id]=$robot_list[$name_source];
	saveJson('data/members/step.json',$step);
	die;
}
if(in_array($step[$chat_id],$robot_list) && isset($text)){
	$e_1='You can use this token to access HTTP API:';
	if(strstr($text,$e_1)){
		$text=strchr($text,$e_1);
		$text=str_replace($e_1,null,$text);
	}
	$e_2='Use this token to access the HTTP API:';
	if(strstr($text,$e_2)){
		$text=strchr($text,$e_2);
		$text=str_replace($e_2,null,$text);
	}
	$e_3='For a description of the Bot API, see this page: https://core.telegram.org/bots/api';
	if(strstr($text,$e_3)){
		$text=str_replace($e_3,null,$text);
	}
	$text=trim($text);
	$get_me=getMe($text);
	$is_bot_robot=$get_me->result->is_bot;
	if($is_bot_robot==true){
		$username_robot=strtolower($get_me->result->username);
		$id_robot=$get_me->result->id;
		$bot_id=getMe(API_KEY)->result->id;
		if($bot_id==$id_robot){
			sendMessage($chat_id,'شما نمی توانید توکن این ربات را وارد کنید❌','HTML',null);
			die;
		}
		if(in_array($id_robot,$block_list)){
			sendMessage($chat_id,'توکن ارسالی ربات شما توسط مدیران بلاک شده است‼️','HTML',null);
			die;
		}
		$first_name_robot=$get_me->result->first_name;
		if(!is_dir('data/robots/'.$username_robot)){
			mkdir('data/robots/'.$username_robot);
			$make_text='ساخته';
		}else{
			$make_text='آپدیت';
		}
		copy('data/sources/'.$step[$chat_id].'/index.php','data/robots/'.$username_robot.'/index.php');
		@$source=file_get_contents('data/robots/'.$username_robot.'/index.php');
		$source=str_replace('[*[*ADMIN*]*]',$chat_id,$source);
		$source=str_replace('[*[*TOKEN*]*]',$text,$source);
		$source=str_replace('<?php','<?php 
$settings_tab=json_decode(file_get_contents(\'../../bot/settings_tab.json\'),true);
$fackts=json_decode(file_get_contents(\'fackts.json\'),true);
function robotFreeTab($method,$datas=[]){
	$url=\'https://api.telegram.org/bot'.$text.'/\'.$method;
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
	$res=curl_exec($ch);
	if(curl_error($ch)){
		var_dump(curl_error($ch));
	}else{
		return json_decode($res);
	}
}
if(json_decode(file_get_contents(\'php://input\'))->message->text==\'/start\' && json_decode(file_get_contents(\'php://input\'))->message->chat->type==\'private\' && $settings_tab!=null && $fackts[\'account\']==\'free\'){
	if($settings_tab[\'photo\']==\'offset\'){
		robotFreeTab(\'sendMessage\',array(\'chat_id\'=>json_decode(file_get_contents(\'php://input\'))->message->chat->id,\'text\'=>$settings_tab[\'text\'],\'parse_mode\'=>\'HTML\'));
	}else{
		robotFreeTab(\'sendPhoto\',[\'chat_id\'=>json_decode(file_get_contents(\'php://input\'))->message->chat->id,\'photo\'=>new CURLFile(\'../../bot/tab_image.png\'),\'caption\'=>$settings_tab[\'text\']]);
	}
}',$source);
		file_put_contents('data/robots/'.$username_robot.'/index.php',$source);
		@$fackts=json_decode(file_get_contents('data/robots/'.$username_robot.'/fackts.json'),true);
		@$fackts['id']=$id_robot;
		@$fackts['token']=$text;
		@$fackts['creator']=$chat_id;
		@$fackts['account']='free';
		saveJson('data/robots/'.$username_robot.'/fackts.json',$fackts);
		@$robots[$id_robot]=$chat_id;
		saveJson('data/bot/robots.json',$robots);
		if(!is_dir('data/members/'.$chat_id)){
			mkdir('data/members/'.$chat_id);
		}
		@$my_robots[$username_robot]=$text;
		saveJson('data/members/'.$chat_id.'/my_robots.json',$my_robots);
		@$site=explode('/',$_SERVER['SCRIPT_URI']);
		$end=end($site);
		$site=str_replace($end,null,$_SERVER['SCRIPT_URI']);
		$site=str_replace('http://','https://',$site);
		file_get_contents('https://api.telegram.org/bot'.$text.'/setWebHook?url='.$site.'data/robots/'.$username_robot.'/index.php');
		$button=json_encode(array('inline_keyboard'=>array(array(array('text'=>$first_name_robot,'url'=>'https://telegram.me/'.$username_robot)))));
		$text_robot="ربات شما با موفقیت به سرور [$first_name_bot](https://telegram.me/$username_bot) متصل شد💞\n\n🎗برای شروع کردن ربات خود روی /start کلیک کنید🎗";
		$button_channel=$settings['channel']!='تنظیم نشده'?$button_channel:null;
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,'https://api.telegram.org/bot'.$text.'/sendMessage');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,array('chat_id'=>$chat_id,'text'=>$text_robot,'parse_mode'=>'MarkDown','disable_web_page_preview'=>true,'reply_markup'=>$button_channel));
		json_decode(curl_exec($ch));
		sendMessage($chat_id,"__ربات شما با موفقیت $make_text شد🚀__ \n\nبرای ورود به ربات خود روی دکمه زیر کلیک کنید💞",'MarkDown',$button);
		backStart($chat_id,null);
	}else{
		sendMessage($chat_id,"__⭕️ توکن ارسال شده صحیح نمی باشد !!__ \n\nلطفا دقت بیشتری توکن ربات خود را ارسال کنید :",'MarkDown',$button_back);
	}
}
#delete robot
if($text=='حذف ربات⭕️' && $step[$chat_id]=='home'){
	if($my_robots!=null){
		$button=array();
		$number=-1;
		foreach($my_robots as $key=>$value){
			$number++;
			@$fackts=json_decode(file_get_contents('data/robots/'.$key.'/fackts.json'),true);
			$username_robot=getMe($fackts['token'])->result->username;
			$button[$number]=array(array('text'=>'@'.$username_robot));
		}
		$button[]=array(array('text'=>'🔙برگشت'));
		$button=json_encode(array('resize_keyboard'=>true,'keyboard'=>$button));
		sendMessage($chat_id,"__ لطفا رباتی که میخواهید حذف کنید را از لیست زیر انتخاب کنید :🙂 __",'MarkDown',$button);
		@$step[$chat_id]='delete_robot';
		saveJson('data/members/step.json',$step);
		die;
	}else{
		backStart($chat_id,"__⭕️ شما هنوز هیچ رباتی نساخته اید !__");
	}
}
if(isset($text) && $step[$chat_id]=='delete_robot' && array_key_exists(strtolower(str_replace('@',null,$text)),$my_robots)){
	$text=strtolower(str_replace('@',null,$text));
	@$fackts=json_decode(file_get_contents('data/robots/'.$text.'/fackts.json'),true);
	$get_me=getMe($fackts['token']);
	$id_robot=$get_me->result->id;
	@$last_text[$chat_id]=$fackts['token'];
	saveJson('data/members/last_text.json',$last_text);
	$first_name_robot=$get_me->result->first_name;
	$button=json_encode(array('resize_keyboard'=>true,'keyboard'=>array(array(array('text'=>'🔸بله مطمئن هستم !')),array(array('text'=>'🔹خیر مطمئن نیستم !')))));
	sendMessage($chat_id,"آیا مطمئنید که می خواهید [$first_name_robot](https://telegram.me/$text) را حذف کنید ⁉️\n\n __⚠️توجه : تمام اطلاعات ربات شما از سرور ما حذف می شود و اطلاعات ربات شما قابل بازیابی نیستند !!__",'MarkDown',$button);
	@$step[$chat_id]='sure_delete_robot';
	saveJson('data/members/step.json',$step);
}
if($step[$chat_id]=='sure_delete_robot'){
	if($text=='🔸بله مطمئن هستم !'){
		$get_me=getMe($last_text[$chat_id]);
		$id_robot=$get_me->result->id;
		$username_robot=strtolower($get_me->result->username);
		$first_name_robot=$get_me->result->first_name;
		$folder='data/robots/'.$username_robot;
		$open=opendir($folder);
		$files=glob($folder."/*",GLOB_MARK);
		foreach($files as $i){
			if(is_file($i)){
				unlink($i);
			}
			if(is_dir($i)){
				rmdir($i);
			}
		}
		closedir($open);
		rmdir('data/robots/'.$username_robot);
		unset($robots[$id_robot]);
		saveJson('data/bot/robots.json',$robots);
		unset($my_robots[$username_robot]);
		saveJson('data/members/'.$chat_id.'/my_robots.json',$my_robots);
		unset($last_text[$chat_id]);
		saveJson('data/members/last_text.json',$last_text);
		sendMessage($chat_id,"\"[$first_name_robot](https://telegram.me/$username_robot)\" با موفقیت از سرور ما حذف شد🚀",'MarkDown',null);
		backStart($chat_id,null);
	}
	elseif($text=='🔹خیر مطمئن نیستم !'){
		unset($last_text[$chat_id]);
		saveJson('data/members/last_text.json',$last_text);
		backStart($chat_id,null);
	}
}
#my robots
if($text=='ربات های من💠' && $step[$chat_id]=='home' && $my_robots!=null){
	$button=array();
	$number=-1;
	foreach($my_robots as $key=>$value){
		$number++;
		@$fackts=json_decode(file_get_contents('data/robots/'.$key.'/fackts.json'),true);
		$name=getMe($fackts['token'])->result->first_name;
		$button[$number]=array(array('text'=>$name,'url'=>'https://telegram.me/'.$key));
	}
	$button=json_encode(array('inline_keyboard'=>$button));
	sendMessage($chat_id,'🤖لیست ربات های شما🤖','HTML',$button);
}
#vip account
if($text=='حساب ویژه💞' && $step[$chat_id]=='home' && in_array($chat_id,$vips)==false && $chat_id!=$admin && in_array($chat_id,$admins)==false){
	$button=array();
	$button[]=array(array('text'=>'دریافت لینک دعوت👣'));
	if(file_get_contents('data/bot/code.txt')!=null){
		$button[]=array(array('text'=>'کد ویژه (حساب)🔢'));
	}
	if(file_get_contents('data/bot/code2.txt')!=null){
		$button[]=array(array('text'=>'کد ویژه (ربات)🔢'));
	}
	$button[]=array(array('text'=>'🔙برگشت'));
	$button=json_encode(array('resize_keyboard'=>true,'keyboard'=>$button));
	sendMessage($chat_id,"🔸دریافت لینک دعوت :\n\nبرای اینکه بتوانید حساب خود را به حساب ویژه ارتقا دهید باید تعداد `$settings[score_vip]` نفر را به ربات از طریق لینکی که به شما داده میشود دعوت کنید.\nاعضای دعوت شده از طریق لینک شما باید حتما ربات را استارت کنند !\n\n🔹مزایای حساب ویژه چیست ؟:\n\nکسانی که از حساب ویژه برخوردار هستند می توانند هر اندازه که مایلند ربات بسازند و از امکانات پر سرعت تری برخوردار شوند !",'MarkDown',$button);
	@$step[$chat_id]='vip_account';
	saveJson('data/members/step.json',$step);
}
#get invite link
if($text=='دریافت لینک دعوت👣' && $step[$chat_id]=='vip_account' && in_array($chat_id,$vips)==false && $chat_id!=$admin && in_array($chat_id,$admins)==false){
	$get_me=getMe(API_KEY);
	$bot_username=$get_me->result->username;
	$bot_name=$get_me->result->first_name;
	sendMessage($chat_id,"ربات خود را بسازید😍\n\nبا $bot_name ربات خود را رایگان بسازید🌹\n\nربات خود را فقط با چند کلیک بسازید و از ارائه خدمات توسط آنها کسب در آمد کنید !🤑\n\n💝 https://telegram.me/$bot_username?start=$chat_id",'HTML',null);
}
#code
$s='کد ویژه (حساب)🔢';
if($text==$s && file_get_contents('data/bot/code.txt')!=null && $step[$chat_id]=='vip_account'&& in_array($chat_id,$vips)==false && $chat_id!=$admin && in_array($chat_id,$admins)==false){
	sendMessage($chat_id,"لطفا کد ارسال شده درون کانال را اینجا ارسال کنید :🙃",'HTML',$button_back);
	@$step[$chat_id]='code';
	saveJson('data/members/step.json',$step);
}
if($text!=$s && $step[$chat_id]=='code' && file_get_contents('data/bot/code.txt')!=null){
	@$code=file_get_contents('data/bot/code.txt');
	if($text==$code){
		@$vips[]=$chat_id;
		saveJson('data/bot/vips.json',$vips);
		sendMessage($chat_id,"حساب شما با موفقیت ویژه شد😃💯",'HTML',null);
		sendMessage('@'.$settings['channel'],"یک نفر از کد $code استفاده کرد و حساب ویژه را بصورت رایگان دریافت کرد😚\n\n🌹نام کاربر : $first_name",'HTML',null);
		unlink('data/bot/code.txt');
	}else{
		sendMessage($chat_id,"کدی که ارسال کردید اشتباه است😬‼️",'HTML',null);
	}
}
#code 2
$s='کد ویژه (ربات)🔢';
if($text==$s && file_get_contents('data/bot/code.txt')!=null && $step[$chat_id]=='vip_account'&& in_array($chat_id,$vips)==false && $chat_id!=$admin && in_array($chat_id,$admins)==false){
	sendMessage($chat_id,"لطفا کد ارسال شده درون کانال را اینجا ارسال کنید :🙃",'HTML',$button_back);
	@$step[$chat_id]='code2';
	saveJson('data/members/step.json',$step);
}
if($text!=$s && $step[$chat_id]=='code2' && file_get_contents('data/bot/code.txt')!=null){
	@$code=file_get_contents('data/bot/code.txt');
	if($text==$code){
		$button=array();
		$number=-1;
		foreach($my_robots as $key=>$value){
			$number++;
			@$fackts=json_decode(file_get_contents('data/robots/'.$key.'/fackts.json'),true);
			$name=getMe($fackts['token'])->result->first_name;
			$button[$number]=array(array('text'=>$name,'url'=>'https://telegram.me/'.$key));
		}
		$button=json_encode(array('resize_keyboard'=>true,'keyboard'=>$button));
		sendMessage($chat_id,"ربات خود را انتخاب کنید :🙃",'HTML',$button);
		@$step[$chat_id]='code_2';
		saveJson('data/members/step.json',$step);
	}else{
		sendMessage($chat_id,"کدی که ارسال کردید اشتباه است😬‼️",'HTML',null);
	}
}
if(isset($text) && $step[$chat_id]=='code_2' && array_key_exists(strtolower(str_replace('@',null,$text)),$my_robots)){
	$text=str_replace('@',null,$text);
	@$fackts=json_decode(file_get_contents('data/robots/'.$text.'/fackts.json'),true);
	@$fackts['account']='vip';
	saveJson('data/robots/'.$text.'/fackts.json',$fackts);
	@$vips_robots[]=$text;
	saveJson('data/bot/vips_robots.json',$vips_robots);
	sendMessage($chat_id,"ربات شما با موفقیت ویژه شد😃💯",'HTML',$button_back);
	sendMessage('@'.$settings['channel'],"یک نفر از کد $code استفاده کرد و ربات ویژه را بصورت رایگان دریافت کرد😚\n\n🌹نام کاربر : $first_name",'HTML',null);
	unlink('data/bot/code2.txt');
}
#guide
if($text=='راهنما📖' && $step[$chat_id]=='home'){
	backStart($chat_id,"🔮راهنمای ساخت ربات با [BotFather](https://telegram.me/BotFather) :\n\n1️⃣ - ابتدا به وارد [BotFather](https://telegram.me/BotFather) شوید.\n\n2️⃣ - سپس دستور `/newbot` را ارسال کنید.\n\n3️⃣ - یک نام برای رباتی که می خواهید بسازید ارسال کنید.\n\n4️⃣ - پس از ارسال نام ، یک یوزرنیم که با bot پایان یابد ارسال کنید. (یوزرنیم نباید با @ شروع شود !)\n\n🔻اگر با این پیغام روبرو شدید :\n\nSorry, this username is already taken. Please try something different.\n\nیعنی یوزرنیمی که ارسال کرده اید را قبلا یک نفر استفاده کرده است !\n\n🔻اگر با این پیغام روبرو شدید :\n\nSorry, this username is invalid.\n\nیعنی یوزرنیمی که ارسال کرده اید صحیح نمی باشد و شما از کاراکتر های غیر مجاز ااستفاده کرده اید !\n\n5️⃣ - اگر با هیچ خطایی مواجه نشدید یعنی کار به درستی انجام شده است.\n\n6️⃣ - حالا پیامی که از [BotFather](https://telegram.me/BotFather) دریافت کردید را در بخش ساخت ربات ارسال کنید تا ربات که می خواهید ساخته شود :)\n\n$channel");
}
#rules
if($text=='قوانین و مقررات🛑' && $step[$chat_id]=='home'){
	backStart($chat_id,"🌓 قوانین و مقررات :\n\n🔸استفاده بیش از حد از منابع ربات و هر کاری که به سرور ما فشار بیش از حد وارد کند.\n\n🔹ساخت ربات هایی مخالف با ارزش های انسانی و مخالف با قوانین کشور ممنوع می باشد.\n\n🔸بی احترامی و فحاشی به دیگران و کاربران ربات ساخته شده.\n\n🔹فروش ربات ها و کسب در آمد از ربات ها ممنوع است ! (البته کسب در آمد از طریق ارائه خدمات توسط ربات ها مجاز است.)\n\nدر صورتی که شخصی این موارد را رعایت نکند از ربات بلاک شده و ربات های ایشان از سرور ما حذف نصب می شوند ‼️\n\n$channel");
}
#support
if($text=='پشتیبانی🍷' && $step[$chat_id]=='home' && $settings['support']!=null){
	sendMessage($chat_id,"اگر نیاز به پشتیبانی دارید می توانید از طریق دکمه زیر وارد ربات پشتیبانی شوید و مشکلات خود را مطرح کنید !🙂\n\n 🔸هرچه با ادب بیشتری سوال خود را مطرح کنید پاسخ بهتری دریافت خواهید کرد.\n\n🔹لطفا قبل ارتباط با تیم پشتیبانی، قوانین را مطالعه فرمائید .\n\n🔸لطفا از احوال پرسی و پرسیدن سوالات بی ربط خودداری فرمائید. \n\nبرای ورود به بخش پشتیبانی روی دکمه زیر کلیک کنید⬇️",'MarkDown',$button_support);
}
#channel
if($text=='کانال ما🔊' && $step[$chat_id]=='home' && $settings['channel']!=null){
	sendMessage($chat_id,"با پیوستن به کانال ما از آخرین اخبار و آپدیت های ربات بهره مند شوید☺️\n\n __برای ورود به کانال ما روی  دکمه زیر کلیک کنید⬇️__",'MarkDown',$button_channel);
}
#managemant
if($text=='🎃مدیریت🎃' && $step[$chat_id]=='home' && ($chat_id==$admin || in_array($chat_id,$admins))){
	sendMessage($chat_id,"به منوی مدیریت خوش آمدید🌹",'HTML',$button_managemant);
	@$step[$chat_id]='managemant';
	saveJson('data/members/step.json',$step);
}
#back managemant
if($text=='🔙برگشت به منوی مدیریت' && ($chat_id==$admin || in_array($chat_id,$admins))){
	backManagemant($chat_id,null,null);
	die;
}
#send to all
$s='ارسال به اعضا';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($members)>1){
		sendMessage($chat_id,'♦️لطفا پیام خود را ارسال کنید :','HTML',$button_back_managemant);
		@$step[$chat_id]='send_all';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if($step[$chat_id]=='send_all' && $text!=$s){
	if(isset($text)){
		foreach($members as $key){
			sendMessage($key,$text,'HTML',null);
		}
		backManagemant($chat_id,'__پیام شما به همه اعضا ارسال شد !🚀__',null);
	}else{
		sendMessage($chat_id,'⭕️ لطفا پیام خود را در قالب متن ارسال کنید !','HTML',$button_back_managemant);
	}
}
#for to all
$s='فوروارد به اعضا';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($members)>1){
		sendMessage($chat_id,'♦️لطفا پیام خود را ارسال کنید :','HTML',$button_back_managemant);
		@$step[$chat_id]='for_all';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if($step[$chat_id]=='for_all' && $text!=$s){
	foreach($members as $key){
		forwardMessage($key,$chat_id,$message_id);
	}
	backManagemant($chat_id,'__پیام شما به همه اعضا فوروارد شد !🚀__',null);
}
#block user
$s='بلاک کردن کاربر';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($members)>1){
		sendMessage($chat_id,'🔻لطفا شناسه عددی کاربر مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
		@$step[$chat_id]='block_user';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if($step[$chat_id]=='block_user' && isset($text) && $text!=$s){
	if(!in_array($text,$members)){
		sendMessage($chat_id,'⭕️ این کاربر وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	if($text==$admin || in_array($text,$admins)){
		sendMessage($chat_id,'شما نمی توانید یک مدیر / ادمین را بلاک کنید‼️','HTML',$button_back_managemant);
		die;
	}
	$first_name_user=getChat($text)->result->first_name;
	if(!in_array($text,$block_list)){
		@$block_list[]=$text;
		saveJson('data/bot/block_list.json',$block_list);
		backManagemant($chat_id,"کاربر [$first_name_user](tg://user?id=$text) از ربات بلاک شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ کاربر [$first_name_user](tg://user?id=$text) قبلا از ربات بلاک شده بود !",null);
	}
}
#unblock user
$s='آنبلاک کردن کاربر';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($members)>1){
		if($block_list!=null){
			sendMessage($chat_id,'🔻لطفا شناسه عددی کاربر مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
			@$step[$chat_id]='unblock_user';
			saveJson('data/members/step.json',$step);
		}else{
			backManagemant($chat_id,'هیچ کاربر بلاک شده ای برای آنبلاک کردن وجود ندارد‼️',null);
		}
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if($step[$chat_id]=='unblock_user' && isset($text) && $text!=$s){
	if(!in_array($text,$members)){
		sendMessage($chat_id,'⭕️ این کاربر وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	$first_name_user=getChat($text)->result->first_name;
	if(in_array($text,$block_list)){
		@$text=array_search($text,$block_list);
		unset($block_list[$text]);
		saveJson('data/bot/block_list.json',$block_list);
		backManagemant($chat_id,"کاربر [$first_name_user](tg://user?id=$text) از ربات آنبلاک شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️کاربر [$first_name_user](tg://user?id=$text) از ربات بلاک نمی باشد ! !",null);
	}
}
#warning user
$s='اخطار دادن به کاربر';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($members)>1){
		sendMessage($chat_id,'🔻لطفا شناسه عددی کاربر مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
		@$step[$chat_id]='warning_user';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if($step[$chat_id]=='warning_user' && isset($text) && $text!=$s){
	if(!in_array($text,$members)){
		sendMessage($chat_id,'⭕️ این کاربر وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	if($text==$admin || in_array($text,$admins)){
		sendMessage($chat_id,'شما نمی توانید به یک مدیر / ادمین اخطار دهید‼️','HTML',$button_back_managemant);
		die;
	}
	$first_name_user=getChat($text)->result->first_name;
	@$e=$warning_list[$text]==null?0:$warning_list[$text];
	$e=$e+1;
	@$warning_list[$text]=$e;
	saveJson('data/bot/warning_list.json',$warning_list);
	sendMessage($text,"شما یک اخطار دریافت کردید‼️\n\nاخطار های شما تا الان : `$e`",'MarkDown',null);
	backManagemant($chat_id,"کاربر [$first_name_user](tg://user?id=$text) یک اخطار دریافت کرد !🚀",null);
}
#unwarning user
$s='حذف اخطار های کاربر';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($members)>1){
		if($warning_list!=null){
			sendMessage($chat_id,'🔻لطفا شناسه عددی کاربر مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
			@$step[$chat_id]='unwarning_user';
			saveJson('data/members/step.json',$step);
		}else{
			backManagemant($chat_id,'هیچ کاربری اخطار ندارد‼️',null);
		}
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if($step[$chat_id]=='unwarning_user' && isset($text) && $text!=$s){
	if(!in_array($text,$members)){
		sendMessage($chat_id,'⭕️ این کاربر وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	$first_name_user=getChat($text)->result->first_name;
	if(array_key_exists($text,$warning_list)){
		unset($warning_list[$text]);
		saveJson('data/bot/warning_list.json',$warning_list);
		sendMessage($text,'تمام اخطار های شما توسط مدیر ربات حذف شد‼️','HTML',null);
		backManagemant($chat_id,"تمام اخطار های کاربر [$first_name_user](tg://user?id=$text) حذف شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️کاربر [$first_name_user](tg://user?id=$text) هیچ اخطاری ندارد ! !",null);
	}
}
#block robot
$s='بلاک کردن ربات';
if($text==$s && $step[$chat_id]=='managemant'){
	if($robots!=null){
		sendMessage($chat_id,'🔻لطفا یوزرنیم ربات مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
		@$step[$chat_id]='block_robot';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'درحال حاضر هیچ ربات ساخته شده ای وجود ندارد‼️',null);
	}
}
if($step[$chat_id]=='block_robot' && isset($text) && $text!=$s){
	$text=strtolower($text);
	if(strstr($text,'@')){
		$text=str_replace('@',null,$text);
	}
	if(!is_dir('data/robots/'.$text)){
		sendMessage($chat_id,'⭕️ این ربات وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	@$fackts=json_decode(file_get_contents('data/robots/'.$text.'/fackts.json'),true);
	$get_me=getMe($fackts['token']);
	$first_name_robot=$get_me->result->first_name;
	$id_robot=$get_me->result->id;
	if(!in_array($id_robot,$block_list)){
		@$block_list[]=$id_robot;
		saveJson('data/bot/block_list.json',$block_list);
		file_get_contents('https://api.telegram.org/bot'.$fackts['token'].'/deleteWebHook');
		backManagemant($chat_id,"ربات [$first_name_robot](https://telegram.me/$text) بلاک شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ ربات [$first_name_robot](https://telegram.me/$text) قبلا بلاک شده بود !",null);
	}
}
#unblock robot
$s='آنبلاک کردن ربات';
if($text==$s && $step[$chat_id]=='managemant'){
	if($robots!=null){
		if($block_list!=null){
			sendMessage($chat_id,'🔻لطفا یوزرنیم ربات مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
			@$step[$chat_id]='unblock_robot';
			saveJson('data/members/step.json',$step);
		}else{
			backManagemant($chat_id,'هیچ ربات بلاک شده ای برای آنبلاک کردن وجود ندارد‼️',null);
		}
	}else{
		backManagemant($chat_id,'درحال حاضر هیچ ربات ساخته شده ای وجود ندارد‼️',null);
	}
}
if($step[$chat_id]=='unblock_robot' && isset($text) && $text!=$s){
	$text=strtolower($text);
	if(strstr($text,'@')){
		$text=str_replace('@',null,$text);
	}
	if(!is_dir('data/robots/'.$text)){
		sendMessage($chat_id,'⭕️ این ربات وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	@$fackts=json_decode(file_get_contents('data/robots/'.$text.'/fackts.json'),true);
	$get_me=getMe($fackts['token']);
	$first_name_robot=$get_me->result->first_name;
	$id_robot=$get_me->result->id;
	if(in_array($id_robot,$block_list)){
		@$e=array_search($id_robot,$block_list);
		unset($block_list[$e]);
		saveJson('data/bot/block_list.json',$block_list);
		@$site=explode('/',$_SERVER['SCRIPT_URI']);
		$end=end($site);
		$site=str_replace($end,null,$_SERVER['SCRIPT_URI']);
		$site=str_replace('http://','https://',$site);
		file_get_contents('https://api.telegram.org/bot'.$fackts['token'].'/setWebHook?url='.$site.'data/robots/'.$text.'/index.php');
		backManagemant($chat_id,"ربات [$first_name_robot](https://telegram.me/$text) آنبلاک شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ربات [$first_name_robot](https://telegram.me/$text) بلاک نمی باشد ! !",null);
	}
}
#lock channel
if(strstr($text,'قفل کانال / ') && $settings['channel']!='تنظیم نشده' && $step[$chat_id]=='managemant'){
	if($settings['lock_channel']=='✅'){
		@$settings['lock_channel']='☑️';
		saveJson('data/bot/settings.json',$settings);
		backManagemant($chat_id,'از این به بعد لازم نیست اعضا در کانال شما عضو شوند تا بتوانند از ربات استفاده کنند !♨️',$settings);
	}else{
		@$settings['lock_channel']='✅';
		saveJson('data/bot/settings.json',$settings);
		backManagemant($chat_id,'اعضا باید از این به بعد در کانال شما عضو شوند تا بتوانند از ربات استفاده کنند !♨️',$settings);
	}
}
#ping bot
if(strstr($text,'وضعیت ربات / ') && $step[$chat_id]=='managemant'){
	if($settings['ping']=='✅'){
		@$settings['ping']='☑️';
		saveJson('data/bot/settings.json',$settings);
		backManagemant($chat_id,'ربات برای اعضا غیر قابل استفاده شد !🚀',$settings);
	}else{
		@$settings['ping']='✅';
		saveJson('data/bot/settings.json',$settings);
		backManagemant($chat_id,'ربات برای اعضا قابل استفاده شد !🚀',$settings);
	}
}
#set channel
$s='تنظیم کانال';
if($text==$s && $step[$chat_id]=='managemant'){
	sendMessage($chat_id,'🔻لطفا یوزرنیم کانال خود را همراه با @ ارسال کنید :','HTML',$button_back_managemant);
	@$step[$chat_id]='set_channel';
	saveJson('data/members/step.json',$step);
}
if(isset($text) && $step[$chat_id]=='set_channel' && $text!=$s){
	if(substr($text,0,1)=='@'){
		if(getChat($text)->result->type=='channel'){
			$channel=str_replace('@',null,$text);
			@$settings['channel']=$channel;
			saveJson('data/bot/settings.json',$settings);
			backManagemant($chat_id,'کانال شما با موفقیت تنظیم شد🚀',$settings);
		}else{
			sendMessage($chat_id,"❌این نام کاربری معتبر نیست!\nلطفا نام کاربری خود را با دقت بیشتری ارسال کنید! ️",'HTML',$button_back_managemant);
		}
	}else{
		sendMessage($chat_id,'❌یوزرنیم کانال باید با @ شروع شود !','HTML',$button_back_managemant);
	}
}
#set support robot
$s='تنظیم ربات پشتیبانی';
if($text==$s && $step[$chat_id]=='managemant'){
	sendMessage($chat_id,'🔻لطفا یوزرنیم ربات پشتیبانی را همراه با @ ارسال کنید :','HTML',$button_back_managemant);
	@$step[$chat_id]='set_support_robot';
	saveJson('data/members/step.json',$step);
}
if(isset($text) && $step[$chat_id]=='set_support_robot' && $text!=$s){
	if(substr($text,0,1)=='@'){
		$substr=substr($text,1,2);
		$strlen=strlen($text);
		if(preg_match('/^[A-Z]|[a-z]|[0-9]|_/',$text) && strstr($text,' ')==false && preg_match('/^[0-9]|_/',$substr)==false && $strlen>=6 && strstr(strtolower(substr($text,$strlen-3,$strlen)),'bot')){
			$support=str_replace('@',null,$text);
			@$settings['support']=$support;
			saveJson('data/bot/settings.json',$settings);
			backManagemant($chat_id,'ربات پشتیبانی با موفقیت تنظیم شد🚀',$settings);
		}else{
			sendMessage($chat_id,"❌این نام کاربری معتبر نیست!\nلطفا نام کاربری ربات پشتیبانی را با دقت بیشتری ارسال کنید! ️",'HTML',$button_back_managemant);
		}
	}else{
		sendMessage($chat_id,'❌یوزرنیم ربات پشتیبانی باید با @ شروع شود !','HTML',$button_back_managemant);
	}
}
#code free to vip
if($text=='کد رایگان (کاربر)' && $step[$chat_id]=='managemant'){
	if($settings['channel']!='تنظیم نشده'){
		$code=mt_rand(11111,99999);
		sendMessage('@'.$settings['channel'],"یک کد ویژه کردن حساب بوجود آمد♨️\n\nکد : `$code`\n\nبرای ویژه کردن حساب خود مسیر زیر را در ربات طی کنید و سپس کد را ارسال کنید⬇️\n\nحساب ویژه💞--> کد ویژه (حساب)🔢",'MarkDown',null);
		file_put_contents('data/bot/code.txt',$code);
		backManagemant($chat_id,'کد ویژه کردن حساب با موفقیت بوجود آمد🚀',$settings);
	}else{
		backManagemant($chat_id,'برای این کار ابتدا باید یک کانال تنظیم کنید‼️',$settings);
	}
}
#code free to vip 2
if($text=='کد رایگان (ربات)' && $step[$chat_id]=='managemant'){
	if($settings['channel']!='تنظیم نشده'){
		$code=mt_rand(11111,99999);
		sendMessage('@'.$settings['channel'],"یک کد ویژه کردن ربات بوجود آمد♨️\n\nکد : `$code`\n\nبرای ویژه کردن ربات خود مسیر زیر را در ربات طی کنید و سپس کد را ارسال کنید⬇️\n\nحساب ویژه💞--> کد ویژه (ربات)🔢",'MarkDown',null);
		file_put_contents('data/bot/code2.txt',$code);
		backManagemant($chat_id,'کد ویژه کردن ربات با موفقیت بوجود آمد🚀',$settings);
	}else{
		backManagemant($chat_id,'برای این کار ابتدا باید یک کانال تنظیم کنید‼️',$settings);
	}
}
#add source code
$s='اضافه کردن سورس';
if($text==$s && $step[$chat_id]=='managemant'){
	sendMessage($chat_id,"🔻لطفا نام دکمه ای که می خواهید ربات جدید در آن اضافه شود را ارسال کنید :\n\n〽️لطفا از ایموجی در نام ارسالی استفاده نکنید.",'HTML',$button_back_managemant);
	@$step[$chat_id]='set_name_source_code';
	saveJson('data/members/step.json',$step);
}
if(isset($text) && $step[$chat_id]=='set_name_source_code' && $text!=$s){
	if(!array_key_exists($text,$robot_list)){
		@$last_text[$chat_id]=$text;
		saveJson('data/members/last_text.json',$last_text);
		sendMessage($chat_id,"🔻لطفا سورس کد را در فرمت php ارسال کنید :\n\n〽️سورس کد ربات حتما باید در یک فایل ذخیره شده باشد.\n〽️در جاهایی که توکن کاربر باید قرار گیرد\n`[*[*TOKEN*]*]`\nرا قرار دهید.\n〽️در جاهایی که شناسه عددی کاربر باید قرار گیرد\n`[*[*ADMIN*]*]`\nرا قرار دهید.",'MarkDown',$button_back_managemant);
		@$step[$chat_id]='add_source_code';
		saveJson('data/members/step.json',$step);
	}else{
		sendMessage($chat_id,'این دکمه وجود دارد‼️\n\nلطفا یک نام جدید ارسال کنید :','HTML',$button_back_managemant);
	}
}
if(isset($update->message->document) && $step[$chat_id]=='add_source_code'){
	$file_name=$update->message->document->file_name;
	$explode=explode('.',$file_name);
	$e=count($explode)-1;
	if(strtolower($explode[$e])=='php'){
		$file_id=$update->message->document->file_id;
		$get_file=getFile($file_id)->result;
		$file_path=$get_file->file_path;
		@$count=count($robot_list)+1;
		$name='robot_'.$count;
		mkdir('data/sources/'.$name);
		file_put_contents('data/sources/'.$name.'/index.php',file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$file_path));
		@$robot_list[$last_text[$chat_id]]=$name;
		saveJson('data/bot/robot_list.json',$robot_list);
		unset($last_text[$chat_id]);
		saveJson('data/members/last_text.json',$last_text);
		backManagemant($chat_id,"سورس کد جدید به ربات اضافه شد🚀\n\nنام پوشه ذخیره سازی سورس کد در هاست :\n`$name`",null);
	}else{
		sendMessage($chat_id,'لطفا سورس کد را با فرمت php ارسال کنید‼️','HTML',$button_back_managemant);
	}
}
#delete source code
$s='حذف کردن سورس';
if($text==$s && $step[$chat_id]=='managemant'){
	if($robot_list!=null){
		sendMessage($chat_id,'🔻لطفا نام دکمه ای که می خواهید ربات درون آن را حذف کنید را ارسال کنید  :','HTML',$button_back_managemant);
		@$step[$chat_id]='delete_source_code';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'هیچ سورس کدی برای حذف کردن وجود ندارد‼️',null);
	}
}
if(isset($text) && $step[$chat_id]=='delete_source_code' && $text!=$s){
	if(array_key_exists($text,$robot_list)){
		unset($robot_list[$text]);
		saveJson('data/bot/robot_list.json',$robot_list);
		unlink('data/sources/'.$robot_list[$text].'/index.php');
		rmdir('data/sources/'.$robot_list[$text]);
		backManagemant($chat_id,"دکمه \"$text\" حذف شد🚀",null);
	}else{
		sendMessage($chat_id,"دکمه \"$texr\" وجود ندارد ❌",'HTML',$button_back_managemant);
	}
}
#add vip account
$s='ویژه کردن حساب';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($members)>1){
		sendMessage($chat_id,'🔻لطفا شناسه عددی کاربر مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
		@$step[$chat_id]='add_vip_account';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if(isset($text) && $step[$chat_id]=='add_vip_account' && $text!=$s){
	if(!in_array($text,$members)){
		sendMessage($chat_id,'⭕️ این کاربر وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	if($text==$admin || in_array($text,$admins)){
		sendMessage($chat_id,'مدیر و ادمین ها همیشه جزء اعضای ویژه هستند‼️','HTML',$button_back_managemant);
		die;
	}
	$first_name_user=getChat($text)->result->first_name;
	if(!in_array($text,$vips)){
		@$vips[]=$text;
		saveJson('data/bot/vips.json',$vips);
		sendMessage($text,'حساب شما توسط مدیر به حساب ویژه ارتقا یافت💖','HTML',null);
		backManagemant($chat_id,"حساب کاربر [$first_name_user](tg://user?id=$text) ویژه شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ حساب کاربر [$first_name_user](tg://user?id=$text) از قبل ویژه بوده است !",null);
	}
}
#delete vip account
$s='معمولی کردن حساب';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($members)>1){
		if($vips!=null){
			sendMessage($chat_id,'🔻لطفا شناسه عددی کاربر مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
			@$step[$chat_id]='delete_vip_account';
			saveJson('data/members/step.json',$step);
		}else{
			backManagemant($chat_id,'هیچ حساب ویژه ای برای معمولی کردن وجود ندارد‼️',null);
		}
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if(isset($text) && $step[$chat_id]=='delete_vip_account' && $text!=$s){
	if(!in_array($text,$members)){
		sendMessage($chat_id,'⭕️ این کاربر وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	if($text==$admin || in_array($text,$admins)){
		sendMessage($chat_id,'شما نمی توانید حساب مدیر / ادمین را معمولی کنید‼️','HTML',$button_back_managemant);
		die;
	}
	$first_name_user=getChat($text)->result->first_name;
	if(in_array($text,$vips)){
		@$e=array_search($text,$vips);
		unset($vips[$e]);
		saveJson('data/bot/vips.json',$vips);
		sendMessage($text,'حساب شما توسط مدیر به حساب معمولی تنزل یافت‼️','HTML',null);
		backManagemant($chat_id,"حساب کاربر [$first_name_user](tg://user?id=$text) معمولی شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ حساب کاربر [$first_name_user](tg://user?id=$text) از قبل معمولی بوده است !",null);
	}
}
#add vip robot
$s='ویژه کردن ربات';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($robots)>0){
		sendMessage($chat_id,'🔻لطفا یوزرنیم ربات مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
		@$step[$chat_id]='add_vip_robot';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'درحال حاضر هیچ ربات ساخته شده ای وجود ندارد‼️',null);
	}
}
if(isset($text) && $step[$chat_id]=='add_vip_robot' && $text!=$s){
	$text=strtolower($text);
	if(strstr($text,'@')){
		$text=str_replace('@',null,$text);
	}
	if(!is_dir('data/robots/'.$text)){
		sendMessage($chat_id,'⭕️ این ربات وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	@$fackts=json_decode(file_get_contents('data/robots/'.$text.'/fackts.json'),true);
	$get_me=getMe($fackts['token']);
	$first_name_robot=$get_me->result->first_name;
	$username_robot=$get_me->result->username;
	if(!in_array($text,$vips_robots)){
		@$fackts['account']='vip';
		saveJson('data/robots/'.$text.'/fackts.json',$fackts);
		@$vips_robots[]=$text;
		saveJson('data/bot/vips_robots.json',$vips_robots);
		sendMessage($fackts['creator'],'حساب ربات شما توسط مدیر به حساب ویژه ارتقا یافت💖','HTML',null);
		backManagemant($chat_id,"حساب ربات [$first_name_robot](https://telegram.me/$username_robot) ویژه شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ حساب ربات [$first_name_robot](https://telegram.me/$username_robot) از قبل ویژه بوده است !",null);
	}
}
#delete vip robot
$s='معمولی کردن ربات';
if($text==$s && $step[$chat_id]=='managemant'){
	if(count($robots)>0){
		if($vips_robots!=null){
			sendMessage($chat_id,'🔻لطفا یوزرنیم ربات مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
			@$step[$chat_id]='delete_vip_robot';
			saveJson('data/members/step.json',$step);
		}else{
			backManagemant($chat_id,'هیچ ربات ویژه ای برای معمولی کردن وجود ندارد‼️',null);
		}
	}else{
		backManagemant($chat_id,'درحال حاضر هیچ ربات ساخته شده ای وجود ندارد‼️',null);
	}
}
if(isset($text) && $step[$chat_id]=='delete_vip_robot' && $text!=$s){
	$text=strtolower($text);
	if(strstr($text,'@')){
		$text=str_replace('@',null,$text);
	}
	if(!is_dir('data/robots/'.$text)){
		sendMessage($chat_id,'⭕️ این ربات وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	@$fackts=json_decode(file_get_contents('data/robots/'.$text.'/fackts.json'),true);
	$get_me=getMe($fackts['token']);
	$first_name_robot=$get_me->result->first_name;
	$username_robot=$get_me->result->username;
	if(in_array($text,$vips_robots)){
		@$fackts['account']='free';
		saveJson('data/robots/'.$text.'/fackts.json',$fackts);
		@$a=array_search($text,$vips_robots);
		unset($vips_robots[$a]);
		saveJson('data/bot/vips_robots.json',$vips_robots);
		sendMessage($fackts['creator'],'حساب ربات شما توسط مدیر به حساب معمولی تنزل یافت‼️','HTML',null);
		backManagemant($chat_id,"حساب ربات [$first_name_robot](https://telegram.me/$username_robot) معمولی شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ حساب ربات [$first_name_robot](https://telegram.me/$username_robot) از قبل معمولی بوده است !",null);
	}
}
#add admin
$s='افزودن ادمین';
if($text==$s && $step[$chat_id]=='managemant' && $chat_id==$admin){
	if(count($members)>1){
		sendMessage($chat_id,'🔻لطفا شناسه عددی کاربر مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
		@$step[$chat_id]='add_admin';
		saveJson('data/members/step.json',$step);
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if(isset($text) && $step[$chat_id]=='add_admin' && $text!=$s){
	if(!in_array($text,$members)){
		sendMessage($chat_id,'⭕️ این کاربر وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	if($text==$admin){
		sendMessage($chat_id,'شما مدیر هستید و نمی توانید به ادمین تنزل یابید‼️','HTML',$button_back_managemant);
		die;
	}
	$first_name_user=getChat($text)->result->first_name;
	if(!in_array($text,$admins)){
		@$admins[]=$text;
		saveJson('data/bot/admins.json',$admins);
		if(in_array($text,$block_list)){
			unset($block_list[$text]);
			saveJson('data/bot/block_list.json',$block_list);
		}
		if(in_array($text,$warning_list)){
			unset($warning_list[$text]);
			saveJson('data/bot/warning_list.json',$warning_list);
		}
		sendMessage($text,'شما توسط مدیر ربات ادمین شدید🔥','HTML',null);
		backManagemant($chat_id,"کاربر [$first_name_user](tg://user?id=$text) ادمین شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ کاربر [$first_name_user](tg://user?id=$text) از قبل ادمین بوده است !",null);
	}
}
#delete admin
$s='حذف ادمین';
if($text==$s && $step[$chat_id]=='managemant' && $chat_id==$admin){
	if(count($members)>1){
		if($admins!=null){
			sendMessage($chat_id,'🔻لطفا شناسه عددی کاربر مورد نظر را ارسال کنید :','HTML',$button_back_managemant);
			@$step[$chat_id]='delete_admin';
			saveJson('data/members/step.json',$step);
		}else{
			backManagemant($chat_id,'هیچ ادمینی برای حذف کردن وجود ندارد‼️',null);
		}
	}else{
		backManagemant($chat_id,'ربات شما هنوز هیچ عضوی ندارد‼️',null);
	}
}
if(isset($text) && $step[$chat_id]=='delete_admin' && $text!=$s){
	if(!in_array($text,$members)){
		sendMessage($chat_id,'⭕️ این کاربر وجود ندارد !','HTML',$button_back_managemant);
		die;
	}
	if($text==$admin){
		sendMessage($chat_id,'شما نمی توانید خودتان را از مدیریت برکنار کنید‼️','HTML',$button_back_managemant);
		die;
	}
	$first_name_user=getChat($text)->result->first_name;
	if(in_array($text,$admins)){
		@$e=array_search($text,$admins);
		unset($admins[$e]);
		saveJson('data/bot/admins.json',$admins);
		sendMessage($text,'شما توسط مدیر ربات از ادمین بودن حذف شدید‼️','HTML',null);
		backManagemant($chat_id,"کاربر [$first_name_user](tg://user?id=$text) از ادمین بودن حذف شد !🚀",null);
	}else{
		backManagemant($chat_id,"⭕️ کاربر [$first_name_user](tg://user?id=$text) از قبل ادمین نبوده است !",null);
	}
}
#count
if($text=='آمار ربات' && $step[$chat_id]=='managemant'){
	@$members=count($members)==null?0:count($members);
	@$robots=count($robots)==null?0:count($robots);
	@$robot_list=count($robot_list)==null?0:count($robot_list);
	@$admins=count($admins)==null?0:count($admins);
	@$vips=count($vips)==null?0:count($vips);
	@$block_list=count($block_list)==null?0:count($block_list);
	@$warning_list=count($block_list)==null?0:count($warning_list);
	@$vips_robots=count($vips_robots);
	backManagemant($chat_id,"🔸تعداد اعضا : `$members`\n\n🔹تعداد ربات های ساخته شده : `$robots`\n\n🔸تعداد سورس ها : `$robot_list`\n\n🔹تعداد افراد / ربات های بلاک شده : `$block_list`\n\n🔸تعداد حساب های ویژه : `$vips`\n\n🔹تعداد ادمین ها : `$admins`\n\n🔸تعداد افراد دارای اخطار : `$warning_list`\n\n🔹تعداد ربات های ویژه : `$vips_robots`",null);
}
#oder settings
if($text=='تنظیمات دیگر' && $step[$chat_id]=='managemant'){
	sendMessage($chat_id,'⛓دیگر تنظیمات ربات شما⛓','HTML',buttonOderSettings($settings));
}
if(strstr($data,'+')){
	$data=str_replace('+',null,$data);
	@$e=$settings[$data]+1;
	if($e<=15){
		@$settings[$data]=$e;
		saveJson('data/bot/settings.json',$settings);
		editMessageReplyMarkup($chat_id2,$message_id2,buttonOderSettings($settings));
	}
}
if(strstr($data,'-')){
	$data=str_replace('-',null,$data);
	@$e=$settings[$data]-1;
	if($e>=1){
		@$settings[$data]=$e;
		saveJson('data/bot/settings.json',$settings);
		editMessageReplyMarkup($chat_id2,$message_id2,buttonOderSettings($settings));
	}
}
#block list
if($text=='بلاک لیست' && $step[$chat_id]=='managemant'){
	if($block_list!=null){
		$number=0;
		foreach($block_list as $key){
			$number++;
			$first_name=getChat($key)->result->first_name;
			$list.="$number - [$first_name](tg://user?id=$key) (`$key`)\n";
		}
		backManagemant($chat_id,"📛بلاک لیست📛 :\n\n$list",null);
	}else{
		backManagemant($chat_id,'بلاک لیست خالی است‼️',null);
	}
}
#source code list
if($text=='لیست سورس ها' && $step[$chat_id]=='managemant'){
	if($robot_list!=null){
		$number=0;
		foreach($robot_list as $key=>$value){
			$number++;
			$list.="$number - $key : `$value` \n";
		}
		backManagemant($chat_id,"🔩سورس لیست🔩 :\n\n$list",null);
	}else{
		backManagemant($chat_id,'لیست  سورس ها خالی است‼️',null);
	}
}
#vip list
if($text=='لیست حساب های ویژه' && $step[$chat_id]=='managemant'){
	if($vips!=null){
		$number=0;
		foreach($vips as $key){
			$number++;
			$first_name=getChat($key)->result->first_name;
			$list.="$number - [$first_name](tg://user?id=$key) (`$key`)\n";
		}
		backManagemant($chat_id,"🏆لیست حساب های ویژه🏆 :\n\n$list",null);
	}else{
		backManagemant($chat_id,'لیست حساب های ویژه خالی است‼️',null);
	}
}
#warning list
if($text=='لیست اخطار ها' && $step[$chat_id]=='managemant'){
	if($warning_list!=null){
		$number=0;
		foreach($warning_list as $key=>$value){
			$number++;
			$first_name=getChat($key)->result->first_name;
			$list.="$number - [$first_name](tg://user?id=$key) : $value (`$key`)\n";
		}
		backManagemant($chat_id,"⚠️لیست اخطار⚠️ :\n\n$list",null);
	}else{
		backManagemant($chat_id,'لیست اخطار خالی است‼️',null);
	}
}
#admin list
if($text=='لیست ادمین ها' && $step[$chat_id]=='managemant'){
	if($admins!=null){
		$number=0;
		foreach($admins as $key){
			$number++;
			$first_name=getChat($key)->result->first_name;
			$list.="$number - [$first_name](tg://user?id=$key) (`$key`)\n";
		}
		backManagemant($chat_id,"🔥لیست ادمین ها🔥 :\n\n$list",null);
	}else{
		backManagemant($chat_id,'لیست ادمین ها خالی است‼️',null);
	}
}
#robot list
if($text=='لیست ربات ها' && $step[$chat_id]=='managemant'){
	if($robots!=null){
		$number=0;
		foreach($robots as $key=>$value){
			$number++;
			$first_name=getChat($value)->result->first_name;
			$list.="$number - `$key` : [$first_name](tg://user?id=$value) (`$value`) \n";
		}
		backManagemant($chat_id,"🤖لیست ربات ها و صاحب آنها🤖 :\n\n$list",null);
	}else{
		backManagemant($chat_id,'لیست ربات ها خالی است‼️',null);
	}
}
#set tab
$s='تنظیم تبلیغ';
if($text==$s && $step[$chat_id]=='managemant'){
	sendMessage($chat_id,'🔻 لطفا تبلیغی که میخواهید تنظیم کنید را در قالب متن یا عکس همراه با عنوان ارسال کنید :','HTML',$button_back_managemant);
	$step[$chat_id]='set_tab';
	saveJson('data/members/step.json',$step);
}
if($text!=$s && (isset($text) || isset($update->message->photo)) && $step[$chat_id]=='set_tab'){
	if(isset($update->message->photo)){
		$file_id=$update->message->photo[count($update->message->photo)-1]->file_id;
		$file_path=getFile($file_id)->result->file_path;
		file_put_contents('data/bot/tab_image.png',file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$file_path));
		@$settings_tab['photo']='set';
		@$settings_tab['text']=$update->message->caption;
		saveJson('data/bot/settings_tab.json',$settings_tab);
	}else{
		@$settings_tab['photo']='offset';
		@$settings_tab['text']=$text;
		saveJson('data/bot/settings_tab.json',$settings_tab);
	}
	backManagemant($chat_id,'تبلیغ شما برای ربات های رایگان تنظیم شد🚀',null);
}
#del tab
$s='حذف تبلیغ';
if($text==$s && $step[$chat_id]=='managemant'){
	if(file_exists('data/bot/tab_image.png')){
		unlink('data/bot/tab_image.png');
	}
	if(file_exists('data/bot/settings_tab.json')){
		unlink('data/bot/settings_tab.json');
	}
	backManagemant($chat_id,'تبلیغ تنظیم شده با موفقیت حذف شد🚀');
}
#vip robots list
if($text=='لیست ربات های ویژه' && $step[$chat_id]=='managemant'){
	if($vips_robots!=null){
		$number=0;
		foreach($vips_robots as $key){
			$number++;
			@$fackts=json_decode(file_get_contents('data/robots/'.$key.'/fackts.json'),true);
			$get_me=getMe($fackts['token']);
			$first_name=$get_me->result->first_name;
			$username=$get_me->result->username;
			$id=$get_me->result->id;
			$list.="$number - [$first_name](https://telegram.me/$username) (`$id`)\n";
		}
		backManagemant($chat_id,"🏆لیست ربات های ویژه🏆 :\n\n$list",null);
	}else{
		backManagemant($chat_id,'لیست ربات های ویژه خالی است‼️',null);
	}
}
#unlink error log
if(file_exists('error_log')){
	unlink('error_log');
}
?>
