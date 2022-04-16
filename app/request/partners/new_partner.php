<?php

if(!isset($this->post['partner_create'])){
    return null;
}

$this->post['partner_name'] = $this->post['partner_name'] ?? '';
$this->post['partner_password'] = $this->post['partner_password'] ?? '';
$this->post['partner_schema'] = $this->post['partner_schema'] ?? [];

$rule = [
    'partner_name'=>'required|min-char:3|max-char:20|unique:partners',
    'partner_schema'=>'required',
    'partner_password'=>'required|min-char:6|max-char:16'
];

$message = [
    'partner_name'=>[
        'required'=>'Partner name is required',
        'min-char'=>'Partner name must be at least 3 characters',
        'max-char'=>'Partner name must be at most 16 characters',
        'unique'=>'Partner name is already taken'
    ],
    'partner_schema'=>[
        'required'=>'Partner schema is required'
    ],
    'partner_password'=>[
        'required'=>'Partner password is required',
        'min-char'=>'Partner password must be at least 6 characters',
        'max-char'=>'Partner password must be at most 16 characters'
    ]
];

if($this->validate($rule, $this->post, $message)){

    foreach ($this->post['partner_schema'] as $key => $value) {
        if(empty($value)){
            unset($this->post['partner_schema'][$key]);
        }
    }
    
    $values = [
        'partner_name'=>$this->post['partner_name'],
        'partner_password'=>md5($this->post['partner_password']),
        'partner_schema'=>$this->json_encode($this->post['partner_schema']),
        'partner_token'=>$this->generateToken(14),
        'partner_status'=>true,
        'created_at'=>$this->timestamp
    ];

    $this->insert('partners', $values);
}