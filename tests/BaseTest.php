<?php

declare(strict_types=1);
/**
 * This file is part of laravel-youdu.
 *
 * @link     https://github.com/youduphp/laravel-youdu
 * @document https://github.com/youduphp/laravel-youdu/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */

namespace YouduPhp\LaravelYoudu\Tests;

use YouduPhp\LaravelYoudu\Facades\Youdu;
use YouduPhp\LaravelYoudu\Manager;

/**
 * @internal
 * @coversNothing
 */
class BaseTest extends TestCase
{
    /**
     * Test the containers.
     */
    public function testContainers()
    {
        $this->assertInstanceOf(Manager::class, app(Manager::class));
    }

    /**
     * Test the objects of app.
     */
    public function testAppObjects()
    {
        $this->assertInstanceOf(\YouduPhp\Youdu\Kernel\Dept\Client::class, Youdu::dept());
        $this->assertInstanceOf(\YouduPhp\Youdu\Kernel\Group\Client::class, Youdu::group());
        $this->assertInstanceOf(\YouduPhp\Youdu\Kernel\Media\Client::class, Youdu::media());
        $this->assertInstanceOf(\YouduPhp\Youdu\Kernel\Session\Client::class, Youdu::session());
        $this->assertInstanceOf(\YouduPhp\Youdu\Kernel\User\Client::class, Youdu::user());
    }
}
