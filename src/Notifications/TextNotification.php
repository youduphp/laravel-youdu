<?php

declare(strict_types=1);
/**
 * This file is part of laravel-youdu.
 *
 * @link     https://github.com/youduphp/laravel-youdu
 * @document https://github.com/youduphp/laravel-youdu/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace YouduPhp\LaravelYoudu\Notifications;

use YouduPhp\Youdu\Kernel\Message\App\Text;

class TextNotification extends Notification
{
    /**
     * Create a new notification instance.
     */
    public function __construct(string $message, string $app = 'default', ?int $delay = null)
    {
        parent::__construct(new Text($message), $app, $delay);
    }
}
