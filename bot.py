import telebot
import os

# التوكن الخاص بك
TOKEN = "8655559292:AAFaD4pKcLBIDlUROAl5gD7HjIrkcSGhNTw"
bot = telebot.TeleBot(TOKEN)

@bot.message_handler(commands=['start'])
def send_welcome(message):
    bot.reply_to(message, "أهلاً أنس! البوت الآن يعمل بلغة بايثون على Render 🐍🚀")

@bot.message_handler(func=lambda message: True)
def echo_all(message):
    if message.text == "كيفك":
        bot.reply_to(message, "بخير يا غالي، لغة بايثون رهيبة! 👍")
    else:
        bot.reply_to(message, "وصلت رسالتك: " + message.text)

# تشغيل البوت
if __name__ == "__main__":
    bot.infinity_polling()
  
