<?php

declare(strict_types=1);
/**
 * This file is part of laravel-youdu.
 *
 * @link     https://github.com/youduphp/laravel-youdu
 * @document https://github.com/youduphp/laravel-youdu/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */

namespace YouduPhp\LaravelYoudu\Console;

use Illuminate\Console\Command;
use YouduPhp\LaravelYoudu\YouduServiceProvider;

class InstallCommand extends Command
{
    protected $signature = 'youdu:install';

    protected $description = 'Install Package';

    public function handle()
    {
        $this->info('Installing Package...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => YouduServiceProvider::class,
            '--tag' => 'config',
        ]);

        $this->info('Installed Package');
    }
}
