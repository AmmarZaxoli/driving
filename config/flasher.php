<?php


return [


'default' => 'sweetalert',

'plugins' => [
    'sweetalert' => [
        'scripts' => [
            'https://cdn.jsdelivr.net/npm/sweetalert2@11',
            'https://cdn.jsdelivr.net/npm/@flasher/flasher-sweetalert@2/dist/flasher-sweetalert.min.js',
        ],
        'styles' => [
            'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css',
        ],
        'options' => [
            'toast' => true,
            'position' => 'top-start', // top-left (still RTL) or use 'top-end' for right
            'showConfirmButton' => false,
            'timer' => 4000,
            'customClass' => [
                'popup' => 'swal-rtl', // custom class
            ],
        ],
    ],
],



];