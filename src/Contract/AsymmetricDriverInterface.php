<?php

declare(strict_types=1);

namespace HyperfLjh\Encryption\Contract;

interface AsymmetricDriverInterface extends DriverInterface
{
    public function getPublicKey(): string;

    public function getPrivateKey(): string;
}
