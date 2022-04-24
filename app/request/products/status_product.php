<?php

$this->addLayer('app/middleware/product_id');
$product_status = $this->amelia('products', ['id'=>$this->post['id']], 'product_status');
$this->update('products', ['product_status'=>($product_status) ? 0 : 1], $this->post['id']);
$this->redirect($this->page_back);