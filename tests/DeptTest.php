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
class DeptTest extends TestCase
{
    public function testLists()
    {
        $depts = Youdu::dept()->lists();

        $this->assertNotEmpty($depts);
        $this->assertIsArray($depts);
    }
}
