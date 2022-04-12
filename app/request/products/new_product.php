<?php

if(empty($this->post)){
    return null;
}

$this->post['seller_id'] = $this->post['seller_id'] ?? '';
$this->post['product_type'] = $this->post['product_type'] ?? '';
$this->post['product_type'] = in_array($this->post['product_type'], ['count', 'nocount']) ? $this->post['product_type'] : '';
$this->post['product_code'] = $this->post['product_code'] ?? '';
$this->post['product_name'] = $this->post['product_name'] ?? '';
$this->post['product_quantity'] = $this->post['product_quantity'] ?? '';
$this->post['product_tax'] = $this->post['product_tax'] ?? '';
$this->post['product_tax'] = in_array($this->post['product_tax'], [8, 18]) ? $this->post['product_tax'] : '';
$this->post['product_price'] = $this->post['product_price'] ?? '';
$this->post['product_old_price'] = $this->post['product_old_price'] ?? '';
$this->post['product_status'] = $this->post['product_status'] ?? '';
$this->post['product_status'] = in_array($this->post['product_status'], [true, false]) ? (bool)$this->post['product_status'] : null;

$rule = [
    'seller_id'=>'required|available:sellers:id',
    'product_type'=>'required',
    'product_code'=>'required|unique:products',
    'product_name'=>'required|unique:products',
    'product_quantity'=>'required|numeric',
    'product_tax'=>'required|numeric',
    'product_price'=>'required|numeric',
    'product_old_price'=>'required|numeric',
    'product_status'=>'required'
];

$message = [
    'product_name'=>[
        'required'=>'Product name is required',
        'unique'=>'Product name is already taken',
        'available'=>'Product name is not available'
    ],
    'seller_id'=>[
        'required'=>'Seller is required',
        'available'=>'Seller is not available'
    ],
    'product_type'=>[
        'required'=>'Product type is required'
    ],
    'product_code'=>[
        'required'=>'Product code is required',
        'unique'=>'Product code is already taken'
    ],
    'product_quantity'=>[
        'required'=>'Product quantity is required',
        'numeric'=>'Product quantity must be numeric'
    ],
    'product_tax'=>[
        'required'=>'Product tax is required',
        'numeric'=>'Product tax must be numeric'
    ],
    'product_price'=>[
        'required'=>'Product price is required',
        'numeric'=>'Product price must be numeric'
    ],
    'product_old_price'=>[
        'required'=>'Product discount price is required',
        'numeric'=>'Product discount price must be numeric'
    ],
    'product_status'=>[
        'required'=>'Product status is required'
    ]
];

if($this->validate($rule, $this->post, $message)){

    $values = [
        'seller_id'=>$this->post['seller_id'],
        'product_type'=>$this->post['product_type'],
        'product_code'=>$this->post['product_code'],
        'product_name'=>$this->post['product_name'],
        'product_quantity'=>$this->post['product_quantity'],
        'product_tax'=>$this->post['product_tax'],
        'product_price'=>$this->post['product_price'],
        'product_old_price'=>$this->post['product_old_price'],
        'product_status'=>$this->post['product_status'],
        'created_at'=>$this->timestamp,
    ];

    if($this->insert('products', $values)){
        echo 'Products added.';
    } else {
        echo 'Products not added.';
    }
} else {
    $this->print_pre($this->errors);
}