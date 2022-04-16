<?php

$scheme = array(
    'id:increments',
    'user_id:integer',
    'seller_id:int',
    'product_type:string@10',
    'product_code:string',
    'product_name:string',
    'product_description:small',
    'product_lang:string@10',
    'product_currency:string@10',
    'product_quantity:int',
    'product_tax:string@10',
    'product_price:decimal',
    'product_discount_price:decimal',
    'product_images:small',
    'product_videos:small',
    'product_audios:small',
    'product_status:string@5',
    'created_at:string@19',
    'updated_at:string@19'
);

if(!$this->is_table('products')){
    $this->tableCreate('products', $scheme);
}
    