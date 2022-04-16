<?php
$this->addLayer('app/middleware/seller_id');
$this->addLayer('app/middleware/product_id');

$product_id = $this->amelia('products', ['seller_id'=>$this->post['id'], 'id'=>$this->post['sub_id']], 'id');
$this->delete('products', $product_id);
$this->redirect($this->page_back);