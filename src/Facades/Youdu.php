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
 * @method static \YouduPhp\Youdu\Kernel\Dept\Client dept()
 * @method static \YouduPhp\Youdu\Kernel\Message\Client message()
 * @method static \YouduPhp\Youdu\Kernel\User\Client user()
 * @method static \YouduPhp\Youdu\Kernel\Session\Client session()
 * @method static \YouduPhp\Youdu\Kernel\Media\Client media()
 * @method static \YouduPhp\Youdu\Kernel\Group\Client group()
 */
class Youdu extends Facade
{
    public static function getFacadeAccessor()
    {
        return Manager::class;
    }
}
