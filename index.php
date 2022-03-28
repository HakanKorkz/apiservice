<?php

require './Mind.php';

$conf = array(
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite
        'host'      =>  'localhost',
        'dbname'    =>  'apiservisi', // mydb, app/migration/mydb.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ],
    'firewall'=>[
        'allow'=>[
            'platform'=>'Windows',
            'browser'=>'Chrome',
            'ip'=>'127.0.0.1'
        ]
    ]
);

$Mind = new Mind($conf);

$Mind->route('/', 'app/views/partners', 'app/migration/install');
$Mind->route('new_partner', 'app/views/new_partner');

$Mind->route('backup', 'app/migration/backup');
$Mind->route('restore', 'app/migration/restore');