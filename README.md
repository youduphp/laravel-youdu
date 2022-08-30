# laravel-youdu

[![Latest Test](https://github.com/youduphp/laravel-youdu/workflows/tests/badge.svg)](https://github.com/youduphp/laravel-youdu/actions)
[![Latest Stable Version](https://poser.pugx.org/youduphp/laravel-youdu/version.png)](https://packagist.org/packages/youduphp/laravel-youdu)
[![Total Downloads](https://poser.pugx.org/youduphp/laravel-youdu/d/total.png)](https://packagist.org/packages/youduphp/laravel-youdu)
[![GitHub license](https://img.shields.io/github/license/youduphp/laravel-youdu)](https://github.com/youduphp/laravel-youdu)

## Installation

### Laravel

composer

~~~bash
composer require "youduphp/laravel-youdu:2.*"
~~~

publish

~~~bash
php artisan vendor:publish --provider="YouduPhp\\LaravelYoudu\\YouduServiceProvider"
~~~

### Lumen

add `YouduServiceProvider` to `bootstrap/app.php`

~~~php
$app->register(Illuminate\Notifications\NotificationServiceProvider::class); // must before YouduServiceProvider
$app->register(YouduPhp\LaravelYoudu\YouduServiceProvider::class);
~~~

copy `youdu.php` to `config/`

~~~bash
cp vendor/youduphp/laravel-youdu/config/youdu.php config
~~~

## Usage

### Send text message

~~~php
use YouduPhp\LaravelYoudu\Facades\Youdu;

Youdu::send('user1|user2', 'dept1|dept2', 'test'); // send to user and dept
Youdu::sendToUser('user1|user2', 'test'); // send to user
Youdu::sendToDept('dept1|dept2', 'test'); // send to dept
~~~

### Send other type

~~~php
use YouduPhp\LaravelYoudu\Facades\Youdu;

Youdu::send('user1|user2', 'dept1|dept2',new Text('test'));
Youdu::sendToUser('user1|user2', new Image($mediaId)); // $mediaId 通过 uploadFile 接口获得
Youdu::sendToDept('dept1|dept2', new File($mediaId)); // $mediaId 通过 uploadFile 接口获得
// ...
~~~

### Message types

|类型|类|
|--|--|
|文本|YouduPhp\Youdu\Message\App\Text|
|图片|YouduPhp\Youdu\Message\App\Image|
|文件|YouduPhp\Youdu\Message\App\File|
|图文|YouduPhp\Youdu\Message\App\Mpnews|
|链接|YouduPhp\Youdu\Message\App\Link|
|外部链接|YouduPhp\Youdu\Message\App\Exlink|
|系统|YouduPhp\Youdu\Message\App\SysMsg|
|短信|YouduPhp\Youdu\Message\App\Sms|
|邮件|YouduPhp\Youdu\Message\App\Mail|

### Upload file

~~~php
use YouduPhp\LaravelYoudu\Facades\Youdu;

Youdu::uploadFile($file, $fileType); // $fileType image代表图片、file代表普通文件、voice代表语音、video代表视频
~~~

### Download file

~~~php
use YouduPhp\LaravelYoudu\Facades\Youdu;

Youdu::downloadFile($mediaId, $savePath);
~~~
