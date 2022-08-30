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

use Illuminate\Support\Arr;
use YouduPhp\LaravelYoudu\Exceptions\Exception;
use YouduPhp\Youdu\Application;
use YouduPhp\Youdu\Config;

/**
 * @method static \YouduPhp\Youdu\Kernel\Dept\Client dept()
 * @method static \YouduPhp\Youdu\Kernel\Message\Client message()
 * @method static \YouduPhp\Youdu\Kernel\User\Client user()
 * @method static \YouduPhp\Youdu\Kernel\Session\Client session()
 * @method static \YouduPhp\Youdu\Kernel\Media\Client media()
 * @method static \YouduPhp\Youdu\Kernel\Group\Client group()
 */
class Manager
{
    /**
     * @var Application[]
     */
    protected $applications = [];

    public function __construct(protected array $config)
    {
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->app()->{$method}(...$parameters);
    }

    /**
     * Get an app.
     */
    public function app(?string $name = null): Application
    {
        $name ??= Arr::get($this->config, 'default', 'default');
        $api = Arr::get($this->config, 'api', '');
        $timeout = (int) Arr::get($this->config, 'timeout', 5);
        $buin = (int) Arr::get($this->config, 'buin');
        $tmpPath = Arr::get($this->config, 'file_save_path', '/tmp');

        if (! isset($this->applications[$name])) {
            if (! Arr::has($this->config, "applications.{$name}")) {
                throw new Exception("config 'youdu.applications.{$name}' is undefined", 1);
            }

            $appId = Arr::get($this->config, sprintf('applications.%s.app_id', $name), '');
            $aesKey = Arr::get($this->config, sprintf('applications.%s.aes_key', $name), '');

            $config = new Config([
                'api' => $api,
                'timeout' => $timeout,
                'buin' => $buin,
                'app_id' => $appId,
                'aes_key' => $aesKey,
                'tmp_path' => $tmpPath,
            ]);

            $this->applications[$name] = app(Application::class, ['config' => $config]);
        }

        return $this->applications[$name];
    }
}
