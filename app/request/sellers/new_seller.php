<?php

if(empty($this->post)){
    return null;
}

$this->post['seller_name'] = $this->post['seller_name'] ?? '';
$this->post['seller_password'] = $this->post['seller_password'] ?? '';

$rule = [
    'seller_name'=>'required|min-char:3|max-char:20|unique:sellers',
    'seller_password'=>'required|min-char:6|max-char:16'
];

$message = [
    'seller_name'=>[
        'required'=>'Seller name is required',
        'min-char'=>'Seller name must be at least 3 characters',
        'max-char'=>'Seller name must be at most 16 characters',
        'unique'=>'Seller name is already taken'
    ],
    'seller_password'=>[
        'required'=>'Seller password is required',
        'min-char'=>'Seller password must be at least 6 characters',
        'max-char'=>'Seller password must be at most 16 characters'
    ]
];

if($this->validate($rule, $this->post, $message)){

    $values = [
        'seller_name'=>$this->post['seller_name'],
        'seller_password'=>md5($this->post['seller_password']),
        'seller_token'=>$this->generateToken(14),
        'seller_status'=>true,
        'created_at'=>$this->timestamp
    ];

    if($this->insert('sellers', $values)){
        echo 'Seller added.';
    } else {
        echo 'Seller not added.';
    }
} else {
    $this->print_pre($this->errors);
}