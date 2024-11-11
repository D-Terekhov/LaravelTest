
## Установка

1. Клонировать репозиторий в дерикторию локального веб сервера.

        git clone https://github.com/d-terekhov/LaravelTest.git

2. Зависимости:

        PHP - 8.1
        СУБД: MySQL - 8.2   
4. Установить зависимости Composer.

        composer install

5. Настройка среды:
    - Скопировать файл .env.example. Переименовать его в .env
    - Настроить параметры для соединения с базой данных.
      - настроить параметры базы данных. Указать значения для DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME и DB_PASSWORD
            Например:
        
                DB_CONNECTION=mysql
                DB_HOST=mysql-8.2
                DB_PORT=3306
                DB_DATABASE=laraveltestgit
                DB_USERNAME=root
                DB_PASSWORD=
        
      - В случае использования OpenServer версии 6. В параметре DB_HOST необходимо указать версию СУБД (Например: DB_HOST=mysql-8.2)
      - Для OpenServer версии 5 и ниже В параметре DB_HOST необходимо указать IP 127.0.0.1 (Например: DB_HOST=127.0.0.1)
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
      
      Ответить yes на  предложение создать новую базу данных с именем указанным в параметре DB_DATABASE.
      После создания базы будут проведены миграции. 
        
6. Запустить проект:

       php artisan serve
