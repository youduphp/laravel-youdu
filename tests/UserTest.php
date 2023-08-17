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

/**
 * @internal
 * @coversNothing
 */
class UserTest extends TestCase
{
    public function testSimpleList()
    {
        $lists = Youdu::user()->simpleList(1);

        $this->assertNotEmpty($lists);
        $this->assertIsArray($lists);
    }

    public function testLists()
    {
        $lists = Youdu::user()->lists(1);

        $this->assertNotEmpty($lists);
        $this->assertIsArray($lists);
    }

    public function testInfo()
    {
        $info = Youdu::user()->get(10400);

        $this->assertNotEmpty($info);
        $this->assertIsArray($info);
        $this->assertNotEmpty($info['userId']);
        $this->assertEquals('10400', $info['userId']);
    }
}
