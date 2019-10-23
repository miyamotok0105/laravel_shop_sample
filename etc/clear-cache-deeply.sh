
cd src
composer dump-autoload
php artisan clear-compiled
php artisan optimize
php artisan config:cache