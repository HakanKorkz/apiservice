<?php

require './Mind.php';

$conf = array(
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite
        'host'      =>  'localhost',
        'dbname'    =>  'apiservice', // apiservice, app/migration/apiservice.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ],
    'firewall'=>[
        // 'csrf'=>false, // dışarıdan erişimler için kapatılmalıdır.
        'allow'=>[
            'platform'=>'Windows',
            'browser'=>'Chrome',
            'ip'=>'127.0.0.1'
        ]
    ]
);

$Mind = new Mind($conf);

$Mind->route('/', ['app/views/partners', 'app/views/branches', 'app/views/products'], 'app/migration/restore');
$Mind->route('api', 'app/api/partner'); // post
$Mind->route('test/api', 'app/views/api'); // form

$Mind->route('new_partner', 'app/views/new_partner');
$Mind->route('new_branch', 'app/views/new_branch');
$Mind->route('new_product', 'app/views/new_product');

$Mind->route('install', 'app/migration/install');
$Mind->route('backup', 'app/migration/backup');
$Mind->route('restore', 'app/migration/restore');