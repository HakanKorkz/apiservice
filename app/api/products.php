<?php

$options = [
    'search'=>[
        'scope'=>'like'
    ],
    'column'=>[
        'id',
        'seller_id',
        'product_name',
        'product_schema', 
        'product_price', 
        'product_currency', 
        'product_token',
        'product_status',
        'created_at', 
        'updated_at'
    ]
];

if(isset($this->post['keyword'])){
    $options['search']['keyword'] = '%'.$this->post['keyword'].'%';
}

if(isset($this->post['id'])){
    $options['search']['and'] = ['seller_id'=>$this->post['id']];
}

$output = [];
foreach ($this->getData('products', $options) as $key => $row) {
    $output[$key] = $row;
    $output[$key]['seller_name'] = $this->amelia('sellers', ['id'=>$row['seller_id']], 'seller_name');
}
echo $this->json_encode($output);