<?php

declare(strict_types=1);

namespace HyperfLjh\Encryption;

use Hyperf\Contract\ConfigInterface;
use InvalidArgumentException;
use HyperfLjh\Encryption\Contract\DriverInterface;
use HyperfLjh\Encryption\Contract\EncryptionInterface;

class EncryptionManager implements EncryptionInterface
{
    /**
     * @var \Hyperf\Contract\ConfigInterface
     */
    protected ConfigInterface $config;

    /**
     * @var array
     */
    protected array $drivers = [];

    /**
     * @param  \Hyperf\Contract\ConfigInterface  $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     *
     * @param  string|null  $name
     * @return \HyperfLjh\Encryption\Contract\DriverInterface
     */
    public function getDriver(?string $name = null): DriverInterface
    {
        if (isset($this->drivers[$name]) && $this->drivers[$name] instanceof DriverInterface) {
            return $this->drivers[$name];
        }

        $name = $name ? : $this->config->get('encryption.default');
        if (!$name) {
            throw new InvalidArgumentException('缺少默认加密驱动设置');
        }

        $config = $this->config->get("encryption.driver.{$name}");
        if (empty($config) or empty($config['class'])) {
            throw new InvalidArgumentException(sprintf('The encryption driver config %s is invalid.', $name));
        }

        $driver = make($config['class'], ['options' => $config['options'] ?? []]);

        return $this->drivers[$name] = $driver;
    }

    /**
     * 加密
     *
     * @param $value
     * @param  bool  $serialize
     * @return string
     */
    public function encrypt($value, bool $serialize = true): string
    {
        return $this->getDriver()->encrypt($value, $serialize);
    }

    /**
     * 解密
     *
     * @param  string  $payload
     * @param  bool  $unserialize
     * @return mixed
     */
    public function decrypt(string $payload, bool $unserialize = true)
    {
        return $this->getDriver()->decrypt($payload, $unserialize);
    }

}
