<?php

$scheme = array(
    'id:increments',
    'branch_id:int',
    'product_type:string@10',
    'product_code:string',
    'product_name:string',
    'product_quantity:int',
    'product_tax:string@10',
    'product_price:decimal',
    'product_discount_price:decimal',
    'product_status:string@5',
    'created_at:string@19',
    'updated_at:string@19'
);

if(!$this->is_table('products')){
    $this->tableCreate('products', $scheme);
}
    