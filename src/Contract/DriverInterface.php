<?php

declare(strict_types=1);

namespace HyperfLjh\Encryption\Contract;

use HyperfLjh\Encryption\Exception\DecryptException;
use HyperfLjh\Encryption\Exception\EncryptException;

interface DriverInterface
{
    /**
     * 加密
     *
     * @param  mixed  $value
     *
     * @throws EncryptException
     */
    public function encrypt($value, bool $serialize = true): string;

    /**
     * 解密
     *
     * @return mixed
     * @throws DecryptException
     */
    public function decrypt(string $payload, bool $unserialize = true);
}
