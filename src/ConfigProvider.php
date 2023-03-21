<?php

declare(strict_types=1);

namespace HyperfLjh\Encryption;

use HyperfLjh\Encryption\Command\GenKeyCommand;
use HyperfLjh\Encryption\Contract\EncryptionInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                EncryptionInterface::class => EncryptionManager::class,
            ],
            'commands'     => [
                GenKeyCommand::class,
            ],
            'annotations'  => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish'      => [
                [
                    'id'          => 'config',
                    'description' => 'The config for hyperf-ljh/encryption.',
                    'source'      => __DIR__ . '/../publish/encryption.php',
                    'destination' => BASE_PATH . '/config/autoload/encryption.php',
                ],
            ],
        ];
    }
}
