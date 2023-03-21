<?php

declare(strict_types=1);

namespace HyperfLjh\Encryption\Contract;

interface SymmetricDriverInterface extends DriverInterface
{
    public function getKey(): string;

    public static function generateKey(array $options = []): string;
}
