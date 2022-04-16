<?php
if(!isset($this->post['partner_update'])){
    return null;
}

$partner = $this->theodore('partners', ['id'=>$this->post['id']]);
$this->post['partner_name'] = $this->post['partner_name'] ?? '';
$this->post['partner_password'] = $this->post['partner_password'] ?? '';

$rule = [
    'partner_name'=>'required|min-char:3|max-char:20|knownunique:partners:'.$partner['partner_name'],
    'partner_password'=>'required|min-char:6|max-char:16'
];

$message = [
    'partner_name'=>[
        'required'=>'Partner name is required',
        'min-char'=>'Partner name must be at least 3 characters',
        'max-char'=>'Partner name must be at most 16 characters',
        'knownunique'=>'Partner name is already taken'
    ],
    'partner_password'=>[
        'required'=>'Partner password is required',
        'min-char'=>'Partner password must be at least 6 characters',
        'max-char'=>'Partner password must be at most 16 characters'
    ]
];

if(empty($this->post['partner_password'])){
    unset($rule['partner_password']);
    unset($message['partner_password']);
} 

if($this->validate($rule, $this->post, $message)){

    $values = [
        'partner_name'=>$this->post['partner_name'],
        'partner_status'=>true,
        'updated_at'=>$this->timestamp
    ];

    if(!empty($this->post['partner_password'])){
        $values['partner_password'] = md5($this->post['partner_password']);
    } 

    $this->update('partners', $values, $partner['id']);
    
} 