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
    ]
);

$Mind = new Mind($conf);

$Mind->route('/', ['app/views/index'], 'app/migration/restore');

$Mind->route('page:department', 'app/controller/pageController');
$Mind->route('api:department@keyword@id', 'app/controller/apiController');
$Mind->route('new:department@id', 'app/controller/newController');
$Mind->route('edit:department@id', 'app/controller/editController');
$Mind->route('token:department@id', 'app/controller/tokenController');
$Mind->route('sync:department@id', 'app/controller/syncController');
$Mind->route('delete:department@id@sub_id', 'app/controller/deleteController');
$Mind->route('status:department@id', 'app/controller/statusController');
$Mind->route('test:type@department@id', 'app/controller/testController');

$Mind->route('install', 'app/migration/install');
$Mind->route('backup', 'app/migration/backup');
$Mind->route('restore', 'app/migration/restore');
