<?php

$files = [
    'mysql' => 'app/migration/backups/mysql_backup_2022_03_28_22_21_02.json',
    'sqlite' => 'app/migration/backups/sqlite_backup_2022_03_28_22_21_29.json'
];

$this->restore($files[$this->db['drive']]);