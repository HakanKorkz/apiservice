<?php

$this->post['department'] = $this->post['department'] ?? '';
switch($this->post['department']){
    case 'partner':
        $this->addLayer('app/request/partners/delete_partner');
        break;
    case 'seller':
        $this->addLayer('app/request/sellers/delete_seller');
        break;
    case 'product':
        $this->addLayer('app/request/products/delete_product');
        break;
    default:
        $this->abort('404', 'Department not found');
        break;
}
