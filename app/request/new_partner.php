<?php

if(empty($this->post)){
    return null;
}

$this->post['partner_name'] = $this->post['partner_name'] ?? '';
$this->post['partner_password'] = $this->post['partner_password'] ?? '';

$rule = [
    'partner_name'=>'required|min-char:3|max-char:20|unique:partners',
    'partner_password'=>'required|min-char:6|max-char:16'
];

$message = [
    'partner_name'=>[
        'required'=>'Partner name is required',
        'min-char'=>'Partner name must be at least 3 characters',
        'max-char'=>'Partner name must be at most 16 characters',
        'unique'=>'Partner name is already taken'
    ],
    'partner_password'=>[
        'required'=>'Partner password is required',
        'min-char'=>'Partner password must be at least 6 characters',
        'max-char'=>'Partner password must be at most 16 characters'
    ]
];

if($this->validate($rule, $this->post, $message)){

    $values = [
        'partner_name'=>$this->post['partner_name'],
        'partner_password'=>md5($this->post['partner_password']),
        'partner_token'=>$this->generateToken(14),
        'partner_status'=>true,
        'created_at'=>$this->timestamp
    ];

    if($this->insert('partners', $values)){
        echo 'Partner added.';
    } else {
        echo 'Partner not added.';
    }
} else {
    $this->print_pre($this->errors);
}