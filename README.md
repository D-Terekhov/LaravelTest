
## Установка

1. Клонировать репозиторий в дерикторию локального веб сервера.

    git clone https://github.com/d-terekhov/LaravelTest.git
   
2. Установить зависимости Composer.

    composer install

3. Настройка среды:
    - Скопировать файл .env.example. Переименовать его в .env
    - Настроить параметры дял соединения с базой данных.
          В случае использоваения OpenServer версии 6. В параметре DB_HOST необходимо указать версию СУБД (Например: DB_HOST=mysql-8.2)
          Для OpenServer версии 5 и ниже В параметре DB_HOST необходимо указать IP 127.0.0.1 (Например: DB_HOST=127.0.0.1)
    - Для проверки работоспособности функционала сброса пароля заменить секцию MAIL_ следующими настройками:
      
            MAIL_MAILER=smtp
            MAIL_DRIVER=log
            MAIL_HOST=smtp.mail.ru
            MAIL_PORT=465
            MAIL_USERNAME=D-Terekhov89@mail.ru
            MAIL_PASSWORD=2ya4L6jeBgN967WD6bg7
            MAIL_ENCRYPTION=ssl
            MAIL_FROM_ADDRESS="D-Terekhov89@mail.ru"
            MAIL_FROM_NAME="${APP_NAME}"
      
          По желанию можно указать свои данные для отправки писем с ссылками для сброса.
      
      - Сгенерировать ключ приложения:
        
            php artisan key:generate

      - Запустить миграции базы данных.
     
            php artisan migrate
        
4. Запустить проект:

   php artisan serve
