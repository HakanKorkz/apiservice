<?php

if(empty($this->post['partner_schema'])){
    return null;
}
$partner = $this->theodore('partners', ['id'=>$this->post['partner_id']]);
$this->post['partner_schema'] = $this->post['partner_schema'] ?? [];

$rule = [
    'partner_schema'=>'required'
];

$message = [
    'partner_schema'=>[
        'required'=>'Partner scheme is required'
    ]
];

if($this->validate($rule, $this->post, $message)){

    foreach ($this->post['partner_schema'] as $key => $value) {
        if(empty($value)){
            unset($this->post['partner_schema'][$key]);
        }
    }
    $values = [        
        'partner_schema'=>$this->json_encode($this->post['partner_schema']),
        'updated_at'=>$this->timestamp
    ];

    $this->update('partners', $values, $partner['id']);
    
} 