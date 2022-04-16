<?php

if(!isset($this->post['id'])){
    $this->abort('400', 'Product ID is required.');
}
if(!$this->do_have('products', ['id'=>$this->post['id']])){
    $this->abort('400', 'Product ID is not found.');
}