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
use YouduPhp\LaravelYoudu\YouduServiceProvider;

/**
 * @internal
 * @coversNothing
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Your code here
    }

    protected function getPackageProviders($app)
    {
        return [
            YouduServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            // 'Youdu' => Youdu::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('youdu.api', env('YOUDU_API'));
        $app['config']->set('youdu.buin', env('YOUDU_BUIN'));
        $app['config']->set('youdu.applications.default.app_id', env('YOUDU_DEFAULT_APP_ID'));
        $app['config']->set('youdu.applications.default.aes_key', env('YOUDU_DEFAULT_AES_KEY'));
    }
}
