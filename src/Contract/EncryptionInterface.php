<?php

declare(strict_types=1);

namespace HyperfLjh\Encryption\Contract;

interface EncryptionInterface extends DriverInterface
{
    /**
     * Get a driver instance.
     *
     * @return DriverInterface
     */
    public function getDriver(?string $name = null): DriverInterface;
}
