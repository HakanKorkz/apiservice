<?php

if(empty($this->post['seller_schema'])){
    return null;
}
$seller = $this->theodore('sellers', ['id'=>$this->post['id']]);
$this->post['seller_schema'] = $this->post['seller_schema'] ?? [];

$rule = [
    'seller_schema'=>'required'
];

$message = [
    'seller_schema'=>[
        'required'=>'Seller scheme is required'
    ]
];

if($this->validate($rule, $this->post, $message)){

    foreach ($this->post['seller_schema'] as $key => $value) {
        if(empty($value)){
            unset($this->post['seller_schema'][$key]);
        }
    }
    $values = [        
        'seller_schema'=>$this->json_encode($this->post['seller_schema']),
        'updated_at'=>$this->timestamp
    ];

    $this->update('sellers', $values, $seller['id']);
    
} 