<?php

$files = [
    'mysql' => 'app/migration/database/mysql_backup_2022_03_28_18_34_19.json',
    'sqlite' => 'app/migration/database/sqlite_backup_2022_03_24_01_32_43.json'
];

$this->restore($files[$this->db['drive']]);