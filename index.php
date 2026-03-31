<?php
// التوكن الخاص بك
$API_KEY = "8655559292:AAFaD4pKcLBIDlUROAl5gD7HjIrkcSGhNTw";
define('API_KEY', $API_KEY);

function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datas));
    $res = curl_exec($ch);
    return json_decode($res);
}

// استقبال التحديثات من تلجرام
$update = json_decode(file_get_contents('php://input'));

if ($update->message) {
    $message = $update->message;
    $chat_id = $message->chat->id;
    $text = $message->text;

    if ($text == '/start') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تم تحديث الكود بنجاح! البوت الآن يعمل على Render 🚀",
        ]);
    }
    
    if ($text == 'كيفك') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "بخير يا أنس، البوت شغال تمام! 👍",
        ]);
    }
}
