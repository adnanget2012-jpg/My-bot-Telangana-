<?php
$API_KEY = "8655559292:AAFaD4pKcLBIDlUROAl5gD7HjIrkcSGhNTw"; // التوكن الخاص بك
define('API_KEY', $API_KEY);

function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    return json_decode($res);
}

// السطر الأهم لاستقبال رسائل تلجرام
$update = json_decode(file_get_contents('php://input'));

if ($update->message) {
    $message = $update->message;
    $chat_id = $message->chat->id;
    $text = $message->text;
    $message_id = $message->message_id;

    if ($text == '/start') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "أهلاً بك! البوت يعمل بنجاح على منصة Render 🚀",
            'reply_to_message_id' => $message_id,
        ]);
    }
    
    // ردود تلقائية بسيطة للاختبار
    if ($text == 'كيفك') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "بخير دامك بخير يا غالي 🌹",
            'reply_to_message_id' => $message_id,
        ]);
    }
}
