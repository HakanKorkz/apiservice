<h2>Sellers <a href="new_seller">Add</a></h2>
<?php

// hepsi
$this->print_pre($this->samantha('sellers', null, [
    'id', 'seller_name', 'seller_token', 'seller_status', 'created_at', 'updated_at'
]));

// aktifler
// $this->print_pre($this->samantha('sellers', ['seller_status'=>true], [
//     'id', 'seller_name', 'seller_token', 'seller_status', 'created_at', 'updated_at'
// ]));

// pasifler
// $this->print_pre($this->samantha('sellers', ['seller_status'=>false], [
//     'id', 'seller_name', 'seller_token', 'seller_status', 'created_at', 'updated_at'
// ]));