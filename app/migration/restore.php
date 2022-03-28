<?php

$files = [
    'mysql' => 'app/migration/database/mysql_backup_2022_03_28_22_21_02.json',
    'sqlite' => 'app/migration/database/sqlite_backup_2022_03_28_22_21_29.json'
];

$this->restore($files[$this->db['drive']]);