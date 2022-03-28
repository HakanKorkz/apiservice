<?php

if(empty($this->post)){
    return null;
}

$this->post['branch_name'] = $this->post['branch_name'] ?? '';
$this->post['branch_password'] = $this->post['branch_password'] ?? '';

$rule = [
    'branch_name'=>'required|min-char:3|max-char:20|unique:branches',
    'branch_password'=>'required|min-char:6|max-char:16'
];

$message = [
    'branch_name'=>[
        'required'=>'Branch name is required',
        'min-char'=>'Branch name must be at least 3 characters',
        'max-char'=>'Branch name must be at most 16 characters',
        'unique'=>'Branch name is already taken'
    ],
    'branch_password'=>[
        'required'=>'Branch password is required',
        'min-char'=>'Branch password must be at least 6 characters',
        'max-char'=>'Branch password must be at most 16 characters'
    ]
];

if($this->validate($rule, $this->post, $message)){

    $values = [
        'branch_name'=>$this->post['branch_name'],
        'branch_password'=>md5($this->post['branch_password']),
        'branch_token'=>$this->generateToken(14),
        'branch_status'=>true,
        'created_at'=>$this->timestamp
    ];

    if($this->insert('branches', $values)){
        echo 'Branch added.';
    } else {
        echo 'Branch not added.';
    }
} else {
    $this->print_pre($this->errors);
}