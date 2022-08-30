<?php

declare(strict_types=1);
/**
 * This file is part of laravel-youdu.
 *
 * @link     https://github.com/youduphp/laravel-youdu
 * @document https://github.com/youduphp/laravel-youdu/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace YouduPhp\LaravelYoudu\Channels;

use Illuminate\Notifications\Notification;
use Throwable;
use YouduPhp\LaravelYoudu\Contracts\Channel;
use YouduPhp\LaravelYoudu\Exceptions\ChannelException;
use YouduPhp\LaravelYoudu\Facades\Youdu;
use YouduPhp\Youdu\Kernel\Message\App\MessageInterface;

class YouduChannel implements Channel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \YouduPhp\LaravelYoudu\Notifications\Notification $notification
     */
    public function send($notifiable, Notification $notification)
    {
        try {
            $message = $notification->toYoudu($notifiable);
            $app = is_callable([$notification, 'app']) ? $notification->app($notifiable) : '';

            if (
                ! ($to = $notifiable->routeNotificationFor('youdu', $notification))
                || ! ($message instanceof MessageInterface)
            ) {
                return false;
            }

            return Youdu::app($app)->message()->sendToUser($to, $message);
        } catch (Throwable $e) {
            throw new ChannelException($e->getMessage(), 1);
        }
    }
}
