<?php

return [

    'pdf'   => [
        'enabled' => true,
        'binary'  => '/usr/bin/wkhtmltopdf',
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],
    'image' => [
        'enabled' => true,
        'binary'  => '/usr/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

];
