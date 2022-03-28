<?php

$scheme = array(
    'id:increments',
    'partner_name:string@16',
    'partner_password:string',
    'partner_token:string@14',
    'partner_status:string@5',
    'created_at:string@19',
    'updated_at:string@19'
);

if(!$this->is_table('partners')){
    $this->tableCreate('partners', $scheme);
}
    