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
use YouduPhp\Youdu\Kernel\Message\App\Image;

/**
 * @internal
 * @coversNothing
 */
class AppTest extends TestCase
{
    public function testSendAppText()
    {
        $this->assertTrue(Youdu::message()->sendToUser('10400', 'test'));
    }

    // public function testSendAppImage()
    // {
    //     $mediaId = Youdu::media()->upload('/Users/hdj/Downloads/YD20191128-154517.png', 'image');
    //     $sent = Youdu::sendToUser('10400', new Image($mediaId));
    //     $this->assertTrue($sent);
    // }

    public function testSendAppImageFromUrl()
    {
        $mediaId = Youdu::media()->upload('https://www.baidu.com/img/bd_logo1.png', 'image');
        $sent = Youdu::message()->sendToUser('10400', new Image($mediaId));
        $this->assertTrue($sent);
    }
}
