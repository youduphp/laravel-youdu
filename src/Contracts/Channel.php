<?php

declare(strict_types=1);
/**
 * This file is part of laravel-youdu.
 *
 * @link     https://github.com/youduphp/laravel-youdu
 * @document https://github.com/youduphp/laravel-youdu/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */

namespace YouduPhp\LaravelYoudu\Contracts;

use Illuminate\Notifications\Notification;

interface Channel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     */
    public function send($notifiable, Notification $notification);
}
