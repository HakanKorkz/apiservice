<?php

$files = [
    'mysql' => 'app/migration/backups/mysql_backup_2022_04_16_04_58_36.json',
    'sqlite' => 'app/migration/backups/sqlite_backup_2022_04_16_04_59_34.json'
];

$this->restore($files[$this->db['drive']]);