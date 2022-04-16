<?php

$this->post['department'] = $this->post['department'] ?? '';
switch($this->post['department']){
    case 'partner':
        $this->addLayer('app/views/partners/new_partner');
        break;
    case 'seller':
        $this->addLayer('app/views/sellers/new_seller');
        break;
    case 'product':
        $this->addLayer('app/views/products/new_product');
        break;
    default:
        $this->abort('404', 'Department not found');
        break;
}
