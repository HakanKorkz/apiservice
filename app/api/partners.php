<?php

// echo $this->json_encode($this->samantha('partners', null));

$options = [
    'search'=>[
        'scope'=>'like'
    ],
    'column'=>[
        'id','partner_name','partner_schema','partner_token','created_at', 'updated_at'
    ],
    'format'=>'json'
];

if(isset($this->post['keyword'])){
    $options['search']['keyword'] = '%'.$this->post['keyword'].'%';
}

echo $this->getData('partners', $options);