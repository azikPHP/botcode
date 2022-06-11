<?php
//Salom Qod @CoderBlack dan yozilgan
ob_start();
$API_KEY = "5054040192:AAGSjld4CLdPz21nN2obfe6ndtwmUu3TNmg";
define('API_KEY',$API_KEY);
echo "<a href='https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."'>setwebhook</a>";
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}
else
{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
$admin = 1139664080;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$date = "https://api.rangatiratan.ga/tiq.php";
$g = file_get_contents($date);
$js = json_decode($g);
$da = $js->Date;
$time = $js->Time;
$bot = bot('getme',['bot'])->result->username;
echo "<br><a  href='https://t.me/$bot'>@$bot</a>";

$ch = "@NeoMonster";
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"▫️ Вы должны подписаться на канал сначала ⚜; ◼. подписаться на канал и отправить /help  боту, канал @NeoMonster•",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"- Участник подписался на информацию о канале бота ؛ 💗👇🏻'
• Имя ؛ $name ،
• Идентификатор ؛ @$username ،
• Руки ؛ $from_id ،
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
• Время ؛ $time ، 
• Дата ؛ $da ،",
]);return false;}

$as = array("Надеюсь 🙏", "Да","Помилуй", "Конечно");

if($text == "/start"){
bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"• Приветствую ؛ [$name](tg://user?id=$chat_id) 
С помощью этого бота ты можешь : 
Скачать картинку авы из инстаграма
Посмотреть биографию 
Скачать видео из инстаграма 
Для пользования нажмите /help
[•https://t.me/Hack_its_life)",
      'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• Hackers ، ☬'",'url'=>"https://t.me/Hack_its_life"]]    
        ]
    ])
    ]);
      bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"- Человек был введен в ваш бот 🔰; • информация о членах ، 👋🏻

• Имя ؛ $name ،
• Идентификатор ؛ @$username ،
• Руки ؛ $from_id ،
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
• Время ؛ $time ، 
• Дата ؛ $da ،",
]); 
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("memb.txt", $chat_id."\n",FILE_APPEND);
  }
}

if($text == "/help"){
        bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/botsfoto/13",
'caption'=>"Руководство по использования на фото", 'reply_markup'=>json_encode([
      'inline_keyboard'=>[

       
[
          ['text'=>'Админ','url'=>'https://telegram.me/T_Rex_T '], 
          ['text'=>'Создатель','url'=>'https://telegram.me/NeoMonsters'] 
        ]
      ]
    ])
]);
} 
if ($text == "/admin" and $chat_id == $admin ) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"
☑️￤Привет, милая. :-  .
▫️￤Вот заказы сейчас. 📩
-
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'Послание для всех ','callback_data'=>'ce']],
[['text'=>'عКоличество членов ','callback_data'=>'co']],
            ]
            ])
        ]);
}
if($data == 'off'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
      'text'=>"
☑️￤Привет, милая. :-  .
▫️￤Вот заказы сейчас. 📩
-
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسالة للكل ','callback_data'=>'ce']],
[['text'=>'عدد الاعضاء ','callback_data'=>'co']],
            ]
            ])
]);
file_put_contents('usr.txt', '');
}

if($data == "co" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"   qanal azolari 📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}

if($data == "ce" and $update->callback_query->message->chat->id == $admin){ 
    file_put_contents("usr.txt","yas");
    bot('EditMessageText',[
    'chat_id'=>$update->callback_query->message->chat->id,
    'message_id'=>$update->callback_query->message->message_id,
    'text'=>"▪️   $c  qanal azolarga 
   ",
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>' الغاء 🚫 •','callback_data'=>'off']]    
        ]
    ])
    ]);
}
if($text and $modxe == "yas" and $chat_id == $admin ){
    for ($i=0; $i < count($u); $i++) { 
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("usr.txt","no");

} 
}

if(preg_match('/.*instagram\.com.*/i',$text)){
 bot('sendmessage',[
  'chat_id'=>$chat_id,
    'text'=>"- Пожалуйста, подождите немного, пожалуйста ، 🔱
- Загрузка, канал @Hack_its_life ،",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• Канал ، ☬'",'url'=>"https://t.me/Hack_its_life"]]    
        ]
    ])
    ]);
bot('sendphoto',[
 'chat_id'=>$chat_id,
  'photo'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• Канал ، ☬'",'url'=>"https://t.me/Hack_its_life"]]    
        ]
    ])
    ]);
 bot('sendvideo',[
  'chat_id'=>$chat_id,
   'video'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• Канал ، ☬'",'url'=>"https://t.me/Hack_its_life"]]    
        ]
    ])
    ]);
    }
    
if($text != '/start' and $text != '/help' and $text != '/admin'){
	if(preg_match('/([a-z])|([A-Z])/i',$text)){
    $text = trim($text,'@');
    bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"https://instagr.am/$text",
]);
    $insta = json_decode(file_get_contents("http://webservice.lorddeveloper.ir/instagram/?username=$text"));
$bio = $insta->results->biography;
$namei = $insta->results->full_name;
$follower = $insta->results->edge_followed_by->count;
$follows = $insta->results->edge_follow->count;
$profile = $insta->results->profile_pic_url_hd;
$follower = $insta->results->edge_followed_by->count;
$follows = $insta->results->edge_follow->count;
$postc = $insta->results->edge_owner_to_timeline_media->count;
bot('Sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"$profile",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$namei",'callback_data'=>"namei#".$text]],
[['text'=>"• Количество публикаций ؛ $postc 📢 '",'callback_data'=>"post"]],
[['text'=>"• Биография، 📬 '",'callback_data'=>"bio#".$text]],
[['text'=>"• Канал ، 🌍 '",'url'=>"https://t.me/Hack_its_life"]],
[['text'=>"$follower Подписчиков",'callback_data'=>"followers"],['text'=>"$follows Подписок",'callback_data'=>"following"]],
]
])
]);
}
}
$ssa = explode('#', $data);
if($ssa[0] == "bio"){
	$insta = json_decode(file_get_contents("http://webservice.lorddeveloper.ir/instagram/?username=".$ssa[1]));
	$bio = $insta->results->biography;
	bot('sendmessage', [
			  'chat_id'=>$chat_id2,
  'message_id'=>$message_id2,
			'text' => "*$bio*",
			'parse_mode'=>"MarkDown",
			'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"• Канал ، ☬'",'url'=>"https://t.me/Hack_its_life"]],			
		]
])
]);
}

if($ssa[0] == "namei"){
	$insta = json_decode(file_get_contents("http://webservice.lorddeveloper.ir/instagram/?username=".$ssa[1]));
	$namei = $insta->results->full_name;
	bot('sendmessage',[
			  'chat_id'=>$chat_id2,
			'text' => "*$namei*",
			'parse_mode'=>"MarkDown",
]);
}
				
		if($data == "followers"){
			bot('answercallbackquery', [
			'callback_query_id' => $update->callback_query->id,
			'text'=>$as[array_rand($as,1)],
		]);     
		}
		if($data == "post"){
			bot('answercallbackquery', [
			'callback_query_id' => $update->callback_query->id,
			'text'=>$as[array_rand($as,1)],
		]);     
		}
		if($data == "following"){
			bot('answercallbackquery', [
			'callback_query_id' => $update->callback_query->id,
			'text'=>$as[array_rand($as,1)],
		]);    
		}


//Codni manba bilan tarqatingla


//@CoderBlack ga raxmatdeb


//Omad! 