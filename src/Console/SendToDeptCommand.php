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
use Throwable;
use YouduPhp\LaravelYoudu\Facades\Youdu;
use YouduPhp\Youdu\Kernel\Message\App\Text;

class SendToDeptCommand extends Command
{
    protected $signature = 'youdu:sendToDept {dept} {message} {--app=default}';

    protected $description = 'Send a youdu message';

    public function handle()
    {
        $toDept = (string) $this->argument('dept');
        $message = (string) $this->argument('message');
        $app = (string) $this->option('app');

        try {
            $message = new Text($message);

            Youdu::app($app)->message()->sendToDept($toDept, $message);
        } catch (Throwable $e) {
            $this->warn($e->getMessage());
            return;
        }

        $this->info('Send success!');
    }
}
