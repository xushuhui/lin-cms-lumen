lin-cms-lumen

### 安装
```
composer install
cp .env.example .env
php artisan jwt:secret
```
### 启动
```
php -S localhost:81 -t public/
```