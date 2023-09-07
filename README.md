# REQUIREMENT 
1. Laravel 10.x requires a minimum PHP version of 8.1.
2. Composer version 2

# INSTALLATION
1. clone this project
2. inside project folder run :
```
composer install
```
3. After installation complete , copy .env.example to .env
4. open your terminal inside this project folder run : 
```
php artisan key:generate
```
5 edit file .env, and adjust values eviroment varibles below : 
```
AWS_ENDPOINT=
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=true
```
6. to run, just open your terminal 
```
php artisan serve
```
7.  it  will be run on your 8000 port default, open web browser link http://localhost:80000


# Location of Codes
```
App\Http\Controllers\TestController
```

function index will be run on link :
```
http://localhost:8000/test
```

function conventional will be run on link :
```
http://localhost:8000/test2
```
