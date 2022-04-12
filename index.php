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

$Mind->route('/', ['app/views/partners/partners'], 'app/migration/restore');

$Mind->route('api/partners:keyword', 'app/api/partners');
$Mind->route('partners', 'app/views/partners/partners');
$Mind->route('new_partner', 'app/views/partners/new_partner');
$Mind->route('edit_partner:partner_id', 'app/views/partners/edit_partner');
$Mind->route('edit_schema:partner_id', 'app/views/partners/edit_schema');
$Mind->route('new_token:partner_id', 'app/request/partners/new_token');
$Mind->route('delete_partner:partner_id', 'app/request/partners/delete_partner');
$Mind->route('sync_partner:partner_id', 'app/request/partners/sync_partner');

$Mind->route('new_seller', 'app/views/sellers/new_seller');
$Mind->route('new_product', 'app/views/products/new_product');

$Mind->route('api', 'app/api/partner'); // post
$Mind->route('test/api', 'app/views/tests/api'); // form

$Mind->route('install', 'app/migration/install');
$Mind->route('backup', 'app/migration/backup');
$Mind->route('restore', 'app/migration/restore');