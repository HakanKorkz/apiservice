<?php
if(!isset($this->post['seller_update'])){
    return null;
}

$seller = $this->theodore('sellers', ['id'=>$this->post['id']]);
$this->post['seller_name'] = $this->post['seller_name'] ?? '';
$this->post['seller_password'] = $this->post['seller_password'] ?? '';
$this->post['seller_status'] = $this->post['seller_status'] ?? '';

$rule = [
    'seller_name'=>'required|min-char:3|max-char:20|knownunique:sellers:'.$seller['seller_name'],
    'seller_password'=>'required|min-char:6|max-char:16',
    'seller_status'=>'required|bool'
];

$message = [
    'seller_name'=>[
        'required'=>'Seller name is required',
        'min-char'=>'Seller name must be at least 3 characters',
        'max-char'=>'Seller name must be at most 16 characters',
        'knownunique'=>'Seller name is already taken'
    ],
    'seller_password'=>[
        'required'=>'Seller password is required',
        'min-char'=>'Seller password must be at least 6 characters',
        'max-char'=>'Seller password must be at most 16 characters'
    ],
    'seller_status'=>[
        'required'=>'Seller status is required',
        'bool'=>'Seller status must be a boolean'
    ]
];

if(empty($this->post['seller_password'])){
    unset($rule['seller_password']);
    unset($message['seller_password']);
} 

if($this->validate($rule, $this->post, $message)){

    $values = [
        'seller_name'=>$this->post['seller_name'],
        'seller_status'=>$this->post['seller_status'],
        'updated_at'=>$this->timestamp
    ];

    if(!empty($this->post['seller_password'])){
        $values['seller_password'] = md5($this->post['seller_password']);
    } 

    $this->update('sellers', $values, $seller['id']);
    
} 