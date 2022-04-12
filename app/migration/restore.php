<?php

$files = [
    'mysql' => 'app/migration/backups/mysql_backup_2022_04_13_00_31_01.json',
    'sqlite' => 'app/migration/backups/sqlite_backup_2022_04_13_00_31_43.json'
];

$this->restore($files[$this->db['drive']]);