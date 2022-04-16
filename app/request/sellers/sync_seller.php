<?php
$this->addLayer('app/middleware/seller_id');
echo '// Run the code. e.g:';

$seller_schema = $this->json_decode($this->amelia('sellers',[
    'id'=>$this->post['id'],
], 
'seller_schema'));

$products = $this->samantha('products', null);

$sellerProducts = [];
foreach ($products as $key => $product) {
    if($product['seller_id'] == $this->post['id']){
        foreach ($product as $productColumn => $productValue) {
            if(in_array($productColumn, array_keys($seller_schema))){
                $sellerProducts[$key][$seller_schema[$productColumn]] = $product[$productColumn];
            }
        }
    }
}
echo 'POST:<br>';
$this->print_pre($this->post);
echo '<hr>';
echo 'DATABASE PRODUCTS:<br>';
$this->print_pre($products);
echo '<hr>';
echo 'SELLER SCHEMA:<br>';
$this->print_pre($seller_schema);
echo '<hr>';
echo 'SELLER PRODUCTS:<br>';
$this->print_pre($sellerProducts);
?>