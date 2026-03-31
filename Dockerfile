# استخدام نسخة PHP الرسمية مع سيرفر Apache
FROM php:8.2-apache

# نسخ جميع ملفات البوت إلى مجلد السيرفر
COPY . /var/www/html/

# تفعيل موديول Rewrite إذا كنت تحتاجه (اختياري)
RUN a2enmod rewrite

# فتح المنفذ 80
EXPOSE 80

# تشغيل السيرفر
CMD ["apache2-foreground"]
