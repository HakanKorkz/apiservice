<?php

if(!isset($this->post['product_update'])){
    return null;
}

$product = $this->theodore('products', ['id'=>$this->post['id']]);

$this->post['seller_id'] = $this->post['seller_id'] ?? '';
$this->post['product_type'] = $this->post['product_type'] ?? '';
$this->post['product_type'] = in_array($this->post['product_type'], ['count', 'nocount']) ? $this->post['product_type'] : '';
$this->post['product_code'] = $this->post['product_code'] ?? '';
$this->post['product_name'] = $this->post['product_name'] ?? '';
$this->post['product_lang'] = $this->post['product_lang'] ?? '';
$this->post['product_description'] = $this->post['product_description'] ?? '';
$this->post['product_quantity'] = $this->post['product_quantity'] ?? '';
$this->post['product_tax'] = $this->post['product_tax'] ?? '';
$this->post['product_price'] = $this->post['product_price'] ?? '';
$this->post['product_discount_price'] = $this->post['product_discount_price'] ?? '';
$this->post['product_status'] = (bool)$this->post['product_status'] ?? '';

$rule = [
    'seller_id'=>'required|available:sellers:id',
    'product_type'=>'required',
    'product_code'=>'required',
    'product_name'=>'required',
    'product_description'=>'required',
    'product_lang'=>'required|languages',
    'product_currency'=>'required|currencies',
    'product_quantity'=>'required|numeric',
    'product_tax'=>'required|numeric',
    'product_price'=>'required|decimal',
    'product_discount_price'=>'required|decimal',
    'product_status'=>'required|bool'
];

$message = [
    'product_name'=>[
        'required'=>'Product name is required',
    ],
    'product_description'=>[
        'required'=>'Product description is required'
    ],
    'product_lang'=>[
        'required'=>'Product language is required',
        'languages'=>'Product language is not valid'
    ],
    'product_currency'=>[
        'required'=>'Product currency is required',
        'currencies'=>'Product currency is not valid'
    ],
    'seller_id'=>[
        'required'=>'Seller is required',
        'available'=>'Seller is not available'
    ],
    'product_type'=>[
        'required'=>'Product type is required'
    ],
    'product_code'=>[
        'required'=>'Product code is required'
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
        'decimal'=>'Product price must be decimal'
    ],
    'product_discount_price'=>[
        'required'=>'Product discount price is required',
        'decimal'=>'Product discount price must be decimal'
    ],
    'product_status'=>[
        'required'=>'Product status is required',
        'bool'=>'Product status must be boolean'
    ]
];

if($this->validate($rule, $this->post, $message)){

    $values = [
        'seller_id'=>$this->post['seller_id'],
        'product_type'=>$this->post['product_type'],
        'product_code'=>$this->post['product_code'],
        'product_name'=>$this->post['product_name'],
        'product_description'=>$this->post['product_description'],
        'product_lang'=>$this->post['product_lang'],
        'product_currency'=>$this->post['product_currency'],
        'product_quantity'=>$this->post['product_quantity'],
        'product_tax'=>$this->post['product_tax'],
        'product_price'=>$this->post['product_price'],
        'product_discount_price'=>$this->post['product_discount_price'],
        'product_status'=>$this->post['product_status'],
        'created_at'=>$this->timestamp,
    ];

    $this->update('products', $values, $product['id']);
    
}