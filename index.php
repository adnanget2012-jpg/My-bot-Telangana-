<?php
// التوكن الخاص بك
$API_KEY = "8655559292:AAFaD4pKcLBIDlUROAl5gD7HjIrkcSGhNTw";
define('API_KEY', $API_KEY);

// دالة إرسال البيانات لتلجرام
function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datas));
    $res = curl_exec($ch);
    return json_decode($res);
}

// استقبال الرسائل القادمة من تلجرام
$update = json_decode(file_get_contents('php://input'));

if (isset($update->message)) {
    $message = $update->message;
    $chat_id = $message->chat->id;
    $text = $message->text;

    // الرد على أمر البداية
    if ($text == '/start') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "أهلاً بك يا أنس! البوت يعمل الآن بنجاح على منصة Render 🚀",
        ]);
    }

    // تجربة رد آخر
    if ($text == 'كيفك') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "بخير وعافية، البوت شغال تمام التمام! 👍",
        ]);
    }
}
