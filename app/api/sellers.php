<?php

$options = [
    'search'=>[
        'scope'=>'like'
    ],
    'column'=>[
        'id','seller_name','seller_schema','seller_token','created_at', 'updated_at'
    ],
    'format'=>'json'
];

if(isset($this->post['keyword'])){
    $options['search']['keyword'] = '%'.$this->post['keyword'].'%';
}

echo $this->getData('sellers', $options);