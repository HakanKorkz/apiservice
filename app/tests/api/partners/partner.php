<?php

$this->addLayer('app/middleware/auth');

$partner_schema = $this->json_decode($this->amelia('partners',[
    'partner_name'=>$this->post['partner_name'], 
    'partner_token'=>$this->post['partner_token']
], 
'partner_schema'));

$products = $this->samantha('products', null);

$partnerProducts = [];
foreach ($products as $key => $product) {
    foreach ($product as $productColumn => $productValue) {
        if(in_array($productColumn, array_keys($partner_schema))){
            $partnerProducts[$key][$partner_schema[$productColumn]] = $product[$productColumn];
        }
    }
}
echo 'POST:<br>';
$this->print_pre($this->post);
echo '<hr>';
echo 'DATABASE PRODUCTS:<br>';
$this->print_pre($products);
echo '<hr>';
echo 'PARTNER SCHEMA:<br>';
$this->print_pre($partner_schema);
echo '<hr>';
echo 'PARTNER PRODUCTS:<br>';
$this->print_pre($partnerProducts);