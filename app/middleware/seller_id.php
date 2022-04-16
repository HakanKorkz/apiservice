<?php

if(!isset($this->post['id'])){
    $this->abort('400', 'Seller ID is required.');
}
if(!$this->do_have('sellers', ['id'=>$this->post['id']])){
    $this->abort('400', 'Seller ID is not found.');
}