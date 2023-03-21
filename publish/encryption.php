<?php

declare(strict_types=1);

use HyperfLjh\Encryption\Driver\AesDriver;

return [
    'default' => 'aes',

    'driver' => [
        'aes' => [
            'class'   => AesDriver::class,
            'options' => [
                'key'    => env('AES_KEY', ''),
                'cipher' => env('AES_CIPHER', 'AES-128-CBC'),
            ],
        ],
    ],
];
