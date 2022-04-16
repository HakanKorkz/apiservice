<?php
$this->addLayer('app/middleware/seller_id');
$this->addLayer('app/middleware/product_id');

// $seller_product_id = $this->amelia('products', ['id'=>$this->post['id'], 'seller_id'=>$this->post['seller_id']]);
// $this->delete('products', $this->post['id']);
// $this->redirect($this->page_back);

$this->print_pre($this->post);