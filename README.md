
# 

composer install

bash etc/init-project.sh
php artisan key:generate
php artisan jwt:secret
php artisan migrate
php artisan db:seed


Laravel初期的な設定をする。    
https://blog.capilano-fw.com/?p=289#i-2



```
composer create-project "laravel/laravel=5.5.*" src
```



```php:config/database.php

```


```:.env
APP_NAME サイト名
APP_URL　サイトのURL
DB_DATABASE　データベース名
DB_USERNAME　DBユーザ名
DB_PASSWORD　DBパスワード
```

create database `laravel_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;



```
mysql -uroot -p
password
mysql -u default -p
secret

# Linux
systemctl start mysql
# Mac
mysql.server start

DESCRIBE `replies`;
```


app.php

'timezone' => 'Asia/Tokyo',
'locale' => 'ja',
'fallback_locale' => 'ja',


sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache


php artisan make:auth


```
composer require "laravel/cashier":"~7.0"
```




