<?php

$scheme = array(
    'id:increments',
    'branch_name:string@16',
    'branch_password:string',
    'branch_token:string@14',
    'branch_status:string@5',
    'created_at:string@19',
    'updated_at:string@19'
);

if(!$this->is_table('branches')){
    $this->tableCreate('branches', $scheme);
}
    