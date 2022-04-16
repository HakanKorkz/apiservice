<?php

$scheme = array(
    'id:increments',
    'seller_name:string@16',
    'seller_schema:small',
    'seller_password:string',
    'seller_token:string@14',
    'seller_status:string@5',
    'created_at:string@19',
    'updated_at:string@19'
);

if(!$this->is_table('sellers')){
    $this->tableCreate('sellers', $scheme);
}
    