<?php

declare(strict_types=1);
/**
 * This file is part of laravel-youdu.
 *
 * @link     https://github.com/youduphp/laravel-youdu
 * @document https://github.com/youduphp/laravel-youdu/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */

namespace YouduPhp\LaravelYoudu;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\ServiceProvider;
use YouduPhp\LaravelYoudu\Channels\YouduChannel;
use YouduPhp\Youdu\Application;
use YouduPhp\Youdu\Kernel\HttpClient\ClientFactory;
use YouduPhp\Youdu\Kernel\HttpClient\ClientFactoryInterface;

class YouduServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config' => $this->app->basePath('config')], 'config');

            $this->commands([
                Console\InstallCommand::class,
                Console\SendToUserCommand::class,
                Console\SendToDeptCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/youdu.php', 'youdu');

        $this->app->bind(Manager::class, fn ($app) => new Manager(config('youdu')));

        $this->app->when(Application::class)
            ->needs(ClientFactoryInterface::class)
            ->give(function () {
                $clientFactory = new ClientFactory();
                $clientFactory->setOptions([
                    'base_uri' => (string) config('youdu.api', ''),
                    'timeout' => (int) config('youdu.timeout', 5),
                    'headers' => config('youdu.http.headers', []),
                ]);
                return $clientFactory;
            });

        $this->app->make(ChannelManager::class)->extend('youdu', fn ($app) => $app->make(YouduChannel::class));

        $this->app['translator']->addJsonPath(__DIR__ . '/../resources/lang');
    }

    public function provides(): array
    {
        return [Manager::class];
    }
}
