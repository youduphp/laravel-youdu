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

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification as BaseNotification;
use YouduPhp\Youdu\Kernel\Message\App\MessageInterface;

class Notification extends BaseNotification implements ShouldQueue
{
    use Queueable;

    protected int $tries;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected MessageInterface $message, protected string $app = 'default', ?int $delay = null)
    {
        $this->delay = $delay ?? (int) config('youdu.notification.delay', 0);
        $this->tries = (int) config('youdu.notification.tries', 3);
        $this->queue = config('youdu.notification.queue', 'youdu_notification');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     */
    public function via($notifiable): array
    {
        return ['youdu'];
    }

    /**
     * Get the notification's delivery youdu app.
     */
    public function app(): string
    {
        return $this->app;
    }

    /**
     * Get the notification's message.
     *
     * @param mixed $notificable
     * @return mixed
     */
    public function toYoudu($notificable)
    {
        return $this->message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     */
    public function toArray($notifiable): array
    {
        return [
            'via' => 'youdu',
            'app' => $this->app,
            'message' => $this->message->toArray(),
        ];
    }
}
