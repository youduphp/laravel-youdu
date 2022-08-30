<?php

declare(strict_types=1);
/**
 * This file is part of laravel-youdu.
 *
 * @link     https://github.com/youduphp/laravel-youdu
 * @document https://github.com/youduphp/laravel-youdu/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace YouduPhp\LaravelYoudu\Facades;

use Illuminate\Support\Facades\Facade;
use YouduPhp\LaravelYoudu\Manager;

/**
 * @mixin Manager
 * @method static \YouduPhp\Youdu\Application app(string $name = '')
 */
class Youdu extends Facade
{
    public static function getFacadeAccessor()
    {
        return Manager::class;
    }
}
