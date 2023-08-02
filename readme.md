## Install


Install Composer

[Download Composer](https://getcomposer.org/download/)

run on your terminal to download package / dependencies

```
composer install

or

composer update
```

```

## How to setting

Go into .env file and change Database credentials.
```

Run on your terminal

```

php artisan migrate --> migrate table to your database (create database manual first)

php artisan db:seed --> seed data to your database

php artisan key:generate --> generate app key

php artisan serve --> run program on localhost (http://127.0.0.1:8000/)
```

```
DATA DEFAULT USER ADMIN
Username/email : admin@admin.com
password : 123456

DATA USER PENGGUNA
username : user@user.com
password : 123456
```

```
crontab -e
* * * * * cd  /Users/julhend/Documents/Project/jockey/sisformasi-monitoring && php artisan send:reminders 
  

echo $EDITOR
export EDITOR=nano   # Replace 'nano' with your preferred editor

                                                                                                                                  

php artisan schedule:run

php artisan send:reminders
```